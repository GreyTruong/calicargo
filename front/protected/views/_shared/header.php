<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="<?php echo HelperUrl::baseUrl(); ?>css/themes/start/jquery.ui.all.css" rel="stylesheet"/>
<!--        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/ui-lightness/jquery-ui.css" type="text/css" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo HelperUrl::baseUrl(); ?>css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo HelperUrl::baseUrl(); ?>js/fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo HelperUrl::baseUrl(); ?>css/style.css?v=05102012" />

        <title>Blog Center Control Panel</title>
        <script>
            var baseUrl = '<?php echo HelperUrl::baseUrl();; ?>';
            var ticketTax = '<?php echo Yii::app()->getParams()->itemAt('ticket_tax'); ?>';
        </script>
    </head>

    <body>

        <header>
            <div class="navbar navbar-fixed-top navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar " data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>                       
                        <a href="<?php echo HelperUrl::baseUrl(); ?>" class="brand">SoinCore.com</a>
                        <div class="nav-collapse">
                            <ul class="nav pull-left">
                                <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a></li>
                            </ul>
                            <?php if (UserControl::LoggedIn()) : ?>
                                <ul class="nav pull-right">                                   
                                    
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo UserControl::getTitle() ?> (<?php echo UserControl::getRole(); ?>)<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo HelperUrl::baseUrl(); ?>admin/password">Change Password</a></li>
                                            <li><a href="<?php echo HelperUrl::baseUrl(); ?>admin/logout">Logout</a></li>
                                        </ul>
                                    </li> 
                                    
                                </ul>
                            <?php endif; ?>

                            <?php /* if (!UserControl::LoggedIn()): ?>
                                <ul class="nav pull-right">
                                    
                                    <li><a href="<?php echo HelperUrl::baseUrl(); ?>home/language/lang/vn">Tiếng việt</a></li>
                                    <li><a href="<?php echo HelperUrl::baseUrl(); ?>home/language/lang/en">English</a></li>
                                </ul>
                            <?php endif; */ ?>
                        </div>
                    </div> 
                </div>
            </div>
        </header>