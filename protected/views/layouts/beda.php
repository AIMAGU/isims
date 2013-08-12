<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/mainbeda'); ?>
<div id="content">
	<?php
		$this->widget('ext.etoastr.EToastr',array(
		    'flashMessagesOnly'=>true, //default to false
		    'message'=>'will be ignored', //because flashOnlyMessages is true
		    //the options passed to the plugin
		    'options'=>array(
		        'positionClass'=>'toast-top-right',
		        'fadeOut'   =>  1000,
		        'timeOut'   =>  10000,
		        'fadeIn'    =>  1000
		        )
		    ));
		?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
		<?php 
		$this->widget('bootstrap.widgets.TbAlert', array(
				'block'=>true, // display a larger alert block?
				'fade'=>true, // use transitions?
				'closeText'=>'x', // close link text - if set to false, no close link is displayed
				'alerts'=>array( // configurations per alert type
						'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'x'), // success, info, warning, error or danger
				),
		));
		?>
		<?php endif; ?>
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>