<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'na',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'un',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'uas',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'kode_mapel',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'kelas',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'lokal',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'kode_guru',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'id_nilai',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
