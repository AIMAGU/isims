<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Jadwal','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Create Jadwal','icon'=>'icon-plus', 'url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jadwal-grid',
	'dataProvider'=>$model->senin3a(),
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
			array(
				'header'=>'Jam Ke',
				'name'=>'idwaktu',
			),
			array(
					'header'=>'Ruang',
					'name'=>'idruang',
			),
			'kode_guru',
			'kode_mapel',
			'kelas',
			'lokal',
			/*'idruang',
			'idwaktu',
			'th_ajar',
			'semester',
			'kurikulum',*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'template'=>'{view}{update}{delete}',
			'template'=>'{view}',
			'header'=>'View',
			'buttons'=>array
			(
				'view'=>array
				(
					'url'=>'Yii::app()->createUrl("jadwal/view", array("id"=>$data->idruang,"id2"=>$data->idwaktu,"id3"=>$data->th_ajar,"id4"=>$data->semester))',
				),
				/*'update'=>array
				(
					'url'=>'Yii::app()->createUrl("jadwal/update", array("id"=>$data->idruang,"id2"=>$data->idwaktu,"id3"=>$data->th_ajar,"id4"=>$data->semester))',
				),
				'delete'=>array
				(
					'url'=>'Yii::app()->createUrl("jadwal/delete", array("id"=>$data->idruang,"id2"=>$data->idwaktu,"id3"=>$data->th_ajar,"id4"=>$data->semester))',
				),*/
			),
		),
	),
)); ?>
