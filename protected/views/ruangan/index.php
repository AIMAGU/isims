<?php
$this->breadcrumbs=array(
	'Ruangans',
);

$this->menu=array(
	array('label'=>'Create Ruangan','url'=>array('create')),
	array('label'=>'Manage Ruangan','url'=>array('admin')),
);
?>

<h1>Ruangans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
