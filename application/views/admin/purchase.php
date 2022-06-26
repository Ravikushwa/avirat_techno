
<?php 
    $new_value = "";
    if( !empty($item_master)){ 
       foreach ($item_master as $key => $value) {  
       $new_value .='<option value="'.$value['id'].'">'.$value['name'].'</option>';
    } } 
?>
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
                                        <li class="breadcrumb-item active">BOM Master</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">BOM Master</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Purchase </h4>
                                <div class="right_btn float-right">
                                    <a href="<?= base_url('Admin/add_purchase') ?>" class="float-rightbtn btn-dark waves-effect width-md waves-light" style="text-align:center;">Add New</a>
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
                                            <th>Entry Type</th>
                                            <th>Tran No</th>
                                            <th>Date</th>
                                            <th>Supplier</th>
                                            <th>Chl No</th>
                                            <th>Chl Date</th>
                                            <th>Bill No</th>
                                            <th>Bill Date</th>
                                            <!--<th>Total Wt</th>
                                            <th>Total Pcs</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if( !empty($purchase)){
                                        $i = 1;
                                        foreach ($purchase as $key => $value) { 
                                            $item_name = $this->HM->fetch_condrecordwithfield('suppliers',array('id'=> $value['item'] ), '*'); 
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $value['type'] ?></td>
                                                <td><?= $value['id'] ?></td>
                                                <td><?= $value['date'] ?></td>
                                                <td><?= $item_name['ledger'] ?></td>
                                                <td><?= $value['challan_no'] ?></td>
                                                <td><?= $value['challan_date'] ?></td>
                                                <td><?= $value['bill_no'] ?></td>
                                                <td><?= $value['bill_date'] ?></td>
                                                <!--<td><?= $value['total_weight'] ?></td>
                                                <td><?= $value['total_pcs'] ?></td>-->
                                                <td>
                                                    <a href="<?= base_url('Admin/edit_purchase')."?id=".$value['id'] ?>"
                                                     class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                    <a href="<?= base_url('Admin/deleteData?').'table=purchase&id='.$value['id']; ?>" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a>
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
                     <form action="<?= base_url('bom-master'); ?>" id="item-group_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item</label>
                                    <div class="col-md-8">
                                       <select class="form-control " name="item" id="item" parsley-trigger="change" required="">
                                            <option>Select</option>
                                            <?php if( !empty($item_master)){ 
                                               foreach ($item_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Application No</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="application_no" id="application_no" parsley-trigger="change" required  value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="dataAdd">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Item Details</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="control-label">Quantity</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="control-label">Act.Qty</label>
                                    </div>
                                </div>
                            </div>

                            <div class="item_row">
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <select class="form-control " name="item_name[]" id="item_name" parsley-trigger="change" required="">
                                            <option>Select Item</option>
                                            <?php if( !empty($item_master)){ 
                                               foreach ($item_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="quantity[]" id="quantity"  placeholder="0" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="act_qty[]" id="act_qty" placeholder="0" value="">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <button class="btn btn-success" id="addRow">Add row</button>     <button class="btn btn-danger" id="deleteRow">Delete row</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add BOM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?= base_url('bom-master'); ?>" id="bom_master_edit" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Item</label>
                                    <div class="col-md-8">
                                       <select class="form-control " name="item" id="item1" parsley-trigger="change" required="">
                                            <option>Select</option>
                                            <?php if( !empty($item_master)){ 
                                               foreach ($item_master as $key => $value) {  
                                            ?>
                                               <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Application No</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="application_no" id="application_no1" parsley-trigger="change" required  value="">
                                        <input type="hidden" class="form-control" id="title_id" name="title_id" value="">
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

    
    <script>
    $(document).ready(function(){
        // $(".tabledit-edit-button").click(function(e){
        //     e.preventDefault();   
        //     id = $(this).data('id');

        //     $.ajax({
        //     url:'<?= base_url('/Admin/fetch_bom_master_by_id') ?>',
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


            $("#dataAdd .item_row:last").append('<div class="row form-row"> <div class="col-md-6"> <div class="form-group"> <select class="form-control " name="item_name[]" class="item_name" parsley-trigger="change" required=""> <option>Select Item</option> <?php echo $new_value; ?></select> </div> </div>  <div class="col-md-3"> <div class="form-group"> <input class="form-control" type="number" name="quantity[]" id="quantity" placeholder="0" value=""> </div> </div> <div class="col-md-3"> <div class="form-group"> <input class="form-control" type="number" name="act_qty[]" id="act_qty" placeholder="0" value=""> </div> </div> </div>');
         
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

</html>