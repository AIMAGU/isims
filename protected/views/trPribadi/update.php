<?php
$this->breadcrumbs=array(
	'Tr Pribadis'=>array('index'),
	$model->id_tranpribadi=>array('view','id'=>$model->id_tranpribadi),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrPribadi','url'=>array('index')),
	array('label'=>'Create TrPribadi','url'=>array('create')),
	array('label'=>'View TrPribadi','url'=>array('view','id'=>$model->id_tranpribadi)),
	array('label'=>'Manage TrPribadi','url'=>array('admin')),
);
?>

<h1>Update TrPribadi <?php echo $model->id_tranpribadi; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>