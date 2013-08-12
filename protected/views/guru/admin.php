<?php
$this->breadcrumbs=array(
	'Gurus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Guru','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Tambah Guru','icon'=>'icon-plus', 'url'=>array('create')),
	array('label'=>'Cetak Guru', 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('guru-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'MANAGE BIODATA GURU ',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<?php echo CHtml::link('cari','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class='printableArea'>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'guru-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'kode_guru',
		'nama_guru',
		'jk',
		//'nip',
		'jabatan',
		'ahli',
		/*'agama',
		'alamat',
		'tempat_lahir',
		'tanggal_lahir',
		'telp',
		'foto',
		'idkec',
		'no_sertifikasi',
		*/
		array(
			'header'=>'Lihat',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}',
		),
	),
)); ?>
<?php $this->endWidget(); ?>
</div>
<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv()
{

window.print();

}
</script>