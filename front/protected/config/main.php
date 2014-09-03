<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'CaliCargo',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.widgets.*',
        'ext.yii-mail.YiiMailMessage',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool
    
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
    
    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules'=>array(
                'home'=>'site/index',
                'about'=>'site/about',
                'contact'=>'site/contact',
                'ship-at-calicargo'=>'site/ship_cali',
                'ship-from-amazon'=>'shipOrder/ship_amazon',
                'ship-through-ups'=>'site/ship_ups',
                'order-from-amazon'=>'site/ship_order',
                'order-success'=>'site/sent_mail_notification',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    
            ),
            'showScriptName'=>false 
        ),
        'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=calicargo',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'alecsu',
            'charset' => 'utf8',
        ),
        
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                array(
                    'class'=>'CWebLogRoute',
                    'enabled' => YII_DEBUG,
                    'levels'=>'error, warning, trace, log, vardump',
                    'showInFireBug'=>true,
                ),
            ),
        ),
        'mail' => array(
                'class' => 'ext.yii-mail.YiiMail',
                'transportType'=>'smtp',
                'transportOptions'=>array(
                        'host'=>'smtp.gmail.com',
                        'username'=>"kate.le0248@gmail.com",
                        'password'=>"",
                        'port'=>'465',
                        'encryption' => 'tls'                   
                ),
                'viewPath' => 'application.views.mail',             
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'kate.le0248@gmail.com',
        'companyEmail'=>'kate.le2014@gmail.com',
    ),
);