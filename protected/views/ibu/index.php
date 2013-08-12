<?php
$this->breadcrumbs=array(
	'Ibus',
);

$this->menu=array(
	array('label'=>'Create Ibu','url'=>array('create')),
	array('label'=>'Manage Ibu','url'=>array('admin')),
);
?>

<h1>Ibus</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
