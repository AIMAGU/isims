<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nilai')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nilai),array('view','id'=>$data->id_nilai)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('na')); ?>:</b>
	<?php echo CHtml::encode($data->na); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('un')); ?>:</b>
	<?php echo CHtml::encode($data->un); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uas')); ?>:</b>
	<?php echo CHtml::encode($data->uas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nis')); ?>:</b>
	<?php echo CHtml::encode($data->nis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_mapel')); ?>:</b>
	<?php echo CHtml::encode($data->kode_mapel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
	<?php echo CHtml::encode($data->kelas); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lokal')); ?>:</b>
	<?php echo CHtml::encode($data->lokal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_guru')); ?>:</b>
	<?php echo CHtml::encode($data->kode_guru); ?>
	<br />

	*/ ?>

</div>