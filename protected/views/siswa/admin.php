<?php
$this->breadcrumbs=array(
	'Siswas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Siswa','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Tambah Siswa','icon'=>'icon-plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('siswa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'DATA SISWA',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'siswa-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'nis',
		'nama_lengkap',
		'jk',
		'tempat_lahir',
		'tanggal_lahir',
		'agama',
		/*
		'nama_panggilan',
		'anak_ke',
		'status',
		'jml_saudara',
		'alamat',
		'no_telp',
		'agama',
		'kewarganegaraan',
		'bahasa',
		'jarak_rumah',
		'foto',
		'th_ajar',
		'semester',
		'idkec',
		'id_sekolah',
		'nik_wali',
		'no_kk',
		'no_pendaftaran',
		'nisn',
		*/
		array(
			'header'=>'Lihat',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}',
		),
	),
)); ?>

<div class="form-actions">
	<?php echo CHtml::link('CARI','#',array('class'=>'search-button btn')); ?>
</div>
<?php $this->endWidget(); ?>