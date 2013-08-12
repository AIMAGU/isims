<?php
$this->breadcrumbs=array(
	'Nilais',
);

$this->menu=array(
	array('label'=>'Tambah Nilai','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Kelola Nilai','icon'=>'icon-th', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form-hasil').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('nilai-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'PENCARIAN NILAI SISWA',
	'headerIcon' => 'icon-search',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
		'headerButtons' => array(
				array(
						'class' => 'bootstrap.widgets.TbButtonGroup',
						//'type' => 'danger', // '', 'primary', 'info', 'danger', 'warning', 'danger' or 'inverse'
						'size' => 'small',
						'buttons'=>array(
								array('label'=>'Bantuan', 'url'=>'#', 'htmlOptions' => array('data-toggle'=>'modal',
				'data-target'=>'#myModal',)),
						),
				),
		),
));?>

<div class="search-form2">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="search-form-hasil" ><!-- style="display:none"-->
	<?php $this->renderPartial('_hasil',array(
	'model'=>$model,
)); ?>
</div>
<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>

<?php $this->endWidget(); ?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>INFORMASI PENCARIAN NILAI</h4>
</div>
 
<div class="modal-body">
    <blockquote><p class="text-left">1. Masukkan kata kunci <span class="text-error">(NIS / MATA PELAJARAN / KELAS)</span><br>
2. Tekan tombol <code class="text-danger">Cari</code>.<br> 
3. Tekan tombol <code class="muted">CETAK</code> untuk melihat raport.</p></blockquote>
<p class="text-right"><span class="text-danger">Apakah informasi ini membantu anda?</span></p>
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'danger',
        'label'=>'Ya',
    	'icon'=>'icon-thumbs-up icon-white',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Tidak',
    	'type'=>'danger',
    	'icon'=>'icon-thumbs-down icon-white',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>
