<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <!-- end blog-top -->

                    <div class="blog-list clearfix">

                        <?php echo form_open('home/searchwisata') ?>
                        <div align="right">
                            <input type="text" name="keyword">
                            <input type="submit" name="search_submit" value="Cari">
                        </div>
                        <?php echo form_close() ?>

                        <?php foreach ($wisata as $row) : ?>

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="<?= base_url() ?>home/datawisata/<?= $row['id_wisata']; ?>">
                                            <img src="<?= base_url('assets/img/wisata/') . $row['w_image']; ?>" class="img-fluid" style="width:400px;height:300px;">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="<?= base_url() ?>home/datawisata/<?= $row['id_wisata']; ?>"><?= $row['nm_wisata']; ?></a></h4>
                                    <p><?php
                                        $num_char = 330;
                                        $text = $row['deskripsi'];
                                        echo substr($text, 0, $num_char) . '...';
                                        ?></p>
                                    <small class="firstsmall"><a class="bg-orange"><?= $row['kategori']; ?></a></small>
                                    <small><a><?= $row['kalangan']; ?></a></small>
                                    <small><a><?= $row['nama_kab']; ?></a></small>
                                    <small><a><?= $row['nama_kec']; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                        <?php endforeach; ?>

                    </div><!-- end col -->

                </div><!-- end row -->
            </div><!-- end container -->
</section>