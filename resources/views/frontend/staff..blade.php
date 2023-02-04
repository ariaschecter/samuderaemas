<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="responsive_navbar-detail.css">
    <link rel="stylesheet" href="responsive_staff.css">
    <title>Staff BUMDES</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="navigation">
                <div class="logo">
                    <img src="/images/logo/logo.svg" alt="" >
                </div>
                <nav id="navbar" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a  href="/index.html">Beranda</a>
                        <a href="#article-activity">Kegiatan</a>
                        <a  href="#article-activity">Wisata</a>
                        <a href="#article-bussiness">Usaha</a>
                        <a href="">Lokasi</a>
                        <a class="active" href="">Staff</a>
                    </div>
                </nav>
                <div class="menu">
                    <img src="/images/icons/menu.svg" alt="menu" onclick="openNav()">
                </div>
            </div>
            <div class="text-navigation">
                <a href="">Beranda /</a>
                <a class="active" href="">Staff</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="content">
                <div class="staff-content left-up">
                    <div class="image-staff">
                        <img src="/images/image-content/staff/staff.png" alt="staff-bumdes">
                    </div>
                    <div class="description-staff">
                        <p class="tagline-staff">“ Hadapi semua rintangan yang ada apapun itu jangan berpikir untuk gagal ”</p>
                        <div class="name-job-staff">
                            <p class="name-staff">Suliswanto</p>
                            <p class="job-staff">Direktur Badan Usaha Milik Desa Samudera EMas</p>
                        </div>
                        <img src="" alt="">
                        <div class="about-staff">
                            <p>Suliswanto atau biasa dikenal dengan nama sulis adalah seorang Wirausahawan yang sudah berpengalaman lebih dari 15 tahun didunia percetakan. Berawal dari merantau ke kota Surabaya dengan merelakan untuk tidak melanjutkan sekolahnya yang pada saat itu berseragam putih biru.</p>
                            <p>Usaha dan kerja keras selama 2 tahun mengikuti pamannya untuk menjalankan tempat percetakan akhirnya sulis berani untuk membuka tempat percetakannya sendiri dan bertahan hingga saat ini. Pikirannya untuk memajukan usaha yang ada didesa membuatnya untuk kembali ke tempat lahirnya dan mulai untuk mengembangkan segala usaha yang ada didesa.</p>
                        </div>
                    </div>
                </div>
                <div class="staff-content right-down">
                    <div class="image-staff">
                        <img src="/images/image-content/staff/staff.png" alt="staff-bumdes">
                    </div>
                    <div class="description-staff">
                        <p class="tagline-staff">“ Hadapi semua rintangan yang ada apapun itu jangan berpikir untuk gagal ”</p>
                        <div class="name-job-staff">
                            <p class="name-staff">Suliswanto</p>
                            <p class="job-staff">Direktur Badan Usaha Milik Desa Samudera EMas</p>
                        </div>
                        <img src="" alt="">
                        <div class="about-staff">
                            <p>Suliswanto atau biasa dikenal dengan nama sulis adalah seorang Wirausahawan yang sudah berpengalaman lebih dari 15 tahun didunia percetakan. Berawal dari merantau ke kota Surabaya dengan merelakan untuk tidak melanjutkan sekolahnya yang pada saat itu berseragam putih biru.</p>
                            <p>Usaha dan kerja keras selama 2 tahun mengikuti pamannya untuk menjalankan tempat percetakan akhirnya sulis berani untuk membuka tempat percetakannya sendiri dan bertahan hingga saat ini. Pikirannya untuk memajukan usaha yang ada didesa membuatnya untuk kembali ke tempat lahirnya dan mulai untuk mengembangkan segala usaha yang ada didesa.</p>
                        </div>
                    </div>
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
