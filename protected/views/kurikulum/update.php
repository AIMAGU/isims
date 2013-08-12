<?php
$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	$model->kurikulum=>array('view','id'=>$model->kurikulum),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kurikulum','url'=>array('index')),
	array('label'=>'Create Kurikulum','url'=>array('create')),
	array('label'=>'View Kurikulum','url'=>array('view','id'=>$model->kurikulum)),
	array('label'=>'Manage Kurikulum','url'=>array('admin')),
);
?>

<h1>Update Kurikulum <?php echo $model->kurikulum; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>