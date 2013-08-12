<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprop')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprop),array('view','id'=>$data->idprop)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_prop')); ?>:</b>
	<?php echo CHtml::encode($data->nama_prop); ?>
	<br />


</div>