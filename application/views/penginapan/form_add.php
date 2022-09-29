        <!-- Begin Page Content -->
        <div class="container-fluid">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Page Heading -->
            <div class="card">
                <div class="card-header text-white bg-primary">
                    <h1 class="h3 mb-1 text-black-800"><?= $title; ?></h1>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <?= form_open_multipart(); ?>
                            <div id="map" style="height: 400px;" class="mb-3"></div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="latInput" id="latInput">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="isi" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="lngInput" id="lngInput">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="isi" class="col-sm-2 col-form-label">Nama Penginapan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nmpenginapan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-5">
                                    <select name="kategori" class="kgt form-control">
                                        <option value="">-PILIH-</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k; ?>"><?= $k; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-5">
                                    <select name="kab" id="kab" class="kab form-control">
                                        <option value="">-PILIH-</option>
                                        <?php foreach ($kab as $k) : ?>
                                            <option value="<?= $k['id_kab']; ?>"><?= $k['nama_kab']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-5">
                                    <select name="kec" class="kec form-control">
                                        <option value="">-PILIH-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="isi" class="col-sm-2 col-form-label">Harga Mulai</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="harmu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="isi" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kontak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="isi" class="col-sm-2 col-form-label">Jalan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="jln">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Gambar Penginapan</div>
                                <div class="class col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control texteditor" name="deskripsi" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="class row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- pemanggilan function untuk dapat melakukan picker map marker -->
        <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <script>
            function addMapPicker() {
                var mapCenter = [100, 100];
                var map = L.map('map').setView([-3.022864, 115.480478], 8);

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

                var marker = L.marker(mapCenter).addTo(map);
                var updateMarker = function(lat, lng) {
                    marker
                        .setLatLng([lat, lng])
                        .bindPopup("Lokasi :  " + marker.getLatLng().toString())
                        .openPopup();
                    return false;
                };
                map.on('click', function(e) {
                    $('#latInput').val(e.latlng.lat);
                    $('#lngInput').val(e.latlng.lng);
                    updateMarker(e.latlng.lat, e.latlng.lng);
                });

                var updateMarkerByInputs = function() {
                    return updateMarker($('#latInput').val(), $('#lngInput').val());
                }
                $('#latInput').on('input', updateMarkerByInputs);
                $('#lngInput').on('input', updateMarkerByInputs);
            }

            $(document).ready(function() {
                addMapPicker();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#kab').change(function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "<?= base_url(); ?>data/get_kecamatan",
                        method: "POST",
                        data: {
                            id: id
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            html += '<option value="">--Pilih--</option>';
                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].id_kec + '>' + data[i].nama_kec + '</option>';
                            }
                            $('.kec').html(html).show();

                        }
                    });
                });
            });
        </script>