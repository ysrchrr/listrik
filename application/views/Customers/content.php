<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Kelola Customer</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <a href="#" class="btn btn-primary btn-icon-split" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
        <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="text">Tambah pelanggan baru</span>
    </a><br /><br />
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
                            // foreach ($pembayaran as $row){
                            ?>
                            <tr>
                                <td><?php //echo $no;
                                    ?></td>
                                <td><?php //echo $row->idPelanggan;
                                    ?></td>
                                <td><?php //echo $row->tanggal;
                                    ?></td>
                                <td><?php //echo $row->keTokped;
                                    ?></td>
                                <td> <button type="button" nim="<?php //echo $row->id; 
                                                                ?>" class="edit btn btn-warning">Edit</button></td>
                                <td> <button type="button" nim="<?php //echo $row->id; 
                                                                ?>" class="hapus btn btn-danger">Hapus</button></td>
                            </tr>
                            <?php //$no++; } 
                            ?>
                        </tbody> -->
                        </table>
                    </div>
                    <!-- <div align="center">
                        <div id='ajax-wait'>
                            <img alt='loading...' src='<?php echo base_url() ?>assets/img/ajax-loading-gif.gif' />
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambahkan Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="formPelanggan" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">ID Pelanggan</label>
                            <input type="text" class="form-control" placeholder="520512345678" id="idPelanggan" name="idPelanggan" autofocus required>
                            <div class="valid-feedback">
                                Siip
                            </div>
                            <div class="invalid-feedback">
                                Diisi atuh beb
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Nama Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Aerozeppelin" id="namaPelanggan" name="namaPelanggan" required>
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
                                <option value="Listrik">Listrik</option>
                                <option value="PDAM">PDAM</option>
                                <option value="Indihome">Indihome</option>
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
                            <input type="text" class="form-control" placeholder="(250VA - 636.000VA) atau -" id="daya" name="daya" onkeypress="buttonCan()" required>
                            <div class="invalid-feedback">
                                Kalo gatau bayar aja manual dulu, nanti di nota ada
                            </div>
                            <div class="valid-feedback">
                                *___*
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="btn-save" disabled="true">Tambahkan</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- modal hapus -->
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
<!-- end modal hapus -->
<!-- modal edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Ubah Data Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="formEditPelanggan" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="editID" id="editIDPelanggan">
                            <label for="validationCustom01">ID Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Ni wajib tau ni" id="idPelanggan_e" name="idPelanggan_e" autofocus required>
                            <div class="valid-feedback">
                                Siip
                            </div>
                            <div class="invalid-feedback">
                                Diisi atuh beb
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Nama Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Muhammad Sidharta Yohanes" id="namaPelanggan_e" name="namaPelanggan_e" required>
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
                            <select class="custom-select" id="jenis_e" name="jenis_e" required>
                                <option selected disabled value="">Silakan pilih satu</option>
                                <option value="Listrik">Listrik</option>
                                <option value="PDAM">PDAM</option>
                                <option value="Indihome">Indihome</option>
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
                            <input type="text" class="form-control" placeholder="penting ni" id="daya_e" name="daya_e" onkeypress="buttonCan()" required>
                            <div class="invalid-feedback">
                                Kalo gatau bayar aja manual dulu, nanti di nota ada
                            </div>
                            <div class="valid-feedback">
                                *___*
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Status bulan ini</label>
                            <select class="custom-select" id="bulanIni" name="bulanIni" required>
                                <option selected disabled value="">Silakan pilih satu</option>
                                <option value="0">Belum bayar</option>
                                <option value="1">Sudah bayar</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="btn-update">Simpan perubahan</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal edit -->
<?php
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<script type="text/javascript">
    function buttonCan(){
        $('#btn-save').removeAttr('disabled');
    }
    function showPelangganListrik() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>Customers/showPelanggan',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var ket = data[i].bulanIni
                        if(ket == 0){
                            var keterangan = "Belum membayar"
                        } else{
                            var keterangan = "Sudah membayar"
                        }
                        html += '<tr>' +
                            '<td>' + data[i].idPelanggan + '</td>' +
                            '<td>' + data[i].namaPelanggan + '</td>' +
                            // '<td>'+<?php //echo rupiah(data[i].keTokped)
                                        ?>+'</td>'+
                            '<td>' + data[i].daya + '</td>' +
                            '<td>' + data[i].jenis + '</td>' +
                            '<td>' + keterangan + '</td>' +
                            '<td align="center"> <button type="button" idp="' + data[i].id + '" class="btn btn-warning btn-sm edit_data"><i class="fa fa-edit"></i></button> ' +
                            '<button type="button" idp="' + data[i].id + '" class="btn btn-danger btn-sm hapus_data" ><i class="fa fa-trash"></i></button>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#dataTable').DataTable();
                    // $('#dataTable').DataTable({
                    //     dom: 'Bfrtip',
                    //     buttons: [
                    //         'excel', 'pdf', 'print'
                    //     ]
                    // });
                }
            });
        }
    $(document).ready(function() {
        // alert(convertToRupiah(0));
        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }
        showPelangganListrik(); //pemanggilan fungsi tampil barang.            
        
        $('#btn-save').on('click', function() {
            $('#dataTable').DataTable().destroy();
            var idPelanggan = $('#idPelanggan').val();
            var namaPelanggan = $('#namaPelanggan').val();
            var daya = $('#daya').val();
            var jenis = $('#jenis').val();
            // console.log(idPelanggan + '|' + namaPelanggan+ '|' + daya+ '|' + jenis);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Customers/tambahBaru') ?>",
                dataType: "JSON",
                data: {
                    idPelanggan: idPelanggan,
                    namaPelanggan: namaPelanggan,
                    daya: daya,
                    jenis: jenis
                },
                success: function(data) {
                    $('[id="idPelanggan"]').val("");
                    $('[id="namaPelanggan"]').val("");
                    $('[id="daya"]').val("");
                    $('[id="jenis"]').val("");
                    $('#modalTambah').modal('hide');
                    showPelangganListrik();
                    Swal.fire(
                        'Yeay!',
                        'Pelanggan baru berhasil ditambahkan!',
                        'success'
                    )
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });

        $('#show_data').on('click', '.hapus_data', function() {
            var id = $(this).attr('idp');
            $('#modalHapus').modal('show');
            $('[name="delID"]').val(id);
        });

        $('#show_data').on('click', '.edit_data', function() {
            var id = $(this).attr('idp');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('Customers/detailPelanggan') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $.each(data, function(idPelanggan, namaPelanggan, daya, jenis) {
                        $('#modalEdit').modal('show');
                        $('[id="idPelanggan_e"]').val(data.idPelanggan);
                        $('[id="namaPelanggan_e"]').val(data.namaPelanggan);
                        $('[id="daya_e"]').val(data.daya);
                        $('[id="jenis_e"]').val(data.jenis);
                    });
                }
            });
            return false;
        });

        $('#btn-hapus').on('click', function() {
            $('#dataTable').DataTable().destroy();
            var kode = $('#delIdPelanggan').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Customers/hapusData') ?>",
                dataType: "JSON",
                data: {
                    kode: kode
                },
                success: function(data) {
                    $('#modalHapus').modal('hide');
                    showPelangganListrik();
                    Swal.fire(
                        'Yeay!',
                        'Data pelanggan berhasil di hapus!',
                        'success'
                    )
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });

        $('#btn-update').on('click', function() {
            $('#dataTable').DataTable().destroy();
            var idPelanggan = $('#idPelanggan_e').val();
            var namaPelanggan = $('#namaPelanggan_e').val();
            var daya = $('#daya_e').val();
            var jenis = $('#jenis_e').val();
            var bulanIni = $('#bulanIni').val();
            console.log(idPelanggan, namaPelanggan, daya, jenis, bulanIni)
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Customers/updatePelanggan') ?>",
                dataType: "JSON",
                data: {
                    idPelanggan: idPelanggan,
                    namaPelanggan: namaPelanggan,
                    daya: daya,
                    jenis: jenis,
                    bulanIni: bulanIni
                },
                success: function(data) {
                    $('[name="idPelanggan_e"]').val("");
                    $('[name="namaPelanggan_e"]').val("");
                    $('[name="daya_e"]').val("");
                    $('[name="jenis_e"]').val("");
                    $('[name="bulanIni"]').val("");
                    $('#modalEdit').modal('hide');
                    showPelangganListrik();
                    Swal.fire(
                        'Yeay!',
                        'Pelanggan perubahan berhasil disimpan',
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