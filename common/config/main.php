<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
   
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        

        'urlManager' => [
            'class'=>'yii\web\UrlManager',
            //Disable index.php
            'showScriptName' => false,
            //Disable routes
            'enablePrettyUrl' => true,
            'rules'=>[
                'admin/index' => 'admin/default/index',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                //'site/<category:\w+>'=>'site/category',
                //'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',
                //'admin' => 'admin/default/index',
                //'admin/<action:contact|profile>'=>'admin/default/<action>'

                'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',

             ],
        ],
         'authManager'=>[
            'class'=>'yii\rbac\DbManager',
            
        ]
    ],
];
