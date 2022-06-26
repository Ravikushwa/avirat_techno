<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard 1 | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <?php include('includes/head.php') ?>

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
                                        <li class="breadcrumb-item active">Supplier Master</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Supplier Master</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Supplier</h4>
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
                                            <th>Ledger</th>
                                            <th>Group</th>
                                            <th>Desktop A/C Code</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if( !empty($suppliers)){
                                        $i = 1;
                                        foreach ($suppliers as $value) {   ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $value['ledger'] ?></td>
                                                <td><?= $value['group'] ?></td>
                                                <td><?= $value['desktop_code'] ?></td>
                                                <td><?= $value['name'] ?></td>
                                                
                                                <td><?= $value['email'] ?></td>
                                                <td>
                                                    <a href="#" data-id="<?= $value['id'] ?>" class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                    <a href="<?= base_url('Admin/deleteData?').'table=suppliers&id='.$value['id']; ?>" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a>
                                                </td>
                                            </tr>
                                        <?php $i++; }} ?>
                                        
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('supplier'); ?>" id="supplier_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Ledger</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="ledger" id="ledger" parsley-trigger="change" required placeholder="Ledger" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Group</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="group" id="group" parsley-trigger="change" required="">
                                            <option value="Sundry Creditors" >Sundry Creditors</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Desktop A/C code</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="desktop_code" id="desktop_code" parsley-trigger="change" required  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Vendor</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="vendor" id="vendor" parsley-trigger="change" required="">
                                            <option>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="name" id="name" required placeholder="Name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="email" name="email" id="email" required placeholder="Email" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">File</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control" name="picture" data-height="100" />
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group account-btn text-center mt-2">
                            <div class="col-12">
                                <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>
                        <br><br>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('supplier'); ?>" id="supplier_edit" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Ledger</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="ledger" id="ledger1" parsley-trigger="change" required placeholder="Ledger" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Group</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="group" id="group1" parsley-trigger="change" required="">
                                            <option value="Sundry Creditors" >Sundry Creditors</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Desktop A/C code</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="desktop_code" id="desktop_code1" parsley-trigger="change" required  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Vendor</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="vendor" id="vendor1" parsley-trigger="change" required="">
                                            <option>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="name" id="name1" required placeholder="Name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="email" name="email" id="email1" required placeholder="Email" value="">
                                    </div>
                                    <input type="hidden" class="form-control" id="title_id" name="title_id" >
                                </div>
                            </div>
                        </div>

                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">File</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control" name="picture" data-height="100" />
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="form-group account-btn text-center mt-2">
                            <div class="col-12">
                                <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>
                        <br><br>
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
            url:'<?= base_url('/Admin/fetch_supplier_by_id') ?>',
            type:'post',
            data:{id:id},
            success:function(res){
              var obj = JSON.parse(res);
              console.log(res);
              $.each(obj, function (i, item) {
                $('#ledger1').val(item.ledger);
                $('#group1').val(item.group);
                $('#desktop_code1').val(item.desktop_code);
                $('#name1').val(item.name);
                $('#email1').val(item.email);
                $('#vendor1').val(item.vendor);
                $('#title_id').val(item.id);
                $("#myModal").modal('show');  
              });
            }
           })
        });
    });    
   </script>

</body>

</html>