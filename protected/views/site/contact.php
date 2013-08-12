<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div class="span-13">
<div class="thumbnail">
<h1>Kontak Kami</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Tuliskan pendapat, kritik dan saran anda disini agar dapat meningkatkan kwalitas instansi kami. Terima kasih atas partisipasi anda.
</p>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>false,
	//Untuk setFokus kursor
	'focus'=>array($model,'name'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'judul pesan'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128, 'class'=>'span5')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pesan anda'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>
	</div>

	<?php if(extension_loaded('gd')): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode', array('placeholder'=>'salin kode captcha disini')); ?>
		</div>
	</div>
	<?php endif; ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Kirim', 'icon'=>'icon-ok icon-white','type'=>'danger')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Ulangi', 'icon'=>'icon-refresh icon-white','type'=>'danger')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<?php endif; ?>


<div class="span-12">
	<div class="thumbnail">
		<?php $this->widget('bootstrap.widgets.TbCarousel', array(
			'items'=>array(
					array(
						'image'=>Yii::app()->request->baseUrl.'/images/slider/6.jpg',
						'label'=>'Third Thumbnail label',
						'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. ' .
							'Donec id elit non mi porta gravida at eget metus. ' .
							'Nullam id dolor id nibh ultricies vehicula ut id elit.'),
					array(
						'image'=>Yii::app()->request->baseUrl.'/images/slider/5.jpg',
						'label'=>'Four Thumbnail label',
						'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. ' .
						'Donec id elit non mi porta gravida at eget metus. ' .
						'Nullam id dolor id nibh ultricies vehicula ut id elit.'),
			  ),
		));
		?>
	</div>
	<?php 
if(Yii::app()->user->isGuest){?>
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
		'heading'=>$this->pageTitle=Yii::app()->name,
		)); ?>
		<p>Selamat datang di Sistem Informasi Pengolahan Nilai Siswa. Gunakan aplikasi dengan bijak!</p><hr>
		<p>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'type'=>'danger',
		    'size'=>'small',
			'icon'=>'icon-hand-right icon-white',
		    'label'=>'Mulai Sekarang',
			'url'=>array('site/login'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'type'=>'danger',
		    'size'=>'small',
			'icon'=>'icon-search icon-white',
		    'label'=>'Pencarian Nilai',
			'url'=>array('nilai/index'),
		)); ?>
		</p>
		 
<?php $this->endWidget(); ?>
<?php } ?>
</div>