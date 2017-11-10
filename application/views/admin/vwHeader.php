<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo HTTP_CSS_PATH; ?>favicon.png">
    <title>Free Codeigniter Admin Panel with Twitter Bootstrap 3.0 - .arkAdminPanel Ver 1.0</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo HTTP_JS_PATH; ?>html5shiv.js"></script>
      <script src="<?php echo HTTP_JS_PATH; ?>respond.min.js"></script>
    <![endif]-->
     <link href="<?php echo HTTP_CSS_PATH; ?>fam-icons.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="/vendor/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
     <script type="text/javascript">var ckfinder_config = "<?=base_url()?>";</script>
  </head>
<body>
    <?php
    $pg = isset($page) && $page != '' ?  $page :'dash'  ;    
    ?>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">ARK Admin Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php echo  $pg =='dash' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li <?php echo  $pg =='user' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/users">Users</a></li>
            <li <?php echo  $pg =='catagory' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/catagory">Catagory</a></li>
            <li <?php echo  $pg =='product' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/product">Products</a></li>
            <li <?php echo  $pg =='project' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/project">Projects</a></li>
            <li <?php echo  $pg =='customer' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/customer">Customer</a></li>
            <li <?php echo  $pg =='contact' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>admin/contacts">Contacts</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Change Password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>admin/home/logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
