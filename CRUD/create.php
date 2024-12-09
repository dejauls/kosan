<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $universitas = $_POST['universitas'];
    $nama_kos = $_POST['nama_kos'];
    $jenis_kos = $_POST['jenis_kos'];
    $tipe_kos = $_POST['tipe_kos'];
    $deskripsi = $_POST['deskripsi'];
    $nomor_whatsapp = $_POST['nomor_whatsapp'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Upload foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name']; // Nama file asli
        $foto_path = "../uploads/" . $foto; // Gabungkan dengan prefix ../uploads/
    } else {
        echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
        exit;
    }

    // Debugging: Pastikan $foto_path sudah benar
    echo "Nama file yang akan disimpan: $foto_path"; // Hapus echo ini setelah debugging


    // Masukkan data ke database
    $sql = "INSERT INTO unimal (universitas, nama_kos, jenis_kos, tipe_kos, deskripsi, nomor_whatsapp, alamat, provinsi, kota, kecamatan, latitude, longitude, foto) 
            VALUES ('$universitas', '$nama_kos', '$jenis_kos', '$tipe_kos', '$deskripsi', '$nomor_whatsapp', '$alamat', '$provinsi', '$kota', '$kecamatan', '$latitude', '$longitude', '$foto_path')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect jika berhasil
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0f7fa;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            border-left: 5px solid #00bcd4;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00796b;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #00796b;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #b2dfdb;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #00bcd4;
            outline: none;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }

        .form-row .form-group:last-child {
            margin-right: 0;
        }

        @media (max-width: 600px) {
            .form-row .form-group {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        .map-container {
            margin: 20px 0;
            height: 400px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #00bcd4;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0097a7;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Maps</title>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        var marker;

        function taruhMarker(peta, posisiTitik) {
            if (marker) {
                marker.setPosition(posisiTitik);
            } else {
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                });
            }
            document.getElementById("lat").value = posisiTitik.latitude();
            document.getElementById("lng").value = posisiTitik.longitude();
        }

        function initialize() {
            var propertiPeta = {
                center: new google.maps.latlng(5.120842, 97.158348),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body>
    <div class="container">
        <h2>Form Properti</h2>
        <form action="save.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Universitas:</label>
                <select name="universitas" required>
                    <option value="UNIVERSITAS MALIKUSSALEH">UNIVERSITAS MALIKUSSALEH</option>
                    <option value="POLTEK LHOKSEUMAWE">POLTEK LHOKSEUMAWE</option>
                    <option value="STIE LHOKSEUMAWE">STIE LHOKSEUMAWE</option>
                    <option value="STIAN LHOKSEUMAWE">STIAN LHOKSEUMAWE</option>
                    <option value="UNIVERSITAS BUMI PERSADA">UNIVERSITAS BUMI PERSADA</option>
                    <option value="INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE">INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE</option>
                    <option value="UNIVERSITAS ISLAM KEBANGSAAN INDONESIA">UNIVERSITAS ISLAM KEBANGSAAN INDONESIA</option>
                    <option value="STIKKES DARUSSALAM LHOKSEUMAWE">STIKKES DARUSSALAM LHOKSEUMAWE</option>
                    <option value="STIKKES MUHAMMADIYAH LHOKSEUMAWE">STIKKES MUHAMMADIYAH LHOKSEUMAWE</option>
                    <option value="SEKOLAH TINGGI ILMU HUKUM AL-BANNA">SEKOLAH TINGGI ILMU HUKUM AL-BANNA</option>
                    <option value="STIKES GETSEMPANA LHOKSUKON">STIKES GETSEMPANA LHOKSUKON</option>
                    <option value="STAI JAMIATUT TARBIYAH LHOKSUKON">STAI JAMIATUT TARBIYAH LHOKSUKON</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_kos">Nama Kos*</label>
                <input type="text" name="nama_kos" required>
            </div>


            <div class="form-group">
                <label>Jenis Kos:</label>
                <select name="jenis_kos" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tipe Kos:</label>
                <select name="tipe_kos" required>
                    <option value="Bulanan">Bulanan</option>
                    <option value="Tahunan">Tahunan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nomor WhatsApp:</label>
                    <input type="text" name="nomor_whatsapp">
                </div>

                <div class="form-group">
                    <label>Alamat:</label>
                    <input type="text" name="alamat" required>
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <select name="provinsi" required>
                        <option value="Aceh">Aceh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kota:</label>
                    <select name="kota" required>
                        <option value="Lhokseumawe">Lhokseumawe</option>
                        <option value="Aceh Utara">Aceh Utara</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kecamatan:</label>
                    <select name="kecamatan" required>
                        <option value="Banda Sakti">Banda Sakti</option>
                        <option value="Muara Satu">Muara Satu</option>
                        <option value="Muara Dua">Muara Dua</option>
                        <option value="Blang Mangat">Blang Mangat</option>
                        <option value="Tanah Pasir">Tanah Pasir</option>
                        <option value="Lhoksukon">Lhoksukon</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="marker">Geser Marker Sesuai Posisi Properti</label>
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                    <form action="" method="post">
                        <label>Latitude:</label>
                        <input type="number" id="latitude" name="latitude" required>
                        <label>Longitude:</label>
                        <input type="number" id="longitude" name="longitude" required>
                </div>
        </form>

        <div class="form-group">
            <label for="foto">Foto Kos</label>
            <input type="file" name="foto" accept=".jpg, .jpeg, .png" required>
        </div>

        <button class="submit-btn" input type="submit" value="Simpan"></button>
    </div>
</body>

</html>