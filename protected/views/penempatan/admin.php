<?php
$this->breadcrumbs=array(
	'Penempatans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Penempatan','url'=>array('index')),
	array('label'=>'Create Penempatan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('penempatan-grid', {
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
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
		'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php 
	if(Yii::app()->user->checkAccess('Kurikulum')){
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'penempatan-form',
    //'action'=>array('penempatankelas/admin'),
    'enableAjaxValidation'=>false,
)); ?>


<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'right', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => '1', 'active'=>true, 'icon'=>'icon-star-empty', 'content' => $this->renderPartial('kelas1', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Kelas 1')),
		array('label' => '2', 'icon'=>'icon-star-empty', 'content' => $this->renderPartial('kelas2', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Kelas 2')),
		array('label' => '3', 'icon'=>'icon-star-empty', 'content' => $this->renderPartial('kelas3', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Kelas 3')),
		array('label' => '4', 'icon'=>'icon-star-empty', 'content' => $this->renderPartial('kelas4', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Kelas 4')),
		array('label' => '5', 'icon'=>'icon-star-empty', 'content' => $this->renderPartial('kelas5', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Kelas 5')),
		array('label' => '6', 'icon'=>'icon-star-empty', 'content' => $this->renderPartial('kelas6', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Kelas 6')),
	),
));
?>
	
<?php $this->endWidget();  }else{ ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'penempatan-form',
    //'action'=>array('penempatankelas/admin'),
    'enableAjaxValidation'=>false,
)); ?>
<p class="text-info">
	Hilangkan tanda checklist (√) untuk siswa yang <b>"tinggal kelas"</b>.<br>
	Klik tombol <b>"NAIK KELAS"</b> untuk proses kenaikan kelas.
</p>
<div class="form-actions">
	<?php /*$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'danger',
		'icon'=>'icon-arrow-up icon-white',
		'size'=>'small',
		'label'=>$model->isNewRecord ? 'NAIK KELAS' : 'Submit',
	)); */?>
	<?php echo CHtml::submitButton('NAIK KELAS', array(
		'name' => 'tombolnaik',
		'class'=>'btn',
		'confirm'=>'Apakah anda yakin ingin menaikkan siswa ini?',
	)); ?>
	
	<?php echo CHtml::submitButton('TINGGAL KELAS', array(
		'name' => 'tomboltidaknaik',
		'class'=>'btn',
		'confirm'=>'Apakah siswa ini tinggal kelas?',
	)); ?>
	
	<?php echo CHtml::link('CARI','#',array('class'=>'search-button btn')); ?>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatan-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->penempatanwali(),
	'template'=>'{summary}{items}{pager}',
	'emptyText'=>'Data masih kosong..', // to display empty value
	//'filter'=>$model,
	'selectableRows'=>2,
    'columns'=>array(
         array(
            'class'=>'CCheckBoxColumn',   
            'id'=>'naik',
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
<?php $this->endWidget(); } ?>

<?php $this->endWidget(); ?>