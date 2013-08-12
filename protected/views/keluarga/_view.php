<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_kk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->no_kk),array('view','id'=>$data->no_kk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nik_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nik_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nik_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nik_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_anak')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_anak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_rumah')); ?>:</b>
	<?php echo CHtml::encode($data->status_rumah); ?>
	<br />


</div>