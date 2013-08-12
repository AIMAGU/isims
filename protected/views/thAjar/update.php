<?php
$this->breadcrumbs=array(
	'Th Ajars'=>array('index'),
	$model->th_ajar=>array('view','id'=>$model->th_ajar),
	'Update',
);

$this->menu=array(
	array('label'=>'List ThAjar','url'=>array('index')),
	array('label'=>'Create ThAjar','url'=>array('create')),
	array('label'=>'View ThAjar','url'=>array('view','id'=>$model->th_ajar)),
	array('label'=>'Manage ThAjar','url'=>array('admin')),
);
?>

<h1>Update ThAjar <?php echo $model->th_ajar; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>