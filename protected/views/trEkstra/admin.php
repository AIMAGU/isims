<?php
$this->breadcrumbs=array(
	'Tr Ekstras'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TrEkstra','url'=>array('index')),
	array('label'=>'Create TrEkstra','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tr-ekstra-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tr Ekstras</h1>

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
	'id'=>'tr-ekstra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_tranekstra',
		'id_ekstra',
		'nis',
		'th_ajar',
		'semester',
		'nilai_ekstra',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
