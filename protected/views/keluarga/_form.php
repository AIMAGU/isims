<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'keluarga-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'no_kk',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nik_ibu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nik_ayah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jumlah_anak',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status_rumah',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
