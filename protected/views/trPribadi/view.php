<?php
$this->breadcrumbs=array(
	'Tr Pribadis'=>array('index'),
	$model->id_tranpribadi,
);

$this->menu=array(
	array('label'=>'List TrPribadi','url'=>array('index')),
	array('label'=>'Create TrPribadi','url'=>array('create')),
	array('label'=>'Update TrPribadi','url'=>array('update','id'=>$model->id_tranpribadi)),
	array('label'=>'Delete TrPribadi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tranpribadi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrPribadi','url'=>array('admin')),
);
?>

<h1>View TrPribadi #<?php echo $model->id_tranpribadi; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_tranpribadi',
		'id_pribadi',
		'nis',
		'th_ajar',
		'semester',
		'nilai_pribadi',
		'catatan',
	),
)); ?>
