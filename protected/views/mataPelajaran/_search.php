<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'kode_mapel',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'kurikulum',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'mapel',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'kkm',array('class'=>'span5')); ?>
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
