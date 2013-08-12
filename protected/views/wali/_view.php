<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nik_wali')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nik_wali),array('view','id'=>$data->nik_wali)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_wali')); ?>:</b>
	<?php echo CHtml::encode($data->nama_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hub_keluarga')); ?>:</b>
	<?php echo CHtml::encode($data->hub_keluarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pend_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->pend_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idkec')); ?>:</b>
	<?php echo CHtml::encode($data->idkec); ?>
	<br />

	*/ ?>

</div>