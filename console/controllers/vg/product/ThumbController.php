<?php

namespace console\controllers\vg\product;

use common\models\Company;
use common\models\Product;
use Yii;
use yii\console\Controller;
use yii\db\Connection;
use yii\db\Query;

class ThumbController extends Controller
{
//    const THUMB_NOT_FOUND = '/img/thumb_missing.jpg';
    const THUMB_NOT_FOUND = null;

    public function actionIndex()
    {
        echo "Usage:\n";
        echo "1. vg/product/check\n";
        echo "2. vg/product/correct\n"; // relative path 2 absolute
        echo "3. vg/product/setnull\n"; // image is missing
        exit(0);
    }

    public function actionCheck()
    {
        $time = time();

        $products = Product::find()
            ->select('id, thumb')
//            ->where('thumb IS NOT NULL')
//            ->where('thumb_checked=FALSE')
            ->indexBy('id')//            ->limit(10)
        ;
//            ->all();

        $results = [];

        $i = 1;
        foreach ($products->each(100) as $id => $product) {

            $url = $product->thumb;
            $correctUrl = $this->correctUrl($url);

            $updateVGurl = false;
            if ($correctUrl != $url) {
                $updateVGurl = true;
                $url = $correctUrl;
            }

            if (null === $url) {
                Product::updateAll(['thumb' => self::THUMB_NOT_FOUND, 'thumb_checked' => true], "id=$id");
                continue;
            }

            if ($url) {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_DEFAULT_PROTOCOL, 'http');

                $response = curl_exec($ch);

                if (false === $response) {
                    $error = curl_error($ch);

                    @$results['error'][] = $error . ": URL='$url'";
                    echo "$i) $url: $error\n";

                    Product::updateAll(['thumb' => self::THUMB_NOT_FOUND, 'thumb_checked' => true], "id=$id");

                } else {
                    $httpResponseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    @$results[$httpResponseCode]++;
                    echo "$i) $url: $httpResponseCode\n";

                    if (200 != $httpResponseCode) {
                        Product::updateAll(['thumb' => self::THUMB_NOT_FOUND, 'thumb_checked' => true], "id=$id");
                    } elseif ($updateVGurl) { // +vseti-goroda.ru at begin of URL
                        Product::updateAll(['thumb' => $url, 'thumb_checked' => true], "id=$id");
                    } else {
                        Product::updateAll(['thumb_checked' => true], "id=$id");
                    }
                }
                curl_close($ch);
            }
            $i++;
        }
        print_r($results);

        echo "\nTime: ", round((time() - $time) / 60, 2), " min.\n";
    }

    /**
     * @param string $url
     * @return string|null
     */
    private function correctUrl(?string $url)
    {
        if ('' == trim($url)) {
            return null;
        }

        if (!preg_match('/^https?/i', $url)) {
            if ('/' == $url[0]) {
                $url = "http://vseti-goroda.ru$url";
            } else {
                $url = "http://vseti-goroda.ru/$url";
            }
        }
        return $url;
    }

    /**
     *
     */
    public function actionJsonImport()
    {
        set_time_limit(0);

        $url = 'http://vg.acer/product/thumb/';
        $companies = product::find()
            ->select('*')
            ->all();
        foreach ($companies as $product) {
            $jsonUrl = $url . $product->id;
            //echo "URL: $jsonUrl\n";

            $json = file_get_contents($jsonUrl);
            //echo "JSON: $json\n";

            $data = json_decode($json, true);

            if ($data['thumb_checked'] !== null) {
                $product->thumb = $data['thumb'];
                $product->thumb_checked = $data['thumb_checked'];
                if ($product->save()) {
                    //echo "product with id {$product->id} thumb's data was updated\n";
                    echo $product->id, ' ';
                } else {
                    echo "product with id {$product->id} thumb's data was NOT updated\n";
                    print_r($product->errors);
                    exit(1);
                }
            } else {
                echo "\nproduct {$product->id} skipped.\n";
            }
        }
        exit(0);
    }

    public function actionCopy()
    {
        /** @var Connection $dbProd */
        $dbProd = Yii::$app->dbProd;
        $db = Yii::$app->db;

        /** @var Product[] $thumbs */
        $thumbs = (new Query)
            ->select('id,thumb,thumb_checked')
            ->from('product');

        $command = $dbProd->createCommand("UPDATE product SET thumb=:thumb,thumb_checked=:thumb_checked WHERE id=:id");

        foreach ($thumbs->batch() as $thumbs) {
            foreach ($thumbs as $thumb) {
                $command->bindValues([
                    'thumb' => $thumb['thumb'],
                    'thumb_checked' => $thumb['thumb_checked'],
                    'id' => $thumb['id'],
                ]);
                $command->execute();
                echo $thumb['id'], "\n";
            }
        }
    }
}
