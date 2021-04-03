<table class="table table-striped table-bordered">
    <thead style="font-size:15px;">
        <tr>
            <th class="text-left" style="width:1%">No</th>
            <th class="text-left" style="width:14%">NO. POL</th>
            <th class="text-left" style="width:15%">JENIS/UKURAN</th>
            <th class="text-left" style="width:15%">KENDARAAN</th>
            <th class="text-left" style="width:15%">PETUGAS CUCI</th>
            <th class="text-left" style="width:15%">MASUK</th>
            <th class="text-right" style="width:10%">HARGA</th>
            <th class="text-right" style="width:15%">HARGA PENCUCI</th>
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
            <td class="color-primary text-right">Rp. <?php echo number_format($r['total_bayar']); ?></td>
            <td class="color-primary text-right">Rp. <?php echo number_format($r['harga_pencuci']); ?></td>
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