<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <!-- end blog-top -->

                    <div class="container py-4">
                        <h2 class="text-center mt-0">Buku Tamu</h2>

                        <div class="row justify-content-center mt-3">
                            <div class="col-md-6">
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card card shadow mb-4">
                                    <form action="<?= base_url('home/bukutamu'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="col">
                                                <div class="form-group mt-3">

                                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mt-4">

                                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mt-4">

                                                    <textarea class="form-control" name="saran" placeholder="Saran"></textarea>
                                                    <?= form_error('saran', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-sm-8">
                                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- end row -->
            </div><!-- end container -->
</section>