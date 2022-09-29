<div class="card">
    <div class="card-header text-white bg-primary">
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url() ?>laporan/cetakeventwisata/<?= $idk; ?>/<?= $idkc; ?>" target="_blank" class="mb-1 btn btn-warning">Cetak Laporan</a>
                <table class="table table-striped align=" center"">
                    <tr align="center">
                        <th>#</th>
                        <th>Tema Event</th>
                        <th>Jenis Event</th>
                        <th>Pemosting</th>
                        <th>Jalan</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($wisata as $row) : ?>
                        <tr align="center">
                            <td><?= $no++; ?></td>
                            <td><?= $row['tema']; ?></td>
                            <td><?= $row['jenis']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['jalan'] ?>, <?= $row['nama_kec'] ?>, <?= $row['nama_kab'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>