<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWAK KOS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        .button {
        border: none;
        background: none;
        padding: 0;
        cursor: pointer;
    }
    .button img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }
    .button:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 35%;
            height: auto;
            display: block;
        }

        button {
            cursor: pointer;
        }

        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 50px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed; /* Menjadikan header tetap di atas */
            top: 0; /* Menempatkan header di bagian atas */
            left: 0; /* Menempatkan header di sisi kiri */
            width: 95%; /* Membuat header selebar halaman */
            z-index: 1000; /* Memastikan header berada di atas elemen lain */
        }

        .content {
            margin-top: 60px; /* Memberikan ruang di atas konten agar tidak tertutup header */
            padding: 20px; /* Memberikan padding pada konten */
            height: 2000px; /* Contoh tinggi konten untuk scrolling */
            background-color: #f4f4f4; /* Warna latar belakang konten */
        }

        .header img {
            height: 50px;
        }

        .header nav a {
            margin: 0 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .header .btn {
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .header .btn:hover {
            background-color: #e64a19;
        }

        /* Hero Section */
        .hero {
            position: relative;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        .hero-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 300%; /* Adjust based on the number of slides */
            height: 480px;
        }

        .hero-slide {
            min-width: 100%;
            position: relative;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
        }

        .search-bar {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-bar.fixed {
        position: fixed; /* Mengubah posisi menjadi tetap */
        top: 100; /* Menempatkan di bagian atas */
        left: 50%; /* Menggeser ke tengah */
        transform: translate(-50%, -1050%); /* Memusatkan secara horizontal */
        z-index: 1000; /* Pastikan berada di atas elemen lain */
        }

        .search-bar.fixed.show {
        transform: translate(-50%, 0); /* Kembalikan ke posisi semula saat ditampilkan */
        }
        .search-bar input {
            padding: 10px;
            border: none;
            outline: none;
            width: 700px;
            font-size: 14px;
        }

        .search-bar button {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
        }

        /* Navigation Slide */
        .hero .prev, .hero .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 50%;
            z-index: 10;
        }

        .hero .prev {
            left: 10px;
        }

        .hero .next {
            right: 10px;
        }

        /* Section Styles */
        .section {
            padding: 50px 0px;
            text-align: center;
        }

        .section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .campus-list {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .campus-item {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 200px;
        }

        .campus-item img {
            height: 40px;
            margin-right: 10px;
        }

        .campus-item span {
            font-size: 14px;
            font-weight: bold;
        }

        /* Footer */
        .footer {
            background-color: #00bcd4;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 20px;
        }

        .footer .btn {
            background-color: #ff5722;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .footer .btn:hover {
            background-color: #e64a19;
        }

        .footer-bottom {
            background-color: #ff5722;
            padding: 15px;
            font-size: 14px;
        }
        .social-link {
        color: #fff;
        font-size: 24px;
        text-decoration: none;
        transition: color 0.3s ease;
        }

        .social-link:hover {
        color: #00bcd4; /* Ganti warna jika di-hover */
        }

        .footer p {
        margin: 0;
        font-size: 14px;
        opacity: 0.7;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .search-bar input {
                width: 200px;
            }

            .hero .prev, .hero .next {
                padding: 8px;
                font-size: 16px;
            }

            .campus-item {
                width: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <img src="IMG/awakkoss.png" alt="awakkos" class="logo">
        <nav>
            <a href="#">Daftar</a>
            <a href="login.php">Masuk</a>
            <button class="btn">KOS</button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-slider">
            <div class="hero-slide">
                <img src="IMG/kamar1.png" alt="Kamar 1">
            </div>
            <div class="hero-slide">
                <img src="IMG/islamic.png" alt="Kamar 2">
            </div>
            <div class="hero-slide">
                <img src="IMG/mahasiswa.png" alt="Kamar 3">
            </div>
        </div>
        <div class="overlay"></div>
        <div class="search-bar">
            <input type="text" placeholder="Ketik Lokasi atau Nama Kos">
            <button>Cari Kos</button>
        </div>
        <!-- Navigasi Slide -->
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </section>

    <!-- Campus List Section -->
    <section class="section">
        <h2>Cari Kos di Sekitar Kampus</h2>
        <div class="campus-list">
            <div class="campus-item">
                <img src="https://pendaftaran.unimal.ac.id/assets/unimal.png" alt="unimal">
                <button class="button">
                    <span>UNIVERSITAS MALIKUSSALEH</span>   
                </button> 
            </div>
            <div class="campus-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png" alt="poltek">
                <button class="button">
                <span>POLTEK LHOKSEUMAWE</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://akupintar.id/documents/20143/0/STIE+LHOK.jpg/8786c752-0a02-64e5-ecb2-4e1e82c57eb2?version=1.0&t=1518877648647&imageThumbnail=1" alt="stie">
                <button class="button">
                <span>STIE LHOKSEUMAWE</span>
                </button>   
            </div>
            <div class="campus-item">
                <img src="https://stianasional.ac.id/wp-content/uploads/2017/08/logo-stia.png.webp" alt="stian">
                <button class="button">
                <span>STIAN LHOKSEUMAWE</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa343647sQQhDyecxat6w6tLRZfeF79BIeCQ&s" alt="unbp">
                <button class="button">
                <span>UNIVERSITAS BUMI PERSADA</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://assets.nsd.co.id/images/kampus/logo/ODBBQjQxMTgtQzBCMS00RUMzLTg4QkYtOTU1RUVDMEUzRTRF.png" alt="iain">
                <button class="button">
                <span>INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Logo_Resmi_UNIKI.png" alt="uniki">
                <button class="button">
                <span>UNIVERSITAS ISLAM KEBANGSAAN INDONESIA</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://sdl.ac.id/images/atribut/logosdl.png" alt="stikkes_darsa">
                <button class="button">
                <span>STIKKES DARUSSALAM LHOKSEUMAWE</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTikCGCk_kYaPgs8dy2396ZeQ234NkFWBkxf_gWjvQcv_QRLxdMv2XjHUfDn9V21UQrwtM&usqp=CAU" alt="stikkes_muhammadiyah">
                <button class="button">
                <span>STIKKES MUHAMMADIYAH LHOKSEUMAWE</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://stihalbanna.ac.id/wp-content/uploads/2024/04/cropped-logo-albanna-01-scaled-1.jpg" alt="albanna">
                <button class="button">
                <span>SEKOLAH TINGGI ILMU HUKUM AL-BANNA</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="https://assets.nsd.co.id/images/kampus/logo/download20.png" alt="getsempana_lhoksukon">
                <button class="button">
                <span>STIKES GETSEMPANA LHOKSUKON</span>
                </button>
            </div>
            <div class="campus-item">
                <img src="IMG/staii.png" alt="stai">
                <button class="button">
                <span>STAI JAMIATUT TARBIYAH LHOKSUKON </span>
                </button>
            </div>
        </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <h1>AWAK KOS</h1>
            <p> Awak Kos adalah sebuah platform yang menyajikan informasi mengenai properti kos 
                yang disewakan di daerah Kota Lhokseumawe dan Aceh Utara yang berada di sekitaran kampus negeri maupun 
                swasta dilengkapi dengan jarak terdekat harga kos, fasilitas kos dan gambar kos yang 
                diunggah langsung oleh developer. Platform kami memberikan kemudahan bagi kamu yang mencari
                info kos terdekat di sekitaran kampus yang kamu inginkan.</p>
                <p>Informasi kos yang disewakan juga langsung diberikan oleh pemilik, yang pastinya sudah 
                    terakurasi kebenarannya oleh developer. Kemudahan juga pastinya diberikan tidak hanya kepada 
                    pencari kos, tapi juga kepada pihak pemilik kos-kosan untuk dapat memasang informasi kos 
                    yang disewakan. Dengan adanya Awak Kos, transaksi antara pemilik dan penyewa dijamin
                    lebih cepat dan mudah. Kami selalu berusaha dengan baik untuk dapat memberikan informasi 
                    mengenai kos-kosan dari seluruh daerah Universitas yang ada di Kota Lhokseumawe dan Aceh Utara. 
                </p>
            
        </div>
        <div class="footer-bottom">
            <p>Cari Kos Terdekat Cepat & Mudah Kunjungi Awak Kos</p>
            <a href="home.html"><button class="btn">HOME</button></a>
            <div class="footer-container">
                <a href="https://www.instagram.com/althoriqamda_" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/6285214970768" target="_blank" class="social-link">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.tiktok.com/@amda__14?_t=ZS-8rbpaALn9rE&_r=1" target="_blank" class="social-link">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>
    </footer>

    <script>
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.hero-slide');
            const slider = document.querySelector('.hero-slider');

            if (index >= slides.length) currentSlide = 0;
            else if (index < 0) currentSlide = slides.length - 1;
            else currentSlide = index;

            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        document.querySelector('.prev').addEventListener('click', () => {
            showSlide(currentSlide - 1);
        });

        document.querySelector('.next').addEventListener('click', () => {
            showSlide(currentSlide + 1);
        });

        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 3000);

        // Tambahkan event listener untuk scroll
        window.addEventListener('scroll', () => {
    const searchBar = document.querySelector('.search-bar');
    const headerHeight = document.querySelector('.header').offsetHeight;

    // Cek jika posisi scroll lebih besar dari tinggi header
    if (window.scrollY > headerHeight) {
        searchBar.classList.add('fixed'); // Tambahkan kelas 'fixed' untuk memindahkan search bar
    } else {
        searchBar.classList.remove('fixed'); // Hapus kelas 'fixed' jika scroll kembali ke atas
    }
});
</script>
</body>
</html>