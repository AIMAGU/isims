<?php
$this->breadcrumbs=array(
	'Siswas',
);

$this->menu=array(
	array('label'=>'Tambah Siswa','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Kelola Siswa','icon'=>'icon-th', 'url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'DAFTAR SISWA',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php $this->endWidget(); ?>
