<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'focus'=>array($model,'nis'),
)); ?>

	<?php //echo $form->textFieldRow($model,'tanggal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>
	
	<?php $th_ajar = CHtml::listData(SemesterAktif::model()->findAll(array(
		'order'=>'th_ajar ASC',
		'select' => 'th_ajar',
		'distinct' => true,
		)), 'th_ajar', 'th_ajar');
	?>
	<?php echo $form->dropDownListRow($model, 'th_ajar', $th_ajar, array('class'=>'span5', 'empty' => '-- Pilih Tahun --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih tahun')); ?>

	<?php $smt = CHtml::listData(SemesterAktif::model()->findAll(array(
		'order'=>'semester ASC',
		'select' => 'semester',
		'distinct' => true,
		)), 'semester', 'semester');
	?>
	<?php echo $form->dropDownListRow($model, 'semester', $smt, array('class'=>'span5', 'empty' => '-- Pilih Semester --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih semester')); ?>

	<?php echo $form->dropDownListRow($model, 'status', array('S'=>'Sakit', 'I'=>'Izin', 'A'=>'Alpha'), array('class'=>'span5', 'empty' => '-- Pilih Status Kehadiran --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih status')); ?>
	
	<?php //echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'semester',array('class'=>'span5','maxlength'=>1)); ?>
	
	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'danger',
			'icon'=>'icon-search icon-white',
			'label'=>'CARI ',
			'htmlOptions' => array('rel'=>'tooltip', 'data-placement'=>'left', 'title'=>'Langkah 2 Klik untuk melihat hasil')
		)); ?>
	</div>

<?php $this->endWidget(); ?>
