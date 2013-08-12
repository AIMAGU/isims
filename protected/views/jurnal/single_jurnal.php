<?php
$this->breadcrumbs=array(
	'Jurnals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Jurnal','url'=>array('index')),
	array('label'=>'Create Jurnal','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jurnal2-grid',
	'dataProvider'=>$model->jurnal1(),
	'template'=>'{items}{pager}',
	'type'=>'striped bordered condensed',
	'enableSorting'=>false,
	'columns'=>array(
		'pertemuan',
		//'kodeGuru.nama_guru',
		'kode_mapel',
		'idruang',
		'tanggal',
		'materi',
		'metode_mengajar',
		/*
		'kurikulum',
		'kelas',
		'th_ajar',
		'semester',
		'idwaktu',
		'lokal',
		'keterangan',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'template'=>'{view}{update}{delete}',
			'template'=>'{lihat}',
			'header'=>'Lihat',
			'buttons'=>array
			(
				'lihat' => array
				(
						'label'=>'Lihat detail jurnal',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/lengkap.png',
						'url'=>'Yii::app()->createUrl("jurnal/view", array("id"=>$data->idruang,"id2"=>$data->idwaktu,"id3"=>$data->th_ajar,"id4"=>$data->semester,"id5"=>$data->tanggal))',
				),
			),
		),
	),
)); ?>