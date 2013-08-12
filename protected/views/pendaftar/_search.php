<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'no_pendaftaran',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nama_lengkap',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_panggilan',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jk',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'tempat_lahir',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_lahir',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'anak_ke',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'jml_saudara',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'no_telp',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'agama',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'kewarganegaraan',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'bahasa',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jarak_rumah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idkec',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_sekolah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nik_wali',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'no_kk',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
