<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Project Lodge</title>
     <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/bootstrap.css')); ?>">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/fonts/icomoon.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/vendors/css/extensions/pace.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/fa/css/font-awesome.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/app-assets/css/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/assets/css/style.css')); ?>">


  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link" style="color: #fff;">Lodge MIS</a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
              
            </ul>
            <ul class="nav navbar-nav float-xs-right">
          
              <?php if(Auth::check()): ?>
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?php echo e(asset('/app-assets/images/portrait/small/avatar-s-1.png')); ?>" alt="avatar"><i></i></span><span class="user-name"><?php echo e(Auth::user()->name); ?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
                <?php endif; ?>
              
                  <div class="dropdown-divider" ></div>
                  <a href="<?php echo e(route('logout')); ?> " class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          
        
        
       
          <li class=" nav-item"><a href="<?php echo e(url('/customers')); ?>"><i class="fa fa-users"></i>
          <span data-i18n="nav.support_documentation.main" class="menu-title">Customers</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/room-types')); ?>"><i class="fa fa-clipboard"></i>
          <span data-i18n="nav.support_documentation.main" class="menu-title">Room Type</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/rooms')); ?>"><i class="fa fa-list"></i>
          <span data-i18n="nav.support_documentation.main" class="menu-title">Room</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/bookings')); ?>"><i class="fa fa-calendar"></i>
          <span data-i18n="nav.support_documentation.main" class="menu-title">Bookings</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/reports')); ?>"><i class="fa fa-clipboard"></i>
          <span data-i18n="nav.support_documentation.main" class="menu-title">Reports</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/payments')); ?>"><i class="fa fa-dollar"></i>
          <span data-i18n="nav.support_documentation.main" class="menu-title">Payments</span></a>
          </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->


            <?php echo $__env->yieldContent('content'); ?>


        </div>
      </div>
    </div>
  


  
 <!-- BEGIN VENDOR JS-->
    <script src="<?php echo e(asset('/app-assets/js/core/libraries/jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/ui/tether.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/js/core/libraries/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/ui/unison.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/ui/blockUI.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/ui/jquery.matchHeight-min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/ui/screenfull.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/app-assets/vendors/js/extensions/pace.min.js')); ?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo e(asset('/app-assets/vendors/js/charts/chart.min.js')); ?>'" type="text/javascript"></script>
  </body>
</html>
