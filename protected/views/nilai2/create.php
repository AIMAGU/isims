<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nilai','url'=>array('index')),
	array('label'=>'Manage Nilai','url'=>array('admin')),
);
?>

<!--<h1>Create Nilai</h1>-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>