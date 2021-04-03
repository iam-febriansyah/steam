<table class="table table-striped table-bordered">
    <thead style="font-size:15px;">
        <tr>
            <th class="text-left" style="width:1%" rowspan="2">No</th>
            <th class="text-left" style="width:15%" rowspan="2">PETUGAS CUCI</th>
            <th class="text-center" style="width:15%" colspan="2">MOBIL </th>
            <th class="text-center" style="width:15%" colspan="2">MOTOR </th>
            <th class="text-center" style="width:15%" rowspan="2">GAJI</th>
        </tr>
        <tr>
            <th class="text-center">Besar</th>
            <th class="text-center">Kecil</th>
            <th class="text-center">Besar</th>
            <th class="text-center">Kecil</th>
        </tr>
    </thead>
    <tbody style="font-size:15px;">
        <?php $no = 1; foreach($Get_transaksi_gaji as $r){  ?>
        <tr>
            <th class="text-center"><?php echo $no++; ?></th>
            <td><?php echo $r['nama']; ?></td>
            <td class="text-center <?php if($r['mobilbesar'] > 0){ echo "color-danger"; }; ?>">
                <?php if($r['mobilbesar'] > 0){
                        echo $r['mobilbesar'];
                }else{ 
                    echo "-";
                }; ?>
            </td>
            <td class="text-center <?php if($r['mobilkecil'] > 0){ echo "color-danger"; }; ?>">
                <?php if($r['mobilkecil'] > 0){
                        echo $r['mobilkecil'];
                }else{ 
                    echo "-";
                }; ?>
            </td>
            <td class="text-center <?php if($r['motorbesar'] > 0){ echo "color-danger"; }; ?>">
                <?php if($r['motorbesar'] > 0){
                        echo $r['motorbesar'];
                }else{ 
                    echo "-";
                }; ?>
            </td>
            <td class="text-center <?php if($r['motorkecil'] > 0){ echo "color-danger"; }; ?>">
                <?php if($r['motorkecil'] > 0){
                        echo $r['motorkecil'];
                }else{ 
                    echo "-";
                }; ?>
            </td>
            <td class="color-primary text-right">Rp. <?php echo number_format($r['harga_pencuci']); ?></td>
        </tr>
        <?php } ?>
        </tr>
        <tr>
            <th class="text-right" colspan="6">Total Gaji Semua Petugas Cuci</td>
            <td class="color-primary text-right" colspan="1">Rp. <?php echo number_format($Get_sum_all_transaksi_gaji); ?></td>
        </tr>
    </tbody>
</table>