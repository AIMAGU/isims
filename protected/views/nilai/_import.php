<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'nilai-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
<?php echo $form->errorSummary($model); ?>
<center>
	Pilih Lokasi : 
	<?php echo $form->fileField($model,'filee',array('size'=>1000,'maxlength'=>10000)); ?>		
	<?php echo CHtml::submitButton('Unggah', array('class'=>'btn submit')); ?>
</center>
<?php $this->endWidget(); ?>
