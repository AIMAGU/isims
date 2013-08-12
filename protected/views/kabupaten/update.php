<?php
$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	$model->idkab=>array('view','id'=>$model->idkab),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kabupaten','url'=>array('index')),
	array('label'=>'Create Kabupaten','url'=>array('create')),
	array('label'=>'View Kabupaten','url'=>array('view','id'=>$model->idkab)),
	array('label'=>'Manage Kabupaten','url'=>array('admin')),
);
?>

<h1>Update Kabupaten <?php echo $model->idkab; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>