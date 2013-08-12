<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'jadwal-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $ruang=CHtml::listData(Ruangan::model()->findAll(array(
		'order'=>'namaruang ASC',
		'distinct' => true
		)), 'idruang', 'namaruang'); 
	?>

	<?php echo $form->dropDownListRow($model,'idruang', $ruang, array('empty'=>'- PILIH RUANG -','id'=>'idruang')); ?>
	
	<?php echo $form->textFieldRow($model,'idwaktu',array(
	'hint'=> 'Silahkan klik tombol <a href="#" onclick=$("#twaktu").dialog("open");
	return false; class="btn submit">+</a> untuk melihat daftar waktu.')); ?>
		
	<?php echo $form->dropDownListRow($model,'kode_guru',
	CHtml::listData(Guru::model()->findAll(), 'kode_guru', 'nama_guru'),array('empty'=>'- PILIH GURU -'));  ?>
	
	<?php echo $form->textFieldRow($model,'kode_mapel',array(
	'hint'=> 'Silahkan klik tombol <a href="#" onclick=$("#tmapel").dialog("open");
	return false; class="btn submit">+</a> untuk melihat daftar mapel.')); ?>

	<?php echo $form->hiddenField($model,'kode_mapel',array());?>
	
	<?php echo $form->textFieldRow($model,'kelas',array()); ?>
	
	<?php echo $form->textFieldRow($model,'lokal',array()); ?>
	
	<?php
	  Yii::app()->clientScript->registerScript("combo-change", "
			$(document).ready(function(){
				$('#th_ajar').change(function(){
				sel = $(this);
				console.log(sel.val());
					if(sel.val() != '' ){
						$('#Jadwal_th_ajar').val(sel.val());
						$('#Jadwal_th_ajar').attr('disabled', 'disabled');
					}
				});
			});
		");
		?>
		
	<?php $thajar=CHtml::listData(SemesterAktif::model()->findAll(array(		//'order'=>'th_ajar ASC',
		//'select' => 'kelas',
		//'group' => 'kelas',
		//'distinct' => true
		)), 'semester', 'th_ajar'); 
	?>
	
	<?php //echo $form->dropDownListRow($model,'th_ajar',$thajar,	array('empty'=>'- TAHUN AJARAN -','id'=>'th_ajar')); ?>
			
	<?php //echo $form->textFieldRow($model,'semester',	array('id'=>'Jadwal_th_ajar','placeholder'=>'Semester')); ?>
	
	<?php echo $form->hiddenField($model,'kurikulum',array()); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset', 
			'label'=>'Reset', 
			//'icon'=>'icon-refresh icon-white',
			'type'=>'primary')); ?>
	</div>

<?php $this->endWidget(); ?>

