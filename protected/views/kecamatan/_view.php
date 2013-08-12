<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idkec')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idkec),array('view','id'=>$data->idkec)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idkab')); ?>:</b>
	<?php echo CHtml::encode($data->idkab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kec')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kec); ?>
	<br />


</div>