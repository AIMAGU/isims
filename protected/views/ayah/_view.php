<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nik_ayah')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nik_ayah),array('view','id'=>$data->nik_ayah)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->agama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pend_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pend_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ayah); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telp_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->telp_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_ayah); ?>
	<br />

	*/ ?>

</div>