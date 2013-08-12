<?php
$this->breadcrumbs=array(
	'Walis',
);

$this->menu=array(
	array('label'=>'Create Wali','url'=>array('create')),
	array('label'=>'Manage Wali','url'=>array('admin')),
);
?>

<h1>Walis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
