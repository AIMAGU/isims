<?php
/* @var $this SiteController */
?>

<div class="accordion" id="accordion2">
<?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse');?>
<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
           <span class="icon-chevron-right"></span> <strong>STATISTIK PRESENSI SISWA</strong>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
    <!--<div id="collapseOne" class="accordion-body collapse in">-->
        <div class="accordion-inner">
        <?php echo $this->renderPartial('statpresensismt', array('presensibulan'=>$presensibulan, 'presensismt'=>$presensismt, 'presensihari'=>$presensihari)); ?>
        </div>
    </div>
</div>
<div class="accordion-group">
  <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3">
          <span class="icon-chevron-right"></span><strong> STATISTIK JURNAL MENGAJAR</strong>
      </a>
  </div>
  <div id="collapse3" class="accordion-body collapse">
      <div class="accordion-inner">
      	<?php echo $this->renderPartial('statjurnal', array('jurnal'=>$jurnal)); ?>
      </div>
  </div>
</div>
<div class="accordion-group">
  <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
         <span class="icon-chevron-right"></span><strong> STATISTIK NILAI SISWA </strong>
      </a>
  </div>
  <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
      	<?php echo $this->renderPartial('statnilai', array('setnilai'=>$setnilai)); ?>
      </div>
  </div>
</div>
<?php $this->endWidget();?>
</div>

<div class="clear"></div>