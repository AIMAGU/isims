<?php
$this->breadcrumbs=array(
	'Keluargas'=>array('index'),
	$model->no_kk,
);

$this->menu=array(
	array('label'=>'List Keluarga','url'=>array('index')),
	array('label'=>'Create Keluarga','url'=>array('create')),
	array('label'=>'Update Keluarga','url'=>array('update','id'=>$model->no_kk)),
	array('label'=>'Delete Keluarga','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->no_kk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Keluarga','url'=>array('admin')),
);
?>

<h1>View Keluarga #<?php echo $model->no_kk; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'no_kk',
		'nik_ibu',
		'nik_ayah',
		'jumlah_anak',
		'status_rumah',
	),
)); ?>
