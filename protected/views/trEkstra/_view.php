<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tranekstra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tranekstra),array('view','id'=>$data->id_tranekstra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ekstra')); ?>:</b>
	<?php echo CHtml::encode($data->id_ekstra); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_ekstra')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_ekstra); ?>
	<br />


</div>