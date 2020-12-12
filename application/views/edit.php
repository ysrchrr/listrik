<form method="post" id="form">
    <div class="form-group">
        <label for="email">NIM:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->nim; ?>" name="nim_baru" placeholder="Masukan NIM">
    </div>
    <div class="form-group">
         <label for="email">Nama:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->nama; ?>" name="nama" placeholder="Masukan nama" >
    </div>
    <div class="form-group">
            <label>Jurusan:</label>
        <select class="form-control" name="jurusan">
        <?php
            $jur[0]="";
            $jur[1]="";
            $jur[2]="";
            $jur[3]="";
            switch ($hasil->jurusan){
                case "TI" : $jur[0]="selected"; break;
                case 'SI' : $jur[1]="selected"; break;
                case 'TK' : $jur[2]="selected"; break;
                case 'MI' : $jur[3]="selected"; break;
            }
        ?>
            <option value="TI" <?php echo $jur[0]; ?>>Teknik Informatika</option>
            <option value="SI" <?php echo $jur[1]; ?>>Sistem Informasi</option>
            <option value="TK" <?php echo $jur[2]; ?>>Teknik Komputer</option>
            <option value="MI" <?php echo $jur[3]; ?>>Manajemen Informatika</option>
        </select>
    </div>
    <input type="hidden" name="nim_lama" value="<?php echo $hasil->nim;?>">
    <button id="tombol_edit" type="button" class="btn btn-warning" data-dismiss="modal" >Edit</button>
</form>
<script type="text/javascript">
        $(document).ready(function(){
            $("#tombol_edit").click(function(){
                var data = $('#form').serialize();
                $.ajax({
                    type	: 'POST',
                    url	: "<?php echo base_url(); ?>/mahasiswa/editMahasiswa",
                    data: data,
                    cache	: false,
                    success	: function(data){
                        $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa");    
                    }
                });
            });
        });
</script> 