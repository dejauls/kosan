<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM unimal WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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
    
    // Upload foto jika ada
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $sql = "UPDATE unimal SET universitas='$universitas', nama_kos='$nama_kos', jenis_kos='$jenis_kos', tipe_kos='$tipe_kos', deskripsi='$deskripsi', nomor_whatsapp='$nomor_whatsapp', alamat='$alamat', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', latitude='$latitude', longitude='$longitude', foto='$target_file' WHERE id=$id";
    } else {
        $sql = "UPDATE unimal SET universitas='$universitas', nama_kos='$nama_kos', jenis_kos='$jenis_kos', tipe_kos='$tipe_kos', deskripsi='$deskripsi', nomor_whatsapp='$nomor_whatsapp', alamat='$alamat', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', latitude='$latitude', longitude='$longitude' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Data Kos</h1>
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
        <label>Universitas:</label>
        <select name="universitas" required>
            <option value="UNIVERSITAS MALIKUSSALEH" <?php echo ($row['universitas'] == 'UNIVERSITAS MALIKUSSALEH') ? 'selected' : ''; ?>>UNIVERSITAS MALIKUSSALEH</option>
            <option value="POLTEK LHOKSEUMAWE" <?php echo ($row['universitas'] == 'POLTEK LHOKSEUMAWE') ? 'selected' : ''; ?>>POLTEK LHOKSEUMAWE</option>
            <option value="STIE LHOKSEUMAWE" <?php echo ($row['universitas'] == 'STIE LHOKSEUMAWE') ? 'selected' : ''; ?>>STIE LHOKSEUMAWE</option>
            <option value="STIAN LHOKSEUMAWE" <?php echo ($row['universitas'] == 'STIAN LHOKSEUMAWE') ? 'selected' : ''; ?>>STIAN LHOKSEUMAWE</option>
            <option value="UNIVERSITAS BUMI PERSADA" <?php echo ($row['universitas'] == 'UNIVERSITAS BUMI PERSADA') ? 'selected' : ''; ?>>UNIVERSITAS BUMI PERSADA</option>
            <option value="INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE" <?php echo ($row['universitas'] == 'INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE') ? 'selected' : ''; ?>>INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE</option>
            <option value="UNIVERSITAS ISLAM KEBANGSAAN INDONESIA" <?php echo ($row['universitas'] == 'UNIVERSITAS ISLAM KEBANGSAAN INDONESIA') ? 'selected' : ''; ?>>UNIVERSITAS ISLAM KEBANGSAAN INDONESIA</option>
            <option value="STIKKES DARUSSALAM LHOKSEUMAWE" <?php echo ($row['universitas'] == 'STIKKES DARUSSALAM LHOKSEUMAWE') ? 'selected' : ''; ?>>STIKKES DARUSSALAM LHOKSEUMAWE</option>
            <option value="STIKKES MUHAMMADIYAH LHOKSEUMAWE" <?php echo ($row['universitas'] == 'STIKKES MUHAMMADIYAH LHOKSEUMAWE') ? 'selected' : ''; ?>>STIKKES MUHAMMADIYAH LHOKSEUMAWE</option>
            <option value="SEKOLAH TINGGI ILMU HUKUM AL-BANNA" <?php echo ($row['universitas'] == 'SEKOLAH TINGGI ILMU HUKUM AL-BANNA') ? 'selected' : ''; ?>>SEKOLAH TINGGI ILMU HUKUM AL-BANNA</option>
            <option value="STIKES GETSEMPANA LHOKSUKON" <?php echo ($row['universitas'] == 'STIKES GETSEMPANA LHOKSUKON') ? 'selected' : ''; ?>>STIKES GETSEMPANA LHOKSUKON</option>
            <option value="STAI JAMIATUT TARBIYAH LHOKSUKON" <?php echo ($row['universitas'] == 'STAI JAMIATUT TARBIYAH LHOKSUKON') ? 'selected' : ''; ?>>STAI JAMIATUT TARBIYAH LHOKSUKON</option>
        </select>
        </div>
    <div class="mb-3">
        
    <label>Nama Kos</label>
        <input type="text" name="nama_kos" value="<?php echo $row['nama_kos']; ?>" required>
    </div>
    <div class="mb-3">

    <label>Jenis Kos</label>
    <select name="jenis_kos" class="form-control" required>
        <option value="Pria" <?php echo ($row['jenis_kos'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
        <option value="Wanita" <?php echo ($row['jenis_kos'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
    </select>
    </div>
    <div class="mb-3">

    <label>Tipe Kos:</label>
    <select name="tipe_kos" required>
        <option value="Bulanan" <?php echo ($row['tipe_kos'] == 'Bulanan') ? 'selected' : ''; ?>>Bulanan</option>
        <option value="Tahunan" <?php echo ($row['tipe_kos'] == 'Tahunan') ? 'selected' : ''; ?>>Tahunan</option>
    </select>
    </div>
    <div class="mb-3">

    <label>Deskripsi:</label>
        <textarea name="deskripsi"><?php echo $row['deskripsi']; ?></textarea>
    </div>
    <div class="mb-3">

    <label>Nomor WhatsApp:</label>
        <input type="text" name="nomor_whatsapp" value="<?php echo $row['nomor_whatsapp']; ?>">
    </div>
    <div class="mb-3">

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
    </div>
    <div class="mb-3">

    <label>Provinsi:</label>
    <select name="provinsi" required>
        <option value="Aceh" <?php echo ($row['provinsi'] == 'Aceh') ? 'selected' : ''; ?>>Aceh</option>
    </select>
    </div>
    <div class="mb-3">

    <label>Kota:</label>
    <select name="kota" required>
        <option value="Lhokseumawe" <?php echo ($row['kota'] == 'Lhokseumawe') ? 'selected' : ''; ?>>Lhokseumawe</option>
        <option value="Aceh Utara" <?php echo ($row['kota'] == 'Aceh Utara') ? 'selected' : ''; ?>>Aceh Utara</option>
    </select>
    </div>
    <div class="mb-3">

    <label>Kecamatan:</label>
    <select name="kecamatan" required>
        <option value="Banda Sakti" <?php echo ($row['kecamatan'] == 'Banda Sakti') ? 'selected' : ''; ?>>Banda Sakti</option>
        <option value="Muara Satu" <?php echo ($row['kecamatan'] == 'Muara Satu') ? 'selected' : ''; ?>>Muara Satu</option>
        <option value="Muara Dua" <?php echo ($row['kecamatan'] == 'Muara Dua') ? 'selected' : ''; ?>>Muara Dua</option>
        <option value="Blang Mangat" <?php echo ($row['kecamatan'] == 'Blang Mangat') ? 'selected' : ''; ?>>Blang Mangat</option>
        <option value="Tanah Pasir" <?php echo ($row['kecamatan'] == 'Tanah Pasir') ? 'selected' : ''; ?>>Tanah Pasir</option>
        <option value="Lhoksukon" <?php echo ($row['kecamatan'] == 'Lhoksukon') ? 'selected' : ''; ?>>Lhoksukon</option>
    </select>
    </div>
    <div class="mb-3">

    <label>Latitude</label>
        <input type="number" name="latitude" value="<?= $row['latitude']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">

    <label>Longitude</label>
        <input type="number" name="longitude" value="<?= $row['longitude']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
    
    <label>Foto Kos:</label>
        <input type="file" name="foto" accept="image/*">
        <img src="<?php echo $row['foto']; ?>" width="100">
        </div>
    <div class="mb-3">

    <input type="submit" value="Update">

</form>
</div>
</body>
</html>
