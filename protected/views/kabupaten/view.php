<?php
$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	$model->idkab,
);

$this->menu=array(
	array('label'=>'List Kabupaten','url'=>array('index')),
	array('label'=>'Create Kabupaten','url'=>array('create')),
	array('label'=>'Update Kabupaten','url'=>array('update','id'=>$model->idkab)),
	array('label'=>'Delete Kabupaten','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idkab),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kabupaten','url'=>array('admin')),
);
?>

<h1>View Kabupaten #<?php echo $model->idkab; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idkab',
		'nama_kab',
		'idprop',
	),
)); ?>
