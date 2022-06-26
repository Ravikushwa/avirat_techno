<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard </title>
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
                                        <li class="breadcrumb-item active">Item Group</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Item Group</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Item Group</h4>
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
                                            <th>Group Name</th>
                                            <th>Under</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if( !empty($group_master)){
                                        $i = 1;
                                        foreach ($group_master as $key => $value) { 
                                            $group_name = $this->HM->fetch_condrecordwithfield('item_group_master',array('id'=> $value['under'] ), '*'); 
                                            if($value['id'] == 1){
                                                break;
                                            }
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $value['group_name'] ?></td>
                                                <td><?= $group_name['group_name'] ?></td>
                                                <td>
                                                    <a href="#" data-id="<?= $value['id'] ?>" class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                    <a href="<?= base_url('Admin/deleteData?').'table=item_group_master&id='.$value['id']; ?>" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a>
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
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('item-group'); ?>" id="item-group_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                        <div class="form-group">
                            <input class="form-control" type="text" name="group_name" id="group_name" parsley-trigger="change" required placeholder="Group Name" value="">
                        </div>
                        <div class="form-group">
                            <select class="form-control " name="under" id="under" parsley-trigger="change" required="">
                                <option>Select</option>
                                <?php if( !empty($group_master)){ 
                                   foreach ($group_master as $key => $value) {  ?>
                                   <option value="<?= $value['id'] ?>"><?= $value['group_name'] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        
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

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('item-group'); ?>" id="item_group_edit" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                        <div class="form-group">
                            <input class="form-control" type="text" name="group_name" id="group_name1" parsley-trigger="change" required placeholder="Group Name" value="">
                        </div>
                        <div class="form-group">
                            <select class="form-control " name="under" id="under1" parsley-trigger="change" required="">
                                <option>Select</option>
                                <?php if( !empty($group_master)){ 
                                   foreach ($group_master as $key => $value) {  ?>
                                   <option value="<?= $value['id'] ?>"><?= $value['group_name'] ?></option>
                                <?php } } ?>
                            </select>
                            <input type="hidden" class="form-control" id="title_id" name="title_id" >
                        </div>
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
            url:'<?= base_url('/Admin/fetch_item_group__by_id') ?>',
            type:'post',
            data:{id:id},
            success:function(res){
              var obj = JSON.parse(res);
              console.log(res);
              $.each(obj, function (i, item) {
                $('#group_name1').val(item.group_name);
                $('#under1').val(item.under);
                $("#under1 option[value='"+id+"']").remove();
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