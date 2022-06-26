
<?php 
    $new_value = "";
    $new_value1 = "";
    if( !empty($item_master)){ 
       foreach ($item_master as $key => $value) {  
       $unit = $this->HM->fetch_condrecordwithfield('units_master',array('id'=> $value['item_unit']), '*');
       $new_value .='<option value="'.$value['id'].'" data-code="'.$value['code'].'">'.$value['code'].'-'.$value['name'].'-'.$unit['name'].'</option>';
    } } 

   if( !empty($process_master)){ 
        foreach ($process_master as $key => $value) {  
        $new_value1 .='<option value="'.$value['id'].'" data-code="'.$value['short_name'].'">'.$value['process_name'].'</option>';
    }}
?>
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
    <style type="text/css">
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
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
                                        <li class="breadcrumb-item active">Add Workorder</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Workorder</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <!--<h4 class="header-title mb-4">Add Supplier</h4>-->
                                <?php if(!empty($this->session->flashdata('Success'))){ ?>
                                    <div class="alert alert-success" role="alert">  
                                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?= $this->session->flashdata('Success') ?>  
                                    </div>
                                <?php }else if(!empty($this->session->flashdata('Error'))){ ?>
                                    <div class="alert alert-danger" role="alert">  
                                        <?= $this->session->flashdata('Error') ?>
                                    </div>
                                <?php } ?>

                                <form action="<?= base_url('workorder'); ?>" id="item-group_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Date</label>
                                                <div class="col-md-10">
                                                   <input class="form-control" type="date" name="date" id="date" parsley-trigger="change" required  value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Party</label>
                                                <div class="col-md-10">
                                                   <select class="form-control " name="item" id="item" parsley-trigger="change" required="">
                                                        <?php if( !empty($suppliers)){ 
                                                           foreach ($suppliers as $key => $value) {  
                                                        ?>
                                                           <option value="<?= $value['id'] ?>"><?= $value['ledger'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">RM Process</label>
                                                <div class="col-md-10">
                                                   <select class="form-control " name="process" id="process" parsley-trigger="change" required="">
                                                        <?php if( !empty($process_master)){ 
                                                           foreach ($process_master as $key => $value) {  
                                                        ?>
                                                           <option value="<?= $value['id'] ?>" data-code="<?= $value['short_name'] ?>"><?= $value['process_name'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Valid From</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="date" name="valid_from" id="valid_from" parsley-trigger="change" required  value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Valid To</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="date" name="valid_to" id="valid_to" parsley-trigger="change" required  value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Remark</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="remark" id="remark" parsley-trigger="change" required  value="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                        </div>
                                    </div>


                                    <div id="dataAdd">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="control-label">Item </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="control-label">Process</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="control-label">Rate</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item_row">
                                        <div class="row form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                     <select class="form-control item_name" name="item_name[]"  parsley-trigger="change" required="">
                                                        <?php if( !empty($item_master)){ 
                                                           foreach ($item_master as $key => $value) {  
                                                           $unit = $this->HM->fetch_condrecordwithfield('units_master',array('id'=> $value['item_unit']), '*');
                                                        ?>
                                                           <option value="<?= $value['id'] ?>" data-code="<?= $value['code'] ?> "><?= $value['code'].'-'.$value['name'].'-'.$unit['name'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control process1" name="process1[]"  parsley-trigger="change" required="">
                                                        <?php if( !empty($process_master)){ 
                                                           foreach ($process_master as $key => $value) {  
                                                        ?>
                                                           <option value="<?= $value['id'] ?>" data-code="<?= $value['short_name'] ?>" ><?= $value['process_name'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control rate" type="number" name="rate[]" value="" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <button class="btn btn-success" id="addRow">Add row</button>     <button class="btn btn-danger" id="deleteRow">Delete row</button>


                                        <div class="row total_row">
                                            <div class="col-md-8">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control total_rate" type="number" name="total_rate" value="0" step="0.01" placeholder="0.00" readonly>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
 
    $(document).ready(function () {
        $("#addRow").click(function(e){  
            e.preventDefault();       
            var len=$('#dataAdd .item_row .form-row').length+1;     


            $("#dataAdd .item_row:last").append('<div class="row form-row"> <div class="col-md-4"> <div class="form-group"> <select class="form-control item_name" name="item_name[]"  parsley-trigger="change" required=""> <?php echo $new_value; ?></select> </div> </div>  <div class="col-md-4"> <div class="form-group">  <select class="form-control process1" name="process1[]"  parsley-trigger="change" required=""> <?php echo $new_value1; ?></select> </div> </div>  <div class="col-md-4"> <div class="form-group"> <input class="form-control rate" type="number" name="rate[]" value="" step="0.01" placeholder="0.00"> </div> </div> </div> ');

            $('.item_row .item_name , .item_row .process1').each(function(){
                $(this).select2();
            });
     
        });



        $("#deleteRow").click(function(e){
            e.preventDefault();
            var sum=0 , total_amt=0 ,sumpcs=0;
            var len=$('#dataAdd .item_row .form-row').length;
            if(len>1){
                $("#dataAdd .item_row .form-row").last().remove();
    
                $('.item_row .rate').each(function(){
                    sumpcs+= parseFloat($(this).val());
                });

                $('.total_rate').val(sumpcs);

            }else{
                alert('Not able to Delete');
            }
        });

        $('#item,#process , .item_row .item_name , .item_row .process1').select2();

    }); 

    $(document).ready(function () {
        
        $('.item_row').on('change','.rate',function(e) {
            e.preventDefault(); 
            var sum=0;
            var id = $(this).val();
            //var weight = $(this).closest(".form-row").find('.weight').val();

            $('.item_row .rate').each(function(){
                sum+= parseFloat($(this).val());
            });
            $('.total_rate').val(sum);
            //$(this).closest(".form-row").find('.amount').val(amount);

        });

    });


               
    </script> 



</body>

</html>