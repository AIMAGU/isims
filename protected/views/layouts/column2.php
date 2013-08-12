<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-22">
	<div id="content">
		<div class="thumbnail">
		<!-- set pesan saat sukses -->
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
		
		<!-- Deklarasi konten -->
		<?php echo $content; ?>
		</div>
	</div><!-- content -->
</div>

<div class="span-5 last">
	<div id="sidebar">
		<?php 
		$this->widget('bootstrap.widgets.TbTabs', array(
				'type'=>'tabs',
				'stacked'=>true,
				//'placement'=>'left', //property: above, right, bellow, or left
				'tabs'=>$this->menu,
		));
		?>
		<p class="text-center">
		<?php 
		$this->widget('bootstrap.widgets.TbBadge', array(
				'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
				'label'=>date('d M Y | H:i').' WIB',
		));
		?>
		</p>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>