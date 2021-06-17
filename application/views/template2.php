<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perbendaharaan Badan Pengelolaan Keuangan dan Aset Daerah Kabupaten Lamongan </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/bootstrap/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/select2/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/font-awesome-4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/iCheck/all.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/datatables/dataTables.bootstrap.css">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.css">
  <!-- ion slider Nice -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.skinNice.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/bootstrap-slider/slider.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>AdminLTE3/dist/css/skins/_all-skins.min.css">

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url(); ?>AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!--<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php
  $app=$this->access->get_aplikasi();
  $level=$this->access->get_level();
  $nama=$this->access->get_nama();
  $foto=$this->access->get_foto();
  $id_pegawai=$this->access->get_pegawai();
  if($app=="paperless") {
      $colorskin="skin-green"; $appname="paperless"; $bgdrop="bg-green"; } 
  ?>
</head>
<body class="hold-transition <?php echo $colorskin ?> sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/img/paperless.png" width="35px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="<?php echo base_url(); ?>assets/img/paperless.png" width="35px">
        <font size="4">Paperless Perben</font>
        <!--<img src="<?php echo base_url(); ?>assets/img/app_logo.png" class="user-image" alt="User Image" width="90px">-->
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <ul class="nav navbar-nav navbar-left">
          <li class="left-navblock">
              <div class="navbar-brand no-hover" href="<?php echo base_url() ?>">
                  <!--<img class="navbar-brand-img" src="<?php echo base_url()?>public/img/logo.png">-->
                  <img src="<?php echo base_url()?>assets/img/lamongan.png" style="display: inline; float: left; margin-left: 2px; margin-top : -9px; width: 33px;">
                  &nbsp;<strong><font size="4">BPKAD Kabupaten Lamongan</font></strong>
              </div>
          </li>
      </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="<?php echo base_url(); ?>assets/img/user.jpg" class="user-image" alt="BPKAD">-->
              <?php
              if(!empty($foto)) { ?>
                <img src="<?php echo base_url(); ?>upload/pegawai/<?php echo $foto; ?>" class="user-image" alt="User Image">
              <?php } else { ?>
                <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php
                $nama=$this->access->get_nama(); 
                if(!empty($nama)){ echo $nama; }else{ echo 'Administrator';} ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!--<img src="<?php echo base_url(); ?>assets/img/bhima_logo.png" class="img-circle" alt="User Image">-->
                <?php
                if(!empty($foto)) { ?>
                  <img src="<?php echo base_url(); ?>upload/pegawai/<?php echo $foto; ?>" class="img-circle" alt="User Image">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                  <?php
                  $nama=$this->access->get_nama(); 
                  if(!empty($nama)){ echo $nama; }else{ echo 'Administrator';} ?>
                  <small>Paperless Perben</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!--
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url()?>pegawai/profile/<?php echo $id_pegawai ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url()?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>AdminLTE3/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php
            $nama=$this->access->get_nama(); 
            if(!empty($nama)){ echo $nama; }else{ echo 'Administrator';} ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pencarian...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!--<li class="header">MENU UTAMA</li>-->
        <li class="active treeview">
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php
        //$menu = $this->db->order_by('urut', 'ASC')->get_where('menu', array('is_parent' => 0,'is_active'=>1,'aplikasi'=>$app));
        if($level=='admin'){
          $menu = $this->db->query("SELECT * from menu where is_parent=0 and is_active=1 and (aplikasi='$app' or aplikasi='*') ORDER BY urut ASC");
        } else {
          $menu = $this->db->query("SELECT * from menu where is_parent=0 and is_active=1 and (aplikasi='$app' or aplikasi='*') and (level='$level' or level='*') ORDER BY urut ASC");
        }
        foreach ($menu->result() as $m) {
            // chek ada sub menu
            //$submenu = $this->db->order_by('urut', 'ASC')->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1,'aplikasi'=>$app));
            
            if($level=='admin'){
              $submenu = $this->db->query("SELECT * from menu where is_parent=$m->id and is_active=1 and (aplikasi='$app' or aplikasi='*') ORDER BY urut ASC");
            } else {
              $submenu = $this->db->query("SELECT * from menu where is_parent=$m->id and is_active=1 and (aplikasi='$app' or aplikasi='*') and (level='$level' or level='*') ORDER BY urut ASC");
            }
            if($submenu->num_rows()>0){
                // tampilkan submenu   
                $menusid = "m".$m->id; 
                echo "<li class='treeview ".$this->session->userdata($menusid)."'>
                    ".anchor('#',  "<i class='$m->icon'></i><span>".$m->name.' </span><i class="fa fa-angle-left pull-right"></i>')."
                        <ul class='treeview-menu'>";
                foreach ($submenu->result() as $s){
                     //echo "<li>" . anchor(base_url().$s->link, "<i class='$s->icon'></i> <span>" . $s->name) . "</span></li>";
                     $menuid = "m".$s->id;
                     echo "<li id='".$s->id."' class='menus ".$this->session->userdata($menuid)."'>" . anchor(site_url().$s->link, "<i class='$s->icon'></i> <span>" . $s->name) . "</span></li>";
                }
                   echo"</ul>
                    </li>";
            }else{
                //echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
                $menusid = "m".$m->id;
                echo "<li id='".$m->id."' class='menus ".$this->session->userdata($menusid)."'>" . anchor(site_url().$m->link, "<i class='$m->icon'></i> <span>" . $m->name) . "</span></li>";
            }
            
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">-->
        <?php
            echo $contents;
        ?>
    <!--</section>-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://bpkad.lamongankab.go.id/">Bagian Perbendaharaan BPKAD Kab. Lamongan</a>.</strong> All rights
    reserved.
  </footer>

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
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
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
            <a href="javascript::;">
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
            <a href="javascript::;">
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
            <a href="javascript::;">
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
            <a href="javascript::;">
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
              <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>AdminLTE3/bootstrap/js/bootstrap.min.js"></script>
<!-- select2 -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/select2/select2.full.min.js"></script>

<!-- Preview PDF -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.media.js"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/chartjs/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE3 App -->
<script src="<?php echo base_url(); ?>AdminLTE3/dist/js/app.min.js"></script>
<!-- Ion Slider -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="<?php echo base_url(); ?>AdminLTE3/plugins/bootstrap-slider/bootstrap-slider.js"></script>
<!--<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>-->
<script>
    $.AdminLTESidebarTweak = {};

    $.AdminLTESidebarTweak.options = {
        EnableRemember: true,
        NoTransitionAfterReload: false
        //Removes the transition after page reload.
    };

    $(function () {
        "use strict";

        $("body").on("collapsed.pushMenu", function(){
            if($.AdminLTESidebarTweak.options.EnableRemember){
                document.cookie = "toggleState=closed";
            }
        }).on("expanded.pushMenu", function(){
            if($.AdminLTESidebarTweak.options.EnableRemember){
                document.cookie = "toggleState=opened";
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.menus').click(function () {
            var idMenu = $(this).attr('id');
            $.post('<?php echo base_url(); ?>dashboard/currMenu', {idMenu: idMenu});
        });      

    });    
</script>

<script type="text/javascript">
  $(function () {
    //Initialize datepicker3 Elements
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: 'true',
        language: 'id'
    });

    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<!-- AdminLTE3 dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>AdminLTE3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE3 for demo purposes -->
<script src="<?php echo base_url(); ?>AdminLTE3/dist/js/demo.js"></script>

<!-- Page script -->
<script type="text/javascript">
  $(function () {

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: 700,
        color: "#f56954",
        highlight: "#f56954",
        label: "Chrome"
      },
      {
        value: 500,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "IE"
      },
      {
        value: 400,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "FireFox"
      },
      {
        value: 600,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Safari"
      },
      {
        value: 300,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Opera"
      },
      {
        value: 100,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Navigator"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
</body>
</html>
