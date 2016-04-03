<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'blog/page-<page:\d+>' => 'blog/default/index',
                'blog' => 'blog/default/index',
                'blog/post/<id:\d+>' => 'blog/post/view',
                'blog/post/update/<id:\d+>' => 'blog/post/update',
                'blog/<category:[\w_-]+>/page-<page:\d+>' => 'blog/default/category',
                'blog/<category:[\w_-]+>' => 'blog/default/category',
                'blog/tag/<tags:[\w_-]+>' => 'blog/default/tags',
            ],
        ],

    ],
    'language' => 'ru-RU',
    'modules' => [
        'blog' => [
            'class' => 'frontend\modules\blog\Module',
        ],
    ],

    'params' => $params,
];
