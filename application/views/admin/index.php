<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>School Login</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?=CSS_PATH?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?=CSS_PATH?>assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <!-- fonts -->

        <link rel="stylesheet" href="<?=CSS_PATH?>assets/css/ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="<?=CSS_PATH?>assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?=CSS_PATH?>assets/css/ace-rtl.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    <script type="text/javascript"  src="<?=JS_PATH?>jquery.js"></script>
    <script type="text/javascript"  src="<?=JS_PATH?>jquery.validate.js"></script>
    <script type="text/javascript"  src="<?=JS_PATH?>admin_login.js"></script>
    <script type="text/javascript">var baseurl = '<?=base_url()?>'; </script>
    </head>

    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="icon-leaf green"></i>
                                    <span class="red">Secure Login</span>
                                    <span class="white"></span>								</h1>
                                <h4 class="blue">School Application</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="icon-coffee green"></i>
                                                Please Enter Your Information											</h4>

                                            <div class="space-6"></div>

                                            <form>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="username" name="username" placeholder="Username" value="<?php if(!empty($_COOKIE["auname"]) )echo $_COOKIE["auname"];  ?>" class="form-control"/>
                    
       
                                                            <i class="icon-user"></i>														</span>													</label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" id="password" name="password" minlength="4" maxlength="20" placeholder="Password" value="<?php if(!empty($_COOKIE["apassword"]))echo $_COOKIE["apassword"]; 
																																    	   	
																																	?>" class="form-control"/>
                                                            
                                                            <i class="icon-lock"></i>														</span>													</label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                                        
                                                            <input type="checkbox" class="ace" <?php if(!empty($_COOKIE["apassword"]) )echo 'checked'; 
														    ?> id="remember" />
                                                            <span class="lbl"> Remember Me</span>														</label>
 
                                                        <button type="button" class="width-35 pull-right btn btn-sm btn-primary loginbutton check_login">
                                                            <i class="icon-key"></i>
                                                            Login														</button>
                                                    </div>
 <span class="error"></span>
                                                    <div class="space-4"> </div>
                                                </fieldset>
                                            </form>




                                        </div><!-- /widget-main -->


                                    </div><!-- /widget-body -->
                                </div><!-- /login-box -->

                            </div><!-- /position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.main-container -->
 

 
 
    </body>

 
</html>
