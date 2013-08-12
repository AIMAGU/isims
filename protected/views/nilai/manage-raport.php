<?php if(Yii::app()->user->checkAccess('Wali')){ ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	//'sortableRows'=>false,
	'id'=>'nilairaport-grid',
	'enableSorting' => false,
	'dataProvider'=>$model->raport(),
	'type'=>'striped bordered condensed',
	//'template' => "{items}\n{extendedSummary}",
	//'filter'=>$model,
	'columns'=>array(
		'nis',
		'nis0.nama_lengkap',
		'kelas',
		'lokal',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'template'=>'{view}{update}{delete}',
			'template'=>'{view}',
			'header'=>'Lihat',
			'buttons'=>array
			('view'=>array
				(
					'url'=>'Yii::app()->createUrl("nilai/raport", array("id"=>$data->nis))',
				),
			),
		),
	),
)); ?>
<?php }else{ ?>
<?php 
echo Yii::app()->user->setFlash('info', 'Maaf, anda <strong>bukan</strong> wali kelas.');
$this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'×', // close link text - if set to false, no close link is displayed
		'alerts'=>array( // configurations per alert type
				'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'x'), // success, info, warning, error or danger
		),
));
?>
<?php } ?>