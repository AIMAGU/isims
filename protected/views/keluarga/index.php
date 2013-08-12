<?php
$this->breadcrumbs=array(
	'Keluargas',
);

$this->menu=array(
	array('label'=>'Create Keluarga','url'=>array('create')),
	array('label'=>'Manage Keluarga','url'=>array('admin')),
);
?>

<h1>Keluargas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
