<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tr-pribadi-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	//Untuk setFokus kursor
	'focus'=>array($model,'nis'),
)); ?>

	<?php 
		//Validasi GET id dari form Raport gan!
		if(isset($_GET['id'])==1){
			$nis=$_GET['id'];
		}else{
			$nis="";
		}
	?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5', 'value'=>$nis,
	'hint' => 'Silahkan tekan tombol <a href="#" onclick=$("#mydialog").dialog("open"); return false; class="btn submit">+</a> untuk melihat daftar siswa.')); ?>
	
	<?php 
		if(isset($_GET['pribadi'])==1){
			$ekstra = $th_ajar=Yii::app()->db->createCommand("select id_pribadi from kepribadian where id_pribadi='".$_GET['pribadi']."';")->queryScalar(); 
			echo $form->hiddenfield($model,'id_pribadi', array('value'=>$ekstra));
			echo $form->textAreaRow($model, 'catatan', array('class'=>'span5', 'rows'=>8));
		}else{
			$ekstra = CHtml::listData(Kepribadian::model()->findAll(array(
			'condition'=>"id_pribadi not in (4,5)",
			'order'=>'id_pribadi ASC',
			)), 'id_pribadi', 'nama_pribadi'); 
			echo $form->dropDownListRow($model,'id_pribadi', $ekstra, array('class'=>'span5', 'empty' => '-- Pilih Kepribadian--'));
			echo $form->dropDownListRow($model, 'nilai_pribadi', array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D', 'E'=>'E'), array('class'=>'span5', 'empty' => '-- Pilih Nilai --'));
		}
	?>
	
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
		
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Ulangi', 'icon'=>'icon-refresh icon-white','type'=>'danger')); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'danger',
			'icon'=>'icon-share-alt icon-white',
			'label'=>'Kembali',
			'url'=>array('nilai/raport', 'id'=>$_GET['id'])
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
        'title'=>'Klik tanda <code>+</code> untuk input data siswa',
        'autoOpen'=>false,
		//Fokus atau modal diaktifkan
		'modal' => true,
		'width' => 640,
		'show'=>array(
				'effect'=>'blind',
				'duration'=>1000,
		),
		'hide'=>array(
				'effect'=>'explode',
				'duration'=>500,
		), 
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
				"class" => "btn submit"
		        , "id" => "get_link"
		        , "onClick" => "$(\"#mydialog\").dialog(\"close\");$(\"#Trpribadi_nis \").val(\"". $data->nis."\");"))',
		),
	),
)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>