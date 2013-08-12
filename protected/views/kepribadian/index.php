<?php
$this->breadcrumbs=array(
	'Kepribadians',
);

$this->menu=array(
	array('label'=>'Create Kepribadian','url'=>array('create')),
	array('label'=>'Manage Kepribadian','url'=>array('admin')),
);
?>

<h1>Kepribadians</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
