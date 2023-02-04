<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_activity.css') }}">
    <title>Detail Wisata</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="navigation">
                <div class="logo">
                    <img src="{{ asset('frontend/images/logo/logo.svg') }}" alt="" >
                </div>
                <nav id="navbar" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a  href="{{ url('/') }}">Beranda</a>
                        <a href="{{ url('/#article-activity') }}">Kegiatan</a>
                        <a class="active" href="{{ url('/#article-destination') }}">Wisata</a>
                        <a href="{{ url('/#article-bussiness') }}">Usaha</a>
                        <a href="">Lokasi</a>
                        <a href="{{ url('staff') }}">Staff</a>
                    </div>
                </nav>
                <div class="menu">
                    <img src="{{ asset('frontend/images/icons/menu.svg') }}" alt="menu" onclick="openNav()">
                </div>
            </div>
            <div class="text-navigation">
                <a href="">Beranda /</a>
                <a class="active" href="">Wisata</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="activity-place">
                <p class="name-activity">Pembukaan PMM Tematik BUMDES</p>
                <p class="place-activity">Balai Desa Tumpak Rejo (23 Januari 2023)</p>
            </div>
            <div class="view-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-1.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-2.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-3.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-4.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-5.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-2.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-3.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-4.png') }}" alt="detail-activity">
                <img src="{{ asset('frontend/images/image-content/detail-activity/detail-5.png') }}" alt="detail-activity">
            </div>
            <div class="about-activity">
                <p>Tentang Kegiatan</p>
                <div class="description-about-activity">
                    <p>Kali ini BUMDES Samudera Emas kedatangan Mahasiswa Universitas Muhammadiyah Malang Kelompok 39 yang sedang melakukan Pengabdian Pada Masyarakat Oleh Mahasiswa atau biasa disebut PMM. Kegiatan pembukaan PMM ini dilakukan pada tanggal 23 Januari 2023 yang dibuka dengan sambutan oleh Kepala Desa Tumpak Rejo, selain itu tak lupa juga Direktur BUMDES Samudera Emas memberikan sambutan.Dalam pembukaan ini para Mahasiswa juga memperkenalkan diri mereka yang beranggotakan lima orang laki-laki, Abdul (paling kiri di foto), Yuda (kedua dari kiri di foto), Agum (paling kanan di foto), Aria (kedua dari kanan di foto) dan faruq (ketiga dari kanan di foto).</p>
                    <p>Mereka berlima berasal dari jurusan Informatika Universitas Muhammadiyah Malang dan berencana untuk melakukan digitalisasi terhadap BUMDES Samudera Emas dengan pembuatan Website. Kegiatan Pengabdian Pada Masyarakat Oleh Mahasiswa  ini akan berlangsung selama satu bulan dimulai sejak pembukaan.</p>
                </div>
            </div>
        </div>
    </main>
    <script>
              function openNav() {
                document.getElementById("navbar").style.height = "100%";
                }

                function closeNav() {
                document.getElementById("navbar").style.height = "0%";
                }
    </script>
</body>
</html>
