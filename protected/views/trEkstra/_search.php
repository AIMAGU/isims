<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_tranekstra',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_ekstra',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'semester',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'nilai_ekstra',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
