<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="span-14">
<?php 
if(Yii::app()->user->isGuest){?>
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
		'heading'=>$this->pageTitle=Yii::app()->name,
		)); ?>
		<p>Selamat datang di Sistem Informasi Pengolahan Nilai Siswa. Gunakan aplikasi dengan bijak!</p><hr>
		<p>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'type'=>'danger',
		    'size'=>'small',
			'icon'=>'icon-hand-right icon-white',
		    'label'=>'Mulai Sekarang',
			'url'=>array('site/login'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'type'=>'danger',
		    'size'=>'small',
			'icon'=>'icon-search icon-white',
		    'label'=>'Pencarian Nilai',
			'url'=>array('nilai/index'),
		)); ?>
		</p>
		 
<?php $this->endWidget(); ?>
<?php } ?>

<?php 
if(!Yii::app()->user->isGuest){
echo '<div class="thumbnail">
		<img src="'.Yii::app()->request->baseUrl.'/images/155-Agus.jpg" alt="logo"/>';	
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items' => array(
				array('label'=>'Home', 'url'=>'#', 'itemOptions'=>array('class'=>'active')),
				array('label'=>'BIODATA '.Yii::app()->user->name, 'itemOptions'=>array('class'=>'nav-header')),
				array('label'=>'Profil', 'url'=>array('/guru/view','id'=>Yii::app()->user->id), 'icon'=>'user', 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Pengaturan', 'url'=>array('/guru/update','id'=>Yii::app()->user->id), 'icon'=>'wrench', 'visible'=>!Yii::app()->user->isGuest),
				'',
				array('label'=>'Keluar', 'icon'=>'off', 'url'=>array('/site/logout'), ),
		)
));
echo '</div>';
}
?>
</div>
<div class="span-12">
	<div class="thumbnail">
		<?php $this->widget('bootstrap.widgets.TbCarousel', array(
			'items'=>array(
					array(
						'image'=>Yii::app()->request->baseUrl.'/images/slider/10.jpg',
						'label'=>$this->pageTitle=Yii::app()->name,
						'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. ' .
						'Donec id elit non mi porta gravida at eget metus. ' .
						'Nullam id dolor id nibh ultricies vehicula ut id elit.'),
					array(
						'image'=>Yii::app()->request->baseUrl.'/images/slider/9.jpg',
						'label'=>'Second Thumbnail label',
						'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. ' .
							'Donec id elit non mi porta gravida at eget metus. ' .
							'Nullam id dolor id nibh ultricies vehicula ut id elit.'),
					array(
						'image'=>Yii::app()->request->baseUrl.'/images/slider/8.jpg',
						'label'=>'Third Thumbnail label',
						'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. ' .
							'Donec id elit non mi porta gravida at eget metus. ' .
							'Nullam id dolor id nibh ultricies vehicula ut id elit.'),
					array(
						'image'=>Yii::app()->request->baseUrl.'/images/slider/7.jpg',
						'label'=>'Four Thumbnail label',
						'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. ' .
						'Donec id elit non mi porta gravida at eget metus. ' .
						'Nullam id dolor id nibh ultricies vehicula ut id elit.'),
			  ),
		));
		?>
	</div>
</div>
<div class="clear"></div><br>
<div class="span-5">
<?php 
echo '<div class="thumbnail">
		<a href="#"><img src="'.Yii::app()->request->baseUrl.'/images/home1.jpg" alt="isims-penilaian" title="isims-penilaian" /></a></div>';
?>
</div>
<div class="span-5">
<?php 
echo '<div class="thumbnail">
		<a href="#"><img src="'.Yii::app()->request->baseUrl.'/images/home2.jpg" alt="isims-penilaian" title="isims-penilaian" /></a></div>';
?>
</div>
<div class="span-5">
<?php 
echo '<div class="thumbnail">
		<a href="#"><img src="'.Yii::app()->request->baseUrl.'/images/home3.jpg" alt="isims-penilaian" title="isims-penilaian" /></a></div>';
?>
</div>
<div class="span-9">
<div class="thumbnail">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal'
)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'nilai-grid',
	'dataProvider'=>$model->searchindex(),
	'template'=>'{items}',
	'enableSorting' => false,
	//'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'nis:html',
		//'nis0.nama_lengkap',
		'kodeMapel.kodeMapel.mapel:html',
		'na:html',
		'kelas:html',
		'lokal:html',
		/*
		'un',
		'uas',
		'kode_guru',
		'id_nilai',
		'kurikulum',
		
		array(
			'header' => 'Lihat',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}',
		),
		*/
	),
)); ?>
<?php $this->endWidget(); ?>
</div></div>