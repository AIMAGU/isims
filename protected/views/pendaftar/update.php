<?php
$this->breadcrumbs=array(
	'Pendaftars'=>array('index'),
	$model->no_pendaftaran=>array('view','id'=>$model->no_pendaftaran),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pendaftar','url'=>array('index')),
	array('label'=>'Create Pendaftar','url'=>array('create')),
	array('label'=>'View Pendaftar','url'=>array('view','id'=>$model->no_pendaftaran)),
	array('label'=>'Manage Pendaftar','url'=>array('admin')),
);
?>

<h1>Update Pendaftar <?php echo $model->no_pendaftaran; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4)); ?>