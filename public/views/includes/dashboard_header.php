<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title><?=config_item('app_name');?> - Dashboard</title>
  <!-- loader-->
  <link href="<?=config_item('base_url');?>dash/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="<?=config_item('base_url');?>dash/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="<?=config_item('base_url');?>assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="<?=config_item('base_url');?>dash/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="<?=config_item('base_url');?>dash/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?=config_item('base_url');?>dash/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?=config_item('base_url');?>dash/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?=config_item('base_url');?>dash/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="<?=config_item('base_url');?>dash/assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?=config_item('base_url');?>dash/assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme12">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index">
       <img src="<?=config_item('base_url');?>assets/images/logo.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text"><?=config_item('app_name');?> Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li class="<?php if( $title == 'Dashboard'){ echo 'active'; }?>">
        <a href="index">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="<?php if( $title == 'Deposit'){ echo 'active'; }?>">
        <a href="deposit">
          <i class="zmdi zmdi-invert-colors"></i> <span>Deposit</span>
        </a>
      </li>

      <li class="<?php if( $title == 'Market'){ echo 'active'; }?>">
        <a href="market">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Market Place</span>
        </a>
      </li>

      <li class="<?php if( $title == 'Transfer'){ echo 'active'; }?>">
        <a href="transfer">
          <i class="zmdi zmdi-grid"></i> <span>Transfer Balance</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>

      <li class="<?php if( $title == 'Referral'){ echo 'active'; }?>">
        <a href="referral">
          <i class="zmdi zmdi-calendar-check"></i> <span>My Referrals</span>
        </a>
      </li>

      <li class="<?php if( $title == 'Profile'){ echo 'active'; }?>">
        <a href="profile">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>

      <li class="<?php if( $title == 'Login History'){ echo 'active'; }?>">
        <a href="login_history" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Login History</span>
        </a>
      </li>

       <li class="<?php if( $title == 'Support'){ echo 'active'; }?>">
        <a href="support" target="_blank">
          <i class="zmdi zmdi-account-circle"></i> <span>Support</span>
        </a>
      </li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <?php /*
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    */?>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="<?=config_item('base_url');?>dash/uploads/110.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?=$name;?></h6>
            <p class="user-subtitle"><?=$email;?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="support"><i class="icon-envelope mr-2"></i> Support</li></a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="market"><i class="icon-wallet mr-2"></i> Market Place</li></a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="profile"><i class="icon-settings mr-2"></i> Profile</li></a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href=""><i class="icon-power mr-2"></i></a>
          <a href="<?=base_url('logout');?>">Logout</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->