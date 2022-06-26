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
    <link href="<?= base_url('assets') ?>/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />

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
                                        <li class="breadcrumb-item active">Item Master</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Item Master</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Item Master</h4>
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
                                            <th>Code</th>
                                            <th>Item Name</th>
                                            <th>Cut Length</th>
                                            <th>Base Part No</th>
                                            <th>Group</th>
                                            <th>Application No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if( !empty($item_master)){
                                        $i = 1;
                                        foreach ($item_master as $key => $value) { 
                                            $group_name = $this->HM->fetch_condrecordwithfield('item_group_master',array('id'=> $value['group'] ), '*'); 
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $value['code'] ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['cut_length'] ?></td>
                                                <td><?= $value['base_path_no'] ?></td>
                                                <td><?= $group_name['group_name'] ?></td>
                                                <td><?= $value['application_no'] ?></td>
                                                <td>
                                                    <a href="#" data-id="<?= $value['id'] ?>" class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                    <a href="<?= base_url('Admin/deleteData?').'table=item_master&id='.$value['id']; ?>" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('item-master'); ?>" id="item-group_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Code</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="code" id="code" parsley-trigger="change" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="name" id="name" parsley-trigger="change" required  value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item Type</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="type" id="type" parsley-trigger="change" required  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Cut Length</label>
                                    <div class="col-md-4">
                                         <input class="form-control" type="number" name="cut_length" id="cut_length" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                    <div class="col-md-4">
                                         <select class="form-control " name="cut_length_unit" id="cut_length_unit" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Short Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="short_name" id="short_name" parsley-trigger="change" required placeholder="Enter Short Name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Group</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="group" id="group" parsley-trigger="change" required="">
                                            <option>Select</option>
                                            <?php if( !empty($group_master)){ 
                                               foreach ($group_master as $key => $value) {  
                                               if($value['id'] == 1){
                                                  break;
                                               } 
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['group_name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Base Part No</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="base_path_no" id="base_path_no" parsley-trigger="change" required value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Application No</label>
                                    <div class="col-md-8">
                                        <input type="text" value="" name="application_no" id="application_no"  data-role="tagsinput" placeholder="add tags" parsley-trigger="change" required  value="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Base Length</label>
                                    <div class="col-md-4">
                                         <input class="form-control" type="number" name="base_length" id="base_length" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                    <div class="col-md-4">
                                         <select class="form-control " name="base_length_unit" id="base_length_unit" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Base Final Length</label>
                                    <div class="col-md-4">
                                         <input class="form-control" type="number" name="base_final_length" id="base_final_length" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                    <div class="col-md-4">
                                         <select class="form-control " name="base_final_length_unit" id="base_final_length_unit" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Pkg Size</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="pkg_size" id="pkg_size" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item Unit</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="item_unit" id="item_unit" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                     <form action="<?= base_url('item-master'); ?>" id="item_group_edit" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Code</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="code" id="code1" parsley-trigger="change" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="name" id="name1" parsley-trigger="change" required  value="">
                                        <input type="hidden" class="form-control" id="title_id" name="title_id" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item Type</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="type" id="type1" parsley-trigger="change" required  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Cut Length</label>
                                    <div class="col-md-4">
                                         <input class="form-control" type="number" name="cut_length" id="cut_length1" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                    <div class="col-md-4">
                                         <select class="form-control " name="cut_length_unit" id="cut_length_unit1" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Short Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="short_name" id="short_name1" parsley-trigger="change" required placeholder="Enter Short Name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Group</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="group" id="group1" parsley-trigger="change" required="">
                                            <option>Select</option>
                                            <?php if( !empty($group_master)){ 
                                               foreach ($group_master as $key => $value) {  
                                               if($value['id'] == 1){
                                                  break;
                                               } 
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['group_name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Base Part No</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="base_path_no" id="base_path_no1" parsley-trigger="change" required value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Application No</label>
                                    <div class="col-md-8">
                                        <input type="text" value="" name="application_no" id="application_no1"  data-role="tagsinput" placeholder="add tags" parsley-trigger="change" required  value="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Base Length</label>
                                    <div class="col-md-4">
                                         <input class="form-control" type="number" name="base_length" id="base_length1" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                    <div class="col-md-4">
                                         <select class="form-control " name="base_length_unit" id="base_length_unit1" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Base Final Length</label>
                                    <div class="col-md-4">
                                         <input class="form-control" type="number" name="base_final_length" id="base_final_length1" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                    <div class="col-md-4">
                                         <select class="form-control " name="base_final_length_unit" id="base_final_length_unit1" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Pkg Size</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="pkg_size" id="pkg_size1" parsley-trigger="change" required placeholder="0.0000" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item Unit</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="item_unit" id="item_unit1" parsley-trigger="change" required="">
                                            <option>Unit</option>
                                            <?php 
                                               if( !empty($units_master)){ 
                                               foreach ($units_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
    <script src="<?= base_url('assets') ?>/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <script>
    $(document).ready(function(){
        $(".tabledit-edit-button").click(function(e){
            e.preventDefault();   
            id = $(this).data('id');

            $.ajax({
            url:'<?= base_url('/Admin/fetch_item_master_by_id') ?>',
            type:'post',
            data:{id:id},
            success:function(res){
              var obj = JSON.parse(res);
              console.log(res);
              $.each(obj, function (i, item) {              
                $('#code1').val(item.code);
                $('#name1').val(item.name);
                $('#type1').val(item.type);
                $('#cut_length1').val(item.cut_length);
                $('#cut_length_unit1').val(item.cut_length_unit);
                $('#short_name1').val(item.short_name);
                $('#group1').val(item.group);
                $("#group1 option[value='"+id+"']").remove();
                $('#base_path_no1').val(item.base_path_no);
                $('#base_length1').val(item.base_length);
                $('#base_length_unit1').val(item.base_length_unit);
                $('#base_final_length1').val(item.base_final_length);
                $('#base_final_length_unit1').val(item.base_final_length_unit);
                $('#pkg_size1').val(item.pkg_size);
                $('#item_unit1').val(item.item_unit);
                $('#application_no1').val(item.application_no);
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