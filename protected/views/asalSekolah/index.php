<?php
$this->breadcrumbs=array(
	'Asal Sekolahs',
);

$this->menu=array(
	array('label'=>'Create AsalSekolah','url'=>array('create')),
	array('label'=>'Manage AsalSekolah','url'=>array('admin')),
);
?>

<h1>Asal Sekolahs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
