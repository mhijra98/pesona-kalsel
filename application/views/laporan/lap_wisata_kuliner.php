        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Laporan Lokasi Wisata Kuliner</h1>

            <div class="row">
                <div class="col-lg-12">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <form action="" id="FormLaporan">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Kabupaten</label>
                            <div class="col-sm-3">
                                <select name="kab" id="kab" class="kab form-control">
                                    <option value="">-PILIH-</option>
                                    <?php foreach ($kab as $k) : ?>
                                        <option value="<?= $k['id_kab']; ?>"><?= $k['nama_kab']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Kecamatan</label>
                            <div class="col-sm-3">
                                <select name="kec" id="kec" class="kec form-control">
                                    <option value="">-PILIH-</option>
                                </select>
                            </div>
                        </div>
                        <div class="class row justify-content-end">
                            <div class="col-sm-11">
                                <button type="submit" class="mb-3 btn btn-primary">Tampilkan Data</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <div class="col-sm-12" id="result"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- memanggil jquery -->
        <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#FormLaporan").submit(function(e) {
                    e.preventDefault();
                    var idk = $("#kab").val();
                    var idkc = $("#kec").val();
                    console.log(idk, idkc);
                    var url = "<?= base_url('laporan/filterwisatakuliner/') ?>" + idk + '/' + idkc;
                    $('#result').load(url);
                })
            });
        </script>

        <script>
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