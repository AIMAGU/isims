<?php
$this->breadcrumbs=array(
	'Ayahs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ayah','url'=>array('index')),
	array('label'=>'Manage Ayah','url'=>array('admin')),
);
?>

<h1>Create Ayah</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>