<div class="view">
<table>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('idruang')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::link(CHtml::encode($data->idruang),array('view','id'=>$data->idruang,'id2'=>$data->idwaktu,'id3'=>$data->th_ajar,'id4'=>$data->semester)); ?>
	</td>
</tr>	
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kode_guru')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->kode_guru); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kode_mapel')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->kode_mapel); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->kelas); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('lokal')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->lokal); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('th_ajar')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->th_ajar); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->semester); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('idwaktu')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->idwaktu); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kurikulum')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->kurikulum); ?>
	</td>
</tr>
</table>
</div>