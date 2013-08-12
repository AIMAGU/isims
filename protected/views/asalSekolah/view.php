<?php
$this->breadcrumbs=array(
	'Asal Sekolahs'=>array('index'),
	$model->id_sekolah,
);

$this->menu=array(
	array('label'=>'List AsalSekolah','url'=>array('index')),
	array('label'=>'Create AsalSekolah','url'=>array('create')),
	array('label'=>'Update AsalSekolah','url'=>array('update','id'=>$model->id_sekolah)),
	array('label'=>'Delete AsalSekolah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sekolah),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AsalSekolah','url'=>array('admin')),
);
?>

<h1>View AsalSekolah #<?php echo $model->id_sekolah; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_sekolah',
		'nama_sekolah',
		'alamat',
		'idkec',
	),
)); ?>
