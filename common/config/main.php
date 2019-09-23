<?php
return [
    'name'       => 'В сети города',


    'language'  => 'ru-RU',


    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'cache'  => [
            'class' => 'yii\caching\FileCache',
        ],
        'db'     => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=vg',
            'username' => 'vg',
            'password' => 'vg',
            'charset'  => 'utf8',
        ],

//        'dbVsetigTest'    => [
//            'class'    => 'yii\db\Connection',
//            'dsn'      => 'mysql:host=kuba.aftaa.ru;dbname=vsetig',
//            'username' => 'vg',
//            'password' => 'vg',
//            'charset'  => 'utf8',
//        ],
//        'dbVsetigInfoCom' => [
//            'class'    => 'yii\db\Connection',
//            'dsn'      => 'mysql:host=kuba.aftaa.ru;dbname=vsetig',
//            'username' => 'vg',
//            'password' => 'vg',
//            'charset'  => 'utf8',
//        ],
//        'dbVsetigCat'     => [
//            'class'    => 'yii\db\Connection',
//            'dsn'      => 'mysql:host=kuba.aftaa.ru;dbname=vsetig',
//            'username' => 'vg',
//            'password' => 'vg',
//            'charset'  => 'utf8',
//        ],
        'dbVsetigTest'    => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=vsetig.beget.tech;dbname=vsetig_test',
            'username' => 'vsetig_test',
            'password' => 'DarkS1de423',
            'charset'  => 'utf8',
        ],
        'dbVsetigInfoCom' => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=vsetig.beget.tech;dbname=vsetig_info_com',
            'username' => 'vsetig_info_com',
            'password' => 'DarkS1de423',
            'charset'  => 'utf8',
        ],
        'dbVsetigCat'     => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=vsetig.beget.tech;dbname=vsetig_cat',
            'username' => 'vsetig_cat',
            'password' => 'DarkS1de423',
            'charset'  => 'utf8',
        ],
        'mailer'          => [
            'class'            => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            // 'useFileTransport' => true,
        ],
    ],
];
