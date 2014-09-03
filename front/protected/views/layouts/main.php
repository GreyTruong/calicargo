<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<!-- Begin Meta Tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- End Meta Tags -->

    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" />

	<!-- Begin Stylesheets -->
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">    
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrapValidator.min.css">    
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui-1.10.3.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/rs-plugin/css/settings.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/flexslider/style.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/isotope/isotope.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colors.css">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/color-cyan.css">
    <link id="main-style" type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
    <!-- End Stylesheets -->

    <!-- Begin JavaScript ( rest of Javascript after footer area) -->
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false'></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-respond.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrapValidator.min.js"></script>  
    <!-- End JavaScript -->

	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /> -->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!-- <div class="container" id="page"> -->

<!-- 	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div> --><!-- header -->

	<!-- <div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
		/*	'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),*/
		)); ?>
	</div> --><!-- mainmenu -->

	<!-- Begin Header -->
    <header class="style-1">
        <div class="header-container">
        <div class="top-bar">
                <div class="content-inner clearfix">

                    <div class="social-icons dark clearfix">
                        <a href="https://www.facebook.com/TrendyUSvn" class="icon-facebook"><i style="padding-top: 50%" class="fa fa-facebook"></i></a>
                        <!--<a href="#" class="icon-en">EN</a>
                        <a href="#" class="icon-vie">VIE</a>-->                        
                    </div>



                    <div class="contact-info">
                        <span class="telephone" style="margin-right:10px;">Call us: (408) 719-8000</span>
                        <span class="mail">E-mail: <a href="mailto:info@calicargo.com">info@calicargo.com</a></span>
                    </div>
                </div>
            </div>
            <div class="content-inner clearfix">
                <a href="./" class="logo-container" style="padding-top: .7em" >
                    <img alt="" src="images/logo.png" >
                </a>
     
                <a href="#" class="mobile-navigation icon1-reorder"></a>
                
                <div class="menu-nav">
                    <nav>
                        <ul>
                            <li>
                                <a href="./">Home</a>                                
                            </li>
                            <li>
                                <a href="./ship-at-calicargo">Shipping Services</a>   
                                <ul>
                                	<li><a href="./ship-at-calicargo">Ship at Cali Cargo</a></li>
                                	<li><a href="./ship-from-amazon">Ship from Amazon</a></li>                                    
                                	<li><a href="./ship-through-ups">Ship through UPS</a></li> 
                                	<li><a href="./order-from-amazon">Order from Amazon</a></li>                                     
                                </ul>
                                                             
                            </li> 
                            <li>
                            	<a href="https://www.facebook.com/TrendyUSvn">Our Store </a>
                            </li>
                            <li>
                                <a href="./contact">Contact</a>                               
                            </li>
                             <li>
                                <a href="./about">About Us</a>                                
                            </li>
                            <!--
                            <li>    
                                <a href="cart.html" class="shopping-bag">
                                    <i class="icon2-cart3"></i>
                                </a>
                                <ul>
                                	<li><a href="cart.html">Shopping Cart</a></li>
                                	<li><a href="checkout.html">Check Out</a></li>                                    
                                	<li><a href="account.html">My Account</a></li>                                                                        
                                </ul> 
                            </li>  -->                           
                            
                        </ul>
                    </nav>
                </div>
     
            </div>
     
        </div>
    </header>
    <!-- End Header -->


	

	<?php echo $content; ?>


	<div class="clear"></div>

	<footer>
        <div class="content-inner clearfix">
            
            <p class="copyrights">© Copyright CaliCargo 2014. All rights reserved.</p>
        </div>
    </footer>
    <a href="#" class="back-to-top fa fa-angle-up"></a>

<div class="modal fade" id="price-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog sticky" style="width:60%;">
        <div class="modal-content">
        	<h4 class="text-center bg-orange color-white" style="margin-top:0;padding: 20px;">Cali Cargo Standard Shipping Fee</h4>
            <div class="table-responsive" style="padding:0 10px;">
                <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="bg-accent color-white text-center" colspan="3">
                                        <h6 class="color-white"  style="padding:5px; margin:0;">US CUSTOMERS (come directly to Cali Cargo Office)</h6>
                                    </td>                        
                                </tr>
                                <tr class="bg-info">
                                    <td>
                                        <span>Package Size</span>
                                    </td>
                                    <td>
                                        <span>Ho Chi Minh City</span>
                                    </td>                        
                                    <td>
                                        <span>Ha Noi & other provinces</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum 10lbs package</span>
                                    </td>
                                    <td>
                                        <span>$2.5/lb</span>
                                    </td>                        
                                    <td>
                                        <span> $3/lb to $4.5/lb</span>
                                    </td>                        
                                </tr>
                                
                                <tr>
                                    <td>
                                        <span>Package less than 10lbs: flat shipping rate (per package)</span>
                                    </td>
                                    <td>
                                        <span>$25/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$30 - $45/lb</span>
                                    </td>                        
                                </tr>
                                
                                <tr>
                                    <td class="bg-accent color-white text-center" colspan="3">
                                        <h6 class="color-white" style="padding:5px; margin:0;">VN CUSTOMERS</h6>
                                    </td>                        
                                </tr>
                                <tr class="bg-info" style="background:#d9edf7 !important;">
                                    <td class="bg-info" style="background:#d9edf7 !important;">
                                        <span>Package Size</span>
                                    </td>
                                    <td class="bg-info" style="background:#d9edf7 !important;">
                                        <span>Ho Chi Minh City</span>
                                    </td>                        
                                    <td class="bg-info" style="background:#d9edf7 !important;">
                                        <span>Ha Noi & other provinces</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum 10lbs package</span>
                                    </td>
                                    <td>
                                        <span>$3/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$4-5/lb</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>4-9 lbs</span>
                                    </td>
                                    <td>
                                        <span>$7/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$9/lb</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>1-3 lbs</span>
                                    </td>
                                    <td>
                                        <span>$10/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$12/lb</span>
                                    </td>                        
                                </tr>
                                
                            </table>
                <p class="mt0 mb0 text-center"><em>Adding shipping surcharges to products in these categories: Electronics, Beauty & Fashion accessories.</em></p>
                <p class="text-center mt0"><b><em>Our currency conversion: 1 USD = 22,000 VND</em></b></p>
                
            </div>
        </div>
      </div>
    </div>
	
    <div class="modal fade" id="amazon-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog sticky">
        <div class="modal-content" style="padding:10px;">
        	<h4 class="text-center bg-orange color-white" style="margin-top:0;padding: 10px;"><i class="fa fa-tags"></i> Order From Amazon</h4>
            <div class="divider10"></div>
            <div class="modal-body" style="padding:10px;">
                <p style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:8px;">Send us list of products you want to buy with link to website or mall location using our order FORM (click the link below). We can help order and ship them to your location.</p>      
    			<p class="text-info" style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:8px;">Order fee is 10% if your order is less than $200</p>
				<p class="text-danger" style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:12px;">5% if your order is more than $200</p>
                <p class="text-center" style="margin-bottom:0;"><a href="./order-from-amazon" class="button-small hover-bg-orange hover-border-orange bg-green border-green last-col rounded">ORDER FORM</a></p>
            </div>
            
        </div>
      </div>
    </div>

    <div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
            <h1>Processing...</h1>
        </div>
        <div class="modal-body">
            <div class="progress progress-striped active">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
    </div>

    <!-- Begin JavaScript -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/scrollTo-min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/appear.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/easy-pie-chart/easy-pie-chart.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexslider/flexslider.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/isotope/isotope.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/countTo.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/gmap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/countdown.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tweetable.jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/timeago.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tooltipster/tooltipster.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
    <!-- End JavaScript -->
    <!-- footer -->

<!-- </div> --><!-- page -->

</body>


</html>
