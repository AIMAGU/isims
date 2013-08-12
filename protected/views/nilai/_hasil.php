<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'nilaihasil-grid',
	'dataProvider'=>$model->search(),
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
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
			'template'=>'{CETAK}',
			'header'=>'Lihat',
			'buttons'=>array(
				'CETAK'=>array(
					'url'=>'Yii::app()->createUrl("nilai/pdf", array("id"=>$data->nis))',
			)),
		),
		/*
		'kode_guru',
		'id_nilai',
		'kurikulum',
		*/
		/*array(
			'header' => 'Lihat',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}',
		),*/
	),
)); ?>
