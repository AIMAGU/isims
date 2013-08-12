<?php
$this->breadcrumbs=array(
	'Asal Sekolahs'=>array('index'),
	$model->id_sekolah=>array('view','id'=>$model->id_sekolah),
	'Update',
);

$this->menu=array(
	array('label'=>'List AsalSekolah','url'=>array('index')),
	array('label'=>'Create AsalSekolah','url'=>array('create')),
	array('label'=>'View AsalSekolah','url'=>array('view','id'=>$model->id_sekolah)),
	array('label'=>'Manage AsalSekolah','url'=>array('admin')),
);
?>

<h1>Update AsalSekolah <?php echo $model->id_sekolah; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>