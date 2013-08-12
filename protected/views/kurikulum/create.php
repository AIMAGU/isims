<?php
$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kurikulum','url'=>array('index')),
	array('label'=>'Manage Kurikulum','url'=>array('admin')),
);
?>

<h1>Create Kurikulum</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>