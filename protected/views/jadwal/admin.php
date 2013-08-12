<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Jadwal','icon'=>'icon-list-alt', 'url'=>array('index')),
	array('label'=>'Create Jadwal','icon'=>'icon-plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('Jadwal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'left', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => 'SENIN', 'active'=>true, 'content' => $this->renderPartial('senin', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jadwal Hari Senin')),
		array('label' => 'SELASA', 'content' => $this->renderPartial('selasa', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jadwal Hari Selasa')),
		array('label' => 'RABU', 'content' => $this->renderPartial('rabu', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jadwal Hari Rabu','class'=>'disabled')),
		array('label' => 'KAMIS', 'content' => $this->renderPartial('kamis', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jadwal Hari Kamis','class'=>'disabled')),
		array('label' => 'JUMAT', 'content' => $this->renderPartial('jumat', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jadwal Hari Jumat','class'=>'disabled')),
		array('label' => 'SABTU', 'content' => $this->renderPartial('sabtu', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jadwal Hari Sabtu','class'=>'disabled')),
		array('label' => 'JUMLAH JAM', 'content' => $this->renderPartial('jam', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'right', 'title'=>'Jam Mengajar (7 hari)')),
	),
));
?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>