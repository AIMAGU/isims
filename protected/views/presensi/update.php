<?php
$this->breadcrumbs=array(
	'Absensis'=>array('index'),
	$model->tanggal=>array('view','id'=>$model->tanggal),
	'Update',
);

$this->menu=array(
	array('label'=>'List Absensi','url'=>array('index')),
	array('label'=>'Create Absensi','url'=>array('create')),
	array('label'=>'View Absensi','url'=>array('view','id'=>$model->nis, 'id2'=>$model->tanggal, 'id3'=>$model->th_ajar, 'id4'=>$model->semester)),
	array('label'=>'Manage Absensi','url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'PERBARUI PRESENSI SISWA',
		'headerIcon' => 'icon-th-list',
		'htmlOptions'=>array('class'=>'inline'),
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
	));?>
	
<?php echo $this->renderPartial('_formupdate', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>