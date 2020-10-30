
<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#">
<head>
<?php $title = "Nổ Hũ FreeFire";?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
  <link rel="icon" type="image/png" href="/wp-content/uploads/2018/12/QuayNhanh-Favicon.png" sizes="32x32"/>
  <script src="/wp-content/themes/dsmart/js/snow.js" type="text/javascript"></script>
    <title><?=(isset($title) ? $title : $this->config->item('title'))?></title>

  <!-- This site is optimized with the Yoast SEO plugin v9.3 - https://yoast.com/wordpress/plugins/seo/ -->
  <meta name="description" content="<?=(isset($desc) ? $desc : $this->config->item('desc'))?>"/>


  <script src="/assets/sweetalert.min.js"></script>
  <link rel="stylesheet" href="/assets/sweetalert.css">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel='stylesheet' id='dsmart-style-css'  href='/assets/css/style.css' type='text/css' media='all' />

  <script type='text/javascript' src='/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
  <script type='text/javascript' src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
  <script type='text/javascript' src='/wp-content/plugins/accesspress-social-login-lite/js/frontend.js?ver=3.3.8'></script>


<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>

</head>
<?php if($this->router->fetch_method() != 'profile' && $this->router->fetch_method() != 'lichsunap'  && $this->router->fetch_method() != 'naptien'  && $this->router->fetch_method() != 'lichsuquay' && $this->router->fetch_method() != 'lichsumua'){?>



<body class="home page-template-default page page-id-2 logged-in">
<?php } else {?>

<body class="page-template page-template-template-parts page-template-profile page-template-template-partsprofile-php page page-id-145 logged-in">



<?php } ?>



  <div id="wrapper">
        <header>
      <div class="container">
          <h1 id="logo"><a href="/" class="ani-zoom"><img src="/logo.png" alt="logo" class="play-zoom" /></a></h1>
          <a href="#" class="menu_mobile"><i class="fa fa-bars" aria-hidden="true"></i></a>
          <div class="menu-login">
            <nav class="main-nav"><ul id="menu-main" class="menu"><li id="menu-item-202" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-202"><a href="https://shopdat09.com">Trang Chủ Shop</a></li>
<li id="menu-item-224" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-224"><a href="https://shopdat09.com/user/topup">Nạp Tiền Quay 20k/1Lượt</a></li>
<li id="menu-item-224" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-224"><a href="https://freefire.shopdat09.com/">Vòng Quay KC Halloween</a></li>
<li id="menu-item-224" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-224"><a href="https://quayvang.shopdat09.com">Vòng Quay KC Lưỡi Cưa</a></li>
<li id="menu-item-224" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-224"><a href="https://bingo.shopdat09.com">Quay Về Vòng BINGO</a></li>

</ul></nav>            <div class="right-item">


           <?php if (@!$user_profile): ?>

  <div class="apsl-login-networks theme-4 clearfix">
                                <div class="social-networks">
                                <a href="/vai.php">
                        <div class="apsl-icon-block icon-facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <span class="apsl-login-text">Tài Khoản</span>
                            <span class="apsl-long-login-text">Đăng Nhập Để Quay</span>
                        </div>
                    </a>
                            </div>
    </div>


                        <?php else: ?>





                          <a href="/tai-khoan" class="btn-cs"><i class="fa fa-user"></i> Tài Khoản</a>
            <a href="/body/logout" class="btn-cs" title="Sign Out">Đăng Xuất</a>
                                          <?php endif; ?>

            </div>
          </div>
      </div>
        </header><!-- #masthead -->
    <main>
