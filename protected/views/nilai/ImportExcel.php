<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	'ImportExcel',
);

$this->menu=array(
		array('label'=>'Cari Nilai','icon'=>'icon-search', 'url'=>array('index')),
		array('label'=>'Kelola Nilai','icon'=>'icon-th', 'url'=>array('admin')),
		array('label'=>'Tambah Nilai','icon'=>'icon-plus', 'url'=>array('create')),
		array('label'=>'Unduh Template', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('template'), 'linkOptions'=>array('target'=>'_blank')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'UNGGAH NILAI SISWA',
	'headerIcon' => 'icon-upload',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_importvalidasi', array('rowExist'=>$rowExist)); ?>

<?php echo $this->renderPartial('_import', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>