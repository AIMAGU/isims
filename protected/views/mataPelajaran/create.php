<?php
$this->breadcrumbs=array(
	'MataPelajaran'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MataPelajaran','url'=>array('index')),
	array('label'=>'Manage MataPelajaran','url'=>array('admin')),
);
?>

<h2>Add MataPelajaran</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>