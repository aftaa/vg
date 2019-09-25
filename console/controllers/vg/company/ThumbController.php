<?php

namespace console\controllers\vg\company;

use common\models\Company;
use yii\console\Controller;

class ThumbController extends Controller
{
    const THUMB_NOT_FOUND = null;

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
}