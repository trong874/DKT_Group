<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Trang chủ',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        // Custom
        [
            'section' => 'Tin tức',
        ],
        [
            'title' => 'Quản lí tin tức',
            'desc' => '',
            'icon' => 'media/svg/icons/General/Settings-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Tất cả tin tức',
                    'page' => '/article'
                ],
                [
                    'title' => 'Danh mục tin tức',
                    'page' => '/article-list'
                ],
            ]
        ],
        [
            'section'=>'Quảng cáo'
        ],
        [
            'title'=>'Quản lí quảng cáo',
            'desc' => '',
            'icon' => 'media/svg/icons/Clothes/Tie.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Tất cả quảng cáo',
                    'page' => '/advertisement'
                ],
                [
                    'title' => 'Danh mục quảng cáo',
                    'page' => '/advertisement-list/'
                ],
            ]
        ],

        [
            'section'=>'Hệ thống'
        ],
        [
            'title' => 'Cấu hình chung',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/setting',
            'new-tab' => false,
        ],

        ]
];
