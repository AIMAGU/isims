<?php
$this->breadcrumbs=array(
	'Gurus'=>array('index'),
	$model->kode_guru=>array('view','id'=>$model->kode_guru),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guru','url'=>array('index')),
	array('label'=>'Create Guru','url'=>array('create')),
	array('label'=>'View Guru','url'=>array('view','id'=>$model->kode_guru)),
	array('label'=>'Manage Guru','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'UPDATE BIODATA GURU '.strtoupper($model->nama_guru),
	'headerIcon' => 'icon-share',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3)); ?>
<?php $this->endWidget(); ?>