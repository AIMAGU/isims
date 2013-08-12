<?php
$this->breadcrumbs=array(
	'Propinsis'=>array('index'),
	$model->idprop,
);

$this->menu=array(
	array('label'=>'List Propinsi','url'=>array('index')),
	array('label'=>'Create Propinsi','url'=>array('create')),
	array('label'=>'Update Propinsi','url'=>array('update','id'=>$model->idprop)),
	array('label'=>'Delete Propinsi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idprop),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Propinsi','url'=>array('admin')),
);
?>

<h1>View Propinsi #<?php echo $model->idprop; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idprop',
		'nama_prop',
	),
)); ?>
