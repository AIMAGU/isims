<?php
$this->breadcrumbs=array(
	'Keluargas'=>array('index'),
	$model->no_kk=>array('view','id'=>$model->no_kk),
	'Update',
);

$this->menu=array(
	array('label'=>'List Keluarga','url'=>array('index')),
	array('label'=>'Create Keluarga','url'=>array('create')),
	array('label'=>'View Keluarga','url'=>array('view','id'=>$model->no_kk)),
	array('label'=>'Manage Keluarga','url'=>array('admin')),
);
?>

<h1>Update Keluarga <?php echo $model->no_kk; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>