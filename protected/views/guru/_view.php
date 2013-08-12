<div class="view">

	<abbr title="Klik nama untuk melihat informasi." class="initialism">
	<?php echo CHtml::link(CHtml::encode(strtoupper($data->nama_guru)),array('view','id'=>$data->kode_guru)); ?>
	</abbr>
	<?php //echo CHtml::encode($data->kode_guru); ?>
	
	<p class="text-warning">
	NIP: <?php echo CHtml::encode($data->nip); ?>
	(<?php echo CHtml::encode($data->jabatan); ?>)
	</p>
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ahli')); ?>:</b>
	<?php echo CHtml::encode($data->ahli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agama')); ?>:</b>
	<?php echo CHtml::encode($data->agama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jk')); ?>:</b>
	<?php echo CHtml::encode($data->jk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp')); ?>:</b>
	<?php echo CHtml::encode($data->telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idkec')); ?>:</b>
	<?php echo CHtml::encode($data->idkec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_sertifikasi')); ?>:</b>
	<?php echo CHtml::encode($data->no_sertifikasi); ?>
	<br />

	*/ ?>

</div>