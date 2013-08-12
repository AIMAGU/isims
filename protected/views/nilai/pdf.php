<style>
table {
 font-size:11px;
 font-family: sans-serif;
 border: 1px solid #ddd;
 border-collapse: collapse;
}
table.layout {
 border: 0mm solid black;
 border-collapse: collapse;
}
td.layout {
 text-align: center;
 border: 0mm solid black;
}
th{
 background:#FF9900;
}

</style>
<h4 class="text-center">LAPORAN HASIL BELAJAR SISWA <?php echo Yii::app()->params['title']; ?></h4>
<div class="form-actions">
<?php 
$raport=Nilai::model()->find(array(
	'condition'=>"nis='".$_GET['id']."'"
));
?>
	<table>
		<tr>
			<td >Nama Siswa</td><td>: <?php echo $raport->nis0->nama_lengkap; ?></td><td>Kelas</td><td>: <?php echo $raport->kelas.$raport->lokal; ?></td>
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
		//'semester'=>$smt,
		//'th_ajar'=>$th_ajar,
	));

	$total=Yii::app()->db->createCommand("select sum(na) from nilai where nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
	$rata=round($total/$nilai); //Pembulatan ke atas (round) untuk nilai rata-rata.
?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'nilai-grid',
	'dataProvider'=>$model->groupsiswa(),
	'type'=>'striped condensed',
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
			'htmlOptions'=>array('style'=>'width: 220px')
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
	),
)); ?>
	<small>
	Jumlah Nilai Prestasi Hasil Belajar: <?php echo $total; ?><br>
	Rata-rata Hasil Belajar: <?php echo $rata; ?>
	</small>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tr-ekstra-grid',
	'dataProvider'=>$ekstraku->raport(),
	'type'=>'striped condensed',
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
		array(
			'header'=>'Nilai',
			'name'=>'nilai_ekstra',
		)
	),
)); ?>

<table>
<tr><td style="vertical-align:bottom; width:50%;">
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'tr-pribadi-grid',
		'dataProvider'=>$pribadiku->raport(),
		'enableSorting' => false,
		//'type'=>'striped bordered condensed',
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
			array(
				'header'=>'Nilai',
				'name'=>'nilai_pribadi',
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
	<table class="table">
		<thead>
			<tr>
				<th>KETIDAKHADIRAN</th>
				<th>HARI</th>
			</tr>
			</thead>
			<tbody>
		<tr>
			<td width="300px">Sakit</td><td>: <?php echo $sakit; ?></td>
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
	'id'=>'tr-pribadi-grid',
	'dataProvider'=>$pribadiku->tentang(),
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	'template' => "{items}",
	'emptyText'=>'Belum ada data kepribadian. Silahkan isikan terlebih dahulu. <a href="trpribadi-create.html?id='.$_GET['id'].'" class="btn submit">Klik disini</a>',
	'columns'=>array(
		array(
			'header'=>'CATATAN TENTANG PENGEMBANGAN DIRI',
			'name'=>'catatan',
			'htmlOptions'=>array('style'=>'text-align: justify'),
			'headerHtmlOptions'=>array('style'=>'text-align: center')
		)
	),
)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tr-pribadi-grid',
	'dataProvider'=>$pribadiku->catatan(),
	'enableSorting' => false,
	'type'=>'striped bordered condensed',
	'template' => "{items}",
	'emptyText'=>'Belum ada data kepribadian. Silahkan isikan terlebih dahulu. <a href="trpribadi-create.html?id='.$_GET['id'].'" class="btn submit">Klik disini</a>',
	'columns'=>array(
		array(
			'header'=>'CATATAN',
			'name'=>'catatan',
			'htmlOptions'=>array('style'=>'text-align: justify'),
			'headerHtmlOptions'=>array('style'=>'text-align: center')
		)
	),
)); ?>

<br><br><br><br><br><br><br>
<p class="text-right">Karanganyar, <?php echo date('d F Y'); ?></p>
<table style="border:0;">
	<tr>
		<td width="340px">Orang Tua/Wali</td><td>Wali Kelas</td>
	</tr>
	<tr>
		<td><br><br>( ____________ )</td><td><br><br><b>( <?php echo $raport->kodeGuru->nama_guru; ?> )</b></td>
	</tr>
	<tr>
		<td></td><td>NIP. <?php echo $raport->kodeGuru->nip; ?></td>
	</tr>
</table>