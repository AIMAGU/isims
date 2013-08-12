<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="span-8">
<?php
$label=array();
$nilai=array();

foreach($presensismt->getData() as $i=>$ii)
{
    $label[$i]=$ii['status']; // STATUS
    $nilai[$i]=(int)$ii['jum']; //JUMLAH ATAU COUNT NIS
}

$this->widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   		'title' => array('text' => 'PRESENSI SISWA (SEMESTER)'),
     	'chart'=> array('defaultSeriesType'=>'column'),
     	'legend'=>array('enabled'=>false),
   		//'theme' => 'gray',
   		'exporting' => array('enabled' => false),
      	'xAxis'=>array('categories'=>$label, 'title' => array('text' => 'S=Sakit | I=Izin | A=Alpha')),
		'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'JUMLAH'
            ),
        ),
      	'series' => array(
        	array(
        		'data' => $nilai, 
        		'cursor'=> 'pointer',
   				'point' => array(
   						'events'=> array(
   								'click'=> 'js:function() {
                               window.location.replace("'.$this->createUrl("site/index").'");
                            }'
   						),
   				),)
      	),
      	'tooltip' => array('formatter' => 'js:function() {return "<b>"+this.point.name+"</b> :"+this.y; }'),
      	'tooltip' => array('formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'),
      	'plotOptions'=>array(
			'pie'=>(array(
	        		'allowPointSelect'=>true,
	                'showInLegend'=>true,
	                'cursor'=>'pointer',
	        )),
			'column'=> array (
			'dataLabels'=> array (
					'enabled'=> true,
					'color'=> 'colors[0]',
					'style'=> array (
							'fontWeight'=> 'bold'
			)))                 
        ),
      	'credits'=>array('enabled'=>false),
   )
));
?>
</div>

<div class="span-8">
<?php
$label=array();
$nilai=array();

foreach($presensibulan->getData() as $i=>$ii)
{
    $label[$i]=$ii['status']; // STATUS
    $nilai[$i]=(int)$ii['jum']; //JUMLAH ATAU COUNT NIS
}

$this->widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   		'title' => array('text' => 'PRESENSI SISWA (BULAN)'),
     	'chart'=> array('defaultSeriesType'=>'column',),
     	'legend'=>array('enabled'=>false),
   		//'theme' => 'gray',
   		'exporting' => array('enabled' => false),
      	'xAxis'=>array('categories'=>$label, 'title' => array('text' => 'S=Sakit | I=Izin | A=Alpha')),
		'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'JUMLAH'
            ),
        ),
      	'series' => array(
        	array('data' => $nilai)
      	),
      	'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      	'tooltip' => array(
			'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      	),
      	'plotOptions'=>array(
			'pie'=>(array(
	        		'allowPointSelect'=>true,
	                'showInLegend'=>true,
	                'cursor'=>'pointer',
	        )),
			'column'=> array (
			'dataLabels'=> array (
					'enabled'=> true,
					'color'=> 'colors[0]',
					'style'=> array (
							'fontWeight'=> 'bold'
			)))                 
        ),
      	'credits'=>array('enabled'=>false),
   )
));
?>
</div>

<div class="span-8">
<?php
$label=array();
$nilai=array();

foreach($presensihari->getData() as $i=>$ii)
{
    $label[$i]=$ii['status']; // STATUS
    $nilai[$i]=(int)$ii['jum']; //JUMLAH ATAU COUNT NIS
}

$this->widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   		'title' => array('text' => 'PRESENSI SISWA (HARI)'),
     	'chart'=> array('defaultSeriesType'=>'column',),
     	'legend'=>array('enabled'=>false),
   		//'theme' => 'gray',
   		'exporting' => array('enabled' => false),
      	'xAxis'=>array('categories'=>$label, 'title' => array('text' => 'S=Sakit | I=Izin | A=Alpha')),
		'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'JUMLAH'
            ),
        ),
      	'series' => array(
        	array('data' => $nilai)
      	),
      	'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      	'tooltip' => array(
			'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      	),
      	'plotOptions'=>array(
			'pie'=>(array(
	        		'allowPointSelect'=>true,
	                'showInLegend'=>true,
	                'cursor'=>'pointer',
	        )),
			'column'=> array (
			'dataLabels'=> array (
					'enabled'=> true,
					'color'=> 'colors[0]',
					'style'=> array (
							'fontWeight'=> 'bold'
			)))                 
        ),
      	'credits'=>array('enabled'=>false),
   )
));
?>
</div>
<div class="clear"></div>