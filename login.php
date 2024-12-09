<?php
session_start();
include 'koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            header('Location: CRUD/index.php'); 
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Login</title>
    <style>
                body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background-image: url('#'); /* Ganti dengan path gambar kamu */
            background-size: cover;
            background-position: center;
        }
        .right-section {
            background-color: #fff;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .right-section img {
            width: 350px;
            margin-bottom: 20px;
        }
        .right-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-container {
        width: 100%;
        max-width: 400px;
        margin-bottom: 20px;
        position: relative;
    }

.input-container input {
    width: 100%;
    padding: 10px 40px; /* Ruang di sekitar teks dan ikon */
    border: 1px solid #ccc; /* Warna border default */
    border-radius: 20px; /* Membuat sudut membulat */
    font-size: 16px; /* Ukuran font */
    font-family: 'Arial', sans-serif; /* Font modern */
    transition: all 0.3s ease; /* Animasi halus */
    outline: none; /* Hilangkan outline saat fokus */
}

.input-container input:focus {
    border-color: #007BFF; /* Warna border saat fokus */
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5); /* Efek bayangan saat fokus */
}

.input-container i {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #ccc; /* Warna ikon default */
    font-size: 18px; /* Ukuran ikon */
    transition: color 0.3s ease; /* Animasi warna ikon */
}

.input-container input:focus + i {
    color: #007BFF; /* Ubah warna ikon saat input fokus */
}

.input-container .eye-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #ccc; /* Warna ikon default */
    font-size: 18px; /* Ukuran ikon */
    cursor: pointer; /* Pointer saat di-hover */
    transition: color 0.3s ease, transform 0.2s ease; /* Animasi ikon */
}

.input-container .eye-icon:hover {
    color: #007BFF; /* Warna saat di-hover */
    transform: translateY(-50%) scale(1.1); /* Efek zoom saat hover */
}

        .forgot-password {
        display: flex; /* Menggunakan Flexbox */
        justify-content: center; /* Meratakan teks secara horizontal */
        align-items: center; /* Meratakan teks secara vertikal */
        align-self: flex-end; /* Tetap mempertahankan posisi elemen secara keseluruhan */
        margin-bottom: 20px; /* Memberikan jarak */
        color: #007BFF; /* Warna biru yang cerah */
        font-size: 14px; /* Ukuran teks lebih kecil dan profesional */
        font-family: 'Arial', sans-serif; /* Font yang bersih */
        font-weight: bold; /* Memberikan penekanan pada teks */
        text-decoration: none; /* Menghilangkan garis bawah default */
        cursor: pointer; /* Memberikan isyarat bahwa elemen bisa diklik */
        padding: 5px 10px; /* Menambahkan ruang di sekitar teks */
        border-radius: 5px; /* Membuat sudut melengkung */
        transition: all 0.3s ease; /* Animasi transisi halus */
        }


        .forgot-password:hover {
        background-color: #f0f8ff; /* Menambahkan latar belakang saat hover */
        color: #0056b3; /* Warna lebih gelap untuk kontras */
        text-decoration: underline; /* Garis bawah hanya saat di-hover */
        transform: scale(1.05); /* Memberikan efek zoom ringan */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan */
        }

        .container {
            display: flex; /* Aktifkan Flexbox */
            justify-content: center; /* Rata tengah horizontal */
            align-items: center; /* Rata tengah vertikal */
            height: 30; /* Kontainer memenuhi tinggi viewport */
            margin: 0; /* Hilangkan margin bawaan */
            background-color: #f8f9fa; /* Latar belakang kontainer */
        }

        /* Gaya untuk tombol */
        button {
            display: inline-flex; /* Gunakan Flexbox dalam tombol */
            justify-content: center; /* Rata tengah teks dalam tombol */
            align-items: center; /* Rata tengah teks dalam tombol */
            width: 120px; /* Lebar tombol */
            height: 40px; /* Tinggi tombol */
            font-size: 16px; /* Ukuran teks */
            font-weight: bold; /* Teks tebal */
            color: #fff; /* Warna teks */
            background-color: #007BFF; /* Warna latar belakang tombol */
            border: none; /* Hilangkan border */
            border-radius: 5px; /* Sudut membulat */
            cursor: pointer; /* Tanda kursor interaktif */
            transition: all 0.3s ease; /* Animasi hover */
        }

        /* Gaya tombol saat hover */
        button:hover {
            background-color: #0056b3; /* Warna lebih gelap */
            transform: scale(1.05); /* Membesar sedikit saat hover */
        }
        .error-message {
        color: #fff; /* Teks putih agar kontras dengan latar belakang */
        font-size: 14px; /* Ukuran font */
        margin-top: 10px; /* Jarak atas dari elemen lainnya */
        padding: 10px 20px; /* Ruang di sekitar teks */
        display: none; /* Pesan error tersembunyi secara default */
        font-family: 'Arial', sans-serif; /* Font yang bersih */
        background-color: #d9534f; /* Latar belakang merah cerah */
        border-radius: 5px; /* Sudut membulat pada kotak pesan */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        position: absolute; /* Posisi absolute untuk memungkinkan pemusatan */
        left: 50%; /* Memulai dari tengah horizontal */
        top: 50%; /* Memulai dari tengah vertikal */
        transform: translate(-50%, -50%); /* Menyesuaikan posisi ke tengah secara sempurna */
        text-align: center; /* Menyusun teks di tengah */
        width: auto; /* Membiarkan lebar pesan menyesuaikan */
        max-width: 300px; /* Lebar maksimum agar pesan tidak terlalu lebar */
        transition: all 0.3s ease; /* Animasi transisi yang halus */
        font-weight: bold; /* Menebalkan teks untuk penekanan */
    }


    </style>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

            function validatePassword() {
        const passwordInput = document.getElementById('password');
        const errorMessage = document.getElementById('error-message');

        // Contoh validasi (ganti dengan logika validasi Anda sendiri)
        if (passwordInput.value !== "12345") { // Password yang benar adalah "12345"
            errorMessage.style.display = "block"; // Tampilkan pesan error
        } else {
            errorMessage.style.display = "none"; // Sembunyikan pesan error
            alert("Login berhasil!");
        }
    }

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.querySelector('.eye-icon i');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}

    </script>
</head>
<body>
    <div class="right-section">
            <img src="IMG/awakkoss.png" alt="awakkos logo">
            <h2>Masuk</h2>
            <form method="POST" action="" autocomplete="off">
                <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                <div class="input-container">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="username" placeholder="Masukkan Email" required autofocus>
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi" required>
                    <i class="fas fa-eye eye-icon" onclick="togglePasswordVisibility()"></i>
                </div>
                <div class="forgot-password">
                    <a href="forgot_password.php">Lupa Kata Sandi?</a>
                </div>
                <div class="container">
            <button type="submit">Masuk</button>
    </div>
        </form>
    </div>
</body>
</html>