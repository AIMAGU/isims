<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="error">

</div>

<style>
  .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
</style>
<title>Error 404</title>
<body>
  <div class="hero-unit center">
    <h1>Page Not Found <small><font face="Tahoma" color="red">Error <?php echo $code; ?></font></small></h1>
    <br />
    <p><?php echo CHtml::encode($message); ?></p>
    <a href="site-index.html" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> BERANDA</a>
  </div>
  <br />
 <!-- 
<div class="thumbnail">
  <h2 class="text-center">Recent Content :</h2>
</div>
  <br />
  <div class="thumbnail span3 center">
    <h3>Try This...</h3>
    <p>write about your error page conent here and give some fool a good load of information or not</p>
    <div class="hero-unit">
      <img src="http://placehold.it/100x100">
      <p></p>
    </div>
    <a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
  </div>
  <div class="thumbnail span3 center"> 
    <h3>Try This...</h3>
    <p>write about your error page conent here and give some fool a good load of information or not</p>
    <div class="hero-unit">
      <img src="http://placehold.it/100x100">
      <p></p>
    </div>
    <a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
  </div>
      <div class="thumbnail span3 center">
    <h3>Try This...</h3>
    <p>write about your error page conent here and give some fool a good load of information or not</p>
    <div class="hero-unit">
      <img src="http://placehold.it/100x100">
      <p></p>
    </div>
    <a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
  </div>
      <div class="thumbnail span3 center">
    <h3>Try This...</h3>
    <p>write about your error page conent here and give some fool a good load of information or not</p>
    <div class="hero-unit">
      <img src="http://placehold.it/100x100">
      <p></p>
    </div>
    <a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
  </div>
  <br />
  <p></p>
   -->
    
  <!-- By ConnerT HTML & CSS Enthusiast -->  