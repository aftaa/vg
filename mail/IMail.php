<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 18.04.2018
 * Time: 0:31
 */

namespace mail;

interface IMail
{
    public function getTo();
    public function getFrom();
    public function getSubject();
    public function getMessage();
}