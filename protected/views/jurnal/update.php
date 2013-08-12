<?php
$this->breadcrumbs=array(
	'Jurnals'=>array('index'),
	$model->idruang=>array('view','id'=>$model->idruang),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jurnal','url'=>array('index')),
	array('label'=>'Create Jurnal','url'=>array('create')),
	array('label'=>'View Jurnal','url'=>array('view','id'=>$model->idruang)),
	array('label'=>'Manage Jurnal','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'PERBAHARUI JURNAL ',
	'headerIcon' => 'icon-share',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_formupdate',array('model'=>$model)); ?>
<?php $this->endWidget(); ?>