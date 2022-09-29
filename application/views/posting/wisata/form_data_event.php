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
                                <b>Data "<?= $row['nama']; ?>" <?= $row['ket1']; ?>. <?= $row['ket2']; ?></b><a class="close" href="<?= base_url() ?>postingan/hapusnotifevent/<?= $row['id']; ?>"><span aria-hidden="true">&times;</span></i></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <a href="<?= base_url() ?>postingan/tambahevent" class="btn btn-primary mb-3">Tambah Event</a>

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
                                                <th scope="col">Tema Event</th>
                                                <th scope="col">Jenis Event</th>
                                                <th scope="col">Kabupaten</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($event as $w) : ?>
                                                <!-- $menu dapat dari controller  $data['menu'] = $this->db->get('user_menu')->result_array(); -->
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $w['tema']; ?></td>
                                                    <td><?= $w['jenis']; ?></td>
                                                    <td><?= $w['nama_kab']; ?></td>
                                                    <td><?= $w['nama_kec']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>postingan/ubahevent/<?= $w['id_event']; ?>" class="fas fa-edit"></a>
                                                        <a href="<?= base_url() ?>postingan/hapusevent/<?= $w['id_event']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
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