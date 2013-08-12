<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tranpribadi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tranpribadi),array('view','id'=>$data->id_tranpribadi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pribadi')); ?>:</b>
	<?php echo CHtml::encode($data->id_pribadi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nis')); ?>:</b>
	<?php echo CHtml::encode($data->nis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('th_ajar')); ?>:</b>
	<?php echo CHtml::encode($data->th_ajar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_pribadi')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_pribadi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catatan')); ?>:</b>
	<?php echo CHtml::encode($data->catatan); ?>
	<br />


</div>