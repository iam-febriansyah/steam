<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $mst_nama; ?>">
    <meta name="author" content="<?php echo $mst_nama; ?>">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/<?php echo $mst_gambar; ?>">
    <title><?php echo $mst_nama; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:14px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.gridtable th {
        border-width: 1px;
        padding: 5px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.gridtable td {
        border-width: 1px;
        padding: 5px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
</head>

<body class="fix-header fix-sidebar">
    
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <?php $this->load->view('inc/v_header.php'); ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php $this->load->view('inc/v_sidebar.php'); ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Master Jenis Kendaraan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Form Master Jenis Kendaraan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4><b>Master Jenis Kendaraan</b></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form action="<?php echo base_url('Master_jenis_kendaraan/do_action'); ?>" method="POST" enctype="multipart/form-data" >

                                    <input type="hidden" class="form-control"  id="id_jenis_kendaraan" name="id_jenis_kendaraan" value="<?php echo (isset($id_jenis_kendaraan)) ? $id_jenis_kendaraan : ""; ?>" Required>
                                    <input type="hidden" class="form-control" name="status_data" value="<?php echo $status_data; ?>" id="status_data" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Jenis Kendaraan</label><br>
                                                    
                                                    <input type="radio" name="jenis" value="Mobil"
                                                        <?php if($jenis == 'Mobil'){ echo "checked";} ?> disabled
                                                    > Mobil &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="jenis" value="Motor"
                                                    <?php if($jenis == 'Motor'){ echo "checked";} ?> disabled
                                                    > Motor

                                                </div>
                                                <div class="form-group">
                                                    <label>Ukuran</label>
                                                    <select class="form-control" name="ukuran" disabled>
                                                        <option value="" > Pilih </option>
                                                        <option value="Besar" <?php if($ukuran == "Besar"){ echo "selected"; }else{ ""; }; ?>> Besar</option>
                                                        <option value="Sedang" <?php if($ukuran == "Sedang"){ echo "selected"; }else{ ""; }; ?>> Sedang</option>
                                                        <option value="Kecil" <?php if($ukuran == "Kecil"){ echo "selected"; }else{ ""; }; ?>> Kecil</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga</label>
                                                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo (isset($harga)) ? $harga : ""; ?>" onkeypress="return isNumber(event)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Pencuci</label>
                                                    <input type="text" class="form-control" id="harga_pencuci" name="harga_pencuci" value="<?php echo (isset($harga_pencuci)) ? $harga_pencuci : ""; ?>" onkeypress="return isNumber(event)">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                                <div class="form-group">
                                                    <a href="<?php echo base_url('master_jenis_kendaraan/get_jenis_kendaraan'); ?>" class="btn btn-success">Cancel</a>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->

                <!-- End PAge Content -->
            </div>
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo base_url(); ?>assets/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>

</body>

</html>