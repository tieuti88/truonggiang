<?php $pg = isset($page) && $page != '' ?  $page :'home'; 
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>In Rồng Đỏ</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- Custom styles for this template -->
    <link href="/assets/css/new-age.css" rel="stylesheet">

  </head>
  
  <body id="page-top">

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"><img src="/assets/img/logo.png" alt="in rồng đỏ"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse mobile-menu" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">  
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#download">Tem Nhãn</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features">Hộp Giấy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Bao Bì </a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Name Card</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Ấn phẩm quà tặng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">đăng nhập | đăng ký</a>
            </li>
          </ul>
        </div>
        <!-- search form -->
        <div class="collapse navbar-collapse">
          <div class="col-sm-8 form-search">
            <form method="post">
              <input type="text" name="keyword" class="" id="keyword" placeholder="nhập từ khóa để tìm!" />
              <button type="submit">Tìm kiếm</button>
            </form>
          </div>
          <div class="col-sm-4 login">
            <div class="col-lg-8 login-icon">
              <div>
                <img src="/assets/img/personal-ico.png"/>
              </div>
              <?php 
                if(!$this->session->userdata('is_customer_login')):
              ?>
              <div>
                <a href="#" data-toggle="modal" data-target="#myModal">
                  Đăng nhập
                </a><br/>
                <a href="#">
                  Đăng ký
                </a>
              </div>
            <?php else: ?>
              <div><a href="/profile"><?=$this->session->userdata('customer_name')?></a></div>
            <?php endif; ?>
            </div>
            <div class="col-lg-4">
              <a href="/cart/" class="shopping-cart"><img src="/assets/img/cart-icon.png"/><b><?=$this->cart->total_items()?></b></a>
            </div>
          </div>
        </div>
      </div>
    </nav>
