<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Awesome Bubble Navigation with jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Awesome Bubble Navigation with jQuery" />
        <meta name="keywords" content="jquery, circular menu, navigation, round, bubble"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/css/style.css" type="text/css" media="screen"/>
        <!-- The JavaScript -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/jqueryjquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#nav > div').hover(
                function () {
                    var $this = $(this);
                    $this.find('img').stop().animate({
                        'width'     :'199px',
                        'height'    :'199px',
                        'top'       :'-25px',
                        'left'      :'-25px',
                        'opacity'   :'1.0'
                    },500,'easeOutBack',function(){
                        $(this).parent().find('ul').fadeIn(700);
                    });

                    $this.find('a:first,h2').addClass('active');
                },
                function () {
                    var $this = $(this);
                    $this.find('ul').fadeOut(500);
                    $this.find('img').stop().animate({
                        'width'     :'52px',
                        'height'    :'52px',
                        'top'       :'0px',
                        'left'      :'0px',
                        'opacity'   :'0.1'
                    },5000,'easeOutBack');

                    $this.find('a:first,h2').removeClass('active');
                }
            );
            });
        </script>
		<style>
            *{
                margin:0;
                padding:0;
            }
            body{
                font-family:Arial;
                background:#fff url(<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/images/bg.png) no-repeat top left;
            }
            .title{
                width:548px;
                height:119px;
                position:absolute;
                top:400px;
                left:150px;
                background:transparent url(<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/title.png) no-repeat top left;
            }
            a.back{
                background:transparent url(<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/back.png) no-repeat top left;
                position:fixed;
                width:150px;
                height:27px;
                outline:none;
                bottom:0px;
                left:0px;
            }
            #content{
                margin:0 auto;
            }


        </style>
    </head>

    <body>
        <div id="content">
        
            <div class="title"></div>

            <div class="navigation" id="nav">
                <div class="item user">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/images/bg_user.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>User</h2>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Properties</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="item home">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/images/bg_home.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Home</h2>
                    <ul>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="item shop">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/images/bg_shop.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Shop</h2>
                    <ul>
                        <li><a href="#">Catalogue</a></li>
                        <li><a href="#">Orders</a></li>
                        <li><a href="#">Offers</a></li>
                    </ul>
                </div>
                <div class="item camera">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/images/bg_camera.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Photos</h2>
                    <ul>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Prints</a></li>
                        <li><a href="#">Submit</a></li>
                    </ul>
                </div>
                <div class="item fav">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/navkeren/images/bg_fav.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Love</h2>
                    <ul>
                        <li><a href="#">Social</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Comments</a></li>
                    </ul>
                </div>
            </div>
        </div>
		
    </body>
</html>