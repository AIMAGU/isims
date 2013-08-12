
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	//'title' => "Kelas ".$pgi['kelas'].$pgi['lokal']." (".$pgi['th_ajar']."/".$pgi['semester'].")",
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'nilai-form',
	'enableAjaxValidation'=>false,
		//Membuat no padding antar inputan
			'type'=>'inline',
		//Membuat background Form
			'htmlOptions'=>array('class'=>'well'),
)); ?>

			<div class="well"><h5>
			
			</h5></div>
	<?php echo $form->errorSummary($model); ?>
	<hr>
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<table class="table">
		<thead>
		<tr>
			<th>NILAI AKHIR</th>
			<th>UJIAN NASIONAL</th>
			<th>UJIAN SEKOLAH</th>
		</tr>
		</thead>
		<tbody>
		
	
		<?php echo $form->hiddenField($model,'lokal'); ?>
		<?php echo $form->hiddenField($model,'kelas'); ?>
		<?php echo $form->hiddenField($model,'nisn'); ?>
				<!-- <td><?php echo $form->textField($model,'na', array('class'=>'input-small', 'id'=>'na')); ?></td>
				<td><?php echo $form->textField($model,'un', array('class'=>'input-small', 'id'=>'un')); ?></td>
				<td><?php echo $form->textField($model,'uas', array('class'=>'input-small', 'id'=>'uas')); ?></td> 
			</tr>-->
		</tbody>
	</table>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'SIMPAN' : 'Save',
		)); ?>
	</div>
<?php $this->endWidget(); ?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'nilai-grid',
	'type'=>'striped bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'nisn',
		array(
			'name'=>'Nama',
			'value'=>'$data->nisn0->nama_lengkap',
		),
		//'nisn0.nama_lengkap',
		'kodeMapel.mapel',
		array(
			'name'=>'Guru',
			'value'=>'$data->kodeGuru->nama_guru',
		),
		//'kodeGuru.nama_guru',
		'na',
		'un',
		'uas',
		'kelas',
		'lokal',
		/*
		'id_nilai',
		*/
		array(
			'header'=>'MENU',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget(); ?>