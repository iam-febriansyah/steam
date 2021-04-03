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
                    <h3 class="text-primary">Masuk Kendaraan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Form Masuk Kendaraan</li>
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
                                <h4><b>Pilih Jenis Kendaraan</b></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form target="_blank" action="<?php echo base_url('Masuk_kendaraan/do_action'); ?>" method="POST" enctype="multipart/form-data" >

                                    <input type="hidden" class="form-control" name="status_data" value="<?php echo $status_data; ?>" id="status_data" >
                                    <div class="row">
                                            <!-- <div class="col-md-12">
                                                <h4>Pilih Jenis Kendaraan</h4><hr>
                                            </div> -->
                                            <div class="col-md-3">
                                                <a href="#" id="mobil_kecil">
                                                <div class="card bg-pink p-20">
                                                    <div class="media widget-ten">
                                                        <div class="media-left meida media-middle">
                                                            <img src="<?php echo base_url('assets/images/kendaraan/mobil-kecil.png'); ?>" class="img-responsive" style="width:100px; height:80px">
                                                        </div>
                                                        <div class="media-body media-text-right">
                                                            <h4 class="color-white">Mobil Kecil</h4>
                                                            <p class="m-b-0">Rp. <?php echo $c_mobil_kecil; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="#" id="mobil_besar">
                                                <div class="card bg-primary p-20">
                                                    <div class="media widget-ten">
                                                        <div class="media-left meida media-middle">
                                                            <img src="<?php echo base_url('assets/images/kendaraan/mobil-besar.png'); ?>" class="img-responsive" style="width:100px; height:80px">
                                                        </div>
                                                        <div class="media-body media-text-right">
                                                            <h4 class="color-white">Mobil Besar</h4>
                                                            <p class="m-b-0">Rp. <?php echo $c_mobil_besar; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="#" id="motor_kecil">
                                                <div class="card bg-success p-20">
                                                    <div class="media widget-ten">
                                                        <div class="media-left meida media-middle">
                                                            <img src="<?php echo base_url('assets/images/kendaraan/motor-kecil.png'); ?>" class="img-responsive" style="width:100px; height:80px">
                                                        </div>
                                                        <div class="media-body media-text-right">
                                                            <h4 class="color-white">Motor Kecil</h4>
                                                            <p class="m-b-0">Rp. <?php echo $c_motor_kecil; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="#" id="motor_besar">
                                                <div class="card bg-danger p-20">
                                                    <div class="media widget-ten">
                                                        <div class="media-left meida media-middle">
                                                            <img src="<?php echo base_url('assets/images/kendaraan/motor-besar.png'); ?>" class="img-responsive" style="width:100px; height:80px">
                                                        </div>
                                                        <div class="media-body media-text-right">
                                                            <h4 class="color-white">Motor Besar</h4>
                                                            <p class="m-b-0">Rp. <?php echo $c_motor_besar; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="form-tagihan">
                                            <?php if($this->session->flashdata('msg') == TRUE): ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert alert-<?php if($this->session->flashdata('msg') == 'success'){ echo 'success'; }else{ echo 'danger'; } ?> " >
                                                        <?php if($this->session->flashdata('msg') == 'success'){ ?>
                                                            <span style="color:white;">Berhasil menyimpan data</span>
                                                        <?php }else{ ?>
                                                            <span style="color:red;">Gagal menyimpan data !</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
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