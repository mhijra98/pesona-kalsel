        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800 mr-1"><?= $title; ?></h1>
                <a href="<?= base_url('user/ktp'); ?>" class="btn btn-secondary mb-3 ml-4"><i class="fas fa-th-list"></i></i> Poto KTP</a>&nbsp;&nbsp;&nbsp;
            </div>

            <div class="row">
                <div class="col-lg-10">

                    <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                    <?= form_open_multipart('user/editprofile'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jenkel" class="kgt form-control">
                                <option value="">Pilih..</option>
                                <?php foreach ($jenkel as $row) : ?>
                                    <?php if ($row == $user['jenkel']) : ?>
                                        <option value="<?= $row; ?>" selected><?= $row; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row; ?>"><?= $row; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nomor Ponsel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no" name="no" value="<?= $user['no_hp']; ?>">
                            <?= form_error('no', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Gambar</div>
                        <div class="class col-sm-10">
                            <div class="class row">
                                <div class="class col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Pilih Poto</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="class row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->