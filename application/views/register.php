<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php include('includes/head.php') ?>

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

                            <form action="<?= base_url('Front/web_singup'); ?>" id="user_signup" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>

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
                                    <input class="form-control" type="text" name="first_name" id="first_name" parsley-trigger="change" required placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="last_name" id="last_name" parsley-trigger="change" required placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email" parsley-trigger="change" parsley-type="email" required placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" id="username" parsley-trigger="change" required data-parsley-length="[6,15]"required placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                </div>
                                <!--<div class="form-group">
                                    <input class="form-control" type="password" name="re-password" data-parsley-equalto="#Password" id="re_password" required placeholder="Re Enter Password">
                                </div>-->
                                <div class="form-group">
                                    <input type="file" class="form-control" name="picture" data-height="100" />
                                </div>

                                <div class="form-group">
                                    <div class="checkbox checkbox-success pt-1 pl-1">
                                        <input id="checkbox-signup" type="checkbox" checked="checked">
                                        <label for="checkbox-signup" class="mb-0">I accept <a href="#">Terms and Conditions</a></label>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Already have account?<a href="<?= base_url('login') ?>" class="text-primary ml-1"><b>Sign In</b></a></p>
                        </div>
                    </div>

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