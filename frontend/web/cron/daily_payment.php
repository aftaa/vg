<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 14.04.2018
 * Time: 23:25
 */

use vsetigoroda\services\cron\DailyPaymentService;

try {
    $service = new DailyPaymentService;
    $service->doPayments();
} catch (Exception $e) {
    echo "<b>{$e->getMessage()}</b> <big><b>@</b></big> {$e->getFile()}<b>:{$e->getLine()}</b><br><pre>";
    echo $e->getTraceAsString();
}
