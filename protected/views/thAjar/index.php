<?php
$this->breadcrumbs=array(
	'Th Ajars',
);

$this->menu=array(
	array('label'=>'Create ThAjar','url'=>array('create')),
	array('label'=>'Manage ThAjar','url'=>array('admin')),
);
?>

<h1>Th Ajars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
