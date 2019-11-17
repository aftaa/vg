<?php

namespace console\controllers\vg\company;

use common\models\Company;
use Yii;
use yii\console\Controller;
use yii\db\Connection;
use yii\db\Query;

class ThumbController extends Controller
{
    const THUMB_NOT_FOUND = null;

    public function actionCopy()
    {
        /** @var Connection $dbProd */
        $dbProd = Yii::$app->get('dbProd');
        $db = Yii::$app->db;

        /** @var Company[] $thumbs */
        $thumbs = (new Query)
            ->select('id,thumb,thumb_checked')
            ->from('company');

        $command = $dbProd->createCommand("UPDATE company SET thumb=:thumb,thumb_checked=:thumb_checked WHERE id=:id");

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


    public function actionIndex()
    {
        $time = time();

        $companies = Company::find()
            ->select('id, thumb')
            ->where('thumb IS NOT NULL')
            ->where('thumb_checked=FALSE')
            ->indexBy('id');
        $results = [];

        $i = 1;
        foreach ($companies->each(100) as $id => $company) {

            $url = $company->thumb;
            $correctUrl = $this->correctUrl($url);

            $updateVGurl = false;
            if ($correctUrl != $url) {
                $updateVGurl = true;
                $url = $correctUrl;
            }

            if (null === $url) {
                Company::updateAll(['thumb' => self::THUMB_NOT_FOUND, 'thumb_checked' => true], "id=$id");
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
                    echo "$i) $url: $error\n";

                    Company::updateAll(['thumb' => self::THUMB_NOT_FOUND, 'thumb_checked' => true], "id=$id");

                } else {
                    $httpResponseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    @$results[$httpResponseCode]++;
                    echo "$i) $url: $httpResponseCode\n";

                    if (200 != $httpResponseCode) {
                        Company::updateAll(['thumb' => self::THUMB_NOT_FOUND, 'thumb_checked' => true], "id=$id");
                    } elseif ($updateVGurl) { // +vseti-goroda.ru at begin of URL
                        Company::updateAll(['thumb' => $url, 'thumb_checked' => true], "id=$id");
                    } else {
                        Company::updateAll(['thumb_checked' => true], "id=$id");
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
        $url = 'http://vg.acer/company/thumb/';
        $companies = Company::find()
            ->select('*')
            ->all();
        foreach ($companies as $company) {
            $jsonUrl = $url . $company->id;
            echo "URL: $jsonUrl\n";

            $json = file_get_contents($jsonUrl);
            echo "JSON: $json\n";

            $data = json_decode($json, true);

            if ($data['thumb_checked'] !== null) {
                $company->thumb = $data['thumb'];
                $company->thumb_checked = $data['thumb_checked'];
                if ($company->save()) {
                    echo "Company with id {$company->id} thumb's data was updated\n";
                } else {
                    echo "Company with id {$company->id} thumb's data was NOT updated\n";
                    print_r($company->errors);
                    exit(1);
                }
            } else {
                echo "Company {$company->id} skipped.\n";
            }
        }
        exit(0);
    }
}
