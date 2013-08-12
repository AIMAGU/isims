<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idruang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idruang),array('view','id'=>$data->idruang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ruang')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ruang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kapasitas')); ?>:</b>
	<?php echo CHtml::encode($data->kapasitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('luas')); ?>:</b>
	<?php echo CHtml::encode($data->luas); ?>
	<br />


</div>