<?php
$this->breadcrumbs=array(
	'Waktu',
);

$this->menu=array(
	array('label'=>'Create Waktu','url'=>array('create')),
	array('label'=>'Manage Waktu','url'=>array('admin')),
);
?>

<h1>Waktus</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
