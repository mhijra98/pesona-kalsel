        <!-- Begin Page Content -->
        <div class="container-fluid">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Page Heading -->
            <div class="card">
                <div class="card-header text-white bg-primary">
                    <h1 class="h3 mb-1 text-black-800"><?= $title; ?></h1>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="isi" class="col-sm-2 col-form-label">Nama Wisata</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nmwisata" value="<?= $wisata['nm_wisata']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <select name="status" class="kgt form-control">
                                            <?php foreach ($status as $s) : ?>
                                                <?php if ($s == $wisata['status']) : ?>
                                                    <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $s; ?>"><?= $s; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control texteditor" name="keterangan" rows="3"><?= $wisata['ket_status']; ?></textarea>
                                    </div>
                                </div>
                                <div class="class row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->