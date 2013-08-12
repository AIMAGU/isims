<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'nilaisubmapel-grid',
	'dataProvider'=>$model->mapel(),
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'nis',
		'nis0.nama_lengkap',
		'kodeMapel.kodeMapel.mapel',
		'na',
		'un',
		'uas',
		'kelas',
		'lokal',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'template'=>'{view}{update}{delete}',
			'template'=>'{view}',
			'header'=>'Lihat',
			'buttons'=>array
			(
				'view'=>array
				(
					'url'=>'Yii::app()->createUrl("nilai/view", array("id"=>$data->nis,"id2"=>$data->kode_mapel,"id3"=>$data->th_ajar,"id4"=>$data->semester))',
				),

			),
		),
	),
)); ?>