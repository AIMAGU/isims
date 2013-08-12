<?php if (!empty($rowExist)): ?>
<span class="label label-important">Terdapat kesalahan!</span>
<p>Ditemukan data ganda dengan rincian sebagai berikut:</p>
<table class="table table-bordered">
<thead>
<tr>
	<th>NIS</th>
	<th>Kode Mapel</th>
	<th>Tahun Ajaran</th>
	<th>Semester</th>
	<th>Status</th>
</tr>
</thead>
<tbody>
<?php foreach($rowExist as $row): ?>
<tr>
	<td><?php echo $row['nis'] ?></td><td><?php echo $row['kode_mapel'] ?></td><td><?php echo $row['th_ajar'] ?></td><td><?php echo $row['semester'] ?></td><td><span class="badge badge-important">SALAH</span></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif ?>