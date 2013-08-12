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

<?php //echo $this->renderPartial('_caridialog', array('model2'=>$model2,'model'=>$model)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatan-grid',
	'dataProvider'=>$model2->search(),
	'type'=>'striped bordered condensed',
	'filter'=>$model2,
	'columns'=>array(
		array(
			'name'=>'kelas',
			'type'=>'raw',
			'value'=>'$data->kelas',
			'filter'=>CHtml::listData(Jadwal::model()->findAll(array(
				'condition'=>"kode_guru='".Yii::app()->user->id."'",
				'order'=>'kelas ASC',
				'select' => 'kelas',
				'distinct' => true,
			)), 'kelas', 'kelas')
		),
		array(
			'name'=>'lokal',
			'type'=>'raw',
			'value'=>'$data->lokal',
			'filter'=>CHtml::listData(Jadwal::model()->findAll(array(
				'condition'=>"kode_guru='".Yii::app()->user->id."'",
				'order'=>'lokal ASC',
				'select' => 'lokal',
				'distinct' => true,
			)), 'lokal', 'lokal')
		),
		'nis',
		'nis0.nama_lengkap',
		//'kelas',
		//'lokal',
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
		        , "onClick" => "$(\"#mydialog\").dialog(\"close\");$(\"#Nilai_nis \").val(\"". $data->nis."\");
				$(\"#Nilai_kelas \").val(\"". $data->kelas."\");
				$(\"#Nilai_lokal \").val(\"". $data->lokal."\");"))',
		),
	),
)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>