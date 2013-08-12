<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'focus'=>array($model,'nis'),
)); ?>

	<?php echo $form->textFieldRow($model,'nis',array('class'=>'span5', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Masukkan kata kunci. Hilangkan angka "0"')); ?>
	
	<?php $mapel = CHtml::listData(MataPelajaran::model()->findAll(array(
		'order'=>'kode_mapel, mapel ASC',
		'select' => 'kode_mapel, mapel',
		//'group' => 'kode_mapel, mapel',
		'distinct' => true,
		)), 'kode_mapel', 'mapel');
	?>
	<?php echo $form->dropDownListRow($model, 'kode_mapel', $mapel, array('class'=>'span5', 'empty' => '-- Pilih Mata Pelajaran --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih Mata Pelajar dan Hilangkan angka "0" pada nis')); ?>

	<?php //echo $form->textFieldRow($model,'kode_mapel',array('class'=>'span5','maxlength'=>6)); ?>
	
	<?php $kelas = CHtml::listData(Lokal::model()->findAll(array(
		'order'=>'kelas ASC',
		'select' => 'kelas',
		'distinct' => true,
		)), 'kelas', 'kelas');
	?>
	<?php echo $form->dropDownListRow($model, 'kelas', $kelas, array('class'=>'span5', 'empty' => '-- Pilih Kelas --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih kelas')); ?>
	
	<?php $lokal = CHtml::listData(Lokal::model()->findAll(array(
		'order'=>'lokal ASC',
		'select' => 'lokal',
		'distinct' => true,
		)), 'lokal', 'lokal');
	?>
	<?php echo $form->dropDownListRow($model, 'lokal', $lokal, array('class'=>'span5', 'empty' => '-- Pilih Lokal --', 'rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Langkah 1 Pilih lokal')); ?>
	
	<?php //echo $form->textFieldRow($model,'kelas',array('class'=>'span5','maxlength'=>1)); ?>
	<?php //echo $form->textFieldRow($model,'lokal',array('class'=>'span5','maxlength'=>1)); ?>
	
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
			'buttonType' => 'submit',
			'type'=>'danger',
			'icon'=>'icon-search icon-white',
			'label'=>'CARI ',
			'htmlOptions' => array('rel'=>'tooltip', 'data-placement'=>'left', 'title'=>'Langkah 2 Klik untuk melihat nilai')
		)); ?>
	<?php /* $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button', 
			'url'=>'#',
			'type'=>'danger',
			'icon'=>'icon-list-alt icon-white',
			'label'=>'LIHAT HASIL',
			'htmlOptions' => array('class'=>'search-button', 'data-placement'=>'right', 'rel'=>'tooltip', 'title'=>'Langkah 3 (Bantuan)')
		)); */ ?>
	</div>

<?php $this->endWidget(); ?>
