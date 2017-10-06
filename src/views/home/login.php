<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lion's Attendanc | Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    

      <link rel="stylesheet" href="<?php HREF("/ui/bootstrap/css/bootstrap.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/font-awesome/css/font-awesome.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/ionicons/css/ionicons.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/select2/css/select2.min.css");?>" />
      <link rel="stylesheet" href="<?php HREF("/ui/lte/css/AdminLTE.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/lte/css/skins/_all-skins.min.css");?>">
      <link rel="stylesheet" href="<?php HREF("/ui/icheck/square/blue.css");?>">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet" />
    <link href="<?php HREF("/site.css")?>" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php HREF("/favicon.ico")?>" type="image/x-icon" />
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Lion's</b> Attendance
        </div>
        <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                            <form method="post" action="<?php HREF("/login?XDEBUG_SES‌​SION=PHPSTROM");?>" novalidate="novalidate">
                    <div class="form-group has-feedback">
                        <input class="form-control" data-val="true" data-val-required="*" id="txtLogin" name="txtLogin" placeholder="Email" type="text" value="">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"><span class="field-validation-valid" data-valmsg-for="txtLogin" data-valmsg-replace="true"></span></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input class="form-control" data-val="true" data-val-required="*" id="txtPassword" name="txtPassword" placeholder="Password" type="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"><span class="field-validation-valid" data-valmsg-for="txtPassword" data-valmsg-replace="true"></span></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input data-val="true" data-val-required="The chkRemember field is required." id="chkRemember" name="chkRemember" type="checkbox" value="true" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div><input name="chkRemember" type="hidden" value="false"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <p class="login-box-msg">
                            
                        </p>
                    </div>
                </form>
                <a href="javascript:void(0);">I forgot my password</a><br>
        </div>
    </div>
    <!-- /.login-box -->
    <script src="<?php HREF("/ui/data-table/jquery.min.js");?>"></script>
    <script src="<?php HREF("/ui/icheck/icheck.min.js")?>"></script>
    <script src="<?php HREF("/scripts/jquery.validate.min.js");?>"></script>
    <script src="<?php HREF("/scripts/jquery.validate.unobtrusive.min.js");?>"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>
