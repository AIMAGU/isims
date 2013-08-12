<?php
$this->breadcrumbs=array(
	'Propinsis',
);

$this->menu=array(
	array('label'=>'Create Propinsi','url'=>array('create')),
	array('label'=>'Manage Propinsi','url'=>array('admin')),
);
?>

<h1>Propinsis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
