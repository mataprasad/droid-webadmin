  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Lion's Attendance</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?php HREF("/ui/bootstrap/css/bootstrap.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/font-awesome/css/font-awesome.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/ionicons/css/ionicons.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/select2/css/select2.min.css");?>" />
      <link rel="stylesheet" href="<?php HREF("/ui/lte/css/AdminLTE.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/lte/css/skins/_all-skins.min.css");?>">
      
      <script src="<?php HREF("/ui/data-table/jquery.min.js");?>"></script>
      <script src="<?php HREF("/ui/bootstrap/js/bootstrap.min.js");?>"></script>
      <script src="<?php HREF("/ui/data-table/jquery.dataTables.js");?>"></script>
      <script src="<?php HREF("/ui/data-table/dataTables.bootstrap.js");?>"></script>
      <script src="<?php HREF("/ui/jquery-slimscroll/jquery.slimscroll.min.js");?>"></script>
      <script src="<?php HREF("/ui/fastclick/fastclick.js");?>"></script>
      <script src="<?php HREF("/ui/lte/js/adminlte.min.js");?>"></script>
      <script src="<?php HREF("/ui/lte/js/demo.js");?>"></script>
      <script src="<?php HREF("/scripts/jquery.validate.min.js");?>"></script>
      <script src="<?php HREF("/scripts/jquery.validate.unobtrusive.min.js");?>"></script>
      <script src="<?php HREF("/scripts/moment.min.js");?>"></script>
      <script src="<?php HREF("/ui/select2/js/select2.full.min.js");?>"></script>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet" />
      <link href="<?php HREF("/site.css");?>" rel="stylesheet" />
      <link rel="shortcut icon" href="<?php HREF("/favicon.ico");?>" type="image/x-icon" />
      <script type="text/javascript">
          $.fn.serializeObject = function () { "use strict"; var a = {}, b = function (b, c) { var d = a[c.name]; "undefined" != typeof d && d !== null ? $.isArray(d) ? d.push(c.value) : a[c.name] = [d, c.value] : a[c.name] = c.value }; return $.each(this.serializeArray(), b), a };
  
      </script>
       <?php
 if (function_exists("section_head"))
 {
    section_head($data);
 }
 ?>
  </head>
  <body class="hold-transition skin-blue layout-boxed sidebar-mini">
      <!-- Site wrapper -->
      <div class="wrapper">
          <header class="main-header">
              <!-- Logo -->
              <a href="<?php HREF("/");?>" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b>L</b> A</span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b>Lion's</b> Attendance</span>
              </a>
              <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                      <span class="sr-only">Toggle navigation</span>
                  </a>
                  <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">
                          <li class="dropdown messages-menu">
                              <a>
                                  <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<span id="spn-clock">23-Aug-2017 10:56:90 PM</span>
                              </a>
                          </li>
                          <li class="dropdown messages-menu">
                              <a href="#">
                                  <i class="fa fa-user"></i>&nbsp;&nbsp;Hello @LoggedUser.FullName !
                              </a>
                          </li>
                          <li class="dropdown messages-menu pull-right">
                              <a href="<?php HREF("/log-out");?>">
                                  Logout&nbsp;&nbsp;<i class="fa fa-sign-out"></i>
                              </a>
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
                  <ul class="sidebar-menu" data-widget="tree">
                      <li class="treeview active">
                          <a href="#">
                              <i class="fa fa-files-o"></i>
                              <span>Masters</span>
                              <span class="pull-right-container">
  
                              </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="<?php HREF("/employee/index");?>"><i class="fa fa-circle-o"></i> Employees</a></li>
                              <li><a href="<?php HREF("/location/index");?>"><i class="fa fa-circle-o"></i> Locations</a></li>
                              <li><a href="<?php HREF("/attendance/index");?>"><i class="fa fa-circle-o"></i> Attendances</a></li>
                              <li><a href="<?php HREF("/emp-location/index");?>"><i class="fa fa-circle-o"></i> Employee's Locations</a></li>
                          </ul>
                      </li>
                      <li class="treeview active">
                          <a href="#">
                              <i class="fa fa-files-o"></i>
                              <span>Reports</span>
                              <span class="pull-right-container">
  
                              </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="<?php HREF("/reports/full");?>"><i class="fa fa-circle-o"></i> Full Report</a></li>
                          </ul>
                      </li>
                  </ul>
              </section>
              <!-- /.sidebar -->
          </aside>
          <!-- =============================================== -->
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
              <!-- Main content -->
              <section class="content">
              <?php
 if (function_exists("section_body"))
 {
    section_body($data);
 }
 ?>
              </section>
              <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
              <div class="pull-right hidden-xs">
                  <b>Version</b> 1.0.45
              </div>
              <strong>Copyright &copy; 2015-2017.</strong> All rights reserved.
          </footer>
  
      </div>
      <!-- ./wrapper -->
      <script type="text/javascript">
          $(document).ready(function () {
              $(".sidebar-menu .treeview .treeview-menu li").click(function () {
                  $(".sidebar-menu .treeview .treeview-menu li").removeClass("active");
                  $(this).addClass("active");
              });
          });
          function startTime() {
              $("#spn-clock").html(moment(new Date()).format("DD-MMM-YYYY hh:mm:ss A"));
              var t = setTimeout(startTime, 500);
          }
          startTime();
      </script>
      
      <?php
 if (function_exists("section_scripts"))
 {
    section_scripts($data);
 }
 ?>
  </body>
  </html>
  