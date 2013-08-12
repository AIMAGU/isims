<?php
$this->breadcrumbs=array(
	'Tr Ekstras'=>array('index'),
	$model->id_tranekstra,
);

$this->menu=array(
	array('label'=>'List TrEkstra','url'=>array('index')),
	array('label'=>'Create TrEkstra','url'=>array('create')),
	array('label'=>'Update TrEkstra','url'=>array('update','id'=>$model->id_tranekstra)),
	array('label'=>'Delete TrEkstra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tranekstra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrEkstra','url'=>array('admin')),
);
?>

<h1>View TrEkstra #<?php echo $model->id_tranekstra; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_tranekstra',
		'id_ekstra',
		'nis',
		'th_ajar',
		'semester',
		'nilai_ekstra',
	),
)); ?>
