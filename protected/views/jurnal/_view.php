<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idruang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idruang),array('view','id'=>$data->idruang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_guru')); ?>:</b>
	<?php echo CHtml::encode($data->kode_guru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_mapel')); ?>:</b>
	<?php echo CHtml::encode($data->kode_mapel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kurikulum')); ?>:</b>
	<?php echo CHtml::encode($data->kurikulum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
	<?php echo CHtml::encode($data->kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('th_ajar')); ?>:</b>
	<?php echo CHtml::encode($data->th_ajar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idwaktu')); ?>:</b>
	<?php echo CHtml::encode($data->idwaktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokal')); ?>:</b>
	<?php echo CHtml::encode($data->lokal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('materi')); ?>:</b>
	<?php echo CHtml::encode($data->materi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metode_mengajar')); ?>:</b>
	<?php echo CHtml::encode($data->metode_mengajar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pertemuan')); ?>:</b>
	<?php echo CHtml::encode($data->pertemuan); ?>
	<br />

	*/ ?>

</div>