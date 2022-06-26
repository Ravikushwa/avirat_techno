
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
                                    <a href="<?= base_url('Admin/add_material_issue') ?>" class="float-rightbtn btn-dark waves-effect width-md waves-light" style="text-align:center;">Add New</a>
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
                                            <th>Challen No</th>
                                            <th>Date</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if( !empty($material_issue)){
                                        $i = 1;
                                        foreach ($material_issue as $key => $value) { 
                                            //$item_name = $this->HM->fetch_condrecordwithfield('item_master',array('id'=> $value['item'] ), '*'); 
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $value['id'] ?></td>
                                                <td><?= $value['date'] ?></td>
                                                <td><?= $value['remark'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('Admin/edit_material_issue')."?id=".$value['id'] ?>"
                                                     class="tabledit-edit-button btn btn-primary" style="float: none;"><span class="mdi mdi-pencil"></span></a> &nbsp;
                                                    <a href="<?= base_url('Admin/deleteData?').'table=material_issue&id='.$value['id']; ?>" class="tabledit-delete-button btn btn-danger" onclick="return confirm('Are you sure you want to delete')" style="float: none;"><span class="mdi mdi-delete-alert"></span></a> 
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