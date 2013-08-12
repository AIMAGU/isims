<?php
	//Validasi untuk guru yang tidak memiliki jadwal mengajar
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
	$kode_mapel=Yii::app()->db->createCommand("select kode_mapel from jadwal where kode_guru='".Yii::app()->user->id."' and semester='".$smt."' and th_ajar='".$th_ajar."'")->queryScalar();
	if($kode_mapel==null){
		echo Yii::app()->user->setFlash('danger', 'Maaf, <strong>anda tidak memiliki</strong> jadwal mengajar!');
		$this->widget('bootstrap.widgets.TbAlert', array(
				'block'=>true, // display a larger alert block?
				'fade'=>true, // use transitions?
				'closeText'=>'×', // close link text - if set to false, no close link is displayed
				'alerts'=>array( // configurations per alert type
						'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'x'), // success, info, warning, error or danger
				),
		));
	}else{
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'nilai-form',
	//Type inputan berbentuk horizontal karena memanggil kelas horizontal yang sudah dideklarasikan di css bootstrap
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	//Untuk setFokus kursor
	'focus'=>array($model,'nis'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<!-- Membuat link untuk popup (Dialog) untuk field NIS dengan memberi id=mydialog -->
	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5', 
	'hint' => 'Silahkan tekan tombol <a href="#" onclick=$("#mydialog").dialog("open"); return false; class="btn submit">+</a> untuk melihat daftar siswa.')); ?>
	
	<?php $this->widget('application.extensions.moneymask.MMask',array(
		'element'=>'#na, #un, #uas',
		'config'=>array(
			'precision'=>0,
			'thousands'=>'.',
		)
	));
	?>
	<?php /*Yii::app()->clientScript->registerScript("number-only", "
		$(document).ready(function() {
		$('#na').keydown(function(event) {
		// Allow: backspace, delete, tab, escape, and enter
		if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
		// Allow: Ctrl+A
		(event.keyCode == 65 && event.ctrlKey === true) ||
		// Allow: home, end, left, right
		(event.keyCode >= 35 && event.keyCode <= 39)) {
			// let it happen, don't do anything
			return;
		}
		else {
			// Ensure that it is a number and stop the keypress
			if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault();
			}
		}
		});
		});
		", CClientScript::POS_END);*/
	?>
	<?php echo $form->textFieldRow($model,'na',array('class'=>'span5', 'maxlength'=>3, 'min'=>0,'max'=>100, 'id'=>'na')); ?>

	<?php 
		$kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		if($kelas==6){
			echo $form->textFieldRow($model,'un',array('class'=>'span5','maxlength'=>3, 'id'=>'un', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Nilai Ujian Nasional. Isikan angka 0 apabila nilai masih kosong'));
			echo $form->textFieldRow($model,'uas',array('class'=>'span5','maxlength'=>3, 'id'=>'uas','rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Nilai Ujian Sekolah. Isikan angka 0 apabila nilai masih kosong'));
		}
	?>
	<?php  ?>

	<?php  ?>
	
	<?php $kode_mapel=Yii::app()->db->createCommand("select kode_mapel from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar(); ?>
	<?php echo $form->hiddenField($model,'kode_mapel',array('class'=>'span5','maxlength'=>6, 'value'=>$kode_mapel)); ?>

	<?php $kelasArray = CHtml::listData(Jadwal::model()->findAll(array(
		'order'=>'kelas ASC',
		'condition'=>"kode_guru='".Yii::app()->user->id."'",
		'distinct' => true
		)), 'kelas', 'kelas');
	?>
	
	<?php echo $form->hiddenField($model,'kelas',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->hiddenField($model,'lokal',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->hiddenField($model,'kode_guru',array('class'=>'span5','maxlength'=>2, 'value'=>Yii::app()->user->id)); ?>

	<?php $kurikulum=Yii::app()->db->createCommand("select kurikulum from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar(); ?>
	<?php echo $form->hiddenField($model,'kurikulum',array('class'=>'span5','maxlength'=>1, 'value'=>$kurikulum)); ?>
	
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
			'toggle'=>true,
			'label'=>$model->isNewRecord ? 'Tambah' : 'Save',
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Ulangi', 'icon'=>'icon-refresh icon-white','type'=>'danger')); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'danger',
			'icon'=>'icon-share-alt icon-white',
			'label'=>'Kembali',
			'url'=>array('admin')
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->renderPartial('dialog',array(
	'model'=>$model,
	'model2'=>$model2,
)); ?>
<?php } ?>