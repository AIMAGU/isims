<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kurikulum')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kurikulum),array('view','id'=>$data->kurikulum)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_berlaku')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_berlaku); ?>
	<br />


</div>