<?php
$this->breadcrumbs=array(
	'Jadwal',
);

$this->menu=array(
	array('label'=>'Create Jadwal','url'=>array('create')),
	array('label'=>'Manage Jadwal','url'=>array('admin')),
);
?>

<h1>Jadwals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
