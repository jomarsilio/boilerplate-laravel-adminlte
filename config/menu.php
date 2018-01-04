<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menu configurations
    |--------------------------------------------------------------------------
    |
    | Configurations to display application menu.
    |
    */

    'aside' => [

        // Menus without divider
        'null' => [
            [
                'route' => 'home',
                'label' => 'home',
                'icon' => 'home',
            ],
        ],

        // Apllication settings
        'application_settings' => [
            [
                'label' => 'users',
                'icon' => 'users',
                'children' => [
                    [
                        'route' => 'admin.user.index',
                        'label' => 'user_accounts',
                    ],
                    [
                        'route' => 'admin.user.role.index',
                        'label' => 'user_roles',
                    ],
                ]
            ],
        ]
    ]
];
