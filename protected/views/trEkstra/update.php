<?php
$this->breadcrumbs=array(
	'Tr Ekstras'=>array('index'),
	$model->id_tranekstra=>array('view','id'=>$model->id_tranekstra),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrEkstra','url'=>array('index')),
	array('label'=>'Create TrEkstra','url'=>array('create')),
	array('label'=>'View TrEkstra','url'=>array('view','id'=>$model->id_tranekstra)),
	array('label'=>'Manage TrEkstra','url'=>array('admin')),
);
?>

<h1>Update TrEkstra <?php echo $model->id_tranekstra; ?></h1>

<?php echo $this->renderPartial('_form-update',array('model'=>$model)); ?>