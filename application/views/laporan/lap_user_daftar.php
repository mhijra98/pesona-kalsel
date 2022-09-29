<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header text-white bg-primary">
            <h6 class="m-0 font-weight-bold text-black">Cetak Laporan</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>laporan/cetaklapdaftar/" method="post" target="_blank">
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

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 text-white bg-primary">
            <h6 class="m-0 font-weight-bold text-black">Data User Daftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Daftar</th>
                            <th scope="col">No Ponsel</th>
                            <th scope="col">KTP</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($daftar as $t) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td class="card-text"><?= $t['name']; ?></td>
                                <td class="card-text"><?= $t['jenkel']; ?></td>
                                <td class="card-text"><?= $t['alamat']; ?></td>
                                <td class="card-text"><?= $t['date_created']; ?></td>
                                <td class="card-text"><?= $t['no_hp']; ?></td>
                                <td>
                                    <a href="<?= base_url('assets/img/ktp/') . $t['image_ktp']; ?>" target="_blank">
                                        <img src="<?= base_url('assets/img/ktp/') . $t['image_ktp']; ?>" class="img-thumbnail" width="200px" height="100px">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>user/hapusakun/<?= $t['id']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
                                </td>
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