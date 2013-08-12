<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idwaktu',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'hari',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'jam_mulai',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jam_berakhir',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
