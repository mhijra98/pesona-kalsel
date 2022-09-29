<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Rincian Wisata
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $wisata['id_wisata']; ?>">
                    <b>
                        <h5 class="card-title"><?= $wisata['nm_wisata']; ?></h5>
                    </b>
                    <h6 class="card-label">Nama Pemosting : <?= $wisata['name']; ?></h6>
                    <h6 class="card-label">Kategori : <?= $wisata['nm_ktg']; ?></h6>
                    <h6 class="card-label">Kalangan : <?= $wisata['kalangan']; ?></h6>
                    <h6 class="card-label">Jalan : <?= $wisata['jln']; ?>, <?= $wisata['nama_kec']; ?>, <?= $wisata['nama_kab']; ?>, Kalimantan Selatan.</h6>&nbsp;

                    <h6 class="card-label">Latitude : <?= $wisata['latitude']; ?></h6>
                    <h6 class="card-label">Longitude : <?= $wisata['longitude']; ?></h6>&nbsp;

                    <p class="card-label"><b>Deskripsi:</b></p>
                    <p class="card-text"><?= $wisata['deskripsi']; ?></p>
                    <a href="<?= base_url(); ?>verifikasi/terimaDataWisata/<?= $wisata['id_wisata']; ?>/<?= $wisata['id_user']; ?>/<?= $wisata['nm_wisata']; ?>" class="btn btn-primary">Terima</a>
                    <a href="" data-toggle="modal" data-target="#tolak-data" class="btn btn-danger">Tolak</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tolak-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Mengapa ditolak?</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <form class="form-horizontal" action="<?= base_url('verifikasi/hapuswisatabaru') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-112">
                            <input type="hidden" id="id" name="id" value="<?= $wisata['id_wisata'] ?>">
                            <input type="hidden" id="id_user" name="id_user" value="<?= $wisata['id_user'] ?>">
                            <input type="hidden" id="nama" name="nama" value="<?= $wisata['nm_wisata'] ?>">
                            <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Tuliskan alasanya">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit"> Tolak&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- END Modal Tolak -->