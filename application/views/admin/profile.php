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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Profile</h4>
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
                                            <div class="member-card">
                                                <div class="edit_profile"><a href ="<?= base_url('profile-edit/'). $admindata['id'] ?>"><i class="far fa-edit"></i></a></div>
                                                <div class="avatar-xl member-thumb mb-3 mx-auto d-block">
                                                    <img src="<?= ($admindata['image'])? base_url($admindata['image']):base_url('assets').'/images/users/avatar-1.jpg' ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                                </div>

                                                <div class="">
                                                    <h5 class="font-18 mb-1"><?= ($this->session->user_setdata['username'])? $this->session->user_setdata['username'] : "user"  ?></h5>
                                                    <!--<p class="text-muted mb-2">@webdesigner</p>-->
                                                </div>

                                                <!--<button type="button" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Follow</button>
                                                <button type="button" class="btn btn-danger btn-sm width-sm waves-effect mt-2 waves-light">Message</button>

                                                <p class="sub-header mt-3">
                                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                                                </p>-->

                                                <hr/>

                                                <div class="text-left">
                                                    <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ml-4"><?= $admindata['first_name']." ".$admindata['last_name'] ?></span></p>

                                                    <!--<p class="text-muted font-13"><strong>Mobile :</strong><span class="ml-4">(123) 123 1234</span></p>-->

                                                    <p class="text-muted font-13"><strong>Email :</strong> <span class="ml-4"><?= $admindata['email'] ?></span></p>

                                                    <!--<p class="text-muted font-13"><strong>Location :</strong> <span class="ml-4">USA</span></p>-->
                                                </div>

                                                <ul class="social-links list-inline mt-4">
                                                    <li class="list-inline-item">
                                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fab fa-skype"></i></a>
                                                    </li>
                                                </ul>

                                            </div>

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