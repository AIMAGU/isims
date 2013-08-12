<?php
$this->breadcrumbs=array(
	'Penempatans',
);

$this->menu=array(
	array('label'=>'Create Penempatan','url'=>array('create')),
	array('label'=>'Manage Penempatan','url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ibu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'MANAGE KENAIKAN KELAS ',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php $this->renderPartial('cari_arsip',array(
	'model'=>$model,
)); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'penempatan-form',
    //'action'=>array('penempatankelas/admin'),
    'enableAjaxValidation'=>false,
)); ?>
<?php echo CHtml::submitButton('HAPUS', array(
	'name' => 'tombolhapus',
	'class'=>'btn',
	'confirm'=>'Apakah anda yakin menghapus siswa ini?',
)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatan-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'template'=>'{summary}{items}{pager}',
	'emptyText'=>'Data masih kosong..', // to display empty value
	//'filter'=>$model,
	'selectableRows'=>2,
    'columns'=>array(
         array(
            'class'=>'CCheckBoxColumn',   
            'id'=>'hapus',
			//'selectableRows' => '32',
			'checked'=>'1', 
        ),
		array(
                'header' => 'No',
                'value' => '$row+1',
            ),
		'nis',
        'nis0.nama_lengkap',
		'kelas',
		'lokal',
		'th_ajar',
        array(
            //'class'=>'CButtonColumn',
            'header'=>'Lihat',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}',
        ),
    ),
)); ?>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>