<?php
$this->breadcrumbs=array(
	'Kepribadians'=>array('index'),
	$model->id_pribadi=>array('view','id'=>$model->id_pribadi),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kepribadian','url'=>array('index')),
	array('label'=>'Create Kepribadian','url'=>array('create')),
	array('label'=>'View Kepribadian','url'=>array('view','id'=>$model->id_pribadi)),
	array('label'=>'Manage Kepribadian','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'PERBAHARUI KEPRIBADIAN',
	'headerIcon' => 'icon-share',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
<?php $this->endWidget(); ?>