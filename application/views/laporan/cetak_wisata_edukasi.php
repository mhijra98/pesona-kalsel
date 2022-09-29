<!DOCTYPE html>
<html><head>
    <title></title>
    <style type="text/css">
        .tabel {
            border-collapse: collapse;
        }

        .tabel th {
            padding: 8px 5px;
            background-color: #cccccc;
        }

        .disp {
            float: right;
            text-align: center;
            padding: 1.5rem 0;
            margin-bottom: .5rem;
        }

        .logo {
            float: left;
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 0 0 1rem;
        }

        .status {
            font-size: 17px !important;
            font-weight: normal;
            margin-bottom: -.1rem;
        }

        .disp {
            float: right;
            text-align: center;
            margin: -.5rem 0;
        }

        .logo {
            float: left;
            position: relative;
            width: 50px;
            height: 50px;
            margin: .5rem 0 0 .5rem;
        }

        .up {
            text-transform: uppercase;
            margin: 0;
            line-height: 1.5rem;
            font-size: 1.5rem;
        }

        .status {
            margin: 0;
            font-size: 1.3rem;
            margin-bottom: .5rem;
        }

        #alamat {
            margin-top: -15px;
            font-size: 13px;
        }

        i {
            color: blue;
        }

        #alamat {
            font-size: 16px;
        }

        .separator {
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 25px 0 0 60%;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }
    </style>
</head><body>
    <div>
        <div class="disp">

            <h6 class="up">SISTEM INFORMASI GEOGRAFIS</h6>
            <h5 class="up" id="nama">TEMPAT WISATA DAN HOTEL PADA PROVINSI KALIMANTAN SELATAN</h5>
            <div class="separator"></div>
        </div>

        <h3 align="center"><?= $title ?></h3>

        <table border="1" class="tabel" align="center">

            <tr align="center">
                <th width="25">No</th>
                <th>Nama Wisata</th>
                <th width="100px">Jam Buka</th>
                <th>Latitude, Longitude</th>
                <th>Pemosting</th>
                <th>Jalan</th>
            </tr>

            <?php
            $no = 1;
            foreach ($wisata as $w) : ?>

                <tr align=center>
                    <td><?= $no++ ?></td>
                    <td><?= $w['nm_wisata']; ?></td>
                    <td><?= $w['jam_buka']; ?></td>
                    <td><?= $w['latitude']; ?>, <?= $w['longitude']; ?></td>
                    <td><?= $w['name']; ?></td>
                    <td><?= $w['jln']; ?>, <?= $w['nama_kec']; ?>, <?= $w['nama_kab']; ?>, Kalimantan Selatan</td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>

</body></html>