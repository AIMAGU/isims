<?php
$this->breadcrumbs=array(
	'Ekstras'=>array('index'),
	$model->id_ekstra=>array('view','id'=>$model->id_ekstra),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ekstra','url'=>array('index')),
	array('label'=>'Create Ekstra','url'=>array('create')),
	array('label'=>'View Ekstra','url'=>array('view','id'=>$model->id_ekstra)),
	array('label'=>'Manage Ekstra','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'PERBAHARUI EKSTRAKURIKULER',
	'headerIcon' => 'icon-share',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
<?php $this->endWidget(); ?>