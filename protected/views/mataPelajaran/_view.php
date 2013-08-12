<div class="view">
<table>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kode_mapel')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::link(CHtml::encode($data->kode_mapel),array('view','id'=>$data->kode_mapel,'id2'=>$data->kurikulum)); ?>
	</td>
</tr>	
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kurikulum')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->kurikulum); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('mapel')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->mapel); ?>
	</td>
</tr>
<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('kkm')); ?></b></td>
	<td><b>:</b></td>
	<td><?php echo CHtml::encode($data->kkm); ?>
	</td>
</tr>
</table>
</div>