<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 18.04.2018
 * Time: 0:33
 */

namespace mail;

class Message
{
    /**
     * @var string
     */
    private $text;

    /**
     * Message constructor.
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}