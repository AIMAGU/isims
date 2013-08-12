<?php
$this->breadcrumbs=array(
	'Absensis'=>array('index'),
	'Arsip',
);

$this->menu=array(
	array('label'=>'List Absensi','url'=>array('index')),
	array('label'=>'Create Absensi','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('presensi-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'ARSIP PRESENSI SISWA',
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
	'id'=>'presensi-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
	'enableSorting'=>false,
	//'filter'=>$model,
	'columns'=>array(
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
<?php $this->endWidget(); ?>
