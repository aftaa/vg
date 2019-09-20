<?php

namespace console\controllers\vg\product;

use common\models\Product;
use yii\console\Controller;

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
            ->where('thumb IS NOT NULL')
            ->indexBy('id')
//            ->limit(10)
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
                Product::updateAll(['thumb' => self::THUMB_NOT_FOUND], "id=$id");
                continue;
            }

            if ($url) {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
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
                    echo "$url: $error\n";

                    Product::updateAll(['thumb' => self::THUMB_NOT_FOUND], "id=$id");

                } else {
                    $httpResponseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    @$results[$httpResponseCode]++;
                    echo "$url: $httpResponseCode\n";

                    if (200 != $httpResponseCode) {
                        Product::updateAll(['thumb' => self::THUMB_NOT_FOUND], "id=$id");
                    } elseif ($updateVGurl) { // +vseti-goroda.ru at begin of URL
                        Product::updateAll(['thumb' => $url], "id=$id");
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
    private function correctUrl(string $url)
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
}
