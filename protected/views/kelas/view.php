<?php
$this->breadcrumbs=array(
	'Kelases'=>array('index'),
	$model->kelas,
);

$this->menu=array(
	array('label'=>'List Kelas','url'=>array('index')),
	array('label'=>'Create Kelas','url'=>array('create')),
	array('label'=>'Update Kelas','url'=>array('update','id'=>$model->kelas)),
	array('label'=>'Delete Kelas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->kelas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kelas','url'=>array('admin')),
);
?>

<h1>View Kelas #<?php echo $model->kelas; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'kelas',
	),
)); ?>
