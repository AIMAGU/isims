<?php
$this->breadcrumbs=array(
	'Ibus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ibu','url'=>array('index')),
	array('label'=>'Manage Ibu','url'=>array('admin')),
);
?>

<h1>Create Ibu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>