<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>İşletme | Yönetim</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">
    @yield('header')
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>İ</b>Y</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>İşletme</b>Yönetim</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"> {{ Auth::user()->name }} </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        {{ Auth::user()->name }}

                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                          </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle"
                            alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">İŞLETME YÖNETİM SİSTEMİ</li>
                    <li class="active"><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i>Ana Sayfa</a></li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-pencil" aria-hidden="true"></i><span>Muhasebe / Finans Yönetimi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{ route('muhasebe.althesap') }}"><i class="fa fa-circle-o"></i>Alt Hesap Tanım</a></li>
                            <li><a href="{{ route('muhasebe.cari') }}"><i class="fa fa-circle-o"></i>Cari Tanım</a></li>
                            <li><a href="{{ route('muhasebe.banka') }}"><i class="fa fa-circle-o"></i>Banka Tanım</a></li>
                            <li><a href="{{ route('muhasebe.kasa') }}"><i class="fa fa-circle-o"></i>Kasa Tanım</a></li>
                            <li><a href="{{ route('muhasebe.fistip') }}"><i class="fa fa-circle-o"></i>Fiş Tipi Tanım</a></li>
                            <li><a href="{{ route('muhasebe.islemtip') }}"><i class="fa fa-circle-o"></i>İşlem Tipi Tanım</a></li>
                            <li><a href="{{ route('muhasebe.muhasebefis') }}"><i class="fa fa-circle-o"></i>Muhasebe Fiş İşlemleri</a></li>
                            <li><a href="{{ route('muhasebe.finansfis') }}"><i class="fa fa-circle-o"></i>Finans Fiş İşlemleri</a></li>
                            <li><a href="{{ route('muhasebe.satisfatura') }}"><i class="fa fa-circle-o"></i>Satış Faturası</a></li>
                            <li><a href="{{ route('muhasebe.satinalmafatura') }}"><i class="fa fa-circle-o"></i>Satınalma Faturası</a></li>
                        </ul>
                    </li>
                    <li class="treeview active">
                      <a href="#">
                        <i class="fa fa-archive" aria-hidden="true"></i><span>Envanter Yönetimi</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{ route('envanter.stokkart') }}"><i class="fa fa-circle-o"></i>Stok Kart Tanım</a></li>
                        <li><a href="{{ route('envanter.depo') }}"><i class="fa fa-circle-o"></i>Depo Tanım</a></li>
                        <li><a href="{{ route('envanter.stokhareket') }}"><i class="fa fa-circle-o"></i>Stok Hareket</a></li>
                      </ul>
                  </li>
                  <li class="treeview active">
                    <a href="#">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Satış / Sipariş Yönetimi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ route('satis.satissiparis') }}"><i class="fa fa-circle-o"></i>Satış Sipariş</a></li>
                      <li><a href="{{ route('satis.satisteklif') }}"><i class="fa fa-circle-o"></i>Satış Teklif</a></li>
                      <li><a href="{{ route('satis.teklifsatis') }}"><i class="fa fa-circle-o"></i>Tekliften Satış Sipariş</a></li>
                        
                    </ul>
                </li>
                <li class="treeview active">
                  <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Satınalma / Sipariş Yönetimi</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('satinalma.satinalmasiparis') }}"><i class="fa fa-circle-o"></i>Satınalma Sipariş</a></li>
                    <li><a href="{{ route('satinalma.satinalmateklif') }}"><i class="fa fa-circle-o"></i>Satınalma Teklifleri</a></li>
                    <li><a href="{{ route('satinalma.teklifsatinalma') }}"><i class="fa fa-circle-o"></i>Tekliften Satınalma Sipariş</a></li>
                      
                  </ul>
              </li>

              <li class="treeview active">
                <a href="#">
                  <i class="fa fa-industry" aria-hidden="true"></i><span>Üretim Yönetimi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('urun.operasyon') }}"><i class="fa fa-circle-o"></i>Rota Operasyonu Tanım</a></li>
                  <li><a href="{{ route('urun.rotatip') }}"><i class="fa fa-circle-o"></i>Rota Tipi Tanım</a></li>
                  <li><a href="{{ route('urun.ismerkezi') }}"><i class="fa fa-circle-o"></i>İş merkezi Tanım</a></li>
                  <li><a href="{{ route('urun.isistasyon') }}"><i class="fa fa-circle-o"></i>İş istasyon Tanım</a></li>
                  <li><a href="{{ route('urun.urunagaci') }}"><i class="fa fa-circle-o"></i>Ürün Ağacı İşlemleri</a></li>
                  <li><a href="{{ route('urun.urunrota') }}"><i class="fa fa-circle-o"></i>Ürün Rota İşlemleri</a></li>
                  <li><a href="{{ route('urun.isemri') }}"><i class="fa fa-circle-o"></i>İş Emri İşlemleri</a></li>
                  <li><a href="{{ route('urun.uretimgiris') }}"><i class="fa fa-circle-o"></i>Üretim Giriş İşlemleri</a></li>
                    
                    
                </ul>
            </li>
                  

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('icerik')
        </div>
        <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Murat Kondu</a>.</strong> All rights
            reserved.
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })

    </script>
    @yield('footer')
</body>

</html>
