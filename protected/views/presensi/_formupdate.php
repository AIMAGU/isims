	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'presensi-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
		'focus'=>array($model,'nis'),
	)); ?>

	<!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5', 
	'hint' => 'Silahkan tekan tombol <a href="#" onclick=$("#mydialog").dialog("open"); return false; class="btn submit">+</a> untuk melihat daftar siswa.')); ?>
	
	<?php echo $form->radioButtonListRow($model, 'status', array('S'=>'Sakit', 'I'=>'Izin', 'A'=>'Alpha')); ?>
	
	<?php //echo $form->textFieldRow($model,'tanggal',array('class'=>'span2', 'value'=>date('Y-m-d'))); ?>
	<?php echo $form->datepickerRow($model,'tanggal',array('class'=>'span5', 'options'=>array('dateFormat'=> 'yy-mm-dd'),));?>
	<?php 
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}elseif($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
	?>

	<?php //$th_ajar=Yii::app()->db->createCommand("select th_ajar from semester_aktif order by th_ajar DESC limit 1;")->queryScalar(); ?>
	<?php echo $form->hiddenField($model,'th_ajar',array('class'=>'span5','maxlength'=>10, 'value'=>$th_ajar)); ?>

	<?php //$semester=Yii::app()->db->createCommand("select semester from semester_aktif where semester='".$smt."' limit 1;")->queryScalar(); ?>
	<?php echo $form->hiddenField($model,'semester',array('class'=>'span5','maxlength'=>1, 'value'=>$smt)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'icon'=>'icon-plus icon-white',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Save',
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Ulangi', 'icon'=>'icon-refresh icon-white','type'=>'danger'));	?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'danger',
			'icon'=>'icon-share-alt icon-white',
			'label'=>'Kembali',
			'url'=>array('index')
		)); ?>
	</div>

<?php $this->endWidget(); ?>


<?php 
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Klik tanda <code>+</code> untuk input data siswa',
        'autoOpen'=>false,
		'modal' => true,
		'show'=>array(
				'effect'=>'blind',
				'duration'=>1000,
		),
		'hide'=>array(
				'effect'=>'explode',
				'duration'=>500,
		),
		'width' => 640, 
		'height' => 480
    ),
));?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatan-grid',
	'dataProvider'=>Penempatan::model()->search2(),
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'nis',
		'nis0.nama_lengkap',
		'kelas',
		'lokal',
		array(
				'header'=>'',
				'type'=>'raw',
				'value'=>'CHtml::Button(
		        "+"
		        , array(
		        "name" => "get_link"
		        , "id" => "get_link"
		        , "onClick" => "$(\"#mydialog\").dialog(\"close\");$(\"#Presensi_nis \").val(\"". $data->nis."\");"))',
		),
	),
)); ?>
<?php	$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>