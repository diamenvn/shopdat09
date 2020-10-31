<!DOCTYPE html>

<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN CP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Web fonts -->
    <link href=
    "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"
    rel="stylesheet">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- OneUI -->
   <link href="../assets/css/ui.min-2.2.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/css/skins/skin-blue.min.css">
<!-- jQuery 2.2.3 -->
<script src="../assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>

<!-- TABLE Js -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- TABLE Js -->
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../assets/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<link rel="stylesheet" type="text/css" href="/assets/js/css/jquery.datepick.css"> 
<script type="text/javascript" src="/assets/js/js/jquery.plugin.js"></script> 
<script type="text/javascript" src="/assets/js/js/jquery.datepick.js"></script>

  <script language="javascript">
            function xacnhan() {
                if (!window.confirm('Thỏ óc Cáo có muốn xóa tài khoản này ko?')) {
                    return false;
                }
            }
        </script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://graph.facebook.com/<?=$user_profile['fb']?>/picture?type=large" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?=$user_profile['name']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://graph.facebook.com/<?=$user_profile['fb']?>/picture?type=large" class="img-circle" alt="User Image">

                <p>
                  <?=$user_profile['name']?>
                </p>
              </li>
              <!-- Menu Body -->

            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://graph.facebook.com/<?=$user_profile['fb']?>/picture?type=large" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$user_profile['name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>





        <li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Quản lí</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/"><i class="fa fa-circle-o"></i>Danh sách tài khoản</a></li>

            <li><a href="/admin/lichsuquay"><i class="fa fa-circle-o"></i>Lịch sử quay</a></li>

            <li><a data-toggle="modal" data-target=".thongbao" id="thongbao"><i class="fa fa-circle-o"></i>Thông báo</a></li>
            <li><a data-val="FFVIP" data-toggle="modal" data-target="#my-modal"><i class="fa fa-circle-o"></i>FF VIP (<?=$this->db->where(array('loainick'=>'FFVIP','trangthai'=>'on'))->count_all_results('baidang');?>)</a></li>
            <li><a data-val="FFTHUONG" data-toggle="modal" data-target="#my-modal"><i class="fa fa-circle-o"></i>FF THƯỜNG (<?=$this->db->where(array('loainick'=>'FFTHUONG','trangthai'=>'on'))->count_all_results('baidang');?>)</a></li>
            <li><a data-val="FFGAS" data-toggle="modal" data-target="#my-modal"><i class="fa fa-circle-o"></i>FF GAS (<?=$this->db->where(array('loainick'=>'FFGAS','trangthai'=>'on'))->count_all_results('baidang');?>)</a></li>




          </ul>


        </li>










      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
   
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Thống kê giao dịch</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
              <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">

                    <h5 class="description-header">+<?=$this->db->query("SELECT COUNT(*),FROM_UNIXTIME(date) AS MYDATE FROM `lichsuquay` WHERE FROM_UNIXTIME(date) LIKE '%".date('Y-m-d',time())."%'")->row_array()['COUNT(*)'];?>
                    </h5>
                    <span class="description-text">QUAY HÔM NAY</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">

                    <h5 class="description-header">+<?=$this->db->query("SELECT COUNT(*),FROM_UNIXTIME(date) AS MYDATE FROM `lichsuquay` WHERE FROM_UNIXTIME(date) LIKE '%".date('Y-m-d',time())."%'")->row_array()['COUNT(*)'] * get_value('price')?> <sup class="text-muted">vnđ</sup></h5>
                    <span class="description-text">TIỀN NHẬN HÔM NAY</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                 <!-- /.col -->

              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->