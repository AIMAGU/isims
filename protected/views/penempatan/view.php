<?php
$this->breadcrumbs=array(
	'Penempatans'=>array('index'),
	$model->id_penempatan_kls,
);

$this->menu=array(
	array('label'=>'List Penempatan','url'=>array('index')),
	array('label'=>'Create Penempatan','url'=>array('create')),
	array('label'=>'Update Penempatan','url'=>array('update','id'=>$model->id_penempatan_kls)),
	array('label'=>'Delete Penempatan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_penempatan_kls),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penempatan','url'=>array('admin')),
);
?>

<h1>View Penempatan #<?php echo $model->id_penempatan_kls; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'nis',
		'kelas',
		'lokal',
		'th_ajar',
		'id_penempatan_kls',
	),
)); ?>
