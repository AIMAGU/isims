<?php
$this->breadcrumbs=array(
	'Siswas'=>array('index'),
	$model->nis,
);

$this->menu=array(
	array('label'=>'Daftar Siswa','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Tambah Siswa','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Ubah Siswa','icon'=>'icon-edit', 'url'=>array('update','id'=>$model->nis)),
	array('label'=>'Hapus Siswa','icon'=>'icon-remove', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nis),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
	array('label'=>'Kelola Siswa','icon'=>'icon-th', 'url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'VIEW BIODATA SISWA '.strtoupper($model->nama_lengkap),
	'headerIcon' => 'icon-picture',
	//'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>'',
			'type'=>'raw',
			'value'=>Chtml::image(Yii::app()->request->baseUrl.'/images/'.$model->foto,'DORE', array("width"=>100)),
		),
		'nis',
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
		'th_ajar',
		'semester',
		'idkec0.nama_kec',
		'idSekolah.nama_sekolah',
		'nik_wali',
		'no_kk',
		'no_pendaftaran',
		'nisn',
	),
)); ?>
<?php 
$this->widget('bootstrap.widgets.TbDetailView', array(
		'data' =>Keluarga::model()->findByPk($model->no_kk),
		'attributes'=>array(
				'nikAyah.nama_ayah',
				'nikIbu.nama_ibu',
		)
));
?>
<?php $this->endWidget(); ?>