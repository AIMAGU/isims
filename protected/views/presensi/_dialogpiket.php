<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatanpikets-grid',
	'dataProvider'=>Penempatan::model()->gurupiket(),
	'type'=>'striped bordered condensed',
	'filter'=>$model2,
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