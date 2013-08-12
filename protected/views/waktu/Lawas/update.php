<?php
$this->breadcrumbs=array(
	'Waktus'=>array('index'),
	$model->idwaktu=>array('view','id'=>$model->idwaktu),
	'Update',
);

$this->menu=array(
	array('label'=>'List Waktu','url'=>array('index')),
	array('label'=>'Create Waktu','url'=>array('create')),
	array('label'=>'View Waktu','url'=>array('view','id'=>$model->idwaktu)),
	array('label'=>'Manage Waktu','url'=>array('admin')),
);
?>

<h1>Update Waktu <?php echo $model->idwaktu; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>