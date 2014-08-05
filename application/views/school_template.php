<!doctype html>
<html lang="en">
    <head> 
        <title> Admin Section</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="<?= PLUGIN_PATH ?>jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?= PLUGIN_PATH ?>bootstrap-3.1.1/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= PLUGIN_PATH ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= CSS_PATH ?>animate.min.css" rel="stylesheet" />
        <link href="<?= CSS_PATH ?>style.min.css" rel="stylesheet" />
        <link href="<?= CSS_PATH ?>style-responsive.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <script type="text/javascript">var baseurl = '<?= base_url() ?>';</script>
<!--        <script type="text/javascript"  src="<?=JS_PATH ?>jquery.js"></script>-->
        <script src="<?= PLUGIN_PATH ?>jquery-1.8.2/jquery-1.8.2.min.js"></script>

    </head>
    <body>

        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->


        <!-- begin #page-container -->
        <div id="page-container" class="fade">
            <!-- begin #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <!-- begin container-fluid -->
                <div class="container-fluid">
                    <!-- begin mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="<?=site_url('admin');   ?>" class="navbar-brand"><span class="navbar-logo"></span> Admin Section</a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end mobile sidebar expand / collapse button -->

                    <!-- begin header navigation right -->
                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
<!--                                <img src="assets/img/user-11.jpg" alt="" /> -->
                                <span class="hidden-xs">MAK </span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="javascript:;">Edit Profile</a></li>


                                <li class="divider"></li>
                                <li><a href="<?=site_url('admin/logout');   ?>">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end header navigation right -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end #header -->

            <?= $menu_content ?>
            <!-- begin #content -->
            <div id="content" class="content">
               <?=$content ?>
            </div>
            <!-- end #content -->

            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <!-- ================== BEGIN BASE JS ================== -->
       
        <script src="<?= PLUGIN_PATH ?>jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
        <script src="<?= PLUGIN_PATH ?>bootstrap-3.1.1/js/bootstrap.min.js"></script>

        <script src="<?= PLUGIN_PATH ?>slimscroll/jquery.slimscroll.min.js"></script>

        <!-- ================== END BASE JS ================== -->
        <script src="<?= JS_PATH ?>apps.min.js"></script>
        <script>
        $(document).ready(function() {
            App.init();
        });
        </script>

    </body>
</html>