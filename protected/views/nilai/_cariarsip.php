<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'focus'=>array($model,'nis'),
)); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Masukkan kata kunci. Hilangkan angka "0"')); ?>
	
	<?php $mapel = CHtml::listData(MataPelajaran::model()->findAll(array(
		'order'=>'kode_mapel, mapel ASC',
		'select' => 'kode_mapel, mapel',
		//'group' => 'kode_mapel, mapel',
		'distinct' => true,
		)), 'kode_mapel', 'mapel');
	?>
	<?php echo $form->dropDownListRow($model, 'kode_mapel', $mapel, array('class'=>'span5', 'empty' => '-- Pilih Mata Pelajaran --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih Mata Pelajar dan Hilangkan angka "0" pada nis')); ?>

	<?php //echo $form->textFieldRow($model,'kode_mapel',array('class'=>'span5','maxlength'=>6)); ?>
	
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

	<?php $smt = CHtml::listData(SemesterAktif::model()->findAll(array(
		'order'=>'semester ASC',
		'select' => 'semester',
		'distinct' => true,
		)), 'semester', 'semester');
	?>
	<?php echo $form->dropDownListRow($model, 'semester', $smt, array('class'=>'span5', 'empty' => '-- Pilih Semester --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih semester')); ?>
	
	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'danger',
			'icon'=>'icon-search icon-white',
			'label'=>'CARI ',
			'htmlOptions' => array('rel'=>'tooltip', 'data-placement'=>'left', 'title'=>'Langkah 2 Klik untuk melihat nilai')
	)); ?>
	<?php /* $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button', 
			'url'=>'#',
			'type'=>'danger',
			'icon'=>'icon-list-alt icon-white',
			'label'=>'LIHAT HASIL',
			'htmlOptions' => array('class'=>'search-button', 'data-placement'=>'right', 'rel'=>'tooltip', 'title'=>'Langkah 3 (Bantuan)')
		)); */ ?>
	</div>

<?php $this->endWidget(); ?>
