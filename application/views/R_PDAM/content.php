<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap PDAM</h1>
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
                                <?php 
                                $namaP = $this->db->query("SELECT * FROM pelanggan WHERE jenis = 'PDAM' ORDER BY namaPelanggan");
                                ?>
                                <select class="custom-select" id="ValidasiNama" aria-describedby="ValidasiNamaFeedback" required>
                                    <option value="">Silakan pilih salah satu</option>
                                    <?php 
                                    foreach($namaP->result() as $nama) : ?>
                                    <option value="<?php echo $nama->idPelanggan?>"><?php echo $nama->namaPelanggan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="ValidasiNamaFeedback" class="invalid-feedback">
                                    Kamu belum milih lho:(
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="idPelanggan">ID Pelanggan</label>
                                <input type="text" class="form-control" id="idPelanggan" name="idPelanggan" readonly>
                                <div class="valid-feedback">
                                    Siip!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="daya">Daya</label>
                                <input type="text" class="form-control" id="daya" name="daya" readonly>
                                <div class="valid-feedback">
                                    Siip!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="tokopedia">Uang ke Tokopedia</label>
                                <input type="text" class="form-control" id="tokopedia" name="tokped" placeholder=" Rp. XXX.XXX" onkeypress="javascript:return isNumber(event) && buttonCan()" maxlength="8" required>
                                <div class="valid-feedback">
                                    Wahh:(
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="persons">Uang masuk Person's</label>
                                <input type="text" class="form-control" id="persons" value="3000" placeholder="I luv u 3000" name="person" onkeypress="javascript:return isNumber(event)" maxlength="8" required>
                                <div class="valid-feedback">
                                    Cpat bersyukur!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="persons">Total</label>
                                <input type="text" class="form-control" id="total" placeholder="<3" name="person" onkeypress="javascript:return isNumber(event)" maxlength="8" required readonly>
                                <div class="valid-feedback">
                                    Cpat bersyukur!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button" id="btn-save" style="width: 100%" disabled="true">Tambah tagihan</button>
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
                                <th style="text-align: right; vertical-align: center">Total</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <div id='loadingajax'>
                            <img alt='loading...' src='<?php echo base_url()?>assets/img/ajax-loading-gif.gif' />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="delID" id="delIdPelanggan">
                Apa km yakin mau hapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ngga jadi</button>
                <button type="button" class="btn btn-danger" id="btn-hapus">Iyaa hapus</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>
<!-- End of Main Content -->
<?php
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>
<script type="text/javascript">
    var loading = $('#loadingajax');
    var iTokped = $('#tokopedia');
    var iPersons = $('#persons');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    // alert(today);
    function convertToRupiah(angka){
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    }
    function showPelangganIndihome(){
        $.ajax({
            type  : 'GET',
            url   : '<?php echo base_url()?>Rekap/showPDAM',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+data[i].namaPelanggan+'</td>'+
                            '<td>'+data[i].tanggal+'</td>'+
                            // '<td>'+<?php //echo rupiah(data[i].keTokped)?>+'</td>'+
                            '<td>'+convertToRupiah(data[i].keTokped)+'</td>'+
                            '<td>'+convertToRupiah(data[i].kePerson)+'</td>'+
                            '<td>'+convertToRupiah(data[i].total)+'</td>'+
                            // '<td align="center"><button type="button" idp="' + data[i].id + '" class="btn btn-danger btn-sm" id="hapus_data"><i class="fa fa-trash"></i></button>'+
                            '</tr>';
                }
                $('#show_data').html(html);
                $('#dataTable').dataTable({
                    "language" : {
                        "emptyTable" : "Belum ada data:(",
                        "zeroRecords" : "Tidak ada yang cocok dengan database kami"
                    }
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
            complete: function(){
                loading.hide();
            }
        });
    }
    $(document).ready(function(){
        var iNama = $('#ValidasiNama');
        showPelangganIndihome();	//pemanggilan fungsi tampil barang.            
        // $('#hapus_data').click(function(){
        //     alert('cok');
        //     // var id = $(this).attr('idp');
        //     // $('#modalHapus').modal('show');
        //     // $('[name="delID"]').val(id);
        // });

        $('#hapus_data').click(function(){
            console.log('asdasd');
        });
        iNama.change(function(){
            var id = $(this).val();
            //alert(id);
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('Rekap/getData') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $.each(data, function(idPelanggan, namaPelanggan, daya, jenis) {
                        $('[id="idPelanggan"]').val(data.idPelanggan);
                        $('[id="daya"]').val(data.daya);
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });

        iTokped.change(function(){
            var a = $(this).val();
            var b = iPersons.val();
            var c = parseFloat(a) + parseFloat(b);
            $('#total').val(c);
        });

        iPersons.change(function(){
            var a = iTokped.val();
            var b = $(this).val();
            var c = parseFloat(a) + parseFloat(b);
            $('#total').val(c);
        });

        $('#btn-save').on('click', function() {
            $('#dataTable').DataTable().destroy();
            // alert('a');
            var idPelanggan = $('#idPelanggan').val();
            var tanggal = today;
            var keTokped = $('#tokopedia').val();
            var kePerson = $('#persons').val();
            var total = $('#total').val();
            var hasilNama = $('#ValidasiNama').find(":selected").text();
            // alert(idPelanggan + tanggal +keTokped + kePerson + status);
            // console.log(idPelanggan + '|' + namaPelanggan+ '|' + daya+ '|' + jenis);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Rekap/addTagihan') ?>",
                dataType: "JSON",
                data: {
                    idPelanggan: idPelanggan,
                    tanggal: tanggal,
                    keTokped: keTokped,
                    kePerson: kePerson,
                    total: total
                },
                success: function(data) {
                    $('[id="ValidasiNama"]').val("");
                    $('[id="idPelanggan"]').val("");
                    $('[id="daya"]').val("");
                    $('[id="tokopedia"]').val("");
                    $('[id="persons"]').val("");
                    showPelangganIndihome();
                    Swal.fire(
                        'Yeay!',
                        'Tagihan ke ' +hasilNama+ ' telah ditambahkan!',
                        'success'
                    )
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });

    });
</script>