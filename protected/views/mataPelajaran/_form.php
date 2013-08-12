<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'lokal-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well well-small'),
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'kode_mapel',array('maxlength'=>5)); ?>

	<?php echo $form->dropDownListRow($model,'kurikulum',
	CHtml::listData(Kurikulum::model()->findAll(), 'kurikulum', 'kurikulum'),array('empty'=>'-- KURIKULUM --'));  ?>
	
	<?php echo $form->textFieldRow($model,'mapel',array('maxlength'=>30)); ?>
	
	<?php echo $form->textFieldRow($model,'kkm',array('maxlength'=>2)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset', 
			'type'=>'primary',
			'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>
