<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components'          => [
        'request'      => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user'         => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session'      => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                
                '/' => 'site/index',

                'login' => 'site/login',
                'logout' => 'site/logout',
                'signup' => 'site/signup',

                'area/<areaId>' => 'area/index',

                'company/category/<categoryId>' => 'company/category',
                'company/<companyId>'           => 'company/index',

                'category/<categoryId>' => 'product/category',
                'product/<productId>' => 'product/index',

                // TODO не подсвечиваются ссылки в главном меню (профиль, пароль)
                'profile/' => 'profile/index',
                'profile/password' => 'password/index',
                'profile/company/<companyId:\d+>' => 'profile/company',
                'profile/products/<companyId:\d+>' => 'profile/products',

                'tariffs' => 'site/tariffs',

                'switch-identity/by-first-letter/<letter>' => 'switch-identity/by-first-letter',
                'switch-identity/switch-to/<userId:\d+>' => 'switch-identity/switch-to',

                'dark' => 'theme/dark',
                'light' => 'theme/light',

                'search/<searchString>/page/<page>/per-page/<perPage>' => 'search/index',

            ],
        ],
    ],
    'params'              => $params,
];
