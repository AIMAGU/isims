<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="description" content="I-SIMS INTEGRATED SYSTEM INFORMASI MANAGEMENT SEKOLAH SUB SISTEM PENILAIAN" />
    <meta name="keywords" content="i-sims, isims, I-SIMS INTEGRATED SYSTEM INFORMASI MANAGEMENT SEKOLAH SUB SISTEM PENILAIAN, penilaian, sistem informasi penilaian, sistem informasi monitoring pembelajaran, sistem informasi, kenaikan kelas, yii, yii framework, framework, sistem infromasi yii framework" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fav.png" />
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		'type'=>'null', // null or 'inverse'
		//'brand'=>'Project name',
		//'brandUrl'=>'#',
		'collapse'=>'true', // requires bootstrap-responsive.css
		'fixed' => 'null', // null, top or bottom
		'items' => array(
			array(
				'class' => 'bootstrap.widgets.TbMenu',
				'items'=>array(
				array('label'=>'User Akses', 'icon'=>'user', 'url'=>array('/rights/assignment/view'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Permissions', 'icon'=>'fire', 'url'=>array('/rights/authItem/permissions'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Roles', 'icon'=>'exclamation-sign', 'url'=>array('/rights/authItem/roles'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Tasks', 'icon'=>'random', 'url'=>array('/rights/authItem/tasks'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Operations', 'icon'=>'plane', 'url'=>array('/rights/authItem/operations'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Add User', 'icon'=>'plus', 'url'=>array('guru/create'), 'visible'=>!Yii::app()->user->isGuest),
				),
			),
			//'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Pencarian... ."></form>',
			array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
							//array('label'=>'Daftar', 'url'=>array('/user/create'), 'visible'=>Yii::app()->user->isGuest),
							'---',
							array('label'=>''.date('l, d M Y | H:i').'', 'itemOptions'=>array('class'=>'nav-header'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'AKUN ('.Yii::app()->user->name.')', 'url'=>'#', 'items'=>array(
									array('label'=>'Profil', 'url'=>array('/guru/view','id'=>Yii::app()->user->id), 'icon'=>'user', 'visible'=>!Yii::app()->user->isGuest),
									array('label'=>'Pengaturan', 'url'=>array('/guru/update','id'=>Yii::app()->user->id), 'icon'=>'wrench', 'visible'=>!Yii::app()->user->isGuest),
									array('label'=>'Masuk', 'url'=>array('/site/login'), 'icon'=>'ok-sign', 'visible'=>Yii::app()->user->isGuest),
									array('label'=>'Keluar', 'url'=>array('/site/logout'), 'icon'=>'off', 'visible'=>!Yii::app()->user->isGuest),
							)),
					),
			),
			)
	)); ?>
	<div class="jumbotron subhead">
		<h1><?php echo CHtml::encode(Yii::app()->name); date_default_timezone_set("Asia/Jakarta"); ?><small>Sub System Penilaian</small></h1>
	</div><!-- header -->
	<div id="mainmenu">
	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		'type'=>'null', // null or 'inverse'
		//'brand'=>'Project name',
		//'brandUrl'=>'#',
		'collapse'=>'true', // requires bootstrap-responsive.css
		'fixed' => 'null', // null, top or bottom
		'items' => array(
			array(
				'class' => 'bootstrap.widgets.TbMenu',
				'items'=>array(
				array('label'=>'', 'url'=>array('/site/index'), 'icon'=>'home'),
				'---',
				array('label'=>'TENTANG', 'url'=>array('/site/page', 'view'=>'about', 'visible'=>Yii::app()->user->isGuest)),
				'---',
				array('label'=>'PENCARIAN NILAI', 'url'=>array('/nilai/index'), 'icon'=>'search', 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'KELOLA AKUN', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('Admin'), 'items'=>array(
						array('label'=>'User Akses', 'icon'=>'user', 'url'=>array('/rights/assignment/view')),
						array('label'=>'Permissions', 'icon'=>'fire', 'url'=>array('/rights/authItem/permissions')),
						array('label'=>'Roles', 'icon'=>'exclamation-sign', 'url'=>array('/rights/authItem/roles')),
						array('label'=>'Tasks', 'icon'=>'random', 'url'=>array('/rights/authItem/tasks')),
						array('label'=>'Operations', 'icon'=>'plane', 'url'=>array('/rights/authItem/operations')),
						'---',
						array('label'=>'Add User', 'icon'=>'plus', 'url'=>array('guru/create')),
				)),
				'---', 
				array('label'=>'KONTAK', 'url'=>array('/site/contact'), 'icon'=>'envelope', 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'MONITORING', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
						array('label'=>'NILAI', 'url'=>'#', 'icon'=>'tasks', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
							array('label'=>'Tambah Nilai', 'url'=>array('/nilai/create'), 'icon'=>'plus', 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Export to PDF', 'icon'=>'icon-download-alt', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank')),
							array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank')),
							array('label'=>'Unggah Nilai (.xls)','icon'=>'icon-share', 'url'=>array('nilai/ImportExcel')),
						)),
						array('label'=>'NILAI EKSTRA', 'url'=>'#', 'icon'=>'bullhorn', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
								array('label'=>'Kepribadian', 'url'=>array('/trpribadi/create'), 'icon'=>'road', 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Ekstrakurikuler', 'url'=>array('/trekstra/create'), 'icon'=>'gift', 'visible'=>!Yii::app()->user->isGuest),
						)),
						'---',
						array('label'=>'PENEMPATAN', 'url'=>array('/penempatan/admin'), 'icon'=>'check', 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'-- MONITORING --', 'itemOptions'=>array('class'=>'nav-header')),
						array('label'=>'PRESENSI', 'url'=>array('/presensi/create'), 'icon'=>'list-alt', 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'JURNAL', 'url'=>array('/jurnal/create'), 'icon'=>'briefcase', 'visible'=>!Yii::app()->user->isGuest),
				)),
				'---',
				array('label'=>'KELOLA DATA', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
						//array('label'=>'PENDAFTARAN', 'url'=>array('/pendaftar/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'GURU', 'url'=>array('/guru/admin'), 'icon'=>'leaf', 'visible'=>Yii::app()->user->checkAccess('Mapel')),
						'---',
						array('label'=>'SISWA', 'url'=>array('/siswa/admin'), 'icon'=>'user', 'visible'=>Yii::app()->user->checkAccess('Wali')),
				)),

				array('label'=>'MONITORING 2', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
						array('label'=>'NILAI', 'url'=>'#', 'icon'=>'tasks', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
								array('label'=>'Tambah Nilai', 'url'=>array('/nilaisis/create'), 'icon'=>'plus', 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Export to PDF', 'icon'=>'icon-download-alt', 'url'=>Yii::app()->controller->createUrl('nilaisis/GeneratePdf'), 'linkOptions'=>array('target'=>'_blank')),
								array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('nilaisis/GenerateExcel'), 'linkOptions'=>array('target'=>'_blank')),
								array('label'=>'Unggah Nilai (.xls)','icon'=>'icon-share', 'url'=>array('nilaisis/ImportExcel')),
						)),
						array('label'=>'-- MONITORING --', 'itemOptions'=>array('class'=>'nav-header')),
						array('label'=>'JURNAL', 'url'=>array('/jurnal2/create'), 'icon'=>'briefcase', 'visible'=>!Yii::app()->user->isGuest),
				)),				

				),
			),
			)
	)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div class="form-actions">
			Copyright &copy; <?php echo date('Y'); ?> <?php echo CHtml::encode(Yii::app()->name); ?> All Rights Reserved.<br/>
			<!--All Rights Reserved.<br/>-->
			<?php //echo Yii::powered(); ?>
			<?php 
				$this->widget('ext.components.language.XLangMenu', array(
						'items'=>array('id'=>'Indonesia','en'=>'English'),
						'hideActive'=>false,
				));
			?>
		</div><!-- footer -->
	</div>

</div><!-- page -->
</body>
</html>
