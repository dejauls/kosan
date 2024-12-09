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
        width: 200px;
        /* Lebar box */
        height: 200px;
        /* Tinggi box */
        border: 1px solid #000;
        /* Border hitam untuk melihat batas box */
        overflow: hidden;
        /* Jika gambar lebih besar, sisanya disembunyikan */
        display: flex;
        /* Mempermudah pengaturan gambar */
        justify-content: center;
        /* Menjadikan gambar di tengah secara horizontal */
        align-items: center;
        /* Menjadikan gambar di tengah secara vertikal */
    }

    .ngetes img {
        max-width: 100%;
        /* Gambar tidak akan lebih lebar dari box */
        max-height: 100%;
        /* Gambar tidak akan lebih tinggi dari box */
        object-fit: cover;
        /* Gambar akan menyesuaikan ukuran box */
    }
    .back-buttonn {
        padding: 8px;
        display: flex;
        margin-left: 10px;
        margin-top: 8px;
    }
</style>

<body>
    <nav>

        <a class="back-buttonn" href="../index.php">
            <svg fill="#e27712" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 219.151 219.151" xml:space="preserve" stroke="#e27712">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g>
                        <path d="M109.576,219.151c60.419,0,109.573-49.156,109.573-109.576C219.149,49.156,169.995,0,109.576,0S0.002,49.156,0.002,109.575 C0.002,169.995,49.157,219.151,109.576,219.151z M109.576,15c52.148,0,94.573,42.426,94.574,94.575 c0,52.149-42.425,94.575-94.574,94.576c-52.148-0.001-94.573-42.427-94.573-94.577C15.003,57.427,57.428,15,109.576,15z"></path>
                        <path d="M94.861,156.507c2.929,2.928,7.678,2.927,10.606,0c2.93-2.93,2.93-7.678-0.001-10.608l-28.82-28.819l83.457-0.008 c4.142-0.001,7.499-3.358,7.499-7.502c-0.001-4.142-3.358-7.498-7.5-7.498l-83.46,0.008l28.827-28.825 c2.929-2.929,2.929-7.679,0-10.607c-1.465-1.464-3.384-2.197-5.304-2.197c-1.919,0-3.838,0.733-5.303,2.196l-41.629,41.628 c-1.407,1.406-2.197,3.313-2.197,5.303c0.001,1.99,0.791,3.896,2.198,5.305L94.861,156.507z"></path>
                    </g>
                </g>
            </svg>
        </a>

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
                <?php while ($row = $result->fetch_assoc()): ?>
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
            <img src="../uploads/kamar1.png" alt="Gambar tidak ditemukan">
        </div>

    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>