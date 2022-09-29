<!-- Begin Page Content -->
<div class="container">

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-gray-800 mb-1">Data Wisata <span class="badge badge-primary"><?= $wisata; ?></span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-mountain fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="h6 mb-0 text-gray-800"><a href="<?= base_url('verifikasi/datawisata'); ?>">Liat Rincian!</a></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-gray-800 mb-1">Data Event <span class="badge badge-primary"><?= $event; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="h6 mb-0 text-gray-800"><a href="<?= base_url('verifikasi/dataevent') ?>">Liat Rincian!</a></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-gray-800 mb-1">Data Hotel <span class="badge badge-primary"><?= $hotel; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hotel fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="h6 mb-0 text-gray-800"><a href="<?= base_url('verifikasi/datapenginapan'); ?>">Liat Rincian!</a></div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>
<!-- End of Main Content -->

</div>