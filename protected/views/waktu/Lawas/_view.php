<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwaktu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwaktu),array('view','id'=>$data->idwaktu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari')); ?>:</b>
	<?php echo CHtml::encode($data->hari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_mulai')); ?>:</b>
	<?php echo CHtml::encode($data->jam_mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_berakhir')); ?>:</b>
	<?php echo CHtml::encode($data->jam_berakhir); ?>
	<br />


</div>