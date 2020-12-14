<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Tagihan Bulan</th>
            <th>Tokopedia</th>
            <th>Masuk Person's</th>
            <th>Status</th>
            <th style="text-align: right;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($pembayaran as $row){?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $row->idPelanggan;?></td>
            <td><?php echo $row->tanggal;?></td>
            <td><?php echo $row->keTokped;?></td>
            <td> <button type="button" nim="<?php echo $row->id; ?>" class="edit btn btn-warning">Edit</button></td>
            <td> <button type="button" nim="<?php echo $row->id; ?>" class="hapus btn btn-danger">Hapus</button></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
    </table>
</div>