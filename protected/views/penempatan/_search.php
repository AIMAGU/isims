<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'kelas',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'lokal',array('class'=>'span5','maxlength'=>1)); ?>

	<?php //echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'id_penempatan_kls',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'CARI',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
