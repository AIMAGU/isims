<?php
$this->breadcrumbs=array(
	'Ibus'=>array('index'),
	$model->nik_ibu,
);

$this->menu=array(
	array('label'=>'List Ibu','url'=>array('index')),
	array('label'=>'Create Ibu','url'=>array('create')),
	array('label'=>'Update Ibu','url'=>array('update','id'=>$model->nik_ibu)),
	array('label'=>'Delete Ibu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nik_ibu),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ibu','url'=>array('admin')),
);
?>

<h1>View Ibu #<?php echo $model->nik_ibu; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'nik_ibu',
		'nama_ibu',
		'agama_ibu',
		'tempat_lahir_ibu',
		'tanggal_lahir_ibu',
		'pend_ibu',
		'pekerjaan_ibu',
		'telp_ibu',
		'penghasilan_ibu',
	),
)); ?>
