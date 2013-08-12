<?php
$this->breadcrumbs=array(
	'Jurnals',
);


$this->menu=array(
	array('label'=>'Tambah Jurnal','icon'=>'icon-plus', 'url'=>array('create')),
	array('label'=>'Kelola Jurnal','icon'=>'icon-list-alt', 'url'=>array('admin')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'JURNAL MENGAJAR',
	'headerIcon' => 'icon-list-alt',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'right', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => 'HARI INI', 'icon'=>'icon-file', 'active'=>true, 'content' => $this->renderPartial('this_jurnal', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Jurnal Hari ini')),
		array('label' => 'ANDA', 'icon'=>'icon-list', 'content' => $this->renderPartial('single_jurnal', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Jurnal Anda dalam waktu 1 semester')),
		array('label' => 'SEMUA', 'icon'=>'icon-th-large', 'content' => $this->renderPartial('all_jurnal', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Semua jurnal guru dalam waktu 1 semester')),
		array('label' => 'TAMBAH', 'icon'=>'icon-plus-sign', 'url'=>array('create')),
	),
));
?>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
<?php $this->endWidget(); ?>
