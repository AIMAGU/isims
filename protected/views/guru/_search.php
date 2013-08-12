<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'kode_guru',array('class'=>'span5','maxlength'=>2, 'placeholder'=>'Cari berdasarkan Kode Guru')); ?>

	<?php echo $form->textField($model,'nama_guru',array('class'=>'span3','maxlength'=>30, 'placeholder'=>'Cari berdasarkan Nama')); ?>

	<?php echo $form->textField($model,'nip',array('class'=>'span3','maxlength'=>18, 'placeholder'=>'Cari berdasarkan NIP')); ?>
	
	<?php /*
	<?php echo $form->textFieldRow($model,'jabatan',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'ahli',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'agama',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'jk',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'tempat_lahir',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_lahir',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'telp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'idkec',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'no_sertifikasi',array('class'=>'span5')); ?>
	*/?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
