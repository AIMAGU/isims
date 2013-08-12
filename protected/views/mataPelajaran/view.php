<?php
$this->breadcrumbs=array(
	'MataPelajaran'=>array('index'),
	$model->kode_mapel,
);

$this->menu=array(
	array('label'=>'List MataPelajaran','url'=>array('index')),
	array('label'=>'Create MataPelajaran','url'=>array('create')),
	array('label'=>'Update MataPelajaran','url'=>array('update','id'=>$model->kode_mapel,'id2'=>$model->kurikulum)),
	array('label'=>'Delete MataPelajaran','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->kode_mapel,'id2'=>$model->kurikulum),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MataPelajaran','url'=>array('admin')),
);
?>

<h2>View MataPelajaran #<?php echo $model->kode_mapel; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'kode_mapel',
		'kurikulum',
		'mapel',
		'kkm',
	),
)); ?>
