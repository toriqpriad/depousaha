<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
        <?=$title_page?>
    </title>
    <?php $this->load->view('authentication/static/files'); ?>
    <?php $this->load->view('authentication/include/function'); ?>
</head>

<body class="login-page" style="background-color: rgba(255, 193, 7, 0.13);">
    <div class="login-box">
        <div class="logo" >
            <a href="javascript:void(0);" style="color: #03a9f4;"></b></a>            
        </div>
        <div class="card">
            <div class="body">
                
                    <div class="msg">Login untuk masuk</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="mdi mdi-24px mdi-account"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus id="username">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="mdi mdi-24px mdi-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required id="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block btn-lg bg-green waves-effect" onclick="login()">Masuk</button>
                        </div>
                    </div>                
            </div>
        </div>
    </div>

    <script src="<?= BACKEND_STATIC_FILES ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= BACKEND_STATIC_FILES ?>js/admin.js"></script>
    <script src="<?= BACKEND_STATIC_FILES ?>js/pages/examples/sign-in.js"></script>
</body>

</html>