<?php
$this->breadcrumbs=array(
	'Penempatans'=>array('index'),
	$model->id_penempatan_kls=>array('view','id'=>$model->id_penempatan_kls),
	'Update',
);

$this->menu=array(
	array('label'=>'List Penempatan','url'=>array('index')),
	array('label'=>'Create Penempatan','url'=>array('create')),
	array('label'=>'View Penempatan','url'=>array('view','id'=>$model->id_penempatan_kls)),
	array('label'=>'Manage Penempatan','url'=>array('admin')),
);
?>

<h1>Update Penempatan <?php echo $model->id_penempatan_kls; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>