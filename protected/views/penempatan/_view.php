<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_penempatan_kls')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_penempatan_kls),array('view','id'=>$data->id_penempatan_kls)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nis')); ?>:</b>
	<?php echo CHtml::encode($data->nis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
	<?php echo CHtml::encode($data->kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokal')); ?>:</b>
	<?php echo CHtml::encode($data->lokal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('th_ajar')); ?>:</b>
	<?php echo CHtml::encode($data->th_ajar); ?>
	<br />


</div>