<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Indihome</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
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
    function convertToRupiah(angka){
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    }

    $(document).ready(function(){
        $('#dataTable').DataTable().destroy();
        $.ajax({
            type  : 'GET',
            url   : '<?php echo base_url()?>Rekap/getRekapIndihome',
            async : true,
            dataType : 'json',
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
    });
</script>