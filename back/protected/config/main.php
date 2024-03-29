<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    'defaultController' => 'home',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.widgets.*',
    ),
    'modules' => array(
    // uncomment the following to enable the Gii tool
    /*
      'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'Enter Your Password Here',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
      ),
     */
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'ship-order-management' => 'shipOrder/index',
                'add-ship-order' => 'shipOrder/add',
                'ship-order-report' => 'shipOrder/report_layout',
                'ship-order-transaction' => 'shipOrder/view_history',
                'ship-order-update/<id:\d+>' => 'shipOrder/edit/id/<id>',
                'ship-order-export/<id:\d+>' => 'shipOrder/export/id/<id>',
                'ship-order-delete/<id:\d+>' => 'shipOrder/delete/id/<id>',
                'outcome-management' => 'outcome/index',                
                'outcome-add' => 'outcome/add',                
                'outcome-delete/<id:\d+>' => 'outcome/delete/id/<id>',                
                'outcome-update/<id:\d+>' => 'outcome/edit/id/<id>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=calicargo',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'home/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'ppp'=>20,
        'lang'=>'en',
        'ticket_tax' =>0.1,
        'regx_number' => '/^\d+$/',
        'upload_dir'=>'/Applications/XAMPP/xamppfiles/htdocs/core/upload/',
        'upload_url'=>"/core/upload/",
    ),
    
);