<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'kecamatan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<p>   
<?php echo CHtml::dropDownList('idprop','', CHtml::listData(Propinsi::model()->getPropinsi(),'idprop','nama_prop'),
			array('empty' => 'Pilih Prop', 'ajax' => array(  
            'type'=>'POST', //request type  
            'url'=>CController::createUrl('kabupaten/dinamis2'), //url to call.  
            'data'=>'js:"idprop="+jQuery(this).val()',  
            'update'=>'#idkab', //selector to update  
            ))); ?>  
   
</p>

<p>   
    <?php 
    $idprop=Yii::app()->db->createCommand("select idprop from kabupaten;")->queryScalar();

    		echo $form->dropDownList($model,'idkab', Kabupaten::model()->getStateOptions($idprop), array('id'=>'idkab','empty' => 'Pilih Kab', 'ajax' => array(  
            'type'=>'POST', //request type  
            'url'=>CController::createUrl('kecamatan/dinamis'), //url to call.  
            'data'=>'js:"idkab="+jQuery(this).val()',  
            'update'=>'#idkec', //selector to update  
            ))); ?>  
   
</p>  
  
<p>    
    <?php echo $form->dropDownList($model,'idkec',Kecamatan::model()->getCityOptionsByState($model->idkab), array('id'=>'idkec'));?> 
</p> 

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>