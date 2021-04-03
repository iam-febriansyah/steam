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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/html5-editor/bootstrap-wysihtml5.css" />
    <link href="<?php echo base_url(); ?>assets/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

	<link href="<?php echo base_url('assets/plugin/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
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
                    <h3 class="text-primary">Pengaturan </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Pengaturan Aplikasi</li>
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
                                <h4><b>Aplikasi</b></h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form action="<?php echo base_url('Setting/do_action'); ?>" method="POST" enctype="multipart/form-data" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nama Aplikasi</label>
                                                    <input type="text" name="nama" class="form-control" required value="<?php echo $mst_nama; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat </label>
                                                    <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." style="height:100px" name="alamat"><?php echo $mst_alamat; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp / Handphone </label>
                                                    <input type="text" name="no_telp" class="form-control" required value="<?php echo $mst_no_telp; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Icon</label>
                                                    <input type="file" class="form-control" id="gambar" name="gambar" >
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
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

	<script src="<?php echo base_url('assets/plugin/select2/dist/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugin/select2/dist/js/select2.full.min.js'); ?>"></script>
    
    <script src="<?php echo base_url('assets/js/lib/html5-editor/wysihtml5-0.3.0.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/html5-editor/bootstrap-wysihtml5.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/html5-editor/wysihtml5-init.js'); ?>"></script>

    <script>
        $(document).ready(function(){
            function load(){
                document.getElementById("form-tagihan").innerHTML='<img id="myImage" src="<?php echo base_url('assets/images/load.gif'); ?>" style="width:300px">';
            }

            $('#mobil_kecil').on('click', function() {
                load();
                $("#form-tagihan").load("<?php echo base_url('Masuk_kendaraan/form/2');  ?>");
            });

            $('#mobil_besar').on('click', function() {
                load();
                $("#form-tagihan").load("<?php echo base_url('Masuk_kendaraan/form/1');  ?>");
            });

            $('#motor_kecil').on('click', function() {
                load();
                $("#form-tagihan").load("<?php echo base_url('Masuk_kendaraan/form/4');  ?>");
            });

            $('#motor_besar').on('click', function() {
                load();
                $("#form-tagihan").load("<?php echo base_url('Masuk_kendaraan/form/3');  ?>");
            });
        });
    </script>

</body>

</html>