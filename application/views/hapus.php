<form method="post" id="form">
    <p>Yakin ingin menghapus mahasiswa <?php echo $hasil->nim;?> - <?php echo $hasil->nama;?> </p>
    <input type="hidden" name="nim" value="<?php echo $hasil->nim;?>">
    <button id="tombol_hapus" type="button" class="btn btn-danger" data-dismiss="modal" >Hapus</button>
</form>
<script type="text/javascript">
        $(document).ready(function(){
            $("#tombol_hapus").click(function(){
                var data = $('#form').serialize();
                $.ajax({
                    type	: 'POST',
                    url	: "<?php echo base_url(); ?>/mahasiswa/hapusMahasiswa",
                    data: data,

                    cache	: false,
                    success	: function(data){
                        $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa");
                      
                    }
                });
            });
        });
</script> 