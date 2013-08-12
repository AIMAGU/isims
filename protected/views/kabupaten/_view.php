<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idkab')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idkab),array('view','id'=>$data->idkab)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kab')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprop')); ?>:</b>
	<?php echo CHtml::encode($data->idprop); ?>
	<br />


</div>