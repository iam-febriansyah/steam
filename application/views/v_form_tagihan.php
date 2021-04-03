<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label>Nama Kendaraan</label>
            <select class="form-control" name="id_mst_kendaraan" id="id_mst_kendaraan" required>
                <option value=""> Pilih </option>
                <?php foreach($Get_kendaraan as $r){?>
                <option value="<?php echo $r['id_mst_kendaraan']; ?>"> <?php echo $r['nama']; ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>No Polisi</label>
            <input type="text" name="nopol" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Pencuci</label>
            <select class="form-control" name="id_pencuci" id="id_pencuci" required>
                <option value=""> Pilih </option>
                <?php foreach($Get_pencuci as $r){?>
                <option value="<?php echo $r['id_pencuci']; ?>"> <?php echo $r['nama']; ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Harga Pencuci</label>
            <input type="text" class="form-control" id="harga_pencuci" name="harga_pencuci" readonly>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" id="btnSimpan">Simpan</button>
        </div>
    </div>

    <div class="col-lg-4">
		<div class="form-group">
            <label>No Hp Pelanggan</label>
            <input type="text" name="no_telp" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" readonly>
        </div>
        <div class="form-group">
            <label>Ukuran</label>
            <input type="text" class="form-control" id="ukuran" name="ukuran" readonly>
        </div>
        <div class="form-group">
            <label>Total Bayar</label>
            <input type="text" class="form-control" id="harga" name="total_bayar" readonly>
        </div>
        
    </div>
    <div class="col-lg-12">
        <hr>
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
		$("#pelanggan").select2({
			ajax: {
				url: "<?php echo base_url('Masuk_kendaraan/ajax_pelanggan');?>",
				dataType: 'json',
				data: function (params) {
					return {
						user: params.term
					};
				},
				processResults: function (data) {
					var results = [];
					$.each(data, function (index, item){
						results.push(
							{
								text: item.username,
								id: item.id_user
							}
						);
					});
					return{
						results: results
					}
				}
			}
		});
		
        $('#id_pencuci').select2({});
        $("#id_mst_kendaraan").select2({});

        $('#id_mst_kendaraan').change(function () {
            if(this.value != ''){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('Masuk_kendaraan/ajax_kendaraan'); ?>",
                    data: {
                        'id_mst_kendaraan': this.value
                    },
                    success: function (data) {
                        var obj = JSON.parse(data);
                        document.getElementById('merk').value = obj.merk;
                        document.getElementById('ukuran').value = obj.ukuran;
                        document.getElementById('harga').value = obj.harga;
                        document.getElementById('harga_pencuci').value = obj.harga_pencuci;
                    }
                });
            }else{
                document.getElementById('merk').value = '';
                document.getElementById('ukuran').value = '';
                document.getElementById('harga').value = '';
                document.getElementById('harga_pencuci').value = '';
            }

        });

        $('#btnSimpan').on('click', function() {
            window.location.reload();
        });
       
    });

    
</script>