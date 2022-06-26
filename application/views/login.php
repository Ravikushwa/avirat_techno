<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php include('includes/head.php') ?>
    <style type="text/css">
        form#user_login {
            padding-bottom: 50px;
        }
    </style>

</head>

<body style='background-image: url("<?= base_url('assets/').'images/background.jpg' ?>");background-repeat: no-repeat; background-size: cover;'>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                <a href="index.html" class="text-success">
                                    <span><img src="<?= base_url('assets') ?>/images/mainlogo.png" alt="" height="36"></span>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form  action="<?= base_url('Front/web_login'); ?>" id="user_login" method="post" data-parsley-validate novalidate >

                                <div class="form-group">
                                <?php if(!empty($this->session->flashdata('Success'))){ ?>
                                    <div class="alert alert-success" role="alert">  
                                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?= $this->session->flashdata('Success') ?>  
                                    </div>
                                <?php }else if(!empty($this->session->flashdata('Error'))){ ?>
                                    <div class="alert alert-danger" role="alert">  
                                        <?= $this->session->flashdata('Error') ?>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" id="username" required="" placeholder="Username" parsley-trigger="change" required>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" required="" id="password" placeholder="Password" parsley-trigger="change" required>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox checkbox-success">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-4 pt-2">
                                    <div class="col-sm-12">
                                        <a href="<?= base_url('forgetpw') ?>" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger wave<?= base_url('register') ?>s-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="<?= base_url('register') ?>" class="text-primary ml-1"><b>Sign Up</b></a></p>
                        </div>
                    </div> -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <?php include('includes/scripts.php') ?>

</body>

</html>