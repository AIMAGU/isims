<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ekstra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ekstra),array('view','id'=>$data->id_ekstra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ekstra')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ekstra); ?>
	<br />


</div>