<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nik_ibu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nik_ibu),array('view','id'=>$data->nik_ibu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->agama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pend_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pend_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ibu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telp_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->telp_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_ibu); ?>
	<br />

	*/ ?>

</div>