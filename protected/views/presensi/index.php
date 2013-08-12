<?php
$this->breadcrumbs=array(
	'Presensis',
);

$this->menu=array(
	array('label'=>'Tambah Nilai','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Kelola Nilai','icon'=>'icon-th', 'url'=>array('admin')),
);
?>


<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'ABSENSI SISWA ',
	'headerIcon' => 'icon-list',
	'htmlOptions'=>array('class'=>'inline'),
));?>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'right', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => 'HARI INI','icon'=>'icon-file', 'active'=>true, 'content' => $this->renderPartial('this_presensi', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Presensi Hari ini')),
		array('label' => 'SEMUA', 'icon'=>'icon-th-large', 'content' => $this->renderPartial('all_presensi', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Semua presensi siswa dalam waktu 1 semester')),
		array('label' => 'TAMBAH', 'icon'=>'icon-plus-sign', 'url'=>array('create')),
	),
));
?>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
<?php $this->endWidget(); ?>