<?php
return [

    '/' => 'site/index',

    'login'  => 'site/login',
    'logout' => 'site/logout',
    'signup' => 'site/signup',

    'area/<areaId>' => 'area/index',

    'company/category/<categoryId>' => 'company/category',
    'company/<companyId>'           => 'company/index',

    'category/<categoryId>'            => 'product/category',
    'product/<productId>'              => 'product/index',

    // TODO не подсвечиваются ссылки в главном меню (профиль, пароль)
    'profile/'                         => 'profile/index',
    'profile/password'                 => 'password/index',
    'profile/company/<companyId:\d+>'  => 'profile/company',
    'profile/products/<companyId:\d+>' => 'profile/products',

    'tariffs' => 'site/tariffs',

    'switch-identity/by-first-letter/<letter>' => 'switch-identity/by-first-letter',
    'switch-identity/switch-to/<userId:\d+>'   => 'switch-identity/switch-to',

    'dark'  => 'theme/dark',
    'light' => 'theme/light',

    //                'search/<s>' => 'search/index',

];

