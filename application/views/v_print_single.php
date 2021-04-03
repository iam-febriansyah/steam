<html>
<head>
    <title><?php echo $pdf_name; ?></title>
    <!-- <style>
    .border {
        border-radius: 8px;
        border: 1.5px solid black;  
        padding-left:10px; padding-top:3px; padding-bottom:3px; width:45%; float:left; margin-left:5px; margin-top:5px;
    }
    </style> -->
</head>
<body>
    <div class="border">
        <table style="width:100%" border=0>
            <tr>
                <td style="width:15%"> <img style="width:100px; height:50px;" src="<?php echo base_url(); ?>assets/images/<?php echo $mst_gambar; ?>"> </td>
                <td valign="top" style="text-align: center; width:85%">  
                   <h2><b><?php echo $mst_nama; ?></b></h2>
                   <span style="font-size:10px;"><?php echo $mst_alamat.'<br>'.$mst_no_telp; ?></span>
                </td>
            </tr>
        </table>
        <hr>
        <table style="width:100%" >
            <tr>
                <td valign="top" colspan="3" style="text-align: center; font-size:20px;">  
                   <b><u><?php echo $nopol; ?></u></b>
                </td>
            </tr>
            <tr>
                <td style="width:30%; font-size:20px;"> Mobil/Motor</td>
                <td style="width:1%"> :</td>
                <td valign="top" style="text-align: left; width:69%; font-size:20px;">  
                   <b><?php echo $nama; ?></b>
                </td>
            </tr>
            <tr>
                <td style="width:30%; font-size:20px;"> Jenis</td>
                <td style="width:1%"> :</td>
                <td valign="top" style="text-align: left; width:69%; font-size:20px;">  
                   <b><?php echo $ukuran; ?></b>
                </td>
            </tr>
            <tr>
                <td style="width:30%; font-size:20px;"> Pencuci</td>
                <td style="width:1%"> :</td>
                <td valign="top" style="text-align: left; width:69%; font-size:20px;">  
                   <b><?php echo $pencuci; ?></b>
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%" border=1>
            <tr>
                <td colspan="3" style="text-align: right; font-size:30px;">  
                   <b><u>Rp. <?php echo number_format($total_bayar); ?></u></b>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>