<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'placement'=>'above', // 'above', 'right', 'below' or 'left'
	'tabs' => array(
		array('label' => '1 A', 'active'=>true, 'content' => $this->renderPartial('senin1a', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 1A')),
		array('label' => '1 B', 'content' => $this->renderPartial('senin1b', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 1B')),
		array('label' => '1 C', 'content' => $this->renderPartial('senin1c', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 1C')),
		array('label' => '2 A', 'content' => $this->renderPartial('senin2a', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 2A')),
		array('label' => '2 B', 'content' => $this->renderPartial('senin2b', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 2B')),
		array('label' => '2 C', 'content' => $this->renderPartial('senin2c', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 2C')),
		array('label' => '3 A', 'content' => $this->renderPartial('senin3a', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 3A')),
		array('label' => '3 B', 'content' => $this->renderPartial('senin3b', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 3B')),
		array('label' => '3 C', 'content' => $this->renderPartial('senin3c', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 3C')),
		array('label' => '4 A', 'content' => $this->renderPartial('senin4a', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 4A')),
		array('label' => '4 B', 'content' => $this->renderPartial('senin4b', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 4B')),
		array('label' => '4 C', 'content' => $this->renderPartial('senin4c', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 4C')),
		array('label' => '5 A', 'content' => $this->renderPartial('senin5a', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 5A')),
		array('label' => '5 B', 'content' => $this->renderPartial('senin5b', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 5B')),
		array('label' => '5 C', 'content' => $this->renderPartial('senin5c', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 5C')),
		array('label' => '6 A', 'content' => $this->renderPartial('senin6a', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 6A')),
		array('label' => '6 B', 'content' => $this->renderPartial('senin6b', array('model'=>$model), true),'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 6B')),
		array('label' => '6 C', 'content' => $this->renderPartial('senin6c', array('model'=>$model), true), 'itemOptions'=>array('rel'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Kelas 6C')),
	),
));
?>