<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pribadi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pribadi),array('view','id'=>$data->id_pribadi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pribadi')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pribadi); ?>
	<br />


</div>