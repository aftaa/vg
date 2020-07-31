<?php
return [
    'name'       => 'В сети города',
    'language'   => 'ru-RU',
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db'              => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=vg_prod',
            'username' => 'vg_prod',
            'password' => 'vg_prod',
            'charset'  => 'utf8',
        ],
        'dbDev'           => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=vg_dev',
            'username' => 'vg_dev',
            'password' => 'vg_dev',
            'charset'  => 'utf8',
        ],
        'dbVsetigTest'    => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=vsetig_test',
            'username' => 'vg_dev',
            'password' => 'vg_dev',
            'charset'  => 'utf8',
        ],
        'dbVsetigInfoCom' => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=vsetig_info_com',
            'username' => 'vg_dev',
            'password' => 'vg_dev',
            'charset'  => 'utf8',
        ],
        'i18n'            => [
            'translations' => [
                '*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap'        => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        //        'cache' => [
        //                    'class' => 'yii\caching\FileCache',
        //                ],
        'cache'           => [
            'class'        => 'yii\caching\MemCache',
            'useMemcached' => true,
            'servers'      => [
                [
                    'host' => 'localhost',
                    'port' => 11211,
                    //                'weight' => 100,
                ],
            ],
        ],
//        'session'         => [
//            'class' => 'yii\redis\Session',
//            'redis' => [
//                'hostname' => 'localhost',
//                'port'     => 6379,
//                'database' => 0,
//            ]
//        ],
        'mailer'          => [
            'class'    => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            // 'useFileTransport' => true,
        ],
        'sphinx'          => [
            'class'    => 'yii\sphinx\Connection',
            'dsn'      => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
    ],
];
