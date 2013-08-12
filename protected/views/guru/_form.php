<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'guru-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus'=>array($model,'kode_guru'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->errorSummary($model2); ?>

	<?php echo $form->textFieldRow($model,'kode_guru',array('class'=>'span5','maxlength'=>2, 'placeholder'=>'KODE GURU')); ?>

	<?php echo $form->textFieldRow($model,'nama_guru',array('class'=>'span5','maxlength'=>30, 'placeholder'=>'NAMA LENGKAP')); ?>

	<?php echo $form->textFieldRow($model,'nip',array('class'=>'span5','maxlength'=>18, 'placeholder'=>'NIP')); ?>

	<?php echo $form->dropDownListRow($model,'jabatan',array(
			'Kepala Yayasan'=>'Kepala Yayasan',
			'Kepala Sekolah'=>'Kepala Sekolah',
			'Kurikulum'=>'Kurikulum',
			'Wali Kelas'=>'Wali Kelas',
			'Guru Mapel'=>'Guru Mapel',
	), array('class'=>'span5', 'empty' => '-- Pilih Jabatan --')); ?>

	<?php echo $form->textFieldRow($model,'ahli',array('class'=>'span5','maxlength'=>20, 'placeholder'=>'AHLI / MATA PELAJARAN')); ?>

	<?php echo $form->dropDownListRow($model, 'agama', array('Islam'=>'Islam', 'Kristen'=>'Kristen', 'Katolik'=>'Katolik', 'Hindu'=>'Hindu', 'Budha'=>'Budha'), array('class'=>'span5', 'empty' => '-- Pilih Agama --')); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>50, 'placeholder'=>'ALAMAT DESA RT/RW')); ?>
	
	<?php 
    $idprop=Yii::app()->db->createCommand("select idprop from kabupaten;")->queryScalar();

    		echo $form->dropDownListRow($model3,'idkab', Kabupaten::model()->getStateOptions($idprop), array('class'=>'span5','id'=>'idkab','empty' => 'Pilih Kab', 'ajax' => array(  
            'type'=>'POST', //request type  
            'url'=>CController::createUrl('kecamatan/dinamis'), //url to call.  
            'data'=>'js:"idkab="+jQuery(this).val()',  
            'update'=>'#idkec', //selector to update  
    ))); ?>  
   
	<?php echo $form->dropDownListRow($model,'idkec',Kecamatan::model()->getCityOptionsByState($model3->idkab), array('class'=>'span5','id'=>'idkec'));?> 
	
	<?php /*$kecamatanArray = CHtml::listData(Kecamatan::model()->findAll(array(
		'order'=>'nama_kec ASC',
		'distinct' => true
		)), 'idkec', 'nama_kec');*/ 
	?>
	<?php //echo $form->dropDownListRow($model, 'idkec', $kecamatanArray, array('class'=>'span5', 'empty' => '-- Pilih Kecamatan --', 'id' => 'idkec')); ?>

	<?php echo $form->textFieldRow($model,'telp',array('class'=>'span5', 'placeholder'=>'PHONE')); ?>

	<?php echo $form->textFieldRow($model,'no_sertifikasi',array('class'=>'span5', 'placeholder'=>'NO SERTIFIKASI')); ?>
	
	<?php 
    $idprop=Yii::app()->db->createCommand("select idprop from kabupaten;")->queryScalar();

    		echo $form->dropDownListRow($model3,'idkab', Kabupaten::model()->getStateOptions($idprop), array('class'=>'span5','id'=>'idkab2','empty' => 'Pilih Kab', 'ajax' => array(  
            'type'=>'POST', //request type  
            'url'=>CController::createUrl('kecamatan/dinamis'), //url to call.  
            'data'=>'js:"idkab="+jQuery(this).val()',  
            'update'=>'#tempat_lahir', //selector to update  
    ))); ?>  
   
	<?php echo $form->dropDownListRow($model,'tempat_lahir',Kecamatan::model()->getCityOptionsByState($model3->idkab), array('class'=>'span5','id'=>'tempat_lahir'));?>
	
	<?php /*$tempatArray = CHtml::listData(Kabupaten::model()->findAll(array(
		'order'=>'nama_kab ASC',
		'distinct' => true
		)), 'nama_kab', 'nama_kab');*/ 
	?>
	<?php //echo $form->dropDownListRow($model, 'tempat_lahir', $tempatArray, array('class'=>'span5', 'empty' => '-- Pilih Tempat Lahir--', 'id' => 'nama_kab')); ?>

	<?php echo $form->datepickerRow($model, 'tanggal_lahir', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
	
	<?php echo $form->radioButtonListRow($model, 'jk', array('L'=>'Laki-laki', 'P'=>'Perempuan'	)); ?>
	
	<?php echo $form->fileFieldRow($model, 'foto', array('size'=>30,'maxlength'=>30)); ?>
	
	<hr>
	
	<?php echo $form->textFieldRow($model2,'username',array('class'=>'span5','maxlength'=>32, 'placeholder'=>'USERNAME')); ?>

	<?php echo $form->passwordFieldRow($model2,'password',array('class'=>'span5','maxlength'=>32, 'placeholder'=>'PASSWORD')); ?>

	<?php echo $form->textFieldRow($model2,'email',array('class'=>'span5','maxlength'=>32, 'placeholder'=>'EMAIL (contoh@isims.com)')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'icon'=>'icon-share icon-white',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Ubah',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
