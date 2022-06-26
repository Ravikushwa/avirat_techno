

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- App favicon -->
<link rel="shortcut icon" href="http://localhost/techno_avirat/assets/images/favicon.ico">

<link href="http://localhost/techno_avirat/assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">

<!-- Table datatable css -->
<link href="http://localhost/techno_avirat/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/datatables/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="http://localhost/techno_avirat/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
<link href="http://localhost/techno_avirat/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/libs/select2/select2.min.js" rel="stylesheet" type="text/css" />
<link href="http://localhost/techno_avirat/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
<link href="http://localhost/techno_avirat/assets/css/style.css" rel="stylesheet" type="text/css" id="app-stylesheet" />


</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="http://localhost/techno_avirat/assets/upload/profile1654707052.jpg" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1">RSHSOFTTECH</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="http://localhost/techno_avirat/profile" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <!--<a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a>-->

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="http://localhost/techno_avirat/logout" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="mdi mdi-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="http://localhost/techno_avirat/admin" class="logo text-center">
                    <span class="logo-lg">
                        <img src="http://localhost/techno_avirat/assets/images/mainlogo.png" alt="" height="18">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="http://localhost/techno_avirat/assets/images/mainlogo_s.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
        
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <!--<li class="d-none d-lg-block">
                    <a href="#" class="nav-link">New</a>
                </li>-->

                <!--<li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="http://localhost/techno_avirat/assets/images/flags/us.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="http://localhost/techno_avirat/assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="http://localhost/techno_avirat/assets/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="http://localhost/techno_avirat/assets/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
   
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="http://localhost/techno_avirat/assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                        </a>

                    </div>
                </li>-->


            </ul>
        </div>
        <!-- end Topbar --> 
        
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

                <div class="slimscroll-menu">
    
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
    
                        <ul class="metismenu" id="side-menu">
    
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Master  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!--<li><a href="">Group</a></li>-->
                                    <li><a href="http://localhost/techno_avirat/supplier">Supplier</a></li>
                                    <li><a href="http://localhost/techno_avirat/item-group">Item Group</a></li>
                                    <li><a href="http://localhost/techno_avirat/units">Units</a></li>
                                    <li><a href="http://localhost/techno_avirat/item-master">Items</a></li>
                                    <li><a href="http://localhost/techno_avirat/process-master">Process</a></li>
                                    <li><a href="http://localhost/techno_avirat/bom-master">BOM</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-monitor"></i>
                                    <span> Transaction  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="http://localhost/techno_avirat/purchase">Purchase</a></li>
                                    <li><a href="http://localhost/techno_avirat/jobwork-inward">Jobwork Inward</a></li>
                                    <li><a href="http://localhost/techno_avirat/workorder">Work Order</a></li>
                                    <li><a href="http://localhost/techno_avirat/process-opening">Process Opening</a></li>
                                    <li><a href="http://localhost/techno_avirat/material-issue">Material Issue</a></li>
                                    <li><a href="http://localhost/techno_avirat/grnlist">Goods Receipt Note</a></li>
                                    <li><a href="http://localhost/techno_avirat/dispatch-schedule">Dispatch Schedule</a></li>
                                    <li><a href="#">Jobwork Outward</a></li>
                                    <li><a href="#">Material Issue To Customer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                <i class="mdi mdi-source-repository-multiple"></i>
                                    <span> Report  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="http://localhost/techno_avirat/vendor-dispatch-schedule">Vendor Dispatch Schedule </a></li>
                                    <li><a href="http://localhost/techno_avirat/stock-summary">Stock Summary </a></li>
                                    <li><a href="http://localhost/techno_avirat/vendor-stock-summary">Vendor Stock Summary </a></li>
                                    <li><a href="http://localhost/techno_avirat/mis">MIS</a></li>                                    
                                </ul>
                            </li>
                           
                        </ul>
    
                    </div>
                    <!-- End Sidebar -->
    
                    <!--<div class="clearfix"></div>
    
                    <div class="help-box">
                        <h5 class="text-muted mt-0">For Help ?</h5>
                        <p class=""><span class="text-info">Email:</span>
                            <br/> support@support.com</p>
                        <p class="mb-0"><span class="text-info">Call:</span>
                            <br/> (+123) 123 456 789</p>
                    </div>-->
    
                </div>
                <!-- Sidebar -left -->
    
            </div>
            <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard </a></li>
                                        <li class="breadcrumb-item active">Material Issue </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Material Issue</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Material Issue</h4>
                                <div class="right_btn float-right">
                                    <a href="http://localhost/techno_avirat/Admin/add_material_issue" class="float-rightbtn btn-dark waves-effect width-md waves-light" style="text-align:center;">Add New</a>
                                </div>
                                                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Challen No</th>
                                            <th>Date</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                                    <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>avirat_techno</td>
                                                <td>dsadadasd</td>
                                                <td>
                                                    <a href="http://localhost/techno_avirat/Admin/edit_material_issue?id=1"
                                                     class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                    <a href="http://localhost/techno_avirat/Admin/deleteData?table=material_issue&id=1" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a> 
                                                </td>
                                            </tr>
                                                                                
                                    </tbody>
                                </table>

                                </div>
                                <!-- table-responsive -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->


                    </div>
                    <!-- end row -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->


            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2018 - 2020 &copy; Zircos theme by <a href="">Coderthemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Setting</h4>
        </div>
        <div class="slimscroll-menu">
             <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>
                    <li>
                        <a href="http://localhost/techno_avirat/change-password" clachange-passwordss="waves-effect waves-light">
                            <i class="fas fa-user-edit"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/techno_avirat/users" class="waves-effect waves-light">
                            <i class="fas fa-user-circle"></i>
                            <span>Users</span>
                        </a>
                    </li>
                </ul>
            </div>
           
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->
    <!-- Vendor js -->
    <script src="http://localhost/techno_avirat/assets/js/vendor.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/custombox/custombox.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/morris-js/morris.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/raphael/raphael.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/js/pages/dashboard.init.js"></script>

    <!-- Plugin js-->
    <script src="http://localhost/techno_avirat/assets/libs/parsleyjs/parsley.min.js"></script>

    <!-- Validation init js-->
    <script src="http://localhost/techno_avirat/assets/js/pages/form-validation.init.js"></script>

    <!-- Plugins js -->
    <script src="http://localhost/techno_avirat/assets/libs/dropify/dropify.min.js"></script>

    <!-- Init js-->
    <script src="http://localhost/techno_avirat/assets/js/pages/form-fileuploads.init.js"></script>

    <!-- Datatable plugin js -->
    <script src="http://localhost/techno_avirat/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/buttons.bootstrap4.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/buttons.print.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.scroller.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/datatables/dataTables.fixedColumns.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/jszip/jszip.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="http://localhost/techno_avirat/assets/libs/pdfmake/vfs_fonts.js"></script>

    <!-- Datatables init -->
    <script src="http://localhost/techno_avirat/assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="http://localhost/techno_avirat/assets/js/app.min.js"></script>

    <script src="http://localhost/techno_avirat/assets/libs/select2/select2.min.js"></script>

    
    <script>
    $(document).ready(function(){
        // $(".tabledit-edit-button").click(function(e){
        //     e.preventDefault();   
        //     id = $(this).data('id');

        //     $.ajax({
        //     url:'http://localhost/techno_avirat/Admin/fetch_bom_master_by_id',
        //     type:'post',
        //     data:{id:id},
        //     success:function(res){
        //       var obj = JSON.parse(res);
        //       console.log(res);
        //       $.each(obj, function (i, item) {              
        //         $('#item1').val(item.item);
        //         $('#application_no1').val(item.application_no);
        //         $('#title_id').val(item.id);
        //         $("#myModal").modal('show');  
        //       });
        //     }
        //    })
        // });
    });    
   </script>



   <script type="text/javascript">
 
    $(document).ready(function () {
        $("#addRow").click(function(e){  
            e.preventDefault();       
            var len=$('#dataAdd .item_row .form-row').length+1;     


            $("#dataAdd .item_row:last").append('<div class="row form-row"> <div class="col-md-6"> <div class="form-group"> <select class="form-control " name="item_name[]" class="item_name" parsley-trigger="change" required=""> <option>Select Item</option> <option value="1">cdscdsc</option></select> </div> </div>  <div class="col-md-3"> <div class="form-group"> <input class="form-control" type="number" name="quantity[]" id="quantity" placeholder="0" value=""> </div> </div> <div class="col-md-3"> <div class="form-group"> <input class="form-control" type="number" name="act_qty[]" id="act_qty" placeholder="0" value=""> </div> </div> </div>');
         
        });

        $("#deleteRow").click(function(e){
            e.preventDefault();
            var len=$('#dataAdd .item_row .form-row').length;
            if(len>1){
                $("#dataAdd .item_row .form-row").last().remove();
            }else{
                alert('Not able to Delete');
            }
        });

    }); 
             
        
    </script>  


</body>

</html>sssss