<?php
$this->breadcrumbs=array(
	'Ayahs'=>array('index'),
	$model->nik_ayah=>array('view','id'=>$model->nik_ayah),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ayah','url'=>array('index')),
	array('label'=>'Create Ayah','url'=>array('create')),
	array('label'=>'View Ayah','url'=>array('view','id'=>$model->nik_ayah)),
	array('label'=>'Manage Ayah','url'=>array('admin')),
);
?>

<h1>Update Ayah <?php echo $model->nik_ayah; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>