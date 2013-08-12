<!-- -------------------------------------------------------------------------------------------------------------------------- -->

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'siswa-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'nis'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php /*
	Yii::app()->clientScript->registerScript("combo-change", "
		$(document).ready(function(){
			$('#status').change(function(){
			sel = $(this);
			console.log(sel.val());
				if(sel.val() == 'Kandung' ){
					$('#nik_wali').attr('disabled', 'disabled');
				}else{
					$('#nik_wali').removeAttr('disabled');
				}
			});
		});
	");*/
	?>
	
	<?php $tempat_lahirArray = CHtml::listData(Kabupaten::model()->findAll(array(
		'order'=>'nama_kab ASC',
		'distinct' => true
		)), 'nama_kab', 'nama_kab'); 
	?>
	
	<?php $kecamatanArray = CHtml::listData(Kecamatan::model()->findAll(array(
		'order'=>'nama_kec ASC',
		'distinct' => true
		)), 'idkec', 'nama_kec'); 
	?>
	
	
	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model,'no_pendaftaran',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model,'nisn',array('class'=>'span4', 'placeholder'=>'Isikan 0 bila belum memiliki NISN')); ?>

	<?php echo $form->textFieldRow($model,'nama_lengkap',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_panggilan',array('class'=>'span4','maxlength'=>20)); ?>
	
	<?php echo $form->radioButtonListRow($model, 'jk', array('L'=>'Laki-laki', 'P'=>'Perempuan'	)); ?>

	<?php echo $form->dropDownListRow($model, 'tempat_lahir', $tempat_lahirArray, array('empty' => '-- Pilih Tempat --', 'id' => 'nama_kab')); ?>

	<?php echo $form->datepickerRow($model, 'tanggal_lahir', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

	<?php echo $form->textFieldRow($model,'anak_ke',array('class'=>'span4')); ?>

	<?php echo $form->radioButtonListRow($model, 'status', array('Kandung' => 'Kandung', 'Bukan Kandung' => 'Bukan Kandung'), array('empty' => '-- Pilih Status --', 'id'=>'status')); ?>
	
	<?php echo $form->textFieldRow($model,'jml_saudara',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'no_telp',array('class'=>'span4','maxlength'=>13)); ?>

	<?php echo $form->dropDownListRow($model, 'agama', array('Islam'=>'Islam', 'Kristen'=>'Kristen', 'Katolik'=>'Katolik', 'Hindu'=>'Hindu', 'Budha'=>'Budha')); ?>

	<?php echo $form->radioButtonListRow($model, 'kewarganegaraan', array('WNI'=>'WNI', 'WNA'=>'WNA')); ?>
	
	<?php echo $form->textFieldRow($model,'bahasa',array('class'=>'span4','maxlength'=>20)); ?>
	
	<?php echo $form->textFieldRow($model,'jarak_rumah',array('class'=>'span4')); ?>

	<?php echo $form->fileFieldRow($model, 'foto', array('size'=>30,'maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'th_ajar',array('class'=>'span4','maxlength'=>10)); ?>

	<?php echo $form->dropDownListRow($model, 'idkec', $kecamatanArray, array('empty' => '-- Pilih Kecamatan --', 'id' => 'idkec')); ?>

	<?php echo $form->textFieldRow($model,'id_sekolah',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'nik_wali',array('class'=>'span4', 'id'=>'nik_wali')); ?>
	
	<?php echo $form->errorSummary($model2); ?>
	
	<?php echo $form->textFieldRow($model2,'no_kk',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model2,'jumlah_anak',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model2,'status_rumah',array('class'=>'span4')); ?>
	
	<?php echo $form->errorSummary($model3); ?>
	
	<?php echo $form->textFieldRow($model3,'nik_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'nama_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'agama_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'tempat_lahir_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'tanggal_lahir_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'pend_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'pekerjaan_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'telp_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model3,'penghasilan_ayah',array('class'=>'span4')); ?>
	
	<?php echo $form->errorSummary($model4); ?>
	
	<?php echo $form->textFieldRow($model4,'nik_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'nama_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'agama_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'tempat_lahir_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'tanggal_lahir_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'pend_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'pekerjaan_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'telp_ibu',array('class'=>'span4')); ?>
	
	<?php echo $form->textFieldRow($model4,'penghasilan_ibu',array('class'=>'span4')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	
	<?php $this->endWidget();?>
