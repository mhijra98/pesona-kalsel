<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Rincian Event
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $event['id_event']; ?>">
                    <b>
                        <h5 class="card-title"><?= $event['tema']; ?></h5>
                    </b>
                    <h6 class="card-label">Nama Pemosting : <?= $event['name']; ?></h6>
                    <h6 class="card-label">Jenis Event : <?= $event['jenis']; ?></h6>
                    <h6 class="card-label">tempat : <?= $event['tempat']; ?></h6>
                    <h6 class="card-label">Jam, Tanggal : <?= $event['jam']; ?>, <?= $event['tgl_mulai']; ?> s/d <?= $event['tgl_selesai']; ?></h6>
                    <h6 class="card-label">Jalan : <?= $event['jalan']; ?>, <?= $event['nama_kec']; ?>, <?= $event['nama_kab']; ?>, Kalimantan Selatan.</h6>&nbsp;

                    <h6 class="card-label">Latitude : <?= $event['latitude']; ?></h6>
                    <h6 class="card-label">Longitude : <?= $event['longitude']; ?></h6>&nbsp;

                    <p class="card-label"><b>Deskripsi:</b></p>
                    <p class="card-text"><?= $event['deskripsi']; ?></p>
                    <a href="<?= base_url(); ?>verifikasi/terimadataevent/<?= $event['id_event']; ?>/<?= $event['id_user']; ?>/<?= $event['tema']; ?>" class="btn btn-primary">Terima</a>
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
            <form class="form-horizontal" action="<?= base_url('verifikasi/hapuseventbaru') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-112">
                            <input type="hidden" id="id" name="id" value="<?= $event['id_event'] ?>">
                            <input type="hidden" id="id_user" name="id_user" value="<?= $event['id_user'] ?>">
                            <input type="hidden" id="nama" name="nama" value="<?= $event['tema'] ?>">
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