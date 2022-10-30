<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABN-Akademi Bela Negara</title>
    <link rel="shortcut icon" href="<?php echo base_url("template/images/favicon.ico") ?>">
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
    <link rel="stylesheet" href="<?php echo base_url('als_asset/offline-asset/icon.css?family=Material+Icons') ?>">
    <style type="text/css">
    #captImg {
        float: left;
        color: red;
    }

    .refreshCaptcha {
        position: relative;
        top: 27px;
    }

    form {
        float: left;
        width: 100%;
    }
    </style>
    <script src="<?php echo base_url('als_asset/offline-asset/') ?>sweetalert2.all.min.js"></script>
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">-->
    <link href="<?php echo base_url('als_asset/offline-asset/geo_css.css') ?>" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url('als_asset/offline-asset/bootstrap-3.3.7.min.css') ?>">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="<?php echo base_url('als_asset/offline-asset/jquery-1.12.4.min.js') ?>"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script src="<?php echo base_url('als_asset/offline-asset/bootstrap.min-3.3.7.js') ?>"></script>
    <script src="<?php echo base_url(); ?>./assets/js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.refreshCaptcha').on('click', function() {
            $.get('<?php echo base_url() . 'menu/captcharefresh'; ?>', function(data) {
                $('#captImg').html(data);
            });
        });
    });
    </script>
    <style type="text/css">
    body {
        color: #999;
        background: #1f3983;
        font-family: 'Varela Round', sans-serif;
    }

    .form-control {
        box-shadow: none;
        border-color: #fff;
    }

    .form-control:focus {
        border-color: #4aba70;
    }

    .login-form {
        width: 350px;
        margin: 0 auto;
        padding: 30px 0;
    }

    .login-form form {
        color: #434343;
        border-radius: 1px;
        margin-bottom: 15px;
        background: #fff;
        border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .login-form h4 {
        text-align: center;
        font-size: 22px;
        margin-bottom: 20px;
    }

    .login-form .avatar {
        color: #fff;
        margin: 0 auto 30px;
        text-align: center;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        z-index: 9;
        background: gray;
        padding: 15px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .login-form .avatar i {
        font-size: 62px;
    }

    .login-form .form-group {
        margin-bottom: 20px;
    }

    .login-form .form-control,
    .login-form .btn {
        min-height: 40px;
        border-radius: 2px;
        transition: all 0.5s;
    }

    .login-form .close {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .login-form .btn {
        background: #1f3983;
        border: none;
        line-height: normal;
    }

    .login-form .btn:hover,
    .login-form .btn:focus {
        background: gray;
    }

    .login-form .checkbox-inline {
        float: left;
    }

    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }

    .login-form .forgot-link {
        float: right;
    }

    .login-form .small {
        font-size: 13px;
    }

    .login-form a {
        color: red;
    }

    h5 {
        text-align: center;
    }
    </style>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</head>

<body> <?php echo $this->session->flashdata('message'); ?>
    <!--        <script language="javascript">            var set = new Array();            set["eva_k"] = "mYynp5Kir6iajI2rmaKjppqMo6yZZ5%2Bj";            set["eva_i"] = "437215";            set["eva_ty"] = "guest";            (function (i, s, o, g, r, a, m) {                i["evaid"] = r;                i[r] = i[r] || function () {                    (i[r].q = i[r].q || []).push(arguments)                }, i[r].l = 1 * new Date();                a = s.createElement(o), m = s.getElementsByTagName(o)[0];                a.async = 1;                a.src = g;                m.parentNode.insertBefore(a, m)            })(window, document, "script", "https://api.eva.id/widget2/evaid.js", set);        </script> -->
    <div class="login-form">
        <form action="<?php echo base_url("menu/process_login") ?>" method="post">
            <!--<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>--> <img
                style="position: relative; left: 15%;width: 70%; margin-bottom: 10px"
                src="<?php echo base_url('template/images/dasha.png') ?>" />
                <h4 class="modal-title">LOGIN ADMIN</h4>    
                <h4 class="modal-title">ABN-AKADEMI BELANEGARA NASDEM</h4>
            <div class="form-group">
			<input autocomplete="off" readonly onfocus="this.removeAttribute('readonly');"
                    onblur="this.setAttribute('readonly', true);" title="Please Enter Username" type="text" name="username" class="form-control"
                    placeholder="Username" required="required"> </div>
            <div class="form-group"> 
			<input autocomplete="off" readonly onfocus="this.removeAttribute('readonly');"
                    onblur="this.setAttribute('readonly', true);"  title="Please Enter Password" type="password" name="password" id="myInput" class="form-control"
                    placeholder="Password" required="required"><p>
					<input type="checkbox" onclick="myFunction()"> Show Password
					</p>
			</div>
                   
            <div class="form-group">
                <center>
                    <p id="captImg"><?php echo $captchaImg; ?></p>
                    
                </center>
            </div>
            <div class="form-group"> 
                    <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly');"
                    onblur="this.setAttribute('readonly', true);" title="Please Your input captcha " type="text" name="captcha" class="form-control"
                    placeholder="captcha" required="required">
                <!--<label class="checkbox-inline"><input type="checkbox"> Remember me</label>-->
                <!--<a href="#" class="forgot-link">Forgot Password?</a>-->
            </div> 
			<input type="submit" name="submit" class="btn btn-primary btn-block btn-lg"  value="Login"> <br> 
			 <div class="form-group">
			 <!-- <a href="<?php echo base_url("menu/privasi_policy") ?>"  style="color:#000000" ;>
                <h5>Privasi policy</h5>
			
			</a> -->
			</div>
			<!-- <a href="#" div class="form-group" data-toggle="modal" data-target="#mySmallModal" style="color:#000000" ;>
                <h5>Forgot Password</h5> -->
			</div>
			</a>
			</form>
    <form action="<?php echo base_url("menu/lupapassword") ?>" method="post">
        <div class="modal fade" id="mySmallModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal"> <span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span> </button>
                        <h4 class="modal-title" id="mySmallModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label"> <label
                                    for="Username">Username</label> </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line"> <input type="text" name="username" id="username"
                                            class="form-control" value="" autocomplete="off" required=""
                                            placeholder="Username"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label"> <label
                                    for="Email">Email</label> </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line"> <input type="email" autocomplete="off" name="email"
                                            id="email" class="form-control" value="" required="" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"> <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save
                            changes</button></a> </div>
    </form>
    </div>
    </div>
    </div>
    <!--<div class="text-center small">Don't have an account? <a href="#">Sign up</a></div>-->
    </div>
	
</body>

</html>