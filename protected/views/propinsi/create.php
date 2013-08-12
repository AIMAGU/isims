<?php
$this->breadcrumbs=array(
	'Propinsis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Propinsi','url'=>array('index')),
	array('label'=>'Manage Propinsi','url'=>array('admin')),
);
?>

<h1>Create Propinsi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>