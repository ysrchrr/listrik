<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Lisrik</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
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
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="validationServer04" class="form-label">Nama Pelanggan</label>
                            <select class="form-control" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="1">Choose...</option>
                            <option value="2">Choose...</option>
                            <option>...</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer01" class="form-label">ID Pelanggan</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                            <div class="valid-feedback">
                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer01" class="form-label">Daya</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                            <div class="valid-feedback">
                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit" style="width: 100%;">Submit form</button>
                        </div>
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
                            foreach ($pembayaran->result() as $row){?>
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
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->