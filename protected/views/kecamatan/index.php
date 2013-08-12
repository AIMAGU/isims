<?php
$this->breadcrumbs=array(
	'Kecamatans',
);

$this->menu=array(
	array('label'=>'Create Kecamatan','url'=>array('create')),
	array('label'=>'Manage Kecamatan','url'=>array('admin')),
);
?>

<h1>Kecamatans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
