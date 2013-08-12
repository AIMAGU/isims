<?php
$this->breadcrumbs=array(
	'Jurnals'=>array('index'),
	$model->idruang,
);

$this->menu=array(
	array('label'=>'Kembali','icon'=>'icon-share-alt','url'=>array('index')),
	array('label'=>'Tambah Jurnal','icon'=>'icon-plus','url'=>array('create')),
	array('label'=>'Perbarui Jurnal','icon'=>'icon-edit','url'=>array('update','id'=>$model->idruang, 'id2'=>$model->idwaktu, 'id3'=>$model->th_ajar, 'id4'=>$model->semester, 'id5'=>$model->tanggal)),
	array('label'=>'Hapus Jurnal','icon'=>'icon-remove','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idruang, 'id2'=>$model->idwaktu, 'id3'=>$model->th_ajar, 'id4'=>$model->semester, 'id5'=>$model->tanggal),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
	//array('label'=>'Manage Jurnal','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'LIHAT JURNAL',
	'headerIcon' => 'icon-picture',
	//'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'pertemuan',
		'idruang',
		'idwaktu',
		'tanggal',
		'kodeGuru.nama_guru',
		'kode_mapel',
		'kurikulum',
		'kelas',
		'lokal',
		'materi',
		'metode_mengajar',
		'keterangan',
		'th_ajar',
		'semester',
	),
)); ?>
<?php $this->endWidget(); ?>