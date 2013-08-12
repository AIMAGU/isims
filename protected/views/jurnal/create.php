<?php
$this->breadcrumbs=array(
	'Jurnals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jurnal','url'=>array('index')),
	array('label'=>'Manage Jurnal','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'TAMBAH JURNAL ',
	'headerIcon' => 'icon-plus-sign',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
<?php $this->endWidget(); ?>