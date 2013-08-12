<?php
$this->breadcrumbs=array(
	'Absensis'=>array('index'),
	$model->tanggal,
);

$this->menu=array(
	array('label'=>'Kembali','icon'=>'icon-share-alt','url'=>array('index')),
	array('label'=>'Tambah Absensi','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Perbarui Absensi','icon'=>'icon-edit','url'=>array('update','id'=>$model->nis, 'id2'=>$model->tanggal, 'id3'=>$model->th_ajar, 'id4'=>$model->semester)),
	array('label'=>'Hapus Absensi','icon'=>'icon-remove','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nis, 'id2'=>$model->tanggal, 'id3'=>$model->th_ajar, 'id4'=>$model->semester),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Absensi','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'LIHAT DETAIL PRESENSI',
	'headerIcon' => 'icon-picture',
	//'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'nis0.nama_lengkap',
		'status',
		'tanggal',
		'th_ajar',
		'semester',
	),
)); ?>
<?php $this->endWidget(); ?>