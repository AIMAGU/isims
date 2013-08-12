<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'focus'=>array($model,'idruang'),
)); ?>
	<?php $idruang = CHtml::listData(Jadwal::model()->findAll(array(
		'order'=>'idruang ASC',
		'select' => 'idruang',
		'distinct' => true,
		)), 'idruang', 'idruang');
	?>
	<?php echo $form->dropDownListRow($model, 'idruang', $idruang, array('class'=>'span5', 'empty' => '-- Pilih Ruang --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih Ruang')); ?>	
	
	<?php $idwaktu = CHtml::listData(Jadwal::model()->findAll(array(
		'order'=>'idwaktu ASC',
		'select' => 'idwaktu',
		'distinct' => true,
		)), 'idwaktu', 'idwaktu');
	?>
	<?php echo $form->dropDownListRow($model, 'idwaktu', $idwaktu, array('class'=>'span5', 'empty' => '-- Pilih Waktu --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih Waktu')); ?>
	
	<?php $kode_guru = CHtml::listData(Jadwal::model()->findAll(array(
		'order'=>'kode_guru ASC',
		'select' => 'kode_guru',
		'distinct' => true,
		)), 'kode_guru', 'kode_guru');
	?>
	<?php echo $form->dropDownListRow($model, 'kode_guru', $kode_guru, array('class'=>'span5', 'empty' => '-- Pilih Kode Guru --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih kode guru')); ?>
	
	<?php $kode_mapel = CHtml::listData(Jadwal::model()->findAll(array(
		'order'=>'kode_mapel ASC',
		'select' => 'kode_mapel',
		'distinct' => true,
		)), 'kode_mapel', 'kode_mapel');
	?>
	<?php echo $form->dropDownListRow($model, 'kode_mapel', $kode_mapel, array('class'=>'span5', 'empty' => '-- Pilih Kode Mapel --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih kode mata pelajaran')); ?>
	
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
	
	<?php /*
	<?php echo $form->textFieldRow($model,'idruang',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kode_guru',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'kode_mapel',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'kurikulum',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'kelas',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'semester',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'idwaktu',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'lokal',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'tanggal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'materi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'metode_mengajar',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'keterangan',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'pertemuan',array('class'=>'span5')); ?>
	*/?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'danger',
			'icon'=>'icon-search icon-white',
			'label'=>'CARI ',
			'htmlOptions' => array('rel'=>'tooltip', 'data-placement'=>'left', 'title'=>'Langkah 2 Klik untuk melihat jurnal')
		)); ?>
	</div>

<?php $this->endWidget(); ?>
