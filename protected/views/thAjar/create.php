<?php
$this->breadcrumbs=array(
	'Th Ajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ThAjar','url'=>array('index')),
	array('label'=>'Manage ThAjar','url'=>array('admin')),
);
?>

<h1>Create ThAjar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>