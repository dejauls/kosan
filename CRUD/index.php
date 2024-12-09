<?php include 'koneksi.php';
$sql = "SELECT * FROM unimal";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rumah Kos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
.ngetes {
    width: 200px;          /* Lebar box */
    height: 200px;         /* Tinggi box */
    border: 1px solid #000; /* Border hitam untuk melihat batas box */
    overflow: hidden;      /* Jika gambar lebih besar, sisanya disembunyikan */
    display: flex;         /* Mempermudah pengaturan gambar */
    justify-content: center; /* Menjadikan gambar di tengah secara horizontal */
    align-items: center;    /* Menjadikan gambar di tengah secara vertikal */
}
.ngetes img {
    max-width: 100%;       /* Gambar tidak akan lebih lebar dari box */
    max-height: 100%;      /* Gambar tidak akan lebih tinggi dari box */
    object-fit: cover;     /* Gambar akan menyesuaikan ukuran box */
}

</style>
<body>
<nav>

            <a href="../home.html">Back</a>

        </nav>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Rumah Kos</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Data Kos</a>
        <table class="table table-warning table-striped text-center">
        <thead class="table table-default table-striped text-center">
        <tr>
            <th>ID</th>
            <th>Universitas</th>
            <th>Nama Kos</th>
            <th>Jenis Kos</th>
            <th>Tipe Kos</th>
            <th>Deskripsi</th>
            <th>Nomor WhatsApp</th>
            <th>Alamat</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Kecamatan</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['universitas']; ?></td>
            <td><?php echo $row['nama_kos']; ?></td>
            <td><?php echo $row['jenis_kos']; ?></td>
            <td><?php echo $row['tipe_kos']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['nomor_whatsapp']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['provinsi']; ?></td>
            <td><?php echo $row['kota']; ?></td>
            <td><?php echo $row['kecamatan']; ?></td>
            <td><?php echo $row['latitude']; ?></td>
            <td><?php echo $row['longitude']; ?></td>
            <td><img src="<?php echo $row['foto']; ?>" width="400"></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php ?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        
            
    </tbody>
    </table>
    <div class="ngetes">
    <img src="https://source.unsplash.com/random/200x200" alt="Gambar tidak ditemukan">
    </div>

    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>