<?php
$this->breadcrumbs=array(
	'Th Ajars'=>array('index'),
	$model->th_ajar,
);

$this->menu=array(
	array('label'=>'List ThAjar','url'=>array('index')),
	array('label'=>'Create ThAjar','url'=>array('create')),
	array('label'=>'Update ThAjar','url'=>array('update','id'=>$model->th_ajar)),
	array('label'=>'Delete ThAjar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->th_ajar),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ThAjar','url'=>array('admin')),
);
?>

<h1>View ThAjar #<?php echo $model->th_ajar; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'th_ajar',
	),
)); ?>
