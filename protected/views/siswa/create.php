<?php
$this->breadcrumbs=array(
	'Siswas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Siswa','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Tambah Siswa','icon'=>'icon-plus', 'url'=>array('create')),
);
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'TAMBAH SISWA ',
	'headerIcon' => 'icon-plus-sign',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4)); ?>
<?php $this->endWidget(); ?>