<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header text-white bg-primary">
            <h6 class="m-0 font-weight-bold text-black">Cetak Laporan</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>laporan/cetaklaptamu/" method="post" target="_blank">
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" name="tanggal1" required>
                    </div>
                    <label class="mt-2">s/d</label>
                    <div class="col">
                        <input type="date" class="form-control" name="tanggal2" required>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-white bg-primary">
            <h6 class="m-0 font-weight-bold text-black">Data Masukan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Saran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tamu as $t) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td class="card-text"><?= $t['nama']; ?></td>
                                <td class="card-text"><?= $t['email']; ?></td>
                                <td class="card-text"><?= $t['tgl']; ?></td>
                                <td class="card-text"><?= $t['saran']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->