<?php
return [
    [
        'title' => 'dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'home',

    ],
    [
        'title' => 'visual elements',
        'icon' => 'columns-three',
        'active' => 'admin.appearance.*',
        'children' => [
            [
                'title' => 'icons library',
                'route' => 'admin.appearance.icons.index',
            ],
        ],
    ],
    [
        'title' => 'settings',
        'icon' => 'gears',
        'can' => 'admin.setting.*',
        'active' => 'admin.settings.*',
        'children' => [
            [
                'title' => 'information',
                'can' => 'admin.setting.info.read',
                'route' => 'admin.settings.info.index',
            ], [
                'title' => 'caches',
                'can' => 'admin.setting.cache.read',
                'route' => 'admin.settings.caches.index',
            ], [
                'title' => 'logs',
                'can' => 'admin.setting.log.read',
                'route' => 'admin.settings.logs.index',
            ],
        ],
    ],
    [
        'title' => 'users',
        'icon' => 'users',
        'can' => 'admin.user.read',
        'active' => 'admin.users.*',
        'children' => [
            [
                'title' => 'users list',
                'route' => 'admin.users.index',
            ],
            [
                'title' => 'create a new user',
                'route' => 'admin.users.create',
            ],
        ],
    ],
    [
        'title' => 'user authorizations',
        'icon' => 'lock-closed',
        'canany' => ['admin.role.index', 'admin.permission.index'],
        'active' => 'admin.authorize.*',
        'children' => [
            [
                'title' => 'roles',
                'route' => 'admin.authorize.roles.index',
                'can' => 'admin.role.index',
            ],
            [
                'title' => 'permissions',
                'route' => 'admin.authorize.permissions.index',
                'can' => 'admin.permission.index',
            ],
        ],
    ],
];
