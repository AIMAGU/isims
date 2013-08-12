<?php
$this->breadcrumbs=array(
	'Kabupatens',
);

$this->menu=array(
	array('label'=>'Create Kabupaten','url'=>array('create')),
	array('label'=>'Manage Kabupaten','url'=>array('admin')),
);
?>

<h1>Kabupatens</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
