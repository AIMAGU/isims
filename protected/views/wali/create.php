<?php
$this->breadcrumbs=array(
	'Walis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wali','url'=>array('index')),
	array('label'=>'Manage Wali','url'=>array('admin')),
);
?>

<h1>Create Wali</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>