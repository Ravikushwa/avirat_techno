<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin </a></li>
                                        <li class="breadcrumb-item active">Vendor Stock Summary  </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Vendor Stock Summary </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vendor<issue_by/th>
                                <th>Schedule Qty</th>
                                <th>Dispatch</th>
                                <th>Balance Qty</th>
                                <th> CUrrent Data Panding </th>
                                <th> Action </th>
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
                                    <td><?= $value['issue_by'] ?></td>
                                    <td><?= $value['date'] ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td><?= $value['total_qty'] ?></td>
                                    <td><?= $value['created'] ?></td>
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

</body>

</html>