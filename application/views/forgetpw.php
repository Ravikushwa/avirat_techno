<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Recover Password | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?php include('includes/head.php') ?>
    <style type="text/css">
        
    </style>


</head>

<body style='background-image: url("<?= base_url('assets/').'images/background.jpg' ?>");background-repeat: no-repeat; background-size: cover;'>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">style='background-image: url("<?= base_url('assets/').'images/background.jpg' ?>");background-repeat: no-repeat; background-size: cover;'
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                <a href="index.html" class="text-success">
                                    <span><img src="<?= base_url('assets') ?>/images/mainlogo.png" alt="" height="36"></span>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="text-center mb-4">
                                <p class="text-muted mb-0">Enter your email address and we'll send you an email with instructions to reset your password. </p>
                            </div>

                            <form action="#">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" required="" placeholder="Enter email">
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center mt-2 row">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Send Email
                                        </button>
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

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <?php include('includes/scripts.php') ?>

</body>

</html>