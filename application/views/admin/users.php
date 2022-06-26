<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <?php include('includes/head.php') ?>
    <style type="text/css">
        form#user_signup {
            padding-bottom: 50px;
        }
    </style>

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <?php include('includes/header.php') ?>
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
                                        <li class="breadcrumb-item active">Users</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Users</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Users</h4>
                                <div class="right_btn float-right">
                                    <button type="button" class="float-rightbtn btn-dark waves-effect width-md waves-light" data-toggle="modal" data-target="#exampleModalCenter">Add New</button>
                                </div>
                                <?php if(!empty($this->session->flashdata('Success'))){ ?>
                                    <div class="alert alert-success" role="alert">  
                                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?= $this->session->flashdata('Success') ?>  
                                    </div>
                                <?php }else if(!empty($this->session->flashdata('Error'))){ ?>
                                    <div class="alert alert-danger" role="alert">  
                                        <?= $this->session->flashdata('Error') ?>
                                    </div>
                                <?php } ?>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Type</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if( !empty($users)){
                                        $i = 1;
                                        foreach ($users as $value) {   ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $value['first_name']."".$value['last_name'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td><?= $value['username'] ?></td>
                                                <td><?= $value['type'] ?></td>
                                                <td><img src="<?= ($value['image'])? base_url($value['image']):base_url('assets').'/images/users/avatar-11.png' ?>" class="rounded-circle img-thumbnail" alt="profile-image" style="width:50px;"></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <a href="#" data-id="<?= $value['id'] ?>" class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                        <a href="<?= base_url('Admin/deleteData?').'table=users&id='.$value['id']; ?>" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;  }} ?>
                                        
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


            <!-- Modal -->
            <div class="modal fade bs-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('users'); ?>" id="user_signup" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name" id="first_name" parsley-trigger="change" required placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="last_name" id="last_name" parsley-trigger="change" required placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email" parsley-trigger="change" parsley-type="email" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" id="username" parsley-trigger="change"  required data-parsley-length="[6,15]"required placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="mobile" id="mobile" parsley-trigger="change" data-parsley-type="number" data-parsley-minlength="10" required placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control "  name="type" id="type" parsley-trigger="change" required>
                                        <option >Select</option>
                                        <option value="User" >User</option>
                                        <option value="Super User" >Super User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" id="new_password" placeholder=" New Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="re-password" data-parsley-equalto="#new_password" id="re_password" required placeholder="Re Enter Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="picture" data-height="100" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="sub-header mt-1 mb-1">SET UP</h3>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Supplier</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="supplier_all_data" value="true" name="supplier_all_data">
                                    <label for="supplier_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="supplier_modify" value="true" name="supplier_modify">
                                    <label for="supplier_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Item Group</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="item_group_all_data" value="true" name="item_group_all_data">
                                    <label for="item_group_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="item_group_modify" value="true" name="item_group_modify">
                                    <label for="item_group_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Units</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="units_all_data" value="true" name="units_all_data">
                                    <label for="units_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="units_modify" value="true" name="units_modify">
                                    <label for="units_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Items</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="items_all_data" value="true" name="items_all_data">
                                    <label for="items_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="items_modify" value="true" name="items_modify">
                                    <label for="items_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Process</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="process_all_data" value="true" name="process_all_data">
                                    <label for="process_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="process_modify" value="true" name="process_modify">
                                    <label for="process_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">BOM</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="bom_all_data" value="true" name="bom_all_data">
                                    <label for="bom_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="bom_modify" value="true" name="bom_modify">
                                    <label for="bom_modify"> Modify </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="sub-header mt-1 mb-1">TRANSACTION</h3>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Purchase</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="purchase_all_data" value="true" name="purchase_all_data">
                                    <label for="purchase_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="purchase_modify" value="true" name="purchase_modify">
                                    <label for="purchase_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Jobwork Inward</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="jobwork_inward_all_data" value="true" name="jobwork_inward_all_data">
                                    <label for="jobwork_inward_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="jobwork_inward_modify" value="true" name="jobwork_inward_modify">
                                    <label for="jobwork_inward_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Work Order</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="work_order_all_data" value="true" name="work_order_all_data">
                                    <label for="work_order_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="work_order_modify" value="true" name="work_order_modify">
                                    <label for="work_order_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Process Opening</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="process_opening_all_data" value="true" name="process_opening_all_data">
                                    <label for="process_opening_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="process_opening_modify" value="true" name="process_opening_modify">
                                    <label for="process_opening_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Material Issue</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="material_issue_all_data" value="true" name="material_issue_all_data">
                                    <label for="material_issue_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="material_issue_modify" value="true" name="material_issue_modify">
                                    <label for="material_issue_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Goods Receipt Note</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="goods_receipt_note_all_data" value="true" name="goods_receipt_note_all_data">
                                    <label for="goods_receipt_note_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="goods_receipt_note_modify" value="true" name="goods_receipt_note_modify">
                                    <label for="goods_receipt_note_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Dispatch Schedule</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="dispatch_all_data" value="true" name="dispatch_all_data">
                                    <label for="dispatch_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="dispatch_modify" value="true" name="dispatch_modify">
                                    <label for="dispatch_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Jobwork Outward</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="jobwork_all_data" value="true" name="jobwork_all_data">
                                    <label for="jobwork_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="jobwork_modify" value="true" name="jobwork_modify">
                                    <label for="jobwork_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Material Issue To Customer</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="material_cus_all_data" value="true" name="material_cus_all_data">
                                    <label for="material_cus_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="material_cus_modify" value="true" name="material_cus_modify">
                                    <label for="material_cus_modify"> Modify </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="sub-header mt-1 mb-1">REPORT</h3>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Vendor Dispatch Schedule </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="vendor_all_data" value="true" name="vendor_all_data">
                                    <label for="vendor_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="vendor_modify" value="true" name="vendor_modify">
                                    <label for="vendor_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Stock Summary </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="stock_all_data" value="true" name="stock_all_data">
                                    <label for="stock_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="stock_modify" value="true" name="stock_modify">
                                    <label for="stock_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Vendor Stock Summary </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="vendor_stock_all_data" value="true" name="vendor_stock_all_data">
                                    <label for="vendor_stock_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="vendor_stock_modify" value="true" name="vendor_stock_modify">
                                    <label for="vendor_stock_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">MIS </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="mis_all_data" value="true" name="mis_all_data">
                                    <label for="mis_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="mis_modify" value="true" name="mis_modify">
                                    <label for="mis_modify"> Modify </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group account-btn text-center mt-2">
                            <div class="col-12">
                                <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('users'); ?>" id="edit_users" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name" id="first_name1" parsley-trigger="change" required placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="last_name" id="last_name1" parsley-trigger="change" required placeholder="Last Name">
                                    <input type="hidden" class="form-control" id="title_id" name="title_id" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email1" parsley-trigger="change" parsley-type="email" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" id="username1" parsley-trigger="change" required data-parsley-length="[6,15]"required placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="mobile" id="mobile1" parsley-trigger="change" data-parsley-type="number" data-parsley-minlength="10" required placeholder="Mobile Number">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control "  name="type" id="type1" parsley-trigger="change" required>
                                        <option >Select</option>
                                        <option value="User" >User</option>
                                        <option value="Super User" >Super User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="picture" data-height="100" />
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-12">
                                <h3 class="sub-header mt-1 mb-1">SET UP</h3>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Supplier</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="supplier_all_data" value="true" name="supplier_all_data">
                                    <label for="supplier_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="supplier_modify" value="true" name="supplier_modify">
                                    <label for="supplier_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Item Group</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="item_group_all_data" value="true" name="item_group_all_data">
                                    <label for="item_group_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="item_group_modify" value="true" name="item_group_modify">
                                    <label for="item_group_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Units</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="units_all_data" value="true" name="units_all_data">
                                    <label for="units_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="units_modify" value="true" name="units_modify">
                                    <label for="units_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Items</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="items_all_data" value="true" name="items_all_data">
                                    <label for="items_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="items_modify" value="true" name="items_modify">
                                    <label for="items_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Process</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="process_all_data" value="true" name="process_all_data">
                                    <label for="process_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="process_modify" value="true" name="process_modify">
                                    <label for="process_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">BOM</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="bom_all_data" value="true" name="bom_all_data">
                                    <label for="bom_all_data">  All Data </label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="bom_modify" value="true" name="bom_modify">
                                    <label for="bom_modify"> Modify </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="sub-header mt-1 mb-1">TRANSACTION</h3>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Purchase</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="purchase_all_data" value="true" name="purchase_all_data">
                                    <label for="purchase_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="purchase_modify" value="true" name="purchase_modify">
                                    <label for="purchase_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Jobwork Inward</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="jobwork_inward_all_data" value="true" name="jobwork_inward_all_data">
                                    <label for="jobwork_inward_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="jobwork_inward_modify" value="true" name="jobwork_inward_modify">
                                    <label for="jobwork_inward_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Work Order</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="work_order_all_data" value="true" name="work_order_all_data">
                                    <label for="work_order_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="work_order_modify" value="true" name="work_order_modify">
                                    <label for="work_order_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Process Opening</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="process_opening_all_data" value="true" name="process_opening_all_data">
                                    <label for="process_opening_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="process_opening_modify" value="true" name="process_opening_modify">
                                    <label for="process_opening_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Material Issue</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="material_issue_all_data" value="true" name="material_issue_all_data">
                                    <label for="material_issue_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="material_issue_modify" value="true" name="material_issue_modify">
                                    <label for="material_issue_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Goods Receipt Note</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="goods_receipt_note_all_data" value="true" name="goods_receipt_note_all_data">
                                    <label for="goods_receipt_note_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="goods_receipt_note_modify" value="true" name="goods_receipt_note_modify">
                                    <label for="goods_receipt_note_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Dispatch Schedule</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="dispatch_all_data" value="true" name="dispatch_all_data">
                                    <label for="dispatch_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="dispatch_modify" value="true" name="dispatch_modify">
                                    <label for="dispatch_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Jobwork Outward</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="jobwork_all_data" value="true" name="jobwork_all_data">
                                    <label for="jobwork_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="jobwork_modify" value="true" name="jobwork_modify">
                                    <label for="jobwork_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Material Issue To Customer</p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="material_cus_all_data" value="true" name="material_cus_all_data">
                                    <label for="material_cus_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="material_cus_modify" value="true" name="material_cus_modify">
                                    <label for="material_cus_modify"> Modify </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="sub-header mt-1 mb-1">REPORT</h3>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Vendor Dispatch Schedule </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="vendor_all_data" value="true" name="vendor_all_data">
                                    <label for="vendor_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="vendor_modify" value="true" name="vendor_modify">
                                    <label for="vendor_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Stock Summary </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="stock_all_data" value="true" name="stock_all_data">
                                    <label for="stock_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="stock_modify" value="true" name="stock_modify">
                                    <label for="stock_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">Vendor Stock Summary </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="vendor_stock_all_data" value="true" name="vendor_stock_all_data">
                                    <label for="vendor_stock_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="vendor_stock_modify" value="true" name="vendor_stock_modify">
                                    <label for="vendor_stock_modify"> Modify </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="sub-header mt-1 mb-1">MIS </p>
                                <div class="checkbox form-check-inline">
                                    <input type="checkbox" id="mis_all_data" value="true" name="mis_all_data">
                                    <label for="mis_all_data">All Data</label>
                                </div>
                                <div class="checkbox checkbox-success form-check-inline">
                                    <input type="checkbox" id="mis_modify" value="true" name="mis_modify">
                                    <label for="mis_modify"> Modify </label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-12">
                                <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="edit_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>-->
                </div>
              </div>
            </div>

            <?php include('includes/footer.php') ?>

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    <?php include('includes/right_sidebar.php') ?>
    <?php include('includes/scripts.php') ?>

    <script>
    $(document).ready(function(){
        $(".tabledit-edit-button").click(function(e){
            e.preventDefault();   
            id = $(this).data('id');

            $.ajax({
            url:'<?= base_url('/Admin/fetch_user_id') ?>',
            type:'post',
            data:{id:id},
            success:function(res){
              var obj = JSON.parse(res);
              console.log(res);
              $.each(obj, function (i, item) {
                $('#first_name1').val(item.first_name);
                $('#last_name1').val(item.last_name);
                $('#email1').val(item.email);
                $('#username1').val(item.username);
                $('#type1').val(item.type);
                $('#title_id').val(item.id);
                $('#mobile1').val(item.mobile);
                $("#myModal").modal('show');  
              });
            }
           })
        });
    });    
   </script>

</body>

</html>