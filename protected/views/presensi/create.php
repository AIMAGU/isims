<?php
$this->breadcrumbs=array(
	'Absensis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Absensi','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Kelola Absensi','icon'=>'icon-th', 'url'=>array('admin')),
);
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'TAMBAH ABSENSI SISWA',
		'headerIcon' => 'icon-th-list',
		'htmlOptions'=>array('class'=>'inline'),
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
	));?>
	
<?php echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2)); ?>
<?php $this->endWidget(); ?>