<?php
$this->breadcrumbs=array(
	'Tr Ekstras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrEkstra','url'=>array('index')),
	array('label'=>'Manage TrEkstra','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'TAMBAH NILAI EKTRAKURIKULER ',
	'headerIcon' => 'icon-plus',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>