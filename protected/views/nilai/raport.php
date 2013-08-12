<div class="btn-toolbar">
	 <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'warning', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
			array('type'=>'info',
					'label'=>'.',
					'icon'=>'icon-arrow-left icon-white',
					'url'=>array('nilai/admin'),
					'htmlOptions'=>array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Kembali')
			),
			array('type'=>'danger',
					'label'=>'PDF',
					'icon'=>'icon-folder-open icon-white',
					'url'=>array('nilai/pdf','id'=>$_GET['id']),
					'htmlOptions'=>array('target'=>'_blank', 'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Export to PDF')
			),
			array('type'=>'success',
					'label'=>'Excel',
					'icon'=>'icon-asterisk icon-white',
					'url'=>array('nilai/excel','id'=>$_GET['id']),
					'htmlOptions'=>array('target'=>'_blank', 'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Export to Excel (.xlsx)')
			),
            array('label'=>'EKSTRA', 'icon'=>'icon-play icon-white', 'items'=>array(
                array('label'=>'Tambah Ekstrakurikuler', 'icon'=>'icon-inbox', 'url'=>array('trekstra/create','id'=>$_GET['id']),'htmlOptions'=>array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Klik untuk menambah ektrakurikuler siswa')),
				'---',
                array('label'=>'Tambah Kepribadian','icon'=>'icon-inbox', 'url'=>array('trpribadi/create','id'=>$_GET['id']),'htmlOptions'=>array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Klik untuk menambah Kepribadian Siswa')),
                array('label'=>'Tambah Tentang','icon'=>'icon-inbox', 'url'=>array('trpribadi/create','id'=>$_GET['id'], 'pribadi'=>5),'htmlOptions'=>array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Klik untuk menambah catatan tentang pengembangan diri')),
                array('label'=>'Tambah Catatan','icon'=>'icon-inbox', 'url'=>array('trpribadi/create','id'=>$_GET['id'], 'pribadi'=>4),'htmlOptions'=>array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Klik untuk menambah catatan siswa')),
            )),
        ),
    )); ?>
</div>
<div class='printableArea'>
<div class="thumbnail">
<div class="form-actions">
<?php 
$raport=Nilai::model()->find(array(
	'condition'=>"nis='".$_GET['id']."'"
));
?>
	<h4 class="text-center">LAPORAN HASIL BELAJAR SISWA <?php echo Yii::app()->params['title']; ?></h4>
	<table>
		<tr>
			<td width="100px">Nama Siswa</td><td width="500px">: <?php echo $raport->nis0->nama_lengkap; ?></td><td width="120px">Kelas</td><td>: <?php echo $raport->kelas." ".$raport->lokal; ?></td>
		</tr>
		<tr>
			<td>Nomor Induk</td><td>: <?php echo $raport->nis; ?></td><td>Semester</td><td>: <?php echo $raport->semester; ?></td>
		</tr>
		<tr>
			<td>Nama Sekolah</td><td>: <?php echo Yii::app()->params['title']; ?></td><td>Tahun Pelajaran</td><td>: <?php echo $raport->th_ajar; ?></td>
		</tr>
		<tr>
			<td>Alamat Sekolah</td><td>: <?php echo Yii::app()->params['subtitle']; ?></td><td></td><td></td>
		</tr>
	</table>

</div>

<?php 
$bulan=date('m');
if($bulan<7){
	$smt=2;
	//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
	$th_ajar=(date('Y')-1).'/'.date('Y');
}elseif($bulan<13 && $bulan>6){
	$smt=1;
	//jika th 1(7-12) maka tahun/tahun+1 2012/2013
	$th_ajar=date('Y').'/'.(date('Y')+1);
}
	$nilai = Nilai::model()->countByAttributes(array(
		'nis'=> $_GET['id'],
		'semester'=>(string)$smt,
		'th_ajar'=>(string)$th_ajar,
	));

	$total=Yii::app()->db->createCommand("select sum(na) from nilai where nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
	$rata=round($total/$nilai); //Pembulatan ke atas (round) untuk nilai rata-rata.
?>
	
	<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'nilai-grid',
	'dataProvider'=>$model->groupsiswa(),
	'type'=>'striped bordered condensed',
	'enableSorting' => false,
	'template' => "{items}",
	//'filter'=>$model,
	'columns'=>array(
		//'nis',
		//'nis0.nama_lengkap',
		array(
			'header' => 'No',
			'value' => '$row+1',
			'htmlOptions'=>array('style'=>'width: 20px')
		),
		array(
			'header' =>'Mata Pelajaran',
			'name'=>'kodeMapel.kodeMapel.mapel',
			'htmlOptions'=>array('style'=>'width: 600px')
		),
		array(
			'header' =>'KKM',
			'footer'=>'Jumlah Nilai: ',
			'name'=>'kodeMapel.kodeMapel.kkm',
			'htmlOptions'=>array('style'=>'width: 80px')
		),
		array(
			'name'=>'na',
			'header'=>'Nilai',
			'class'=>'bootstrap.widgets.TbTotalSumColumn',
			'htmlOptions'=>array('style'=>'width: 80px;')
		),
		array(
			'header' =>'Nilai Rata-rata Kelas',
			'name'=>'kodeMapel.kodeMapel.kkm',
			'htmlOptions'=>array('style'=>'width: 150px')
		),
		/*array(
			'name'=>'rata',
			'type'=>'raw', //because of using html-code from the rendered view
			'value'=>array($this,'ratakelas'), //call this controller method for each row
		),*/
	),
)); ?>
	Jumlah Nilai Prestasi Hasil Belajar: <?php echo $total; ?><br>
	Rata-rata Hasil Belajar: <?php echo $rata; ?><br>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tr-ekstra-grid',
	'dataProvider'=>$ekstraku->raport(),
	'type'=>'striped bordered',
	'enableSorting' => false,
	'template' => "{items}",
	'emptyText'=>'Belum ada Kegiatan Ekstrakurikuler. Silahkan isikan terlebih dahulu. <a href="trekstra-create.html?id='.$_GET['id'].'" class="btn submit">Klik disini</a>',
	'columns'=>array(
		array(
			'header' => 'No',
			'value' => '$row+1',
			'htmlOptions'=>array('style'=>'width: 20px')
		),
		array(
			'header' => 'KEGIATAN EKSTRAKURIKULER',
			'name' => 'idEkstra.nama_ekstra',
			'htmlOptions'=>array('style'=>'width: 80%')
		),
		/*array(
			'header'=>'Nilai',
			'name'=>'nilai_ekstra',
		),*/
		array(
			'name' => 'nilai_ekstra',
			'header' => 'NILAI',
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'htmlOptions'=>array('style'=>'text-align: justify'),
			//'headerHtmlOptions' => array('style' => 'text-align: center'),
			'editable' => array(
					'type'      => 'select',
					'url'       => $this->createUrl('ekstraedit'),  //url for submit data
					'source'    => array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D', 'E'=>'E'),
					//'placement' => 'right',
					'mode'		=> 'inline',
					'inputclass' => 'span1'
			),
		)
	),
)); ?>

<table>
<tr><td style="vertical-align:bottom; width:50%;">
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'tr-pribadi-grid',
		'dataProvider'=>$pribadiku->raport(),
		'enableSorting' => false,
		'type'=>'striped bordered',
		'template' => "{items}",
		'emptyText'=>'Belum ada data kepribadian. Silahkan isikan terlebih dahulu. <a href="trpribadi-create.html?id='.$_GET['id'].'" class="btn submit">Klik disini</a>',
		'columns'=>array(
			array(
				'header' => 'No',
				'value' => '$row+1',
				'htmlOptions'=>array('style'=>'width: 20px')
			),
			array(
				'header' => 'KEPRIBADIAN',
				'name' => 'idPribadi.nama_pribadi',
				'htmlOptions'=>array('style'=>'width: 300px')
			),
			/*array(
				'header'=>'Nilai',
				'name'=>'nilai_pribadi',
			),*/
			array(
			'name' => 'nilai_pribadi',
			'header' => 'NILAI',
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'htmlOptions'=>array('style'=>'text-align: justify'),
			//'headerHtmlOptions' => array('style' => 'text-align: center'),
			'editable' => array(
				'type'      => 'select',
				'url'       => $this->createUrl('pribadiedit'),  //url for submit data
				'source'    => array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D', 'E'=>'E'),
				//'placement' => 'right',
				'mode'		=> 'inline',
				'inputclass' => 'span1'
				),
			)
		),
	)); ?>
	
<?php 
	$sakit = Presensi::model()->countByAttributes(array(
		'nis'=> $_GET['id'],
		'status'=>'S',
		'th_ajar'=>$th_ajar,
		'semester'=>(string)$smt
	));

	$izin = Presensi::model()->countByAttributes(array(
		'nis'=> $_GET['id'],
		'status'=>'I',
		'th_ajar'=>$th_ajar,
		'semester'=>(string)$smt
	));

	$alpha = Presensi::model()->countByAttributes(array(
		'nis'=> $_GET['id'],
		'status'=>'A',
		'th_ajar'=>$th_ajar,
		'semester'=>(string)$smt
	));
?>
</td><td style="vertical-align:bottom; width:50%;">
	<table class="table-striped table-bordered">
		<thead>
			<tr>
				<th>KETIDAKHADIRAN</th>
				<th>HARI</th>
			</tr>
			</thead>
			<tbody>
		<tr>
			<td>Sakit</td><td>: <?php echo $sakit; ?></td>
		</tr>
		<tr>
			<td>Izin</td><td>: <?php echo $izin; ?></td>
		</tr>
		<tr>
			<td>Alpha</td><td>: <?php echo $alpha; ?></td>
		</tr>
		</tbody>
	</table>
</td>
</tr>
</table>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tr-pribadi-tentang-grid',
	'dataProvider'=>$pribadiku->tentang(),
	'enableSorting' => false,
	'type'=>'striped bordered',
	'template' => "{items}",
	'emptyText'=>'Belum ada data catatan. Silahkan isikan terlebih dahulu. <a href="trpribadi-create.html?id='.$_GET['id'].'&&pribadi=5" class="btn submit">Klik disini</a>',
	'columns'=>array(
		/*array(
			'header'=>'CATATAN TENTANG PENGEMBANGAN DIRI',
			'name'=>'catatan',
			'htmlOptions'=>array('style'=>'text-align: justify'),
			'headerHtmlOptions'=>array('style'=>'text-align: center')
		),*/
		array(
		'name' => 'catatan',
		'header' => 'CATATAN TENTANG PENGEMBANGAN DIRI',
		'class' => 'bootstrap.widgets.TbEditableColumn',
		'htmlOptions'=>array('style'=>'text-align: justify'),
		'headerHtmlOptions' => array('style' => 'text-align: center'),
		'editable' => array(
				//'url'   => $this->createUrl('trpribadi/update', array('id'=>$pribadiku->id_tranpribadi)),  //url for submit data
				'url'=>$this->createUrl('pribadiedit'),
				'type' => 'textarea',
				//'placement' => 'left',
				'mode'		=> 'inline',
				'inputclass' => 'span10'
				),
		)
	),
)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tr-pribadi-catatan-grid',
	'dataProvider'=>$pribadiku->catatan(),
	'enableSorting' => false,
	'type'=>'striped bordered',
	'template' => "{items}",
	'emptyText'=>'Belum ada data catatan kepribadian. Silahkan isikan terlebih dahulu. <a href="trpribadi-create.html?id='.$_GET['id'].'&&pribadi=4" class="btn submit">Klik disini</a>',
	'columns'=>array(
		/*array(
			'header'=>'CATATAN',
			'name'=>'catatan',
			'htmlOptions'=>array('style'=>'text-align: justify'),
			'headerHtmlOptions'=>array('style'=>'text-align: center')
		),*/
		array(
		'name' => 'catatan',
		'header' => 'CATATAN',
		'class' => 'bootstrap.widgets.TbEditableColumn',
		'htmlOptions'=>array('style'=>'text-align: justify','class'=>'span5', 'rows'=>8),
		'headerHtmlOptions' => array('style' => 'text-align: center'),
		'editable' => array(
				'url'=>$this->createUrl('pribadiedit'),
				'type' => 'textarea',
				//'placement' => 'left',
				'mode'		=> 'inline',
				'inputclass' => 'span10'
			),
		)
	),
)); ?>
</div>

<!-- Print bawah -->
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