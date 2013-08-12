<?php
$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	$model->nis,
);

$this->menu=array(
	array('label'=>'Cari Nilai','icon'=>'icon-search', 'url'=>array('index')),
	array('label'=>'Tambah Nilai','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Ubah Nilai','icon'=>'icon-edit', 'url'=>array('update','id'=>$model->nis,'id2'=>$model->kode_mapel,'id3'=>$model->th_ajar,'id4'=>$model->semester)),
	array('label'=>'Hapus Nilai','icon'=>'icon-remove', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nis,'id2'=>$model->kode_mapel,'id3'=>$model->th_ajar,'id4'=>$model->semester),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Nilai','icon'=>'icon-th', 'url'=>array('admin')),
	array('label'=>'Cetak Nilai', 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),
);
?>
<div class='printableArea'>
<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'NILAI SISWA ',
	'headerIcon' => 'icon-bookmark',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'nis0.nama_lengkap',
		'kodeMapel.kodeMapel.mapel',
		'na',
		'un',
		'uas',
		'kelas',
		'lokal',
		'kodeGuru.nama_guru',
		'kurikulum',
		'nis0.jk',
		'th_ajar',
		'semester',
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