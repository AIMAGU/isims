<?php
$this->breadcrumbs=array(
	'Ekstras',
);

$this->menu=array(
	array('label'=>'Create Ekstra','url'=>array('create')),
	array('label'=>'Manage Ekstra','url'=>array('admin')),
);
?>

<h1>Ekstras</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
