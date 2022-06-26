<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php include('includes/head.php') ?>
    <style type="text/css">
        .edit_profile {
            position: absolute;
            right: 24px;
            top: 9px;
        }
    </style>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include('includes/header.php') ?>

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Profile Edit</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Profile Edit</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12">
                                        <div class="text-center card-box shadow-none border border-secoundary">
                                            <form action="<?= base_url('change-password'); ?>" id="user_signup" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>

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
                                                    <input class="form-control" type="email" name="email" id="email" parsley-trigger="change" parsley-type="email" required placeholder="Email" value="<?= $admindata['email'] ?>">
                                                     <input  type="hidden" name="ids" id="ids" value="<?= $admindata['id'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="old_password" id="old_password" placeholder="Old Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="new_password" id="new_password" placeholder=" New Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="re-password" data-parsley-equalto="#new_password" id="re_password" required placeholder="Re Enter Password">
                                                </div>                             
                                                <div class="form-group account-btn text-center mt-2">
                                                    <div class="col-12">
                                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- end card-box -->

                                    </div>
                                    <!-- end col -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include('includes/right_sidebar.php') ?>
    <?php include('includes/scripts.php') ?>

</body>

</html>