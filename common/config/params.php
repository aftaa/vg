<?php
return [
    'adminEmail' => [
        'admin@vseti-goroda.ru',
        'after@ya.ru',
    ],
    'supportEmail' => 'support@vseti-goroda.ru',
    'senderEmail' => 'admin@vseti-goroda.ru',
    'senderName' => '«В сети города»',
    'rootEmail' => [
        'senderEmail' => 'root@vseti-goroda.ru',
        'senderName' => 'Технический администратор',
    ],

    'user.passwordResetTokenExpire' => 3600,

    //YML import
    'import' => [
        'folder' => "$_SERVER[DOCUMENT_ROOT]/import",
    ],
];
