<?php
$this->pageTitle=Yii::app()->name . ' - Pengaturan';
$this->breadcrumbs=array(
	'Pengaturan',
);
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'PENGATURAN UMUM',
	'headerIcon' => 'icon-edit',
	'htmlOptions'=>array('class'=>'inline'),
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
));?>
<div class="span-13">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>false,
	//Untuk setFokus kursor
	'focus'=>array($model,'title'),
	'htmlOptions'=>array(
			'enctype'=>'multipart/form-data'
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'span5', 'value'=>Yii::app()->params['title'])); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtitle'); ?>
		<?php echo $form->textField($model,'subtitle',array('class'=>'span5', 'value'=>Yii::app()->params['subtitle'])); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'footer'); ?>
		<?php echo $form->textField($model,'footer',array('class'=>'span5', 'value'=>Yii::app()->params['footer'])); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class'=>'span5', 'value'=>Yii::app()->params['adminEmail'])); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Simpan', 'icon'=>'icon-ok icon-white','type'=>'danger')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Bersihkan', 'icon'=>'icon-refresh icon-white','type'=>'danger')); ?>
		<p class="note">Kolom bertanda <span class="required">*</span> harus di isi.</p>
	</div>

</div><!-- form -->
</div><!-- Tutup span -->
<div class="span-12">
<div class="thumbnail">
<?php echo $form->labelEx($model,'filee'); ?>
<p class="text-info">Ukuran Logo header maksimal 100 kb dengan type file .png<p>
<img src="<?php echo Yii::app()->request->baseUrl."/images/logo.png" ?>" alt="logo" class="img-polaroid">
	<?php echo $form->fileField($model,'filee',array('size'=>1000,'maxlength'=>10000, 'class'=>'span3',)); ?>		
	<?php echo CHtml::submitButton('Unggah', array('class'=>'btn submit')); ?>
</div>
<br>
<div class="thumbnail">
<?php echo $form->labelEx($model,'favicon'); ?>
<p class="text-info">Ukuran favicon maksimal 32x32 px dengan type file .png<p>
<img src="<?php echo Yii::app()->request->baseUrl."/css/fav.png" ?>" alt="favicon" class="img-polaroid">
	<?php echo $form->fileField($model,'favicon',array('size'=>1000,'maxlength'=>10000, 'class'=>'span3',)); ?>		
	<?php echo CHtml::submitButton('Unggah', array('class'=>'btn submit')); ?>
</div>
</div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>