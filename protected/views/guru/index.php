<?php
$this->breadcrumbs=array(
	'Gurus',
);

$this->menu=array(
	array('label'=>'Tambah Guru','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Kelola Guru','icon'=>'icon-th', 'url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'LIST BIODATA GURU ',
	'headerIcon' => 'icon-globe',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<?php $this->endWidget(); ?>