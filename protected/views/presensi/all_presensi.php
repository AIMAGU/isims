<?php
$this->breadcrumbs=array(
	'Absensis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Absensi','url'=>array('index')),
	array('label'=>'Create Absensi','url'=>array('create')),
);

?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'presensi2-grid',
	'dataProvider'=>$model->all_presensi(),
	'type'=>'striped bordered condensed',
	'enableSorting'=>false,
	//'filter'=>$model,
	'columns'=>array(
		array(
				'header' => 'No',
				'value' => '$row+1',
				'htmlOptions'=>array('style'=>'width: 20px')
		),
		'nis',
		'nis0.nama_lengkap',
		'status',
		'tanggal',
		'th_ajar',
		'semester',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'template'=>'{view}{update}{delete}',
			'template'=>'{view}',
			'header'=>'Lihat',
			'buttons'=>array
					('view'=>array
							(
								'url'=>'Yii::app()->createUrl("presensi/view", array("id"=>$data->nis,"id2"=>$data->tanggal,"id3"=>$data->th_ajar,"id4"=>$data->semester))',
							),
					),
		),
	),
)); ?>