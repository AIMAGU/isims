<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Nilai','url'=>array('index')),
	array('label'=>'Create Nilai','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('nilai-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Nilais</h1>
<?php 
	$this->widget('bootstrap.widgets.TbAlert', array(
			'block'=>true, // display a larger alert block?
			'fade'=>true, // use transitions?
			'closeText'=>'×', // close link text - if set to false, no close link is displayed
			'alerts'=>array( // configurations per alert type
					'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
			),
	));
?>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'nilai-grid',
	'type'=>'striped bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'nis',
		array(
			'name'=>'Nama',
			'value'=>'$data->nis0->nama_lengkap',
		),
		//'nis0.nama_lengkap',
		'kodeMapel.mapel',
		array(
			'name'=>'Guru',
			'value'=>'$data->kodeGuru->nama_guru',
		),
		//'kodeGuru.nama_guru',
		'na',
		'un',
		'uas',
		'kelas',
		'lokal',
		/*
		'id_nilai',
		*/
		array(
			'header'=>'MENU',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
