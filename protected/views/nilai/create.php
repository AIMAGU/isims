<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Cari Nilai','icon'=>'icon-search', 'url'=>array('index')),
	array('label'=>'Kelola Nilai','icon'=>'icon-th', 'url'=>array('admin')),
	array('label'=>'Unduh Template (.xls)', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('template'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Unggah Nilai (.xls)','icon'=>'icon-share', 'url'=>array('ImportExcel')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'TAMBAH NILAI SISWA ',
	'headerIcon' => 'icon-plus',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_formcreate', array('model2'=>$model2,'model'=>$model)); ?>
<?php $this->endWidget(); ?>