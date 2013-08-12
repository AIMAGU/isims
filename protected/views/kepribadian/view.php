<?php
$this->breadcrumbs=array(
	'Kepribadians'=>array('index'),
	$model->id_pribadi,
);

$this->menu=array(
	array('label'=>'Kembali','icon'=>'icon-share-alt','url'=>array('admin')),
	array('label'=>'Tambah Kepribadian','icon'=>'icon-plus','url'=>array('create')),
	array('label'=>'Perbarui Kepribadian','icon'=>'icon-edit','url'=>array('update','id'=>$model->id_pribadi)),
	array('label'=>'Delete Kepribadian','icon'=>'icon-remove','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pribadi),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Daftar Kepribadian','url'=>array('index')),
);
?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'DETAIL KEPRIBADIAN',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_pribadi',
		'nama_pribadi',
	),
)); ?>
<?php $this->endWidget(); ?>