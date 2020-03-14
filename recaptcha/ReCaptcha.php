<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.06.2018
 * Time: 16:13
 */

namespace recaptcha;


class ReCaptcha
{
    const URL = 'https://www.google.com/recaptcha/api/siteverify';
    const FORM_VAR = 'g-recaptcha-response';
    const HTML = '<div class="g-recaptcha" data-sitekey="$sitekey"></div>';
    /**
     * @var string
     */
    private $public = '6LeD4lwUAAAAAAb203vlmgE-dCdQyxrYQLUZgGOO';
    /**
     * @var string
     */
    private $secret = '6LeD4lwUAAAAAAZLnXb722iOTTEPjJ_dy9-DwjBo';
    /**
     * @var string
     */
    private $url = self::URL;

    /**
     * ReCaptcha constructor.
     * @param string $public
     * @param string $secret
     * @param string $url
     */
    public function __construct($public, $secret, $url = null)
    {
        $this->public = $public;
        $this->secret = $secret;
        if (null !== $url) {
            $this->url = $url;
        }
    }

    /**
     * @return bool
     * @throws ReCaptchaHttpException
     */
    public function success()
    {
        $query = $this->buildPostQuery();
        $response = $this->getResponse($query);
        $response = json_decode($response);
        return false !== $response->success;
    }

    /**
     * @param string $query
     * @return string
     * @throws ReCaptchaHttpException
     */
    private function getResponse($query)
    {
//        $response = file_get_contents($this->url, false, stream_context_create([
//            'http' => [
//                'method' => 'POST',
//                'content' => $query,
//            ],
//        ]));
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if (false === $response) {
            throw new ReCaptchaHttpException($php_errormsg);
        }
        return $response;
    }

    /**
     * @return array
     */
    private function buildPostQuery()
    {
        $params = [
            'secret' => $this->secret,
            'response' => $_REQUEST[self::FORM_VAR],
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ];
        $query = http_build_query($params);
        return $params;
    }

    /**
     * @return string
     */
    public function display()
    {
        $html = str_replace('$sitekey', $this->public, self::HTML);
        return $html;
    }
}