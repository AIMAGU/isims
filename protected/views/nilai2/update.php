<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	$model->id_nilai=>array('view','id'=>$model->id_nilai),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nilai','url'=>array('index')),
	array('label'=>'Create Nilai','url'=>array('create')),
	array('label'=>'View Nilai','url'=>array('view','id'=>$model->id_nilai)),
	array('label'=>'Manage Nilai','url'=>array('admin')),
);
?>

<h1>Update Nilai <?php echo $model->id_nilai; ?></h1>

<?php echo $this->renderPartial('_form2',array('model'=>$model)); ?>