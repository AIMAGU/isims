<?php
$this->breadcrumbs=array(
	'Keluargas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Keluarga','url'=>array('index')),
	array('label'=>'Manage Keluarga','url'=>array('admin')),
);
?>

<h1>Create Keluarga</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>