<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - <?php echo e($title); ?></title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/summernote/summernote.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">
        <header class="main-header">
            <a href="index2.html" class="logo">
                <span class="logo-mini"><b>A</b>LT</span>
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url();?>public/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo e($_SESSION['name']); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php echo ( $uri == 'dashboard' || $uri == 'admin' ? "active" : "" );?>">
                        <a href="<?php base_url();?>/admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="<?php echo ( $uri == 'post' || $uri == 'new' ? "active" : "" );?> treeview">
                        <a href="#">
                            <i class="fa fa-thumb-tack"></i> <span>Posts</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo ( $uri == 'post' ? "active" : "" );?>"><a href="<?php base_url();?>/admin/post"><i class="fa fa-circle-o"></i> <span>All Posts</span></a></li>
                            <li class="<?php echo ( $uri == 'new' ? "active" : "" );?>"><a href="<?php base_url();?>/admin/post/new"><i class="fa fa-circle-o"></i> Add Post</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo ( $uri == 'comments' ? "active" : "" );?>">
                        <a href="<?php base_url();?>/admin/comments"><i class="fa fa-comments"></i> <span>Comments</span></a>
                    </li>
                    <li class="<?php echo ( $uri == 'user' ? "active" : "" || $uri == 'add' ? "active" : "" );?> treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo ( $uri == 'user' ? "active" : "" );?>"><a href="<?php base_url();?>/admin/user"><i class="fa fa-circle-o"></i> <span>All Users</span></a></li>
                            <li class="<?php echo ( $uri == 'add' ? "active" : "" );?>"><a href="<?php base_url();?>/admin/user/add"><i class="fa fa-circle-o"></i> Add User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
                    </li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <?php echo $__env->yieldContent('content_header'); ?>

            <section class="content">
                <?php echo $__env->yieldContent('info'); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url();?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script>
        $(document).ready(function(){
            $('#post_body').summernote({
                placeholder: 'Enter the post body here..',
                tabsize: 2,
                height: 100
            });

            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });

            Elnotif = $('.notifications');
            setInterval(() => Elnotif.hide(), 5000);
        });
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url();?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- include summernote css/js -->
    <script src="<?php echo base_url();?>public/summernote/summernote.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url();?>public/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>public/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>public/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>public/js/demo.js"></script>
</body>
</html>