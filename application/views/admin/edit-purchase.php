<?php 
    $new_value = "";
    if( !empty($item_master)){ 
       foreach ($item_master as $key => $value) {  
       $unit = $this->HM->fetch_condrecordwithfield('units_master',array('id'=> $value['item_unit']), '*');
       $new_value .='<option value="'.$value['id'].'">'.$value['code'].'-'.$value['name'].'-'.$unit['name'].'</option>';
    } } 
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
                                        <li class="breadcrumb-item active">Edit Supplier Master</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Supplier Master</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

    

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Edit Supplier</h4>
                                <?php if(!empty($this->session->flashdata('Success'))){ ?>
                                    <div class="alert alert-success" role="alert">  
                                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?= $this->session->flashdata('Success') ?>  
                                    </div>
                                <?php }else if(!empty($this->session->flashdata('Error'))){ ?>
                                    <div class="alert alert-danger" role="alert">  
                                        <?= $this->session->flashdata('Error') ?>
                                    </div>
                                <?php } ?>

                               <form action="<?= base_url('purchase'); ?>" id="item-group_add" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate >

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Date</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="date" name="date" id="date" parsley-trigger="change" required  value="<?= $purchase['date'] ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Type</label>
                                                <div class="col-md-4">
                                                    <select class="form-control " name="type" id="type" parsley-trigger="change" required="">
                                                        <option value="TRNS" <?= ($purchase['type'] == "TRNS" )?"selected":""; ?>>Transaction</option>
                                                        <option value="OP" <?= ($purchase['type'] == "OP" )?"selected":""; ?>>Opening</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" class="form-control" id="title_id" name="title_id" value="<?= $purchase['id'] ?>" >
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Supplier</label>
                                                <div class="col-md-10">
                                                   <select class="form-control " name="item" id="item" parsley-trigger="change" required="">
                                                        <?php if( !empty($suppliers)){ 
                                                           foreach ($suppliers as $key => $value) {  
                                                        ?>
                                                           <option value="<?= $value['id'] ?>" <?= ($purchase['item'] == $value['id'] )?"selected":""; ?> ><?= $value['ledger'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Driver</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="driver" id="driver" parsley-trigger="change" required  value="<?= $purchase['driver'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Truck No.</label>
                                                <div class="col-md-10">
                                                   <input class="form-control" type="text" name="truck_no" id="truck_no" parsley-trigger="change" required  value="<?= $purchase['truck_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Remark</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="remark" id="remark" parsley-trigger="change" required  value="<?= $purchase['remark'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Delivery Location </label>
                                                <div class="col-md-10">
                                                   <input class="form-control" type="text" name="delivery_location" id="delivery_location" parsley-trigger="change" required  value="<?= $purchase['delivery_location'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Challan No</label>
                                                <div class="col-md-8">
                                                   <input class="form-control" type="text" name="challan_no" id="challan_no" parsley-trigger="change" required  value="<?= $purchase['challan_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Challan Date</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="date" name="challan_date" id="challan_date" parsley-trigger="change" required  value="<?= $purchase['challan_date'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Bill No</label>
                                                <div class="col-md-8">
                                                   <input class="form-control" type="text" name="bill_no" id="bill_no" parsley-trigger="change" required  value="<?= $purchase['bill_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Bill Date</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="date" name="bill_date" id="bill_date"   value="<?= $purchase['bill_date'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Lorry No</label>
                                                <div class="col-md-8">
                                                   <input class="form-control" type="text" name="lorry_no" id="lorry_no"  value="<?= $purchase['lorry_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Lorry Date</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="date" name="lorry_date" id="lorry_date"   value="<?= $purchase['lorry_date'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Bill Amount</label>
                                                <div class="col-md-8">
                                                   <input class="form-control" type="number" name="bill_amount" id="bill_amount"  value="<?= $purchase['bill_amount'] ?>" placeholder="0.00" step="0.01" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">GST %</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="number" name="gstper" id="gstper" value="<?= $purchase['gstper'] ?>" placeholder="0.00" step="0.01" >
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="number" name="gst" id="gst" value="<?= $purchase['gst'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">S GST</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="number" name="sgstper" id="sgstper" value="<?= $purchase['sgstper'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="number" name="sgst" id="sgst" value="<?= $purchase['sgst'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">C GST</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="number" name="cgstper" id="cgstper" value="<?= $purchase['cgstper'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="number" name="cgst" id="cgst" value="<?= $purchase['cgst'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">I GST</label>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="number" name="igstper" id="igstper" value="<?= $purchase['igstper'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                   <input class="form-control" type="number" name="igst" id="igst" value="<?= $purchase['igst'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                           
                                            
                                            
                                        </div>
                                    </div>


                                    <div id="dataAdd">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Item </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Weight</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Pcs</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Rate</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Dis%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Amount</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item_row">

                                        <?php
                                            $item_name = json_decode( $purchase['item_name'] );
                                            $weight = json_decode( $purchase['weight'] );
                                            $pcs = json_decode( $purchase['pcs'] );
                                            $rate = json_decode( $purchase['rate'] );
                                            $discount = json_decode( $purchase['discount'] );
                                            $amount = json_decode( $purchase['amount'] );
                                            foreach($item_name as $x => $val) {
                                        ?>
                                        
                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <select class="form-control item_name" name="item_name[]"  parsley-trigger="change" required="">
                                                        <?php if( !empty($item_master)){ 
                                                           foreach ($item_master as $key => $value) {  
                                                           $unit = $this->HM->fetch_condrecordwithfield('units_master',array('id'=> $value['item_unit']), '*');
                                                        ?>
                                                           <option value="<?= $value['id'] ?>"  <?= ($item_name[$x] == $value['id'] )?"selected":""; ?>><?= $value['code'].'-'.$value['name'].'-'.$unit['name'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>item_name
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control weight" type="number" name="weight[]" value="<?= $weight[$x] ?>" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control pcs" type="number" name="pcs[]" value="<?= $pcs[$x] ?>" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control rate" type="number" name="rate[]" value="<?= $rate[$x] ?>" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control discount" type="number" name="discount[]" value="<?= $discount[$x] ?>" step="0.01" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control amount" type="number" name="amount[]" value="<?= $amount[$x] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        </div>
                                        <button class="btn btn-success" id="addRow">Add row</button>     <button class="btn btn-danger" id="deleteRow">Delete row</button>


                                        <div class="row total_row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control total_weight" type="number" name="total_weight" value= "<?= $purchase['total_weight'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control total_pcs" type="number" name="total_pcs" value="<?= $purchase['total_pcs'] ?>" step="0.01" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input class="form-control total_amount" type="number" name="total_amount" value="<?= $purchase['total_amount'] ?>" step="0.01" placeholder="0.00" readonly>
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


            $("#dataAdd .item_row:last").append('<div class="row form-row"> <div class="col-md-6"> <div class="form-group"> <select class="form-control item_name" name="item_name[]"  parsley-trigger="change" required=""> <?php echo $new_value; ?></select> </div> </div>  <div class="col-md-1"> <div class="form-group"> <input class="form-control weight" type="number" name="weight[]" value="" step="0.01" placeholder="0.00"> </div> </div> <div class="col-md-1"> <div class="form-group"> <input class="form-control pcs" type="number" name="pcs[]" value="" step="0.01" placeholder="0.00"> </div> </div> <div class="col-md-1"> <div class="form-group"><input class="form-control rate" type="number" name="rate[]" value="" step="0.01" placeholder="0.00"> </div> </div> <div class="col-md-1"> <div class="form-group"> <input class="form-control discount" type="number"  name="discount[]" value="" step="0.01" placeholder="0.00">  </div> </div>  <div class="col-md-1"> <div class="form-group"> <input class="form-control amount" type="number" name="amount[]"  value="" step="0.01" placeholder="0.00" readonly> </div> </div>');

            $('.item_row .item_name').each(function(){
                $(this).select2();
            });
     
        });



        $("#deleteRow").click(function(e){
            e.preventDefault();
            var sum=0 , total_amt=0 ,sumpcs=0;
            var len=$('#dataAdd .item_row .form-row').length;
            if(len>1){
                $("#dataAdd .item_row .form-row").last().remove();
                $('.item_row .weight').each(function(){
                sum+= parseFloat($(this).val());
                });

                $('.item_row .amount').each(function(){
                    total_amt+= parseFloat($(this).val());
                });

                $('.item_row .pcs').each(function(){
                    sumpcs+= parseFloat($(this).val());
                });

                $('.total_pcs').val(sumpcs);
                $('.total_weight').val(sum);
                $('.total_amount').val(total_amt );

            }else{
                alert('Not able to Delete');
            }
        });
        // $(document).on("change", ".form-row .item_no ", function(){
        //     var id = $(this).val();
        //     $.ajax({
        //     url:'<?= base_url('/Admin/fetch_item_master_by_code') ?>',
        //     type:'post',
        //     data:{id:id},
        //     success:function(res){
        //       //var obj = JSON.parse(res);
        //       console.log(res);
        //       // $.each(obj, function (i, item) {              
        //       //   $('#item1').val(item.item);
        //       //   $('#application_no1').val(item.application_no);
        //       //   $('#title_id').val(item.id);
        //       //   $("#myModal").modal('show');  
        //       // });
        //     }
        //    })
        // });
        $('#item').select2();
    }); 

    $(document).ready(function () {
        $("#bill_amount").change(function(e){  
            e.preventDefault(); 
            var bill =  $(this).val();
            var per =  $('#gstper').val();
            new_bill(bill,per);
        });

        $("#gstper").change(function(e){  
            e.preventDefault(); 
            var bill =  $('#bill_amount').val();
            var per =  $(this).val();
            $('#sgstper').val($(this).val()/2);
            $('#cgstper').val($(this).val()/2);
            new_bill(bill,per);
        });

        $('.item_row').on('change','.weight',function(e) {
            e.preventDefault(); 
            var sum=0 , total_amt=0;

            var id = $(this).val();
            var weight = $(this).closest(".form-row").find('.weight').val();
            var pcs = $(this).closest(".form-row").find('.pcs').val();
            var rate = $(this).closest(".form-row").find('.rate').val();
            var discount = $(this).closest(".form-row").find('.discount').val();
            var amount = weight*pcs*rate*(1 - discount/100);

            $('.item_row .weight').each(function(){
                sum+= parseFloat($(this).val());
            });

            $('.item_row .amount').each(function(){
                total_amt+= parseFloat($(this).val());
            });

            $('.total_weight').val(sum);
            $(this).closest(".form-row").find('.amount').val(amount);
            //$('.total_amount , #bill_amount').val(total_amt );
            $('.total_amount').val(total_amt);

        });
        $('.item_row').on('change','.pcs',function(e) {
            e.preventDefault(); 
            var sum=0 , total_amt=0;

            var id = $(this).val();
            var weight = $(this).closest(".form-row").find('.weight').val();
            var pcs = $(this).closest(".form-row").find('.pcs').val();
            var rate = $(this).closest(".form-row").find('.rate').val();
            var discount = $(this).closest(".form-row").find('.discount').val();
            var amount = weight*pcs*rate*(1 - discount/100);

            $('.item_row .pcs').each(function(){
                sum+= parseFloat($(this).val());
            });

            $('.item_row .amount').each(function(){
                total_amt+= parseFloat($(this).val());
            });

            $('.total_pcs').val(sum);
            $(this).closest(".form-row").find('.amount').val(amount);
            //$('.total_amount , #bill_amount').val(total_amt );
            $('.total_amount').val(total_amt);


        });


        $('.item_row').on('change','.rate , .discount',function(e) {
            e.preventDefault(); 
            var total_amt=0;

            var id = $(this).val();
            var weight = $(this).closest(".form-row").find('.weight').val();
            var pcs = $(this).closest(".form-row").find('.pcs').val();
            var rate = $(this).closest(".form-row").find('.rate').val();
            var discount = $(this).closest(".form-row").find('.discount').val();
            var amount = weight*pcs*rate*(1 - discount/100);

            $('.item_row .amount').each(function(){
                total_amt+= parseFloat($(this).val());
            });

            $(this).closest(".form-row").find('.amount').val(amount);
            //$('.total_amount , #bill_amount').val(total_amt );
            $('.total_amount').val(total_amt );

        });

    });


    function new_bill(bill,per){
        $('#gst').val(bill*per/100);
        $('#sgst , #cgst').val(bill*per/200);
    }
               
    </script> 



</body>

</html>