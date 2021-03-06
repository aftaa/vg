<?php

return [
    '/' => 'site/index',

    'login'  => 'site/login',
    'logout' => 'site/logout',
    'signup' => 'site/signup',

    'area/<areaId:\d+>' => 'area/index',

    'company/thumb/<companyId>'     => 'company/thumb',
    'company/category/<categoryId>' => 'company/category',
    'company/<companyId>'           => 'company/index',
    'category/<categoryId>'         => 'product/category',

    'product/thumb/<productId>' => 'product/thumb',
    'product/<productId>'       => 'product/index',
    // TODO не подсвечиваются ссылки в главном меню (профиль, пароль)

    'profile/'                         => 'profile/index',
    'profile/password'                 => 'password/index',
    'profile/import/<companyId:\d+>'   => 'import/index',
    'profile/company/<companyId:\d+>'  => 'profile/company',
    'profile/products/<companyId:\d+>' => 'profile/products',

    'profile/company/edit/<companyId:\d+>'  => 'profile/edit-company',

    'import/files/<companyId:\d+>'   => 'import/files',
    'import/categories/<fileId:\d+>' => 'import/categories',

    'tariffs' => 'site/tariffs',

    'switch-identity/by-first-letter/<letter>' => 'switch-identity/by-first-letter',
    'switch-identity/switch-to/<userId:\d+>'   => 'switch-identity/switch-to',

    'dark'   => 'theme/dark',
    'light'  => 'theme/light',
    'search' => 'search/index',

    'policy/no-product-thumb/<productId:\d+>' => 'policy/no-product-thumb',
    'policy/no-company-thumb/<companyId:\d+>' => 'policy/no-company-thumb',

    //    'catchAll' => ['site/offline'],
];
