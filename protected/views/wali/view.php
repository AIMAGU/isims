<?php
$this->breadcrumbs=array(
	'Walis'=>array('index'),
	$model->nik_wali,
);

$this->menu=array(
	array('label'=>'List Wali','url'=>array('index')),
	array('label'=>'Create Wali','url'=>array('create')),
	array('label'=>'Update Wali','url'=>array('update','id'=>$model->nik_wali)),
	array('label'=>'Delete Wali','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nik_wali),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wali','url'=>array('admin')),
);
?>

<h1>View Wali #<?php echo $model->nik_wali; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'nik_wali',
		'nama_wali',
		'alamat',
		'hub_keluarga',
		'pend_terakhir',
		'pekerjaan',
		'penghasilan',
		'idkec',
	),
)); ?>
