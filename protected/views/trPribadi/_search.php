<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_tranpribadi',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_pribadi',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'semester',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'nilai_pribadi',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textAreaRow($model,'catatan',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
