<?php
$this->breadcrumbs=array(
	'Asal Sekolahs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AsalSekolah','url'=>array('index')),
	array('label'=>'Manage AsalSekolah','url'=>array('admin')),
);
?>

<h1>Create AsalSekolah</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>