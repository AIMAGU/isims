<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'waktu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idwaktu',array('maxlength'=>6)); ?>

	<?php echo $form->dropDownListRow($model,'hari',array('empty'=>'-- select --',
	'Senin'=>'SENIN','Selasa'=>'SELASA','Rabu'=>'RABU','Kamis'=>'KAMIS','Jumat'=>'JUMAT','Sabtu'=>'SABTU','Ahad'=>'AHAD'));  ?>

	<?php echo $form->timepickerRow($model, 'jam_mulai', 
	array('append'=>'<i class="icon-time" style="cursor:pointer"></i>'));?>
	
	<?php echo $form->timepickerRow($model, 'jam_berakhir', 
	array('append'=>'<i class="icon-time" style="cursor:pointer"></i>'));?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
