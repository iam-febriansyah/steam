<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $mst_nama; ?>">
    <meta name="author" content="<?php echo $mst_nama; ?>">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/<?php echo $mst_gambar; ?>">
    <title><?php echo $mst_nama; ?></title>

    <link href="<?php echo base_url(); ?>assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
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
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
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
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $this->session->userdata("nama"); ?></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">
                        <h2>Hari Ini</h2><hr>
                    </div>
                    <div class="col-md-3">
                        <a href="#" id="mobil_kecil">
                        <div class="card bg-pink p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <img src="<?php echo base_url('assets/images/kendaraan/mobil-kecil.png'); ?>" class="img-responsive" style="width:80px; height:60px">
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $c_mobil_kecil; ?></h2>
                                    <p class="m-b-0">Mobil Kecil</p>
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
                                    <img src="<?php echo base_url('assets/images/kendaraan/mobil-besar.png'); ?>" class="img-responsive" style="width:80px; height:60px">
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $c_mobil_besar; ?></h2>
                                    <p class="m-b-0">Mobil Besar</p>
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
                                    <img src="<?php echo base_url('assets/images/kendaraan/motor-kecil.png'); ?>" class="img-responsive" style="width:80px; height:60px">
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $c_motor_kecil; ?></h2>
                                    <p class="m-b-0">Motor Kecil</p>
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
                                    <img src="<?php echo base_url('assets/images/kendaraan/motor-besar.png'); ?>" class="img-responsive" style="width:80px; height:60px">
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $c_motor_besar; ?></h2>
                                    <p class="m-b-0">Motor Besar</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grafik Tahun <?php echo date('Y'); ?></h4>
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Pie Chart</h4>
                            </div>
                            <div class="flot-container">
                                <div id="flot-pie" class="flot-pie-container"></div>
                            </div>
                        </div>
                    </div> -->
                </div>

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

    <script src="<?php echo base_url(); ?>assets/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/morris-chart/morris.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/lib/morris-chart/morris-init.js"></script> -->
<!-- 
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/excanvas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/curvedLines.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/flot-chart/flot-chart-init.js"></script> -->
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>

    <script>
        $(document).ready(function () {
            SetMorris();
        });
        function SetMorris() {
            "use strict";
            // Extra chart
            Morris.Bar( {
            element: 'morris-bar-chart',
            data: [   
                
                <?php foreach($Get_Count_bar_chart as $bar){ ?>
                {
                    y: "<?php echo $bar['y']; ?>",
                    mobilkkecil: <?php echo $bar['mobilkecil']; ?>,
                    mobilbesar: <?php echo $bar['mobilbesar']; ?>,
                    motorkecil: <?php echo $bar['motorkecil']; ?>,
                    motorbesar: <?php echo $bar['motorbesar']; ?>
                },
                <?php } ?>
            ],
            xkey: 'y',
            ykeys: [ 'mobilkkecil', 'mobilbesar','motorkecil', 'motorbesar' ],
            labels: [ 'Mobil Kecil', 'Mobil Besar', 'Motor Kecil', 'Motor Besar' ],
            barColors: [ '#e6a1f2', '#4680ff', '#26dad2', '#fc6180' ],
            hideHover: 'auto',
            gridLineColor: '#eef0f2',
            resize: true
        } );

        } ;
    </script>

</body>

</html>