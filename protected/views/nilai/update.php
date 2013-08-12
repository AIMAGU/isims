<?php
/*$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	$model->id_nilai=>array('view','id'=>$model->id_nilai),
	'Update',
);*/

$this->menu=array(
	array('label'=>'List Nilai','url'=>array('index')),
	array('label'=>'Create Nilai','url'=>array('create')),
	array('label'=>'View Nilai','url'=>array('view','id'=>$model->nis,'id2'=>$model->kode_mapel,'id3'=>$model->th_ajar,'id4'=>$model->semester)),
	array('label'=>'Manage Nilai','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'PERBARUI NILAI SISWA ',
	'headerIcon' => 'icon-edit',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo $this->renderPartial('_form', array('model2'=>$model2,'model'=>$model)); ?>
<?php $this->endWidget(); ?>