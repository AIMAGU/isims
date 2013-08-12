<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'waktu-grid',
	//'filter'=>Waktu::model(),
	'dataProvider'=>Waktu::model()->dialog6(),
	'type'=>'striped bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		'idwaktu',
		'hari',
		'jam_mulai',
		'jam_berakhir',
		
		/* Set value ada di bagian onClick dibawah ini
		 * $(\"#Jadwal_idwaktu \").val(\"". $data->idwaktu."\") adalah pengesetan value di textfield nis. Value di ambil dari db $data->idwaktu
		 * #Jadwal_idwaktu = Nama Model_field
		 */ 
		array(
				'header'=>'',
				'type'=>'raw',
				'value'=>'CHtml::Button(
		        "+"
		        , array(
		        "name" => "get_link"
		        , "id" => "get_link"
		        , "onClick" => "$(\"#twaktu\").dialog(\"close\");
		        $(\"#Jadwal_idwaktu \").val(\"". $data->idwaktu."\");
			"))',
		),
	),
)); ?>