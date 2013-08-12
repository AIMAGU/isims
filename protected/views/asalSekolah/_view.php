<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sekolah')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sekolah),array('view','id'=>$data->id_sekolah)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_sekolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idkec')); ?>:</b>
	<?php echo CHtml::encode($data->idkec); ?>
	<br />


</div>