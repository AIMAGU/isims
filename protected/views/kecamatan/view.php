<?php
$this->breadcrumbs=array(
	'Kecamatans'=>array('index'),
	$model->idkec,
);

$this->menu=array(
	array('label'=>'List Kecamatan','url'=>array('index')),
	array('label'=>'Create Kecamatan','url'=>array('create')),
	array('label'=>'Update Kecamatan','url'=>array('update','id'=>$model->idkec)),
	array('label'=>'Delete Kecamatan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idkec),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kecamatan','url'=>array('admin')),
);
?>

<h1>View Kecamatan #<?php echo $model->idkec; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idkab',
		'nama_kec',
		'idkec',
	),
)); ?>
