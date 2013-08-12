<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
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
	<div class="accordion" id="accordion2">
<?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse');?>
<div class="accordion-group">
  <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          OPERATIONS
      </a>
  </div>
  <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
      	<?php 
		$this->widget('bootstrap.widgets.TbTabs', array(
				'type'=>'pills',
				//'stacked'=>true,
				'placement'=>'bellow', //property: above, right, bellow, or left
				'tabs'=>$this->menu,
		));
		?>
      </div>
  </div>
</div>
<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
           <strong> <?php echo CHtml::encode($this->pageTitle); ?></strong>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
        <?php echo $content; ?>
        </div>
    </div>
</div>
<?php $this->endWidget();?>
</div>
</div><!-- content -->
<?php $this->endContent(); ?>