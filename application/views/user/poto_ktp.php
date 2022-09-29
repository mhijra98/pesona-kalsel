        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10">

                    <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                    <?= form_open_multipart('user/ktp'); ?>
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                    <div class="col-sm-2">Gambar KTP</div>
                    <div class="form-group row">
                        <div class="class col-sm-10">
                            <div class="class row">
                                <div class="class col-sm-3">
                                    <a href="<?= base_url('assets/img/profile/') . $user['image_ktp']; ?>" target="_blank">
                                        <img src="<?= base_url('assets/img/ktp/') . $user['image_ktp']; ?>" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Pilih Poto</label>
                                    </div>
                                    <div class="class row justify-content-end">
                                        <div class="col-sm-12 mt-2">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->