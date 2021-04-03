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

    <link rel="stylesheet" href="<?php echo base_url('assets/css/lib/datepicker/bootstrap-datepicker3.min.css'); ?>">
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
                    <h3 class="text-primary">Transaksi & Laporan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi & Laporan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div id="div-validation"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Dari Tanggal</label>
                                        <div class='input-group date' id='date-before'>
                                            <input type='text' class="form-control" name="before" id="before" value="<?php echo date('01-m-Y'); ?>" />
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Dari Tanggal</label>
                                        <div class='input-group date' id='date-after'>
                                            <input type='text' class="form-control" name="after" id="after" value="<?php echo date('t-m-Y'); ?>"/>
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="button" id="search-data">Lihat Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="load-table">
                                    <table class="table table-striped table-bordered">
                                        <thead style="font-size:15px;">
                                            <tr>
                                                <th class="text-left" style="width:1%">No</th>
                                                <th class="text-left" style="width:10%">NO. POL</th>
                                                <th class="text-left" style="width:10%">JENIS/UKURAN</th>
                                                <th class="text-left" style="width:10%">KENDARAAN</th>
                                                <th class="text-left" style="width:10%">PETUGAS CUCI</th>
                                                <th class="text-left" style="width:12%">MASUK</th>
                                                <th class="text-left" style="width:12%">PROSES</th>
                                                <th class="text-left" style="width:12%">SELESAI</th>
                                                <th class="text-right" style="width:10%">HARGA</th>
                                                <th class="text-right" style="width:10%">HARGA PENCUCI</th>
                                                <th class="text-right" style="width:10%">#</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size:15px;">
                                            <?php $no = 1; foreach($Get_transaksi as $r){  ?>
                                            <tr>
                                                <th class="text-center"><?php echo $no++; ?></th>
                                                <td><?php echo $r['nopol']; ?></td>
                                                <td style="font-size:17px;">
                                                <?php if($r['id_jenis_kendaraan'] == 2){?>
                                                    <span class="badge badge-pink">Mobil Kecil</span>
                                                <?php }if($r['id_jenis_kendaraan'] == 1){?>
                                                    <span class="badge badge-primary">Mobil Besar</span>
                                                <?php }if($r['id_jenis_kendaraan'] == 4){?>
                                                    <span class="badge badge-success">Motor Kecil</span>
                                                <?php }if($r['id_jenis_kendaraan'] == 3){?>
                                                    <span class="badge badge-danger">Motor Besar</span>
                                                <?php } ?>
                                                </td>
                                                <td><?php echo $r['nama']; ?></td>
                                                <td class="color-primary"><?php echo $r['pencuci']; ?></td>
                                                <td><?php echo $r['created_date']; ?></td>
                                                <td><?php  if($r['date_process'] == null) {
												echo "Dalam Antrian"; } else { echo $r['date_process'];  }
													?>
												</td>
                                                <td><?php 
														if($r['created_date'] != null AND $r['date_process'] != null AND $r['date_process'] == null) {
															echo "Sedang d Cuci"; 
														} 
														else { echo $r['date_finish'];  }
													?></td>
                                                <td class="color-primary text-right">Rp. <?php echo number_format($r['total_bayar']); ?></td>
                                                <td class="color-primary text-right">Rp. <?php echo number_format($r['harga_pencuci']); ?></td>
                                                <td class="color-primary text-center">
													<a href="<?php echo base_url('Transaksi/batal/'.$r['id_transaksi']); ?>" 
														class="btn btn-danger  btn-sm btn-flat">Batal</a><br>
													<a href="<?php echo base_url('Transaksi/proses/'.$r['id_transaksi']); ?>" 
														class="btn btn-info btn-sm btn-flat">Proses</a><br>
													<a href="<?php echo base_url('Transaksi/selesai/'.$r['id_transaksi']); ?>" 
														class="btn btn-success  btn-sm btn-flat">Selesai</a><br>
												</td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <th class="text-right" colspan="6">Pendapatan Kotor</td>
                                                <td class="color-primary text-right">Rp. <?php echo number_format($Get_sum_harga); ?></td>
                                                <td class="color-primary text-right">Rp. <?php echo number_format($Get_sum_harga_pencuci); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-right" colspan="6">Pendapatan Bersih</td>
                                                <td class="color-primary text-right" colspan="6">Rp. <?php echo number_format($Get_sum_harga - $Get_sum_harga_pencuci); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- End footer -->
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
    <script src="<?php echo base_url('assets/js/lib/datepicker/bootstrap-datepicker.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#date-before').datepicker({
                format: "dd-mm-yyyy"
            });
            $('#date-after').datepicker({
                format: "dd-mm-yyyy"
            });
            
            function load(){
                document.getElementById("load-table").innerHTML='<img id="myImage" src="<?php echo base_url('assets/images/load.gif'); ?>" style="width:300px">';
            }
            $('#search-data').on('click', function() {
                var before = document.getElementById('before').value;
                var after = document.getElementById('after').value;
                if(before != '' && after != ''){
                    load();
                    $("#load-table").load("<?php echo base_url('Transaksi/search_data?before=');  ?>" + before + "&after=" + after);
                    $("#div-validation").hide();
                }else{
                    document.getElementById("div-validation").innerHTML=
                                            '<div class="row">'+
                                                '<div class="col-lg-12">'+
                                                    '<div class="alert alert-danger">'+
                                                            '<span style="color:red;">Parameter tanggal harus di isi !</span>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                }
            });
        });

</script>

</body>

</html>