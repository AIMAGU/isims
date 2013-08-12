<?php
$this->breadcrumbs=array(
	'Ibus'=>array('index'),
	$model->nik_ibu=>array('view','id'=>$model->nik_ibu),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ibu','url'=>array('index')),
	array('label'=>'Create Ibu','url'=>array('create')),
	array('label'=>'View Ibu','url'=>array('view','id'=>$model->nik_ibu)),
	array('label'=>'Manage Ibu','url'=>array('admin')),
);
?>

<h1>Update Ibu <?php echo $model->nik_ibu; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>