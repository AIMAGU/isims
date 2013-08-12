<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="50px">
		      NIS		</th>
 		<th width="50px">
		      Kode Mapel</th>
		<th width="50px">
		      Kode Guru		</th>
 		<th width="20px">
		      Kelas		</th>
 		<th width="20px">
		      Lokal		</th>
		<th width="50px">
		      Nilai Akhir</th>
 		<th width="50px">
		      Ujian Nasional</th>
 		<th width="50px">
		      Ujian Sekolah	</th>
 		<th width="50px">
		      Kurikulum		</th>
		<th width="50px">
		      Tahun Ajaran	</th>
 		<th width="50px">
		      Semester		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        <td>
			<?php echo $row->nis; ?>
		</td>
       	<td>
			<?php echo $row->kode_mapel; ?>
		</td>
		<td>
			<?php echo $row->kode_guru; ?>
		</td>
		<td>
			<?php echo $row->kelas; ?>
		</td>
       	<td>
			<?php echo $row->lokal; ?>
		</td>
		<td>
			<?php echo $row->na; ?>
		</td>
       		<td>
			<?php echo $row->un; ?>
		</td>
       	<td>
			<?php echo $row->uas; ?>
		</td>
       	<td>
			<?php echo $row->kurikulum; ?>
		</td>
		<td>
			<?php echo $row->th_ajar; ?>
		</td>
       	<td>
			<?php echo $row->semester; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
