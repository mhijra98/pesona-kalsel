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

                    <a href="<?= base_url() ?>data/tambahwisata" class="btn btn-primary mb-3">Tambah Wisata</a>&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url('data/kategoriwisata'); ?>" class="btn btn-secondary mb-3"><i class="fas fa-th-list"></i></i> Kategori Wisata</a>&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url('data/dataevent'); ?>" class="btn btn-success mb-3"><i class="fas fa-star"></i> Data Event</a>


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
                                                <th scope="col">Nama Wisata</th>
                                                <th scope="col">Pemosting</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Kabupaten</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($wisata as $w) : ?>
                                                <!-- $menu dapat dari controller  $data['menu'] = $this->db->get('user_menu')->result_array(); -->
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $w['nm_wisata']; ?></td>
                                                    <td><?= $w['name']; ?></td>
                                                    <td><?= $w['nm_ktg']; ?></td>
                                                    <td><?= $w['nama_kab']; ?></td>
                                                    <td><?= $w['nama_kec']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>data/ubahwisata/<?= $w['id_wisata']; ?>" class="fas fa-edit"></a>
                                                        <a href="<?= base_url() ?>data/tambahgambarwisata/<?= $w['id_wisata']; ?>" class="fas fa-images"></a>
                                                        <a href="<?= base_url() ?>data/hapuswisata/<?= $w['id_wisata']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
                                                        <a href="<?= base_url() ?>data/status/<?= $w['id_wisata']; ?>" class="fas fa-exclamation-triangle"></a>
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