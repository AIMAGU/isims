<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	'Jam',
);

$this->menu=array(
	array('label'=>'List Jadwal','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Create Jadwal','icon'=>'icon-plus', 'url'=>array('create')),
);
?>
<?php 
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
		'type'=>'striped bordered condensed',
		'dataProvider' => $model->search(),
		'template' => "{extendedSummary}\n{items}{pager}",
		'columns' => array(
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
						),
		),
),
		'extendedSummary' => array(
				'title' => 'JUMLAH JAM MENGAJAR',
				'columns' => array(
						'kode_guru' => array(
								'label'=>'Kode Guru (Jumlah Jam)',
								'types' => array(
										'E'=>array('label'=>'E'),
										'N'=>array('label'=>'N'),
										'B'=>array('label'=>'B'),
										'A'=>array('label'=>'A'),
										'C'=>array('label'=>'C'),
										'D'=>array('label'=>'D'),
								),
								'class'=>'TbCountOfTypeOperation'
						)
				)
		),
		'extendedSummaryOptions' => array(
				'class' => 'well pull-left',
				'style' => 'width:95%'
		),
));
?>