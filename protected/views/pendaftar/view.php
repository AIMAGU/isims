<?php
$this->breadcrumbs=array(
	'Pendaftars'=>array('index'),
	$model->no_pendaftaran,
);

$this->menu=array(
	array('label'=>'List Pendaftar','url'=>array('index')),
	array('label'=>'Create Pendaftar','url'=>array('create')),
	array('label'=>'Update Pendaftar','url'=>array('update','id'=>$model->no_pendaftaran)),
	array('label'=>'Delete Pendaftar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->no_pendaftaran),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pendaftar','url'=>array('admin')),
);
?>

<h1>View Pendaftar #<?php echo $model->no_pendaftaran; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'no_pendaftaran',
		'nama_lengkap',
		'nama_panggilan',
		'jk',
		'tempat_lahir',
		'tanggal_lahir',
		'anak_ke',
		'status',
		'jml_saudara',
		'alamat',
		'no_telp',
		'agama',
		'kewarganegaraan',
		'bahasa',
		'jarak_rumah',
		'foto',
		'th_ajar',
		'idkec',
		'id_sekolah',
		'nik_wali',
		'no_kk',
		'noKk.nikAyah.nama_ayah',
		'noKk.nikIbu.nama_ibu'
	),
)); ?>
