<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <!-- end blog-top -->

                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h1 class="h6 mb-0 text-black-800">Peta</h1>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
</section>

<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        var alam = L.layerGroup();
        var buatan = L.layerGroup();
        var kuliner = L.layerGroup();
        var religi = L.layerGroup();
        var budaya = L.layerGroup();
        var edukasi = L.layerGroup();
        var hotel = L.layerGroup();
        var icon2 = L.icon({
            iconUrl: '<?= base_url('assets/img/marker/icon2.png') ?>',
            iconSize: [28, 40], // size of the icon
            iconAnchor: [15, 40],
            popupAnchor: [-8, -30]
        });
        var icon3 = L.icon({
            iconUrl: '<?= base_url('assets/img/marker/icon3.png') ?>',
            iconSize: [28, 40], // size of the icon
            iconAnchor: [15, 45],
            popupAnchor: [-10, -40]
        });
        var icon4 = L.icon({
            iconUrl: '<?= base_url('assets/img/marker/icon4.png') ?>',
            iconSize: [28, 40], // size of the icon
            iconAnchor: [15, 45],
            popupAnchor: [-10, -40]
        });
        var icon5 = L.icon({
            iconUrl: '<?= base_url('assets/img/marker/icon5.png') ?>',
            iconSize: [28, 40], // size of the icon
            iconAnchor: [15, 45],
            popupAnchor: [-10, -40]
        });
        var icon6 = L.icon({
            iconUrl: '<?= base_url('assets/img/marker/icon6.png') ?>',
            iconSize: [28, 40], // size of the icon
            iconAnchor: [15, 45],
            popupAnchor: [-10, -40]
        });
        var icon7 = L.icon({
            iconUrl: '<?= base_url('assets/img/marker/icon7.png') ?>',
            iconSize: [28, 40], // size of the icon
            iconAnchor: [15, 45],
            popupAnchor: [-10, -40]
        });


        var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

        var streets = L.tileLayer(mbUrl, {
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            }),

            darkmode = L.tileLayer(mbUrl, {
                id: 'mapbox/dark-v9',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            });

        var map = L.map('map', {
            center: [-3.022864, 115.480478],
            zoom: 8,
            layers: [streets, alam]
        });

        var baseLayers = {
            "Streets": streets,
            "Dark Mode": darkmode
        };

        var overlays = {
            "Wisata Alam": alam,
            "Wisata Buatan": buatan,
            "Wisata Kuliner": kuliner,
            "Wisata Religi": religi,
            "Wisata Budaya": budaya,
            "Wisata edukasi": edukasi,
            "Hotel": hotel
        };

        L.control.layers(baseLayers, overlays).addTo(map);


        // marker wisata alam
        <?php foreach ($alam as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>])
                .bindPopup("<img src='<?= base_url('assets/img/wisata/') . $value['w_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Wisata :</b> <?= $value['nm_wisata']; ?> <br> " +
                    " <b>Kalangan :</b> <?= $value['kalangan']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(alam);
        <?php } ?>

        // marker wisata buatan
        <?php foreach ($buatan as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>], {
                    icon: icon2
                })
                .bindPopup("<img src='<?= base_url('assets/img/wisata/') . $value['w_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Wisata :</b> <?= $value['nm_wisata']; ?> <br> " +
                    " <b>Kalangan :</b> <?= $value['kalangan']; ?><br> " +
                    " <b>Jam Buka :</b> <?= $value['jam_buka']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(buatan);
        <?php } ?>

        // marker wisata kuliner
        <?php foreach ($kuliner as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>], {
                    icon: icon3
                })
                .bindPopup("<img src='<?= base_url('assets/img/wisata/') . $value['w_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Wisata :</b> <?= $value['nm_wisata']; ?> <br> " +
                    " <b>Jam Buka :</b> <?= $value['jam_buka']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(kuliner);
        <?php } ?>

        // marker wisata religi
        <?php foreach ($religi as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>], {
                    icon: icon4
                })
                .bindPopup("<img src='<?= base_url('assets/img/wisata/') . $value['w_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Tempat :</b> <?= $value['nm_wisata']; ?> <br> " +
                    " <b>Jam Buka :</b> <?= $value['jam_buka']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(religi);
        <?php } ?>

        // marker wisata budaya
        <?php foreach ($budaya as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>], {
                    icon: icon5
                })
                .bindPopup("<img src='<?= base_url('assets/img/wisata/') . $value['w_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Wisata :</b> <?= $value['nm_wisata']; ?> <br> " +
                    " <b>Jam Buka :</b> <?= $value['jam_buka']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(budaya);
        <?php } ?>

        // marker wisata edukasi
        <?php foreach ($edukasi as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>], {
                    icon: icon6
                })
                .bindPopup("<img src='<?= base_url('assets/img/wisata/') . $value['w_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Wisata :</b> <?= $value['nm_wisata']; ?> <br> " +
                    " <b>Jam Buka :</b> <?= $value['jam_buka']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(edukasi);
        <?php } ?>

        // marker hotel
        <?php foreach ($hotel as $key => $value) { ?>
            L.marker([<?= $value['latitude']; ?>, <?= $value['longitude']; ?>], {
                    icon: icon7
                })
                .bindPopup("<img src='<?= base_url('assets/img/penginapan/') . $value['p_image']; ?>' class='img-thumbnail' ><br><br> " +
                    " <b>Nama Hotel :</b> <?= $value['nm_penginapan']; ?> <br> " +
                    " <b>Kategori :</b> <?= $value['kategori']; ?><br> " +
                    " <b>Kontak :</b> <?= $value['kontak']; ?><br> " +
                    " <hr> <a href='<?= base_url() ?>home/datapenginapan/<?= $value['id_penginapan']; ?> ' class='btn btn-sm btn-default'> Lihat detail </a> &nbsp" +
                    "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                    location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>")
                .addTo(hotel);
        <?php } ?>

        //wilayah terang kalsel
        $.getJSON("<?= base_url(); ?>leaflet/kalsel.geojson", function(data) {
            geoLayer = L.geoJson(data, {

            }).addTo(map);
        });
    });
</script>