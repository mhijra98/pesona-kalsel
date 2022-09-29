        <!-- Begin Page Content -->
        <div class="container-fluid">

            <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

            session_start();
            ?>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Page Heading -->
            <div class="card mb-2">
                <div class="card-header text-white bg-primary">
                    <h1 class="h3 mb-1 text-black-800"><?= $title; ?></h1>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <?php echo form_open_multipart(); ?>

                            <input type="hidden" class="form-control" name="idpeng" value="<?= $id ?>">

                            <div class="form-group row">
                                <div class="col-sm-2">Gambar Hotel</div>
                                <div class="class col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <small class="form-text text-danger"><?php echo $error ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="class row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($gambar as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><img src='<?= base_url() ?>assets/img/showgambar/penginapan/<?= $row['sp_image']; ?>' style="width:100px;height:80px;"></td>
                                    <td>
                                        <a href="<?= base_url() ?>postingan/hapusgambarpenginapan/<?= $row['id']; ?>/<?= $row['id_penginapan']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->