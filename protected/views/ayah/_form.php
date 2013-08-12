<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ayah-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nik_ayah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nama_ayah',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'agama_ayah',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'tempat_lahir_ayah',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_lahir_ayah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pend_ayah',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'pekerjaan_ayah',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'telp_ayah',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'penghasilan_ayah',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
