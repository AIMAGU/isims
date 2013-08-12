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
	'focus'=>array($model,'na'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<!-- Membuat link untuk popup (Dialog) untuk field NIS dengan memberi id=mydialog -->
	<?php //echo $form->textFieldRow($model,'nis',array('class'=>'span5', 'hint' => 'Silahkan tekan tombol <a href="#" onclick=$("#mydialog").dialog("open"); return false; class="btn submit">+</a> untuk melihat daftar siswa.')); ?>
	
	<?php $this->widget('application.extensions.moneymask.MMask',array(
		'element'=>'#na, #un, #uas',
		'config'=>array(
			'precision'=>0,
			'thousands'=>'.',
		)
	));
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
	
	<?php 
	$jadwal=Jadwal::model()->findAll(array(
			//'select'=>'kode_guru, kode_mapel',
			'condition'=>"kode_guru='".Yii::app()->user->id."'",
	));
	foreach ($jadwal as $pg=>$pgi):
	?>
	<pre>
	<?php echo "Nama		: ".$pgi->kodeGuru->nama_guru." (".$pgi->kode_guru.")".$form->hiddenField($model,"kode_guru",array('value'=>$pgi['kode_guru'])); ?>
				<?php echo "Semester	: ".$smt; ?>

	<?php echo "Mata Pelajaran	: ".$pgi->kodeMapel->kodeMapel->mapel." (".$pgi['kode_mapel'].")".$form->hiddenField($model,"kode_mapel",array('value'=>$pgi['kode_mapel'])); ?>
				<?php echo "Tahun Ajar	: ".$th_ajar; ?>
	</pre>
	
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>NIS</th>
			<th>NAMA</th>
			<th>NILAI AKHIR</th>
			<?php 
				$kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
				if($kelas==6){
					echo "<th>UJIAN NASIONAL</th>
					<th>UJIAN SEKOLAH</th>";
				}
			?>
			<th>SIMPAN</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$siswa=Penempatan::model()->findAll(array(
				//'select'=>'*',
				'order'=>'nis ASC',
				'condition'=>"kelas='".$pgi['kelas']."' and lokal='".$pgi['lokal']."' and th_ajar='".$th_ajar."'",
			));
			/*$siswa=Penempatan::model()->with('nilais')->findAll(array(
				'order'=>'nilais.nis ASC',
				//'condition'=>"nilais.kelas='".$pgi['kelas']."' and nilais.lokal='".$pgi['lokal']."' and nilais.th_ajar='".$th_ajar."'",
			));

			$siswa=Penempatan::model()->with(array(
				'nilais'=>array(
						'select'=>'*',
						'joinType'=>'LEFT JOIN',
						'condition'=>"nilais.kelas=".$pgi['kelas']." and nilais.lokal='".$pgi['lokal']."'",
				),
			))->findAll();*/

			foreach ($siswa as $i=>$ii): 
		?>	
		<?php echo $form->hiddenField($model,"[$i]lokal", array('value'=>$ii['lokal'])); ?>
		<?php echo $form->hiddenField($model,"[$i]kelas", array('value'=>$ii['kelas'])); ?>
		<?php echo $form->hiddenField($model,"[$i]nis",array('value'=>$ii['nis'])); ?>
			<tr>
				<td><?php echo $ii->nis; ?></td>
				<td><?php echo $ii->nis0->nama_lengkap ?></td>
				<td><?php echo $form->textField($model,"[$i]na", array('class'=>'input-small', 'id'=>'na', 'placeholder'=>
					Yii::app()->db->createCommand("select na from nilai where nis=".$ii->nis." and kelas='".$pgi['kelas']."' and lokal='".$pgi['lokal']."' and th_ajar='".$th_ajar."' and kode_guru='".Yii::app()->user->id."'")->queryScalar()
				)); ?></td>
				<?php if($kelas==6){ ?>
				<td><?php echo $form->textField($model,"[$i]un", array('class'=>'input-small', 'id'=>'un')); ?></td>
				<td><?php echo $form->textField($model,"[$i]uas", array('class'=>'input-small', 'id'=>'uas')); ?></td>
				<?php } ?>
				<td><?php $this->widget('bootstrap.widgets.TbButton', array(
					'label'=>'SAVE', 
					'size'=>'mini',
					'icon'=>'icon-ok icon-white',
					'type'=>'danger',
					'url'=>'#',
					'htmlOptions'=>array(
							'submit'=>array('create', 'nis'=>$ii['nis'], 'no'=>$i),
							'confirm'=>'Apakah nilai yang anda masukkan sudah benar?',
					)
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'url'=>'#',
					'type'=>'danger',
					'icon'=>'icon-refresh icon-white',
					'htmlOptions'=>array('submit'=>array('delete','id'=>$ii->nis,'id2'=>$pgi['kode_mapel'],'id3'=>$th_ajar,'id4'=>$smt),
					'confirm'=>'Apakah anda ingin mengganti nilai ini?')
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'url'=>'#',
					'type'=>'danger',
					'icon'=>'icon-share icon-white',
					'htmlOptions'=>array('submit'=>array('view','id'=>$ii->nis,'id2'=>$pgi['kode_mapel'],'id3'=>$th_ajar,'id4'=>$smt),
					'confirm'=>'Apakah anda ingin melihat nilai ini?')
				)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'type'=>'danger',
			'icon'=>'icon-plus icon-white',
			'toggle'=>true,
			'label'=>$model->isNewRecord ? 'SIMPAN SEMUA' : 'Save',
			'url'=>'#',
			'htmlOptions'=>array(
				'submit'=>array('create'),
				'confirm'=>'Pastikan nilai sudah terisi semua. Apakah nilai yang anda masukkan sudah benar?',
			)
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset', 
			'label'=>'Ulangi', 
			'icon'=>'icon-refresh icon-white',
			'type'=>'danger',
		)); ?>
		
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