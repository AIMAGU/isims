<div class="view">
<table class="table">
	<thead>
	<tr>
		<th><?php echo CHtml::encode($data->getAttributeLabel('idwaktu')); ?></th>
		<th><?php echo CHtml::encode($data->getAttributeLabel('hari')); ?></th>
		<th><?php echo CHtml::encode($data->getAttributeLabel('jam_mulai')); ?></th>
		<th><?php echo CHtml::encode($data->getAttributeLabel('jam_berakhir')); ?></th>
	</tr>
	</thead>
	<tbody>
		<tr class="odd">
		<td><?php echo CHtml::link(CHtml::encode($data->idwaktu),array('view','id'=>$data->idwaktu)); ?></td>
		<td><?php echo CHtml::encode($data->hari); ?></td>
		<td><?php echo CHtml::encode($data->jam_mulai); ?></td>
		<td><?php echo CHtml::encode($data->jam_berakhir); ?></td>
		</tr>
	</tbody>
</table>	
</div>
