        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wisata</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $wisata; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-mountain fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hotel</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hotel; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hotel fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Event</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $event; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-star fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User/Member</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $member; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="chartContainer" style="height: 300px; width: 100%;"></div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: "Grafik Data Wisata Sesuai Kategori"
                    },
                    axisY: {
                        title: "Jumlah"
                    },
                    data: [{
                        type: "column",
                        showInLegend: true,
                        legendMarkerColor: "grey",
                        legendText: "Kategori Wisata",
                        dataPoints: [{
                                y: <?= $alam; ?>,
                                label: "Wisata Alam"
                            },
                            {
                                y: <?= $buatan; ?>,
                                label: "Wisata Buatan"
                            },
                            {
                                y: <?= $kuliner; ?>,
                                label: "Wisata Kuliner"
                            },
                            {
                                y: <?= $religi; ?>,
                                label: "Wisata Religi"
                            },
                            {
                                y: <?= $budaya; ?>,
                                label: "Wisata Budaya"
                            },
                            {
                                y: <?= $edukasi; ?>,
                                label: "Wisata Edukasi"
                            }
                        ]
                    }]
                });
                chart.render();

            }
        </script>