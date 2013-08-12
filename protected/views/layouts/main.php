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
	
	<script type="text/javascript">
    $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 200);
            return false;
        });
 
    });
</script>
	
</head>

<body>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/assets/jquery.peelback.js"></script>
<script>
    $(function() {
      $('body').peelback({
        adImage  : '<?php echo Yii::app()->request->baseUrl; ?>/css/assets/ads-nilai.png',
        peelImage  : '<?php echo Yii::app()->request->baseUrl; ?>/css/assets/peel-image.png',
        clickURL : 'penilaian/nilai-index.html',
        smallSize: 50,
        bigSize: 150,
        gaTrack  : true,
        gaLabel  : '#1 Ocim', //#1 Stegosaurus
        autoAnimate: true
      });
    });
  </script>
<div class="container" id="page">		
<div id="mainmenu">

<?php echo '<div data-spy="affix" data-offset-top="10">'; ?>
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
						array('icon'=>'bookmark', 'visible'=>Yii::app()->user->isGuest),
						array('label'=>''.Yii::app()->params['subtitle'].'', 'itemOptions'=>array('class'=>'nav-header'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'JADWAL', 'url'=>array('/jadwal/admin'), 'icon'=>'th', 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'PENEMPATAN', 'url'=>array('/penempatan/admin'), 'icon'=>'check', 'visible'=>Yii::app()->user->checkAccess('Wali') || Yii::app()->user->checkAccess('Kurikulum')),
						array('label'=>'ABSENSI', 'url'=>array('/presensi/index'), 'icon'=>'list-alt', 'visible'=>Yii::app()->user->checkAccess('Wali') || Yii::app()->user->checkAccess('Piket')),
						array('label'=>'JURNAL', 'url'=>array('/jurnal/index'), 'icon'=>'briefcase', 'visible'=>Yii::app()->user->checkAccess('Mapel')),
						array('label'=>'NILAI', 'url'=>array('/nilai/admin'), 'icon'=>'tasks', 'visible'=>Yii::app()->user->checkAccess('Mapel')),
						array('label'=>'STATISTIK', 'url'=>array('/site/statistik'), 'icon'=>'signal', 'visible'=>!Yii::app()->user->isGuest),
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
<?php echo '</div>'; ?>
<div id="cf6_image" class="shadow">
	<div class="jumbotron subhead">
		<h1><?php echo Yii::app()->params['title']; ?><small><?php //echo Yii::app()->params['subtitle']; ?></small></h1>
	</div>
</div><!-- header -->
	
	
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
				//array('label'=>'TENTANG', 'url'=>array('/site/page', 'view'=>'about', 'visible'=>Yii::app()->user->isGuest)),
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
				array('label'=>'KONTAK', 'url'=>array('/site/contact'), 'icon'=>'envelope', 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'EKSTRA', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('Kurikulum'), 'items'=>array(
						array('label'=>'Tambah Ekstrakurikuler', 'url'=>array('/ekstra/create'), 'icon'=>'check', 'visible'=>Yii::app()->user->checkAccess('Kurikulum')),
						array('label'=>'Tambah Kepribadian', 'url'=>array('/kepribadian/create'), 'icon'=>'list-alt', 'visible'=>Yii::app()->user->checkAccess('Kurikulum')),
				)),
				array('label'=>'KELOLA DATA', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
						//array('label'=>'PENDAFTARAN', 'url'=>array('/pendaftar/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'GURU', 'url'=>array('/guru/admin'), 'icon'=>'leaf', 'visible'=>Yii::app()->user->checkAccess('Mapel')),
						array('label'=>'SISWA', 'url'=>array('/siswa/admin'), 'icon'=>'user', 'visible'=>Yii::app()->user->checkAccess('Wali') || Yii::app()->user->checkAccess('Kurikulum')),
				)),
				array('label'=>'ARSIP', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
						array('label'=>'ARSIP NILAI', 'url'=>array('/nilai/arsip'), 'icon'=>'book', 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'ARSIP JURNAL', 'url'=>array('/jurnal/arsip'), 'icon'=>'book', 'visible'=>Yii::app()->user->checkAccess('Mapel')),
						array('label'=>'ARSIP ABSENSI', 'url'=>array('/presensi/arsip'), 'icon'=>'book', 'visible'=>Yii::app()->user->checkAccess('Wali') || Yii::app()->user->checkAccess('Kurikulum')),
						array('label'=>'ARSIP PENEMPATAN', 'url'=>array('/penempatan/index'), 'icon'=>'book', 'visible'=>Yii::app()->user->checkAccess('Kurikulum')),
				)),
				array('label'=>'PENGATURAN', 'url'=>array('/site/pengaturan'), 'icon'=>'wrench', 'visible'=>Yii::app()->user->checkAccess('Kurikulum')),
				array('label'=>'KALKULATOR', 'url'=>'#', 'icon'=>'qrcode', 'visible'=>!Yii::app()->user->isGuest, 'itemOptions' => array('data-toggle'=>'modal',
				'data-target'=>'#kalkulator')),		
				),
			),
			)
	)); ?>
	</div><!-- mainmenu -->
	<div class="thumbnail">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div class="form-actions">
			<?php echo Yii::app()->params['footer']; ?><br/>
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
	</div>
</div><!-- page -->

<a href="#" class="scrollup">TOP ^</a>

</body>
</html>

<!-- JS untuk kalkulator mulai -->
	<?php 
		$url=Yii::app()->request->baseUrl.'/kalkulator/jquery.blackcalculator-1.0.min.js';
		Yii::app()->clientScript->registerScriptFile($url);
	?>
	<?php
	Yii::app()->clientScript->registerScript("kalkulator", "
		$(document).ready(function(){
		$('.calculator').blackCalculator({type:'advanced', allowKeyboard:false, css:'".Yii::app()->request->baseUrl."/kalkulator/'});
	});");
	?>
	
	<?php
	/*Yii::app()->clientScript->registerScript("js", "
		$('#kalkulator').modal({
        backdrop: true,
        keyboard: true
    }).css({
        width: 'auto',
        'margin-left': function () {
            return -($(this).width() / 2);
        }
    });
	");	*/?>	
	<!-- JS untuk kalkulator selesai -->
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'kalkulator', 'htmlOptions'=>array('class'=>'modal hide fade'))); ?>

<?php echo '<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>KALKULATOR</h4>'; ?>
<?php echo '</div>'; ?>

<?php echo '<div class="modal-body">
	<div class="calculator"></div>'; ?>
<?php echo '</div>'; ?>
 
<?php echo '<div class="modal-footer">'; ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'danger',
        'label'=>'KELUAR',
    	'icon'=>'icon-remove icon-white',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
<?php echo '</div>'; ?>

<?php $this->endWidget(); ?>