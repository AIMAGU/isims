<?php
$this->breadcrumbs=array(
	'Nilais',
);

$this->menu=array(
	array('label'=>'Create Nilai','url'=>array('create')),
	array('label'=>'Manage Nilai','url'=>array('admin')),
);
?>

<h1>Nilais</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
