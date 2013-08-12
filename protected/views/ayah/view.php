<?php
$this->breadcrumbs=array(
	'Ayahs'=>array('index'),
	$model->nik_ayah,
);

$this->menu=array(
	array('label'=>'List Ayah','url'=>array('index')),
	array('label'=>'Create Ayah','url'=>array('create')),
	array('label'=>'Update Ayah','url'=>array('update','id'=>$model->nik_ayah)),
	array('label'=>'Delete Ayah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nik_ayah),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ayah','url'=>array('admin')),
);
?>

<h1>View Ayah #<?php echo $model->nik_ayah; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'nik_ayah',
		'nama_ayah',
		'agama_ayah',
		'tempat_lahir_ayah',
		'tanggal_lahir_ayah',
		'pend_ayah',
		'pekerjaan_ayah',
		'telp_ayah',
		'penghasilan_ayah',
	),
)); ?>
