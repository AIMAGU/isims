<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pendaftar-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php
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
	");
	?>
	
	<?php $tempat_lahirArray = CHtml::listData(Kabupaten::model()->findAll(array(
		'order'=>'nama_kab ASC',
		//'select' => 'kelas',
		//'group' => 'kelas',
		'distinct' => true
		)), 'nama_kab', 'nama_kab'); 
	?>
	
	<?php $kecamatanArray = CHtml::listData(Kecamatan::model()->findAll(array(
		'order'=>'nama_kec ASC',
		//'select' => 'kelas',
		//'group' => 'kelas',
		'distinct' => true
		)), 'idkec', 'nama_kec'); 
	?>
	
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'DATA DIRI',
		'headerIcon' => 'icon-th-list',
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table'),
			'headerButtons' => array(
					array(
							'class' => 'bootstrap.widgets.TbButtonGroup',
							'buttons'=>array(
									array('label'=>'List', 'url'=>'index.php?r=pendaftar/index'),
									array('label'=>'Manage', 'url'=>'index.php?r=pendaftar/admin'),
									array('label'=>'Home', 'url'=>'index')
							),
					),
			)
	));?>
	<br>
	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'no_pendaftaran',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nama_lengkap',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_panggilan',array('class'=>'span5','maxlength'=>20)); ?>
	
	<?php echo $form->radioButtonListRow($model, 'jk', array('L'=>'Laki-laki', 'P'=>'Perempuan'	)); ?>

	<?php echo $form->dropDownListRow($model, 'tempat_lahir', $tempat_lahirArray, array('empty' => '-- Pilih Tempat --', 'id' => 'nama_kab')); ?>

	<?php //echo $form->textFieldRow($model,'tanggal_lahir',array('class'=>'span5')); ?>
	
	<?php echo $form->datepickerRow($model, 'tanggal_lahir', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

	<?php echo $form->textFieldRow($model,'anak_ke',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>15)); ?>
	
	<?php echo $form->radioButtonListRow($model, 'status', array('Kandung' => 'Kandung', 'Bukan Kandung' => 'Bukan Kandung'), array('empty' => '-- Pilih Status --', 'id'=>'status')); ?>
	
	<?php echo $form->textFieldRow($model,'jml_saudara',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'no_telp',array('class'=>'span5','maxlength'=>13)); ?>

	<?php //echo $form->textFieldRow($model,'agama',array('class'=>'span5','maxlength'=>10)); ?>
	
	<?php echo $form->dropDownListRow($model, 'agama', array('Islam'=>'Islam', 'Kristen'=>'Kristen', 'Katolik'=>'Katolik', 'Hindu'=>'Hindu', 'Budha'=>'Budha')); ?>

	<?php //echo $form->textFieldRow($model,'kewarganegaraan',array('class'=>'span5','maxlength'=>3)); ?>
	
	<?php echo $form->radioButtonListRow($model, 'kewarganegaraan', array('WNI'=>'WNI', 'WNA'=>'WNA')); ?>
	
	<?php echo $form->textFieldRow($model,'bahasa',array('class'=>'span5','maxlength'=>20)); ?>
	
	<?php //echo $form->checkBoxListInlineRow($model, 'bahasa', array('Indonesia', 'Inggris', 'Lainnya')); ?>

	<?php echo $form->textFieldRow($model,'jarak_rumah',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>20)); ?>
	
	<?php echo $form->fileFieldRow($model, 'foto', array('size'=>30,'maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'th_ajar',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'idkec',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model, 'idkec', $kecamatanArray, array('empty' => '-- Pilih Kecamatan --', 'id' => 'idkec')); ?>

	<?php echo $form->textFieldRow($model,'id_sekolah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nik_wali',array('class'=>'span5', 'id'=>'nik_wali')); ?>
	
	<?php $this->endWidget();?>
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'DATA KELUARGA',
		'headerIcon' => 'icon-home',
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table')
	));?>
	<br>
	
	<?php echo $form->errorSummary($model2); ?>
	
	<?php echo $form->textFieldRow($model2,'no_kk',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model2,'jumlah_anak',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model2,'status_rumah',array('class'=>'span5')); ?>
	
	<?php $this->endWidget();?>
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'DATA AYAH',
		'headerIcon' => 'icon-star',
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table')
	));?>
	<br>
	<?php echo $form->errorSummary($model3); ?>
	
	<?php echo $form->textFieldRow($model3,'nik_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'nama_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'agama_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'tempat_lahir_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'tanggal_lahir_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'pend_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'pekerjaan_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'telp_ayah',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model3,'penghasilan_ayah',array('class'=>'span5')); ?>
	
	<?php $this->endWidget();?>
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'DATA IBU',
		'headerIcon' => 'icon-star',
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table')
	));?>
	<br>
	<?php echo $form->errorSummary($model4); ?>
	
	<?php echo $form->textFieldRow($model4,'nik_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'nama_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'agama_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'tempat_lahir_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'tanggal_lahir_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'pend_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'pekerjaan_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'telp_ibu',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model4,'penghasilan_ibu',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	
	<?php $this->endWidget();?>

<?php $this->endWidget(); ?>
	
