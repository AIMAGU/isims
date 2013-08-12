<p class="text-info">
	Konfirmasi penempatan kelas oleh Wakil Kepala Sekoalah bidang Kurikulum. <br>
	Pilih <b>OK</b> untuk kelas tetap atau pilih <b>RANDOM</b> untuk mengacak kelas
</p>
<div class="form-actions">
	<?php /*$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'danger',
		'icon'=>' icon-random icon-white',
		'size'=>'small',
		'label'=>$model->isNewRecord ? 'RANDOM' : 'Submit',
	)); */?>
	
	<?php echo CHtml::submitButton('RANDOM', array(
		'name' => 'tombol5',
		'class'=>'btn',
		'class'=>'btn',
		'confirm'=>'Apakah anda yakin mengacak kelas ini?',
	)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'penempatankelas5-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->kelas5(),
	'template'=>'{summary}{items}{pager}',
	'emptyText'=>'Data masih kosong..', // to display empty value
	//'filter'=>$model,
	'selectableRows'=>2,
    'columns'=>array(
         array(
            'class'=>'CCheckBoxColumn',   
            'id'=>'kelas5',
			//'selectableRows' => '32',
			'checked'=>'1', 
        ),
		array(
                'header' => 'No',
                'value' => '$row+1',
            ),
		'nis',
        'nis0.nama_lengkap',
		'kelas',
		'lokal',
		'th_ajar',
        array(
            //'class'=>'CButtonColumn',
            'header'=>'Lihat',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}',
        ),
    ),
)); ?>