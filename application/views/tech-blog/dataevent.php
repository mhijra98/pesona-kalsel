<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center mb-2">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>home/event">Home</a></li>
                            <li class="breadcrumb-item active"><?= $event['tema']; ?></li>
                        </ol>

                        <span class="color-orange"><a><?= $event['jenis']; ?></a></span>

                        <h3><?= $event['tema']; ?></h3>

                        <div class="blog-meta big-meta">
                            <small><a>Pemosting : <?= $event['name']; ?></a></small>
                            <small><a><?= $event['nama_kab']; ?></a></small>
                            <small><a><?= $event['nama_kec']; ?></a></small>
                        </div><!-- end meta -->


                    </div><!-- end title -->

                    <!-- gambar-->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <div class="row">
                            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-12">
                                <p><b>Jenis Event&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : </b> <?= $event['jenis']; ?></p>
                                <p><b>Lokasi Event&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : </b> <?= $event['tempat']; ?></p>
                                <p><b>Jam, Tanggal&nbsp; &nbsp; &nbsp; : </b> <?= $event['jam']; ?>, <?= $event['tgl_mulai']; ?> s/d <?= $event['tgl_selesai']; ?></p>
                                <p><b>Deskripsi :</b></p>
                                <p><?= $event['deskripsi']; ?></p>
                            </div><!-- end col -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">

                    <div class="card">
                        <div class="card-body">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </div>

                    <hr class="invis1">

                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        //map view
        var map = L.map('map').setView([<?= $event['latitude']; ?>, <?= $event['longitude']; ?>], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        //wilayah terang kalsel
        $.getJSON("<?= base_url(); ?>leaflet/kalsel.geojson", function(data) {
            geoLayer = L.geoJson(data, {

            }).addTo(map);
        });

        L.marker([<?= $event['latitude']; ?>, <?= $event['longitude']; ?>])
            .bindPopup("<b>Lokasi Kuliner</b></br>" + "<img src='<?= base_url('assets/img/event/' . $event['e_image']) ?>' width='100%'>" +
                "<b>Tema Event : <?= $event['tema']; ?> </b></br>" +
                "<b>Jenis Event : <?= $event['jenis']; ?> </b></br>" +
                "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $event['latitude']; ?>,<?= $event['longitude']; ?>' target='_blank'>Rute</a>").addTo(map);
    });
</script>