<div class="view">

	<abbr title="Klik untuk melihat informasi." class="initialism">
	<?php echo CHtml::link(CHtml::encode(strtoupper($data->nis)),array('view','id'=>$model->nis,'id2'=>$model->kode_mapel,'id3'=>$model->th_ajar,'id4'=>$model->semester)); ?>
	</abbr>
	<?php //echo CHtml::encode($data->kode_guru); ?>
	
	<p class="text-warning">
	Nilai Akhir: <?php echo CHtml::encode($data->na); ?>
	(UN: <?php echo CHtml::encode($data->un); ?> | UAS: <?php echo CHtml::encode($data->uas); ?>)
	</p>
	
	<?php /*
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokal')); ?>:</b>
	<?php echo CHtml::encode($data->lokal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_guru')); ?>:</b>
	<?php echo CHtml::encode($data->kode_guru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kurikulum')); ?>:</b>
	<?php echo CHtml::encode($data->kurikulum); ?>
	<br />

	*/ ?>

</div>