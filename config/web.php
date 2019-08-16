<?php

$dev_theme = require __DIR__ . '/dev-theme.php';
$modules = require __DIR__ . '/add_modules.php';
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$tcds = require __DIR__ . '/tcds.php';
$ttr_him = require __DIR__ . '/ttr_him.php';
$theptarin = require __DIR__ . '/theptarin.php';

$config = [
    'id' => 'medicong',
    'language' => 'th_TH',
    'timeZone' => 'Asia/Bangkok',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => $modules,
    'components' => [
        'view' => $dev_theme,
        'request' => [
            'cookieValidationKey' => '3fScFxrisEbShcESxVtkxGeDLNwvCpx8',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
            
        ],
        'db' => $db,
        'tcds' => $tcds,
        'ttr_him' => $ttr_him,
        'theptarin' => $theptarin,
    ],
    // 'as access' => [
    //     'class' => 'mdm\admin\components\AccessControl',
    //     'allowActions' => [
    //         'site/*',
    //         'admin/*',
    //         'some-controller/some-action',
    //     ]
    // ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
            'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
            'allowedIPs' => ['*', '::1'],
    ];
}

return $config;