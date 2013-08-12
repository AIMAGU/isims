<?php
$this->breadcrumbs=array(
	'Ibus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ibu','url'=>array('index')),
	array('label'=>'Create Ibu','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ibu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ibus</h1>

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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'ibu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nik_ibu',
		'nama_ibu',
		'agama_ibu',
		'tempat_lahir_ibu',
		'tanggal_lahir_ibu',
		'pend_ibu',
		/*
		'pekerjaan_ibu',
		'telp_ibu',
		'penghasilan_ibu',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
