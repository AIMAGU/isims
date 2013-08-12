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
	'id'=>'jurnal-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus'=>array($model,'materi'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'materi',array('class'=>'span5','maxlength'=>50, 'placeholder'=>'Tulis Materi anda... .')); ?>

	<?php echo $form->dropDownListRow($model, 'metode_mengajar', array(
			'Ceramah'=>'Ceramah', 
			'Diskusi'=>'Diskusi',
			'Tanya Jawab'=>'Tanya Jawab',
			'Demontrasi'=>'Demontrasi',
			'Proyek'=>'Proyek',
			'Eksperimen/percobaa'=>'Eksperimen/percobaan',
			'Tugas dan resitasi'=>'Tugas dan resitasi',
			'Sosiodrama'=>'Sosiodrama',
			'Problem solving'=>'Problem solving',
			'Karya wisata'=>'Karya wisata',
			'Latihan'=>'Latihan',
	), array('class'=>'span5', 'empty' => '-- Pilih Metode Mengajar --')); ?>

	<?php echo $form->textFieldRow($model, 'idwaktu', array('disabled'=>true, 'class'=>'span5', 'hint' => '<i class="text-info">Klik <a href="#" onclick=$("#mydialog").dialog("open"); return false;><code>ubah</code></a> untuk memperbarui jam mengajar.</i>')); ?>
	
	<?php echo $form->hiddenField($model, 'idwaktu'); ?>
	
	<?php echo $form->hiddenField($model, 'kode_mapel'); ?>
	
	<?php echo $form->hiddenField($model, 'kelas'); ?>
	
	<?php echo $form->hiddenField($model, 'lokal'); ?>
	
	<?php echo $form->hiddenField($model, 'idruang'); ?>

	<?php echo $form->hiddenField($model,'kurikulum'); ?>

	<?php echo $form->textAreaRow($model,'keterangan',array('rows'=>6, 'cols'=>30, 'class'=>'span5')); ?>
	
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
	
	<?php $pertemuan=Yii::app()->db->createCommand("select pertemuan from jurnal where kode_guru='".Yii::app()->user->id."' and th_ajar='".$th_ajar."' and semester='".$smt."' order by pertemuan DESC limit 1;")->queryScalar(); ?>
	<?php 
		echo $form->hiddenField($model,'pertemuan', array('value'=>$pertemuan)); 
		echo $form->hiddenField($model,'th_ajar',array('value'=>$th_ajar));
		echo $form->hiddenField($model,'semester',array('value'=>$smt));
		echo $form->datepickerRow($model,'tanggal',array('class'=>'span5', 'value'=>date('Y-m-d'),'options'=>array('dateFormat'=> 'yy-mm-dd'),));
		echo $form->hiddenField($model,'kode_guru', array('value'=>Yii::app()->user->id));
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'icon'=>'icon-plus icon-white',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Save',
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Ulangi', 'icon'=>'icon-refresh icon-white','type'=>'danger')); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'danger',
			'icon'=>'icon-share-alt icon-white',
			'label'=>'Kembali',
			'url'=>array('index')
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<!-- Menampilkan dialog/popup ketika button di atas di klik -->
<?php 
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	//Nama selector/id
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Klik tanda <code>+</code> untuk memilih jam mengajar!',
        'autoOpen'=>true,
		//Fokus atau modal diaktifkan
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
	'dataProvider'=>Jadwal::model()->idwaktujurnal(),
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'idwaktu',
		'kodeGuru.nama_guru',
		'kelas',
		'lokal',
		/* Set value ada di bagian onClick dibawah ini
		 * $(\"#Nilaisis_nis \").val(\"". $data->nis."\") adalah pengesetan value di textfield nis. Value di ambil dari db $data->nis
		 * #Nilaisis_nis = Nama Model_field
		 */ 
		array(
				'header'=>'',
				'type'=>'raw',
				'value'=>'CHtml::Button(
		        "+"
		        , array(
				"class" => "btn submit"
		        , "id" => "get_link"
		        , "onClick" => "$(\"#mydialog\").dialog(\"close\");$(\"#Jurnal_idwaktu \").val(\"". $data->idwaktu."\");
				$(\"#Jurnal_kode_mapel \").val(\"". $data->kode_mapel."\");
				$(\"#Jurnal_kelas \").val(\"". $data->kelas."\");
				$(\"#Jurnal_lokal \").val(\"". $data->lokal."\");
				$(\"#Jurnal_idruang \").val(\"". $data->idruang."\");
				$(\"#Jurnal_kurikulum \").val(\"". $data->kurikulum."\");
				"))',
		),
	),
)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
<?php } ?>