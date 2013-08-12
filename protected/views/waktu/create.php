<?php
$this->breadcrumbs=array(
	'Waktu'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Waktu','url'=>array('index')),
	array('label'=>'Manage Waktu','url'=>array('admin')),
);
?>

<h1>Create Waktu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>