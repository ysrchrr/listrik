<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Lisrik</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- kiri -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap data baru</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="ValidasiNama">Nama Pelanggan</label>
                                <select class="custom-select" id="ValidasiNama" aria-describedby="ValidasiNamaFeedback" required>
                                    <option selected disabled value="">Silakan pilih salah satu</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                                <div id="ValidasiNamaFeedback" class="invalid-feedback">
                                    Kamu belum milih lho:(
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="idPelanggan">ID Pelanggan</label>
                                <input type="text" class="form-control" id="idPelanggan" readonly>
                                <div class="valid-feedback">
                                    Siip!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="daya">Daya</label>
                                <input type="text" class="form-control" id="daya" readonly>
                                <div class="valid-feedback">
                                    Siip!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="tokopedia">Uang ke Tokopedia</label>
                                <input type="text" class="form-control" id="tokopedia" required>
                                <div class="valid-feedback">
                                    Wahh:(
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="persons">Uang masuk Person's</label>
                                <input type="text" class="form-control" id="persons" value="3000" placeholder="I luv u 3000" required>
                                <div class="valid-feedback">
                                    Cpat bersyukur!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" style="width: 100%" name="submit">Tambah tagihan</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- kanan -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekapan akhir-akhir ini</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="vertical-align: center">Nama</th>
                                <th style="vertical-align: center">Bulan</th>
                                <th style="vertical-align: center">Tokopedia</th>
                                <th>Person's</th>
                                <th style="text-align: right; vertical-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                        <!-- <tbody>
                            <?php
                            // $no=1;
                            // foreach ($pembayaran as $row){?>
                            <tr>
                                <td><?php //echo $no;?></td>
                                <td><?php //echo $row->idPelanggan;?></td>
                                <td><?php //echo $row->tanggal;?></td>
                                <td><?php //echo $row->keTokped;?></td>
                                <td> <button type="button" nim="<?php //echo $row->id; ?>" class="edit btn btn-warning">Edit</button></td>
                                <td> <button type="button" nim="<?php //echo $row->id; ?>" class="hapus btn btn-danger">Hapus</button></td>
                            </tr>
                            <?php //$no++; } ?>
                        </tbody> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        // alert(convertToRupiah(0));
        function convertToRupiah(angka){
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        showPelangganListrik();	//pemanggilan fungsi tampil barang.            
        //fungsi tampil barang
        function showPelangganListrik(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>Rekap/showListrik',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].idPelanggan+'</td>'+
                                '<td>'+data[i].tanggal+'</td>'+
                                // '<td>'+<?php //echo rupiah(data[i].keTokped)?>+'</td>'+
                                '<td>'+convertToRupiah(data[i].keTokped)+'</td>'+
                                '<td>'+convertToRupiah(data[i].kePerson)+'</td>'+
                                '<td align="center"> <button type="button" nim="'+data[i].id+'" class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#dataTable').dataTable();
                }
            });
		}
    });
</script>