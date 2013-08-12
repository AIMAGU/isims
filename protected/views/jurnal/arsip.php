<?php
$this->breadcrumbs=array(
	'Jurnals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Jurnal','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Tambah Jurnal','icon'=>'icon-plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('jurnal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'ARSIP JURNAL MENGAJAR',
	'headerIcon' => 'icon-book',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<div class="search-form2">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jurnalhasil-grid',
	'dataProvider'=>$model->search(),
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'pertemuan',
		'kodeGuru.nama_guru',
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
			'buttons'=>array(
				'lihat' => array(
						'label'=>'Lihat detail jurnal',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/lengkap.png',
						'url'=>'Yii::app()->createUrl("jurnal/view", array("id"=>$data->idruang,"id2"=>$data->idwaktu,"id3"=>$data->th_ajar,"id4"=>$data->semester,"id5"=>$data->tanggal))',
				),
			),
		),
	),
)); ?>
<?php $this->endWidget(); ?>