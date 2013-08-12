<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cari Nilai','icon'=>'icon-search', 'url'=>array('index')),
	array('label'=>'Tambah Nilai','icon'=>'icon-plus', 'url'=>array('create')),
	//array('label'=>'Cetak Nilai', 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'DATA NILAI SISWA',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal'
)); ?>
<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'left', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => 'NILAI', 'active'=>true, 'icon'=>'icon-list-alt', 'content' => $this->renderPartial('mapel', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelola Nilai Siswa')),
		array('label' => 'RAPORT', /*'visible'=>Yii::app()->user->checkAccess('Wali'),*/ 'icon'=>'icon-book', 'content' => $this->renderPartial('manage-raport', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelola Raport Siswa')),
	),
));
?>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>