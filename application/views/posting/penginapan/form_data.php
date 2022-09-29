        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($notifikasi > 0) : ?>
                        <?php foreach ($notifikasi as $row) : ?>
                            <div class="alert alert-primary" role="alert">
                                <b>Data "<?= $row['nama']; ?>" <?= $row['ket1']; ?>. <?= $row['ket2']; ?></b><a class="close" href="<?= base_url() ?>postingan/hapusnotifpenginapan/<?= $row['id']; ?>"><span aria-hidden="true">&times;</span></i></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <a href="<?= base_url() ?>postingan/tambahpenginapan" class="btn btn-primary mb-3">Tambah</a>

                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h3 class="mb-0 text-black-800"><?= $title; ?></h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Hotel</th>
                                                <th scope="col">Pemosting</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Kabupaten</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($penginapan as $p) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $p['nm_penginapan']; ?></td>
                                                    <td><?= $p['name']; ?></td>
                                                    <td><?= $p['kategori']; ?></td>
                                                    <td><?= $p['nama_kab']; ?></td>
                                                    <td><?= $p['nama_kec']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>postingan/ubahpenginapan/<?= $p['id_penginapan']; ?>" class="fas fa-edit"></a>
                                                        <a href="<?= base_url() ?>postingan/tambahgambarpenginapan/<?= $p['id_penginapan']; ?>" class="fas fa-images"></a>
                                                        <a href="<?= base_url() ?>postingan/hapuspenginapan/<?= $p['id_penginapan']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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