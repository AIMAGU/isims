<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'nik_wali',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nama_wali',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'hub_keluarga',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'pend_terakhir',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'pekerjaan',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'penghasilan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idkec',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
