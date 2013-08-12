<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'I-SIMS ',
	'language'=>'id',
	'timeZone'=>'Asia/Jakarta',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap',
	),
	
	//'theme'=>'hebo',
		
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',  // mendefinisikan rights modules ke dalam aplikasi kita
		'application.modules.rights.components.*',  // mendefinisikan rights modules components ke dalam aplikasi kita
	),
	
	//Untuk mengeset tampilan awal (Redirected...)
	'defaultController'=>'Site',

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'rights'=>array(
				'debug'=>true,
				'enableBizRuleData'=>true,
				//'superuserName'=>'Admin',
				//'userIdColumn'=>'id',    // mengeset nama colom yang menjadi id user
				//'userNameColumn'=>'username',  //mengeset nama colom yang menjadi username user
				//'install'=>true, // jika anda ingin menginstall, jika sudah terinstal dihilangkan saja baris ini
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
			'generatorPaths' => array(
					'bootstrap.gii'
			),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
		),
		
		'bootstrap' => array(
			'class' => 'ext.bootstrap.components.Bootstrap',
			'responsiveCss' => true,
		),
		'authManager'=>array(
			'defaultRoles'=>array('Guest'), //sesuai nama tipe guest yang di-create
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'authitem',
			'itemChildTable'=>'authitemchild',
			'assignmentTable'=>'authassignment',
			//'rightsTable'=>'rights',
        ),
        /*'request'=>array(
        		'enableCsrfValidation'=>true,
        ),*/
		// uncomment the following to enable URLs in path-format
        'urlManager'=>array(
        		'urlFormat'=>'path',
        		'rules'=>array(
        			//Untuk membaca url id yang bertype int (<id:\d+>)
        			'penilaian/<controller:\w+>-<id:\d+>' || '<controller:\w+>-<id:\w+>'=>'<controller>/view',
					'penilaian/<controller:\w+>-<action:\w+>/<id:\d+>' || '<controller:\w+>-<action:\w+>/<id:\w+>'=>'<controller>/<action>',
        			'penilaian/<controller:\w+>-<action:\w+>'=>'<controller>/<action>',
        			
        			//Untuk membaca url id yang bertype string (<id:\w+>)
        			//'<controller:\w+>/<id:\w+>'=>'<controller>/view',
					//'<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
        		),
        		'showScriptName'=>false,
        		'urlSuffix'=>'.html',
        		'caseSensitive'=>false
        ),
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=cadangan',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => 'aimagu19',
			'charset' => 'utf8',
			//'tablePrefix' => 'isims_',
	        'enableProfiling'=>true,
	        'enableParamLogging' => true,
	        'schemaCachingDuration' => 180,
		),
	
		'ePdf' => array(
				'class'         => 'ext.yii-pdf.EYiiPdf',
				'params'        => array(
						'mpdf'     => array(
								'librarySourcePath' => 'ext.yii-pdf.mpdf.*',
								//'librarySourcePath' => 'application.vendors.mpdf.*',
								'constants'         => array(
										'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
								),
								'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder.
								/*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
								 'mode'              => '', //  This parameter specifies the mode of the new document.
										'format'            => 'A4', // format A4, A5, ...
										'default_font_size' => 0, // Sets the default document font size in points (pt)
										'default_font'      => '', // Sets the default font-family for the new document.
										'mgl'               => 15, // margin_left. Sets the page margins for the new document.
										'mgr'               => 15, // margin_right
										'mgt'               => 16, // margin_top
										'mgb'               => 16, // margin_bottom
										'mgh'               => 9, // margin_header
										'mgf'               => 9, // margin_footer
										'orientation'       => 'P', // landscape or portrait orientation
								)*/
						),
				),
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
				// debug toolbar configuration
				/*
				array(
					'class'=>'ext.debugtoolbar.XWebDebugRouter',
					'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
					'levels'=>'error, warning, trace, profile, info',
					'allowedIPs'=>array('127.0.0.1'),
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);