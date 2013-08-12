<?php
$this->breadcrumbs=array(
	'Gurus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Guru','url'=>array('index')),
	array('label'=>'Manage Guru','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'CREATE GURU / USER ',
	'headerIcon' => 'icon-plus-sign',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3)); ?>
<?php $this->endWidget(); ?>