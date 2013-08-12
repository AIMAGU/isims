<?php
$this->breadcrumbs=array(
	'MataPelajaran'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MataPelajaran','url'=>array('index')),
	array('label'=>'Create MataPelajaran','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('MataPelajaran-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Manage MataPelajaran</h2>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'MataPelajaran-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped condensed',
	'filter'=>$model,
	'columns'=>array(
		'kode_mapel',
		'kurikulum',
		'mapel',
		'kkm',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array
			(
				'view'=>array
				(
					'url'=>'Yii::app()->createUrl("mataPelajaran/view", array("id"=>$data->kode_mapel,"id2"=>$data->kurikulum))',
				),
				'update'=>array
				(
					'url'=>'Yii::app()->createUrl("mataPelajaran/update", array("id"=>$data->kode_mapel,"id2"=>$data->kurikulum))',
				),
				'delete'=>array
				(
					'url'=>'Yii::app()->createUrl("mataPelajaran/delete", array("id"=>$data->kode_mapel,"id2"=>$data->kurikulum))',
				),
			),
		),
	),
)); ?>
