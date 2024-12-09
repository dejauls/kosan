<?php
include 'koneksi.php';

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
    $foto = $_FILES['foto']['file'];
    $target_dir = "uploads/file";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

    $sql = "INSERT INTO unimal (universitas, nama_kos, jenis_kos, tipe_kos, deskripsi, nomor_whatsapp, alamat, provinsi, kota, kecamatan, latitude, longitude, foto) VALUES ('$universitas', '$nama_kos', '$jenis_kos', '$tipe_kos', '$deskripsi', '$nomor_whatsapp', '$alamat', '$provinsi', '$kota', '$kecamatan', '$latitude', '$longitude', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: create.php");
}
?>