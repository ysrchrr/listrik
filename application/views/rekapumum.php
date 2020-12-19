<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Bulanan(Listrik, PDAM, Indihome)</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- kiri -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary keterangan">Ringkasan Pemasukan dan Pengeluaran</h6>
                </div>
                <div class="card-body">
                <?php
                // $this->db->select('(SELECT SUM(pembayaran.keTokped) FROM pembayaran WHERE payments.invoice_id=4) AS amount_paid', FALSE);
                // $query = $this->db->get('mytable');
                ?>
                    <!-- <h6 class="font-weight-bold">Listrik, Indihome, PDAM</h6>
                    <p id="sumOut">Pengeluaran : </p>
                    <p id="sumIn">Pemasukan : </p> -->
                    In development...
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Silakan pilih waktu untuk ditampilkan</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="ValidasiNama">Bulan</label>
                                <select id="bulan" name="bulan" class="custom-select">
                                    <option value="">Silakan pilih bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Bulan</label>
                                <select class="custom-select" id="tahun" name="tahun">
                                    <option value="">Silakan pilih tahun</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- kanan -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary infoslur">Data rekapan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="vertical-align: center">ID Pelanggan</th>
                                <th style="vertical-align: center">Nama Pelanggan</th>
                                <th style="vertical-align: center">Daya</th>
                                <th style="vertical-align: center">Periode</th>
                                <th style="vertical-align: center">Jumlah keluar</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <div id='loadingajax'>
                            <img alt='loading...' src='<?php echo base_url()?>assets/img/ajax-loading-gif.gif' style="display: none;"/>
                        </div>
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
    
    function convertToRupiah(angka){
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    }

    $(document).ready(function(){
        var iBulan = $('#bulan');
        var iTahun = $('#tahun');
        
        if(iBulan.val() == '' && iTahun.val() == ''){
            $('#show_data').html('<br/>Eitts, kamu belum milih bulan dan tahun:)');
        }

        iTahun.change(function(){
            $('#dataTable').DataTable().destroy();
            tahun = $(this).val();
            bulan = iBulan.val();
            // txttahun = $(this).find(":selected").text();
            // txtbulan = iBulan.find(":selected").text();
            dadine = tahun+'-'+bulan
            // $('.keterangan').html('Ringkasan Pemasukan dan Pengeluaran pada '+txtbulan+' '+txttahun);
            if(iBulan.val() == ''){
                alert("Bulan harus diisi");
            } else {
                $.ajax({
                    type  : 'POST',
                    url   : '<?php echo base_url()?>Rekap/getRekapBulanan',
                    async : true,
                    dataType : 'json',
                    data: {ngene: dadine},
                    success : function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                    '<td>'+data[i].idPelanggan+'</td>'+
                                    '<td>'+data[i].namaPelanggan+'</td>'+
                                    '<td>'+data[i].daya+'</td>'+
                                    '<td>'+data[i].tanggal+'</td>'+
                                    '<td>'+convertToRupiah(data[i].UangKeluar)+'</td>'+
                                    '</tr>';
                        }
                        $('#show_data').html(html);
                        $('#dataTable').dataTable({
                            dom: 'Bfrtip',
                                buttons: [
                                    'excel', 'pdf', 'print'
                                ],
                            "language" : {
                                "emptyTable" : "Belum ada data:(",
                                "zeroRecords" : "Tidak ada yang cocok dengan database kami"
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
            // $.ajax({
            //     type  : 'POST',
            //     url   : '<?php echo base_url()?>Rekap/getSummary',
            //     async : true,
            //     dataType : 'json',
            //     data: {ngene: dadine},
            //     success : function(data){
            //         var otokped = '';
            //         var operson = '';
            //         var i;
            //         for(i=0; i<data.length; i++){
            //             otokped += data[i].keluar;
            //             operson += data[i].masuk;
            //             $('sumOut').html(otokped+'aaaaaaaaaaa');
            //             $('sumIn').html(otokped);
            //         }
            //     },
            //     error: function(xhr, ajaxOptions, thrownError){
            //             console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            //     }
            // });
        });

        iBulan.change(function(){
            $('#dataTable').DataTable().destroy();
            bulan = $(this).val();
            tahun = iTahun.val();
            dadine = tahun+'-'+bulan
            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>Rekap/allRecord',
                async : true,
                dataType : 'json',
                data: {ngene: dadine},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].idPelanggan+'</td>'+
                                '<td>'+data[i].namaPelanggan+'</td>'+
                                '<td>'+data[i].daya+'</td>'+
                                '<td>'+data[i].tanggal+'</td>'+
                                '<td>'+convertToRupiah(data[i].UangKeluar)+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#dataTable').dataTable({
                            dom: 'Bfrtip',
                                buttons: [
                                    'excel', 'pdf', 'print'
                                ],
                                "columnDefs": [
                                    { "type": "num" }
                                ],
                            "language" : {
                                "emptyTable" : "Belum ada data:(",
                                "zeroRecords" : "Tidak ada yang cocok dengan database kami"
                            }
                        });
                },
                error: function(xhr, ajaxOptions, thrownError){
                        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>