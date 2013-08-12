<?php
$this->breadcrumbs=array(
	'Waktus'=>array('index'),
	$model->idwaktu,
);

$this->menu=array(
	array('label'=>'List Waktu','url'=>array('index')),
	array('label'=>'Create Waktu','url'=>array('create')),
	array('label'=>'Update Waktu','url'=>array('update','id'=>$model->idwaktu)),
	array('label'=>'Delete Waktu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idwaktu),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Waktu','url'=>array('admin')),
);
?>

<h1>View Waktu #<?php echo $model->idwaktu; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idwaktu',
		'hari',
		'jam_mulai',
		'jam_berakhir',
	),
)); ?>
