<?php
$this->breadcrumbs=array(
	'Pendaftars',
);

$this->menu=array(
	array('label'=>'Create Pendaftar','url'=>array('create')),
	array('label'=>'Manage Pendaftar','url'=>array('admin')),
);
?>

<h1>Pendaftars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
