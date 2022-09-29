<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Rincian Hotel
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $penginapan['id_penginapan']; ?>">
                    <b>
                        <h5 class="card-title"><?= $penginapan['nm_penginapan']; ?></h5>
                    </b>
                    <h6 class="card-label">Nama Pemosting : <?= $penginapan['name']; ?></h6>
                    <h6 class="card-label">Kategori : <?= $penginapan['kategori']; ?></h6>
                    <h6 class="card-label">Kontak : <?= $penginapan['kontak']; ?></h6>
                    <h6 class="card-label">Jalan : <?= $penginapan['jln']; ?>, <?= $penginapan['nama_kec']; ?>, <?= $penginapan['nama_kab']; ?>, Kalimantan Selatan.</h6>&nbsp;

                    <h6 class="card-label">Latitude : <?= $penginapan['latitude']; ?></h6>
                    <h6 class="card-label">Longitude : <?= $penginapan['longitude']; ?></h6>&nbsp;

                    <p class="card-label"><b>Deskripsi:</b></p>
                    <p class="card-text"><?= $penginapan['deskripsi']; ?></p>
                    <a href="<?= base_url(); ?>verifikasi/terimadatapenginapan/<?= $penginapan['id_penginapan']; ?>/<?= $penginapan['id_user']; ?>/<?= $penginapan['nm_penginapan']; ?>" class="btn btn-primary">Terima</a>
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
            <form class="form-horizontal" action="<?= base_url('verifikasi/hapuspenginapanbaru') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-112">
                            <input type="hidden" id="id" name="id" value="<?= $penginapan['id_penginapan'] ?>">
                            <input type="hidden" id="id_user" name="id_user" value="<?= $penginapan['id_user'] ?>">
                            <input type="hidden" id="nama" name="nama" value="<?= $penginapan['nm_penginapan'] ?>">
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