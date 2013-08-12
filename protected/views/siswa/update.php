<?php
$this->breadcrumbs=array(
	'Siswas'=>array('index'),
	$model->nis=>array('view','id'=>$model->nis),
	'Update',
);

$this->menu=array(
	array('label'=>'List Siswa','url'=>array('index')),
	array('label'=>'Create Siswa','url'=>array('create')),
	array('label'=>'View Siswa','url'=>array('view','id'=>$model->nis)),
	array('label'=>'Manage Siswa','url'=>array('admin')),
);
?>

<h1>Update Siswa <?php echo $model->nis; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4)); ?>