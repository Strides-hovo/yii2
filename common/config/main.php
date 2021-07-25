<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@backend'   => dirname(dirname(__DIR__)) . '/backend',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

    ],
    'modules' => [
        'admin' => [
            'class' => 'backend\modules\admin\Module',
        ],
    ],
];
