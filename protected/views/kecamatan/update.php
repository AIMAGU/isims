<?php
$this->breadcrumbs=array(
	'Kecamatans'=>array('index'),
	$model->idkec=>array('view','id'=>$model->idkec),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kecamatan','url'=>array('index')),
	array('label'=>'Create Kecamatan','url'=>array('create')),
	array('label'=>'View Kecamatan','url'=>array('view','id'=>$model->idkec)),
	array('label'=>'Manage Kecamatan','url'=>array('admin')),
);
?>

<h1>Update Kecamatan <?php echo $model->idkec; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>