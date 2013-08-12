<?php
$this->breadcrumbs=array(
	'Pendaftars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pendaftar','url'=>array('index')),
	array('label'=>'Manage Pendaftar','url'=>array('admin')),
);
?>


	<?php
	$this->widget('bootstrap.widgets.TbWizard', array(
	        'type' => 'tabs', // 'tabs' or 'pills'
	        'pagerContent' => '
				<div style="float:right">
					<input type="button" class="btn button-next" name="next" value="Next" />
					<input type="button" class="btn button-last" name="last" value="Last" />
					</div>
					<div style="float:left">
						<input type="button" class="btn button-first" name="first" value="First" />
						<input type="button" class="btn button-previous" name="previous" value="Previous" />
					</div><br /><br />',
				'options' => array(
					'nextSelector' => '.button-next',
					'previousSelector' => '.button-previous',
					'firstSelector' => '.button-first',
					'lastSelector' => '.button-last',	
					'onTabShow' => 'js:function(tab, navigation, create) {
						var $total = navigation.find("li").length;
						var $current = index+1;
						var $percent = ($current/$total) * 100;
						$("#wizard-bar > .bar").css({width:$percent+"%"});
					}',
					'onTabClick' => 'js:function(tab, navigation, index) {
						alert("Tab Click Disabled");return false;
					}',
				),
	    'tabs' => array(
	        array('label' => 'Create', 'content' => $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4), true), 'active' => true),
	    	//array('label' => 'Manage', 'content' => $this->renderPartial('admin', array('model'=>$model),true)),
	    ),
	));
	?>
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php //echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4)); ?>