<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php $kelas = CHtml::listData(Jadwal::model()->findAll(array(
		'condition'=>"kode_guru='".Yii::app()->user->id."'",
		'order'=>'kelas ASC',
		'select' => 'kelas',
		'distinct' => true,
		)), 'kelas', 'kelas');
	?>
	<?php echo $form->dropDownListRow($model2, 'kelas', $kelas, array('class'=>'span5', 'empty' => '-- Pilih Kelas --')); ?>
	
	<?php $lokal = CHtml::listData(Jadwal::model()->findAll(array(
		'condition'=>"kode_guru='".Yii::app()->user->id."'",
		'order'=>'lokal ASC',
		'select' => 'lokal',
		'distinct' => true,
		)), 'lokal', 'lokal');
	?>
	<?php echo $form->dropDownListRow($model2, 'lokal', $lokal, array('class'=>'span5', 'empty' => '-- Pilih Lokal --')); ?>
	
	<?php //echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'kelas',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'lokal',array('class'=>'span5','maxlength'=>1)); ?>

	<?php //echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'id_penempatan_kls',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'icon'=>'icon-search icon-white',
			'toggle'=>true,
			'label'=>'CARI',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
