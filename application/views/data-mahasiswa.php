<table class="table table-bordered">
    <thead>
        <tr>
            <th> No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th colspan='2'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($hasil as $item)
            {
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $item->nim;?></td>
            <td><?php echo $item->nama;?></td>
            <td><?php echo $item->jurusan;?></td>
            <td> <button type="button" nim="<?php echo $item->nim; ?>" class="edit btn btn-warning">Edit</button></td>
            <td> <button type="button" nim="<?php echo $item->nim; ?>" class="hapus btn btn-danger">Hapus</button></td>
        </tr>
        <?php
                $no++;
                }
                 ?>
    </tbody>
</table>
   <!-- Button to Open the Modal -->
   <button type="button" class="tambah btn btn-primary" data-toggle="modal" data-target="#myModal">
       Tambah
        </button>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="tampil_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                </div>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){

                $('.tambah').click(function(){
                var aksi = 'Tambah Mahasiswa';
                $.ajax({
                    url: '<?php echo base_url(); ?>/mahasiswa/tambah',
                    method: 'post',
                    data: {aksi:aksi},
                    success:function(data){
                        $('#myModal').modal("show");
                        $('#tampil_modal').html(data);
                        document.getElementById("judul").innerHTML='Tambah Data';

                    }
                });
                });

                $('.edit').click(function(){

                    var nim = $(this).attr("nim");
                    $.ajax({
                        url: '<?php echo base_url(); ?>/mahasiswa/edit',
                        method: 'post',
                        data: {nim:nim},
                        success:function(data){
                            $('#myModal').modal("show");
                            $('#tampil_modal').html(data);
                            document.getElementById("judul").innerHTML='Edit Data';  
                        }
                    });
                });

                $('.hapus').click(function(){

                    var nim = $(this).attr("nim");
                    $.ajax({
                        url: '<?php echo base_url(); ?>/mahasiswa/hapus',
                        method: 'post',
                        data: {nim:nim},
                        success:function(data){
                            $('#myModal').modal("show");
                            $('#tampil_modal').html(data);
                            document.getElementById("judul").innerHTML='Hapus Data';
                        }
                    });
                    });
            });
        </script>