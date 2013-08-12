<?php
$this->breadcrumbs=array(
	'Ayahs',
);

$this->menu=array(
	array('label'=>'Create Ayah','url'=>array('create')),
	array('label'=>'Manage Ayah','url'=>array('admin')),
);
?>

<h1>Ayahs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
