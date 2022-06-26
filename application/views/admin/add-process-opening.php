
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
                                        <li class="breadcrumb-item active">Add Process Opening</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Process Opening</h4>
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

                                <form action="<?= base_url('process-opening'); ?>" id="item-group_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Challen No</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="text" name="challen_no" id="challen_no"   value="" readonly > 
                                                </div>
                                                 <label class="col-md-2 control-label">Date</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="date" name="date" id="date" parsley-trigger="change" required  value="<?php echo date('Y-m-d'); ?>">
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
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Item </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label class="control-label">Bundle No </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Process</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label class="control-label">Final Item Code</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">PCS</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Quantity</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item_row">
                                        <div class="row form-row">
                                            <div class="col-md-3">
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
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input class="form-control bundle_no" type="text" name="bundle_no[]" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="form-control process" name="process[]"  parsley-trigger="change" required="">
                                                        <?php if( !empty($process_master)){ 
                                                           foreach ($process_master as $key => $value) {  
                                                            if(($value['code'] == 1000) or ($value['code'] == 999) ){
                                                                break;
                                                            }
                                                        ?>
                                                           <option value="<?= $value['id'] ?>" data-code="<?= $value['short_name'] ?>"><?= $value['process_name'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input class="form-control final_item_code" type="text" name="final_item_code[]" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control pcs" type="number" name="pcs[]" value="" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control qty" type="number" name="qty[]" value="" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <button class="btn btn-success" id="addRow">Add row</button>     <button class="btn btn-danger" id="deleteRow">Delete row</button>


                                        <div class="row total_row">
                                            <div class="col-md-10">
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control total_pcs" type="number" name="total_pcs" value="0" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control total_qty" type="number" name="total_qty" value="0" step="0.01" placeholder="0.00" readonly>
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


            $("#dataAdd .item_row:last").append('<div class="row form-row"> <div class="col-md-3"> <div class="form-group"> <select class="form-control item_name" name="item_name[]"  parsley-trigger="change" required=""> <?php echo $new_value; ?></select> </div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control bundle_no" type="text" name="bundle_no[]" value="" readonly> </div> </div> <div class="col-md-3"> <div class="form-group">  <select class="form-control process" name="process[]"  parsley-trigger="change" required=""> <?php echo $new_value1; ?></select> </div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control final_item_code" type="text" name="final_item_code[]" value="" readonly> </div> </div> <div class="col-md-1"> <div class="form-group"> <input class="form-control pcs" type="number" name="pcs[]" value="" step="0.01" placeholder="0.00"> </div> </div> <div class="col-md-1"> <div class="form-group"> <input class="form-control qty" type="number" name="qty[]" value="" step="0.01" placeholder="0.00"> </div> </div> </div> ');

            $('.item_row .item_name , .item_row .process').each(function(){
                $(this).select2();
            });
     
        });



        $("#deleteRow").click(function(e){
            e.preventDefault();
            var sum=0 , total_qty=0 ,sumpcs=0;
            var len=$('#dataAdd .item_row .form-row').length;
            if(len>1){
                $("#dataAdd .item_row .form-row").last().remove();

                $('.item_row .qty').each(function(){
                    total_qty+= parseFloat($(this).val());
                });

                $('.item_row .pcs').each(function(){
                    sumpcs+= parseFloat($(this).val());    
                });  

                $('.total_pcs').val(sumpcs);
                $('.total_qty').val(total_qty );

            }else{
                alert('Not able to Delete');
            }
        });

        $('#item , .item_row .item_name , .item_row .process').select2();

    }); 

    $(document).ready(function () {
        
        $('.item_row').on('change','.pcs',function(e) {
            e.preventDefault(); 
            var sum=0;
            var id = $(this).val();
            //var weight = $(this).closest(".form-row").find('.weight').val();
            //var pcs = $(this).closest(".form-row").find('.pcs').val();
            //var rate = $(this).closest(".form-row").find('.rate').val();
            //var discount = $(this).closest(".form-row").find('.discount').val();
            //var amount = weight*pcs*rate*(1 - discount/100);

            $('.item_row .pcs').each(function(){
                sum+= parseFloat($(this).val());
            });
            $('.total_pcs').val(sum);
            //$(this).closest(".form-row").find('.amount').val(amount);
            //$('.total_amount , #bill_amount').val(total_amt );
            //$('.total_amount').val(total_amt);


        });

        $('.item_row').on('change','.item_name',function(e) {
            e.preventDefault(); 
            /*var id = $(this).val();
            $.ajax({
            url:'<?= base_url('/Admin/fetch_item_master_by_code') ?>',
            type:'post',
            data:{id:id},
            success:function(res){
              //var obj = JSON.parse(res);
              console.log(res);
              // $.each(obj, function (i, item) {              
              //   $('#item1').val(item.item);
              //   $('#application_no1').val(item.application_no);
              //   $('#title_id').val(item.id);
              //   $("#myModal").modal('show');  
              // });
            }
            })*/
            $(this).closest(".form-row").find('.bundle_no').val("Opening");
        });

        $('.item_row').on('change','.qty',function(e) {
            e.preventDefault(); 
            var sum=0;
            var id = $(this).val();

            $('.item_row .qty').each(function(){
                sum+= parseFloat($(this).val());
            });

            $('.total_qty').val(sum);

        });

        $('.item_row').on('change','.process',function(e) {
            e.preventDefault(); 
            var code = $(this).find(':selected').attr('data-code');
            var item_name = $(this).closest(".form-row").find('.item_name').children('option:selected').data("code");
            var codes = item_name +"-"+ code;
            $(this).closest(".form-row").find('.final_item_code').val(codes);
        });

    });


               
    </script> 



</body>

</html>