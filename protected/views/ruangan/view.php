<?php
$this->breadcrumbs=array(
	'Ruangans'=>array('index'),
	$model->idruang,
);

$this->menu=array(
	array('label'=>'List Ruangan','url'=>array('index')),
	array('label'=>'Create Ruangan','url'=>array('create')),
	array('label'=>'Update Ruangan','url'=>array('update','id'=>$model->idruang)),
	array('label'=>'Delete Ruangan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idruang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ruangan','url'=>array('admin')),
);
?>

<h1>View Ruangan #<?php echo $model->idruang; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idruang',
		'nama_ruang',
		'kapasitas',
		'luas',
	),
)); ?>
