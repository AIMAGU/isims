<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jadwal','url'=>array('index')),
	array('label'=>'Manage Jadwal','url'=>array('admin')),
);
?>

<h1>Add Jadwal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3)); ?>



<?php //=======================================================================================
	  //untuk pemilihan jam pelajaran 
	  ?>
	  
<?php 
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	//Nama selector/id
    'id'=>'twaktu',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Klik tanda <code>+</code> untuk input data waktu',
        'autoOpen'=>false,
		//Fokus atau modal diaktifkan
		'modal' => true,
		'width' => 640, 
		'height' => 480
    ),
));?>
<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'above', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => 'SENIN', 'active'=>true, 'content' => $this->renderPartial('dialog1', array('model'=>$model), true)),
		array('label' => 'SELASA', 'content' => $this->renderPartial('dialog2', array('model'=>$model), true)),
		array('label' => 'RABU', 'content' => $this->renderPartial('dialog3', array('model'=>$model), true)),
		array('label' => 'KAMIS', 'content' => $this->renderPartial('dialog4', array('model'=>$model), true)),
		array('label' => 'JUMAT', 'content' => $this->renderPartial('dialog5', array('model'=>$model), true)),
		array('label' => 'SABTU', 'content' => $this->renderPartial('dialog6', array('model'=>$model), true)),
	),
));
?>

<?php	$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>


<?php // untuk pemilihan penempatan mapel ?>
<?php 
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	//Nama selector/id
    'id'=>'tmapel',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Klik tanda <code>+</code> untuk input data mapel',
        'autoOpen'=>false,
		//Fokus atau modal diaktifkan
		'modal' => true,
		'width' => 640, 
		'height' => 480
    ),
));?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatan-grid',
	'dataProvider'=>PenempatanMapel::model()->search(),
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'kode_mapel',
		'kurikulum',
		'kelas',
		'lokal',
		
		/* Set value ada di bagian onClick dibawah ini
		 * $(\"#Nilai_nis \").val(\"". $data->nis."\") adalah pengesetan value di textfield nis. Value di ambil dari db $data->nis
		 * #Nilai_nis = Nama Model_field
		 */ 
		array(
				'header'=>'',
				'type'=>'raw',
				'value'=>'CHtml::Button(
		        "+"
		        , array(
		        "name" => "get_link"
		        , "id" => "get_link"
		        , "onClick" => "$(\"#tmapel\").dialog(\"close\");
		        $(\"#Jadwal_kode_mapel \").val(\"". $data->kode_mapel."\");
		        $(\"#Jadwal_kurikulum\").val(\"". $data->kurikulum."\");
		        $(\"#Jadwal_kelas\").val(\"". $data->kelas."\");
		        $(\"#Jadwal_lokal\").val(\"". $data->lokal."\");
			"))',
		),
	),
)); ?>
<?php	$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
