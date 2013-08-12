<?php
$this->breadcrumbs=array(
	'Tr Ekstras',
);

$this->menu=array(
	array('label'=>'Create TrEkstra','url'=>array('create')),
	array('label'=>'Manage TrEkstra','url'=>array('admin')),
);
?>

<h1>Tr Ekstras</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
