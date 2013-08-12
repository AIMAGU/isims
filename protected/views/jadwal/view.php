<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	$model->idruang
);

$this->menu=array(
	array('label'=>'List Jadwal','url'=>array('index')),
	array('label'=>'Create Jadwal','url'=>array('create')),
	array('label'=>'Update Jadwal','url'=>array('update','id'=>$model->idruang,'id2'=>$model->idwaktu,'id3'=>$model->th_ajar,'id4'=>$model->semester)),
	array('label'=>'Delete Jadwal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idruang,'id2'=>$model->idwaktu,'id3'=>$model->th_ajar,'id4'=>$model->semester),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jadwal','url'=>array('admin')),
);
?>

<h1>View Jadwal #<?php echo $model->idruang; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idwaktu',
		'idruang0.namaruang',
		'kodeGuru.nama_guru',
		'kodeMapel.kodeMapel.mapel',
		'kelas',
		'lokal',
		'th_ajar',
		'semester',
		'kurikulum',
	),
)); ?>
<?php 
?>