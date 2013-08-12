<?php
$this->breadcrumbs=array(
	'Walis'=>array('index'),
	$model->nik_wali=>array('view','id'=>$model->nik_wali),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wali','url'=>array('index')),
	array('label'=>'Create Wali','url'=>array('create')),
	array('label'=>'View Wali','url'=>array('view','id'=>$model->nik_wali)),
	array('label'=>'Manage Wali','url'=>array('admin')),
);
?>

<h1>Update Wali <?php echo $model->nik_wali; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>