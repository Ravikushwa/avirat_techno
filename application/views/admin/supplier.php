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
                                    <!--<button type="button" class="float-rightbtn btn-dark waves-effect width-md waves-light" data-toggle="modal" data-target="#exampleModalCenter">Add New</button>-->
                                    <a href="<?= base_url('Admin/add_supplier_master') ?>" class="float-rightbtn btn-dark waves-effect width-md waves-light" style="text-align:center;">Add New</a>

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
                                                    <a href="<?= base_url('Admin/edit_supplier_master')."?id=".$value['id'] ?>"
                                                     class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
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
        // $(".tabledit-edit-button").click(function(e){
        //     e.preventDefault();   
        //     id = $(this).data('id');

        //     $.ajax({
        //     url:'<?= base_url('/Admin/fetch_supplier_by_id') ?>',
        //     type:'post',
        //     data:{id:id},
        //     success:function(res){
        //       var obj = JSON.parse(res);
        //       console.log(res);
        //       $.each(obj, function (i, item) {
        //         $('#ledger1').val(item.ledger);
        //         $('#group1').val(item.group);
        //         $('#desktop_code1').val(item.desktop_code);
        //         $('#name1').val(item.name);
        //         $('#email1').val(item.email);
        //         $('#vendor1').val(item.vendor);
        //         $('#title_id').val(item.id);
        //         $("#myModal").modal('show');  
        //       });
        //     }
        //    })
        // });
    });    
   </script>

</body>

</html>