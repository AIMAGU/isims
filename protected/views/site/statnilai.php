
<?php
$label=array();
$nilai=array();

foreach($setnilai->getData() as $i=>$ii)
{
    $label[$i]=$ii['na']; // STATUS
    $nilai[$i]=(int)$ii['count']; //JUMLAH ATAU COUNT NIS
}

$this->widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   		'title' => array('text' => 'DATA NILAI SISWA (KODE GURU-'.Yii::app()->user->id.')'),
     	'chart'=> array('defaultSeriesType'=>'column',),
     	'legend'=>array('enabled'=>false),
   		
      	'xAxis'=>array('categories'=>$label, 'title' => array(
			'text' => 'NILAI SISWA'
		)),
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