<?php 
$kode_guru=User::model()->findAll(array(
		'select'=>'kode_guru',
		'condition'=>"id='".Yii::app()->user->id."'",
));
foreach ($kode_guru as $kg):
?>
<?php 
$jadwal=Jadwal::model()->findAll(array(
		//'select'=>'kode_guru, kode_mapel',
		'condition'=>"kode_guru='".$kg['kode_guru']."'",
));
foreach ($jadwal as $pg=>$pgi):
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => "Kelas ".$pgi['kelas'].$pgi['lokal']." (".$pgi['th_ajar']."/".$pgi['semester'].")",
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
			<?php echo "Kode Mapel: ".$pgi['kode_mapel'].$form->hiddenField($model,"kode_mapel",array('value'=>$pgi['kode_mapel'])); ?>
			<?php echo "| Nama: ".Yii::app()->user->name." (".$pgi['kode_mapel'].")".$form->hiddenField($model,"kode_guru", array('value'=>$pgi['kode_guru'])); ?>
			</h5></div>
	<?php echo $form->errorSummary($model); ?>
	<hr>
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>nis</th>
			<th>NAMA</th>
			<th>NILAI AKHIR</th>
			<th>UJIAN NASIONAL</th>
			<th>UJIAN SEKOLAH</th>
		</tr>
		</thead>
		<tbody>
		<?php 
			/*$siswa=Siswa::model()->findAll(array(
				//SELECT * FROM "siswa" WHERE kelas = '2' and lokal = 'B'
				//'index'=>'nis',
				'select'=>'*',
				'condition'=>"kelas='".$pgi['kelas']."' or lokal='".$pgi['lokal']."'",
			));*/

			$siswa=Siswa::model()->with(array(
				'nis0'=>array(
				//kita tidak ingin men-select post
				//'select'=>false,
				// tetapi hanya ingin mengambil user yang telah publikasi post
				'joinType'=>'INNER JOIN',
				//'condition'=>'nis0.nis=111',
				'condition'=>"kelas='".$pgi['kelas']."' or lokal='".$pgi['lokal']."'",
				),
			))->findAll();			

			foreach ($siswa as $i=>$ii): 
		?>
	
		<?php echo $form->hiddenField($model,"[$i]lokal"); ?>
		<?php echo $form->hiddenField($model,"[$i]kelas"); ?>
		<?php echo $form->hiddenField($model,"[$i]nis",array('value'=>$ii['nis'])); ?>
			<tr>
				<td><?php echo $ii['nis']; ?></td>
				<td><?php echo $ii['nama_lengkap']; ?></td>
				<td><?php echo $form->textField($model,"[$i]na", array('class'=>'input-small', 'id'=>'na')); ?></td>
				<td><?php echo $form->textField($model,"[$i]un", array('class'=>'input-small', 'id'=>'un')); ?></td>
				<td><?php echo $form->textField($model,"[$i]uas", array('class'=>'input-small', 'id'=>'uas')); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php endforeach; ?>
	<?php endforeach; ?>
		</tbody>
	</table>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'warning',
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
		//'nis',
		array(
			'name'=>'Nama',
			'value'=>'$data->nis0->nama_lengkap',
		),
		//'nis0.nama_lengkap',
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
		//'id_nilai',
		array(
			'header'=>'MENU',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget(); ?>