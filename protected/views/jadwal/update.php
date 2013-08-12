<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	$model->idruang=>array('view','id'=>$model->idruang),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jadwal','url'=>array('index')),
	array('label'=>'Create Jadwal','url'=>array('create')),
	array('label'=>'View Jadwal','url'=>array('view','id'=>$model->idruang)),
	array('label'=>'Manage Jadwal','url'=>array('admin')),
);
?>

<h1>Update Jadwal <?php echo $model->kelas; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3)); ?>