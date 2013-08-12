<?php
$this->breadcrumbs=array(
	'MataPelajaran'=>array('index'),
	$model->kode_mapel=>array('view','id'=>$model->kode_mapel),
	'Update',
);

$this->menu=array(
	array('label'=>'List MataPelajaran','url'=>array('index')),
	array('label'=>'Create MataPelajaran','url'=>array('create')),
	array('label'=>'View MataPelajaran','url'=>array('view','id'=>$model->kode_mapel)),
	array('label'=>'Manage MataPelajaran','url'=>array('admin')),
);
?>

<h2>Update MataPelajaran #<?php echo $model->kode_mapel; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>