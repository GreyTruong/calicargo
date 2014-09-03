<!DOCTYPE html>
<html ng-app='calicargo' lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Notebook | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/bootstrapValidator.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/k-custom.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo HelperUrl::baseUrl()?>css/app.css" type="text/css" />
  
  <!--[if lt IE 9]>
    <script src="<?php echo HelperUrl::baseUrl()?>js/ie/html5shiv.js"></script>
    <script src="<?php echo HelperUrl::baseUrl()?>js/ie/respond.min.js"></script>
    <script src="<?php echo HelperUrl::baseUrl()?>js/ie/excanvas.js"></script>
  <![endif]-->
  
</head>
<body>
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo HelperUrl::baseUrl()?>images/logo.png" class="m-r-sm">Notebook</a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
            
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
                <img src="<?php echo HelperUrl::baseUrl()?>images/avatar.jpg">
            </span>
            John.Smith <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
              <a href="#">Settings</a>
            </li>
            <li>
              <a href="profile.html">Profile</a>
            </li>
            <li>
              <a href="#">
                <span class="badge bg-danger pull-right">3</span>
                Notifications
              </a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo HelperUrl::baseUrl()?>admin/logout"  >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
      <section>
      <section class="hbox stretch">
        <!-- .aside -->
        