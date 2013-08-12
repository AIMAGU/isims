<?php
$this->breadcrumbs=array(
	'Penempatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Penempatan','url'=>array('index')),
	array('label'=>'Manage Penempatan','url'=>array('admin')),
);
?>

<h1>Create Penempatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>