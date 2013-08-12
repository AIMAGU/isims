<?php
$this->breadcrumbs=array(
	'Tr Pribadis',
);

$this->menu=array(
	array('label'=>'Create TrPribadi','url'=>array('create')),
	array('label'=>'Manage TrPribadi','url'=>array('admin')),
);
?>

<h1>Tr Pribadis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
