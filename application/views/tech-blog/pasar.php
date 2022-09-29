<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <!-- end blog-top -->

                    <div class="blog-list clearfix">

                        <?php echo form_open('home/searchpasar') ?>
                        <div align="right">
                            <input type="text" name="keyword">
                            <input type="submit" name="search_submit" value="Cari">
                        </div>
                        <?php echo form_close() ?>

                        <hr class="invis">

                        <?php foreach ($pasar as $row) : ?>

                            <div class="card">
                                <div class="card-body">

                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="<?= base_url() ?>home/datapasar/<?= $row['id_pasar']; ?>">
                                                    <img src="<?= base_url('assets/img/pasar/') . $row['p_image']; ?>" class="img-fluid" style="width:400px;height:300px;">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="<?= base_url() ?>home/datapasar/<?= $row['id_pasar']; ?>"><?= $row['nm_pasar']; ?></a></h4>
                                            <p><?php
                                                $num_char = 330;
                                                $text = $row['deskripsi'];
                                                echo substr($text, 0, $num_char) . '...';
                                                ?></p>
                                            <small><a>by <?= $row['name']; ?></a></small>
                                            <small><a><?= $row['nama_kab']; ?></a></small>
                                            <small><a><?= $row['nama_kec']; ?></a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                </div>
                            </div>

                            <hr class="invis">

                        <?php endforeach; ?>

                        <div class="row">
                            <div class="col">
                                <!--Tampilkan pagination-->
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div><!-- end row -->
            </div><!-- end container -->
</section>