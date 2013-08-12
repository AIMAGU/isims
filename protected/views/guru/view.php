<?php
$this->breadcrumbs=array(
	'Gurus'=>array('index'),
	$model->kode_guru,
);

$this->menu=array(
	array('label'=>'Daftar Guru','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Tambah Guru','icon'=>'icon-plus-sign', 'url'=>array('create')),
	array('label'=>'Ubah Guru','icon'=>'icon-edit', 'url'=>array('update','id'=>$model->kode_guru)),
	array('label'=>'Hapus Guru','icon'=>'icon-remove', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->kode_guru),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Guru','icon'=>'icon-th', 'url'=>array('admin')),
	array('label'=>'Cetak Guru', 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),
);
?>
<div class='printableArea'>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'VIEW BIODATA GURU '.strtoupper($model->nama_guru),
	'headerIcon' => 'icon-picture',
	//'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'kode_guru',
		'nama_guru',
		'nip',
		'jabatan',
		'ahli',
		'agama',
		'alamat',
		'jk',
		'tempat_lahir',
		'tanggal_lahir',
		'telp',
		array(
				'label'=>'foto',
				'type'=>'raw',
				'value'=>Chtml::image(Yii::app()->request->baseUrl.'/images/'.$model->foto,'DORE', array("width"=>100)),
		),
		'idkec0.nama_kec',
		'no_sertifikasi',
	),
)); ?>
<?php 
$this->widget('bootstrap.widgets.TbDetailView', array(
		'data' =>User::model()->findByPk($model->kode_guru),
		'attributes'=>array(
				'username',
				'email',
		)
));
?>
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