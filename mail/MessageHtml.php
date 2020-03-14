<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 18.04.2018
 * Time: 0:36
 */

namespace mail;

class MessageHtml extends Message
{
    /**
     * @var string
     */
    private $html;

    /**
     * HtmlMessage constructor.
     * @param $html
     * @param string $text
     */
    public function __construct($html, $text = '')
    {
        parent::__construct($text);
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }
}