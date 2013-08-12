<?php
$this->breadcrumbs=array(
	'MataPelajaran',
);

$this->menu=array(
	array('label'=>'Create MataPelajaran','url'=>array('create')),
	array('label'=>'Manage MataPelajaran','url'=>array('admin')),
);
?>


<h2>MataPelajaran</h2>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'enablePagination'=>true,
	'columns'=>array(
		array(
			'name'=>'Kode Mata Pelajaran',
			'type'=>'raw',
			'value'=>'CHtml::link($data["kode_mapel"], 
			Yii::app()->controller->createUrl("mataPelajaran/view",array("id"=>$data["kode_mapel"],"id2"=>$data["kurikulum"])))',
		),
		array(
			'name'=>'Kurikulum',
			'value'=>'$data["kurikulum"]',
		),
		array(
			'name'=>'Mata Pelajaran',
			'value'=>'$data["mapel"]',
		),
		array(
			'name'=>'KKM',
			'value'=>'$data["kkm"]',
		),
	),
)); ?>
