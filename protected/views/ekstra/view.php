<?php
$this->breadcrumbs=array(
	'Ekstras'=>array('index'),
	$model->id_ekstra,
);

$this->menu=array(
	array('label'=>'Kembali','icon'=>'icon-share-alt','url'=>array('admin')),
	//array('label'=>'List Ekstra','url'=>array('index')),
	array('label'=>'Tambah Ekstra','icon'=>'icon-plus','url'=>array('create')),
	array('label'=>'Perbarui Ekstra','icon'=>'icon-edit','url'=>array('update','id'=>$model->id_ekstra)),
	array('label'=>'Hapus Ekstra','icon'=>'icon-remove','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ekstra),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'DETAIL EKSTRAKURIKULER',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_ekstra',
		'nama_ekstra',
	),
)); ?>
<?php $this->endWidget(); ?>