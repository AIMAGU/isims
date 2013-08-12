<?php
$this->breadcrumbs=array(
	'Kepribadians'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Kepribadian','url'=>array('index')),
	array('label'=>'Tambah Kepribadian','icon'=>'icon-plus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kepribadian-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'NAMA KEPRIBADIAN',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php echo CHtml::link('Cari','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kepribadian-grid',
	'dataProvider'=>$model->search(),
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	'columns'=>array(
		//'id_ekstra',
		array(
			'header' => 'No',
			'value' => '$row+1',
			'htmlOptions'=>array('style'=>'width: 20px')
		),
		'nama_pribadi',
		array(
			'header'=>'Lihat',
			'template'=>'{view}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget(); ?>