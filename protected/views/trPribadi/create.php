<?php
$this->breadcrumbs=array(
	'Tr Pribadis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Kepribadian','url'=>array('index')),
	array('label'=>'Kelola Kepribadian','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'TAMBAH NILAI KEPRIBADIAN ',
	'headerIcon' => 'icon-plus',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>