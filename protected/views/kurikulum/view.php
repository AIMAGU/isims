<?php
$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	$model->kurikulum,
);

$this->menu=array(
	array('label'=>'List Kurikulum','url'=>array('index')),
	array('label'=>'Create Kurikulum','url'=>array('create')),
	array('label'=>'Update Kurikulum','url'=>array('update','id'=>$model->kurikulum)),
	array('label'=>'Delete Kurikulum','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->kurikulum),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kurikulum','url'=>array('admin')),
);
?>

<h1>View Kurikulum #<?php echo $model->kurikulum; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'kurikulum',
		'tahun_berlaku',
	),
)); ?>
