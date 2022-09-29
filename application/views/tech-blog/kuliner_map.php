<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <!-- end blog-top -->

                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h1 class="h6 mb-0 text-black-800">Map Kuliner</h1>
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

        var data = [
            <?php foreach ($kuliner as $key => $value) { ?> {
                    "lokasi": [<?= $value['latitude']; ?>, <?= $value['longitude']; ?>],
                    "id": "<?= base_url() ?>home/datakuliner/<?= $value['id_kuliner']; ?>",
                    "lat": "<?= $value['latitude']; ?>",
                    "long": "<?= $value['longitude']; ?>",
                    "image": "<img src='<?= base_url('assets/img/kuliner/' . $value['k_image']) ?>' width='100%'>",
                    "nm_kuliner": "<?= $value['nm_kuliner']; ?>",
                    "nm_toko": "<?= $value['nm_toko']; ?>",
                    "jenis": "<?= $value['jenis']; ?>",
                },
            <?php } ?>

        ];

        var map = new L.Map('map', {
            zoom: 8,
            center: new L.latLng(-3.022864, 115.480478)
        });

        map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1
        }));

        //wilayah terang kalsel
        $.getJSON("<?= base_url(); ?>leaflet/kalsel.geojson", function(data) {
            geoLayer = L.geoJson(data, {

            }).addTo(map);
        });

        var markersLayer = new L.LayerGroup(); //layer contain searched elements
        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topright',
            layer: markersLayer,
            initial: false,
            zoom: 9,
            marker: false
        });
        map.addControl(new L.Control.Search({
            layer: markersLayer,
            initial: false,
            zoom: 9,
            collapsed: true
        }));

        //populate map with markers from sample data
        for (i in data) {
            var nm_kuliner = data[i].nm_kuliner,
                nm_toko = data[i].nm_toko,
                id = data[i].id,
                lat = data[i].lat,
                long = data[i].long,
                image = data[i].image,
                jenis = data[i].jenis; //value searched
            var lokasi = data[i].lokasi; //position found
            var marker = new L.Marker(new L.latLng(lokasi), {
                title: nm_kuliner
            }); //se property searched
            marker.bindPopup(image +
                '</br>Nama Kuliner : ' + nm_kuliner +
                '</br>Nama Toko : ' + nm_toko +
                '</br>Jenis Kuliner : ' + jenis +
                "</br><a href=" + id + ">Lihat detail</>" +
                "</br><a href='https://www.google.com/maps/dir/?api=1&origin=" +
                location.coords.latitude + "," + location.coords.longitude + "&destination= " + lat + "," + long + "' target='_blank'>Rute</a>");
            markersLayer.addLayer(marker);
        }
    });
</script>