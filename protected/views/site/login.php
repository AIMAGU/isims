<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

/*$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);*/
?>

<!-- <h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p> -->
<center>
<div class="span-6">
<div id="sidebar">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
	'focus'=>array($model,'username'),
)); ?>
<div class="thumbnail">
<?php echo $form->textFieldRow($model, 'username', array('class'=>'span2', 'prepend'=>'<i class="icon-user"></i>')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span2', 'prepend'=>'<i class="icon-barcode"></i>')); ?>

<?php //echo $form->checkboxRow($model, 'rememberMe', array('type'=>'inline')); ?><br>

<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger', 'buttonType'=>'submit', 'label'=>'Login', 'size' => 'small', 'icon'=>'icon-lock icon-white')); ?>


<div class="form-actions">
<?php 
	if(Yii::app()->user->id==''){?>
		<object type="application/x-shockwave-flash" data="<?php echo Yii::app()->request->baseUrl; ?>/css/play/player_mp3_maxi.swf" width="187" height="20">
			<param name="wmode" value="transparent" />
			<param name="movie" value="<?php echo Yii::app()->request->baseUrl; ?>/css/play/player_mp3_maxi.swf" />
			<param name="FlashVars" value="mp3=<?php echo Yii::app()->request->baseUrl; ?>/css/play/guru.mp3&amp;bgcolor1=ffffff&amp;bgcolor2=cccccc&amp;buttoncolor=999999&amp;buttonovercolor=0&amp;slidercolor1=cccccc&amp;slidercolor2=999999&amp;sliderovercolor=666666&amp;textcolor=0&amp;autoplay=1&amp;showvolume=1" />
		</object>
<?php }	?>
</div>
</div>
<?php $this->endWidget(); ?>
</div></div>
</center>
<div class="span-20">
<div id="content">
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
		'heading'=>$this->pageTitle=Yii::app()->name.'',
		)); ?>
		<H3>SUB SYSTEM PENILAIAN</H3>
<?php $this->endWidget(); ?>
</div></div>