<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'waktu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idwaktu',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'hari',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'jam_mulai',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jam_berakhir',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
