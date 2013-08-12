<?php
$this->breadcrumbs=array(
	'Kelases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kelas','url'=>array('index')),
	array('label'=>'Manage Kelas','url'=>array('admin')),
);
?>

<h1>Create Kelas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>