<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'focus'=>array($model,'nis'),
)); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5')); ?>

	<?php $kelas = CHtml::listData(Lokal::model()->findAll(array(
		'order'=>'kelas ASC',
		'select' => 'kelas',
		'distinct' => true,
		)), 'kelas', 'kelas');
	?>
	<?php echo $form->dropDownListRow($model, 'kelas', $kelas, array('class'=>'span5', 'empty' => '-- Pilih Kelas --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih kelas')); ?>
	
	<?php $lokal = CHtml::listData(Lokal::model()->findAll(array(
		'order'=>'lokal ASC',
		'select' => 'lokal',
		'distinct' => true,
		)), 'lokal', 'lokal');
	?>
	<?php echo $form->dropDownListRow($model, 'lokal', $lokal, array('class'=>'span5', 'empty' => '-- Pilih Lokal --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih lokal')); ?>
	
	<?php $th_ajar = CHtml::listData(SemesterAktif::model()->findAll(array(
		'order'=>'th_ajar ASC',
		'select' => 'th_ajar',
		'distinct' => true,
		)), 'th_ajar', 'th_ajar');
	?>
	<?php echo $form->dropDownListRow($model, 'th_ajar', $th_ajar, array('class'=>'span5', 'empty' => '-- Pilih Tahun --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih tahun')); ?>

	<?php //echo $form->textFieldRow($model,'id_penempatan_kls',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'danger',
			'icon'=>'icon-search icon-white',
			'label'=>'CARI',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
