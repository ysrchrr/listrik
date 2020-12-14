<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Kelola Customer</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <a href="#" class="btn btn-primary btn-icon-split" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="text">Tambah pelanggan baru</span>
    </a><br/><br/>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar pelanggan tagihan Person's Reborn</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="vertical-align: center">ID Pelanggan</th>
                                <th style="vertical-align: center">Nama Pelanggan</th>
                                <th style="vertical-align: center">Daya</th>
                                <th>Jenis</th>
                                <th>Tagihan bulan ini</th>
                                <th style="vertical-align: center">Actions</th>
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
                    <!-- <div align="center">
                        <div id='ajax-wait'>
                            <img alt='loading...' src='<?php echo base_url()?>assets/img/ajax-loading-gif.gif' />
                        </div>
                    </div>   -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">ID Pelanggan</label>
                    <input type="text" class="form-control" placeholder="Ni wajib tau ni" id="idPelanggan" name="idPelanggan" required>
                    <div class="valid-feedback">
                        Siip
                    </div>
                    <div class="invalid-feedback">
                        Diisi atuh beb
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Nama Pelanggan</label>
                    <input type="text" class="form-control" placeholder="Uvuwevwevwe Osas" id="namaPelanggan" name="namaPelanggan" required>
                    <div class="valid-feedback">
                        Namanya jelek yaa
                    </div>
                    <div class="invalid-feedback">
                        Tenan waee
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom04">Jenis</label>
                    <select class="custom-select" id="jenis" name="jenis" required>
                        <option selected disabled value="">Silakan pilih satu</option>
                        <option>Listrik</option>
                        <option>PDAM</option>
                        <option>Indohome</option>
                    </select>
                    <div class="invalid-feedback">
                        Gagaga, pokoknya harus milih
                    </div>
                    <div class="valid-feedback">
                        Pinterrr
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Daya</label>
                    <input type="text" class="form-control" placeholder="penting ni" id="daya" name="daya" required>
                    <div class="invalid-feedback">
                        Kalo gatau bayar aja manual dulu, nanti di nota ada
                    </div>
                    <div class="valid-feedback">
                        *___*
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Yakin dh bener?
                    </label>
                    <div class="invalid-feedback">
                        Centang sayang
                    </div>
                    <div class="valid-feedback">
                        Mwah
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" id="btn-save">Tambahkan</button>
        </div>
        </div>
    </div>
    </div>
<!-- end modal -->
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
                url   : '<?php echo base_url()?>Customers/showPelanggan',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].idPelanggan+'</td>'+
                                '<td>'+data[i].namaPelanggan+'</td>'+
                                // '<td>'+<?php //echo rupiah(data[i].keTokped)?>+'</td>'+
                                '<td>'+data[i].daya+'</td>'+
                                '<td>'+data[i].jenis+'</td>'+
                                '<td>'+data[i].bulan+'</td>'+
                                '<td align="center"> <button type="button" nim="'+data[i].id+'" class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> '+
                                '<button type="button" nim="'+data[i].id+'" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#dataTable').dataTable();
                }
            });
        }
        $('#btn-save').on('click',function(){
            var idPelanggan = $('#idPelanggan').val();
            var namaPelanggan = $('#namaPelanggan').val();
            var daya = $('#daya').val();
            var jenis = $('#jenis').val();
            console.log(idPelanggan + '|' + namaPelanggan+ '|' + daya+ '|' + jenis);
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Customers/tambahBaru')?>",
                dataType : "JSON",
                data : {idPelanggan:idPelanggan , namaPelanggan:namaPelanggan, daya:daya, jenis:jenis},
                success: function(data){
                    $('[id="idPelanggan"]').val("");
                    $('[id="namaPelanggan"]').val("");
                    $('[id="daya"]').val("");
                    $('[id="jenis"]').val("");
                    $('#exampleModal').modal('hide');
                    showPelangganListrik();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
'use strict';
window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    });
}, false);
})();
</script>