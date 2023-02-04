<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="responsive_navbar-detail.css">
    <link rel="stylesheet" href="responsive_destinaton.css">
    <title>Detail Wisata</title>
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
                        <a class="active" href="#article-destination">Wisata</a>
                        <a href="#article-bussiness">Usaha</a>
                        <a href="">Lokasi</a>
                        <a href="staff.html">Staff</a>
                    </div>
                </nav>
                <div class="menu">
                    <img src="/images/icons/menu.svg" alt="menu" onclick="openNav()">
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
            <div class="destination-place">
                <p class="name-destination">Pantai Wonogoro</p>
                <p class="place-destination">Desa Tumpak Rejo, Malang</p>
            </div>
            <div class="view-destination">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-1.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-2.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-3.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-4.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-5.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-2.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-3.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-4.png" alt="wonogoro">
                <img src="/images/image-content/detail-destination/wonogoro/wonogoro-5.png" alt="wonogoro">
            </div>
            <div class="about-destination">
                <p>Tentang Wisata</p>
                <div class="description-about-destination">
                    <p>Pantai Wonogoro memiliki garis pantai yang cukup panjang, mencapai lebih dari 1 kilometer dengan kedua ujungnya dibatasi oleh bukit. Pantai ini sangatlah landai, hingga membuatnya terkesan semakin luas. Memiliki pasir putih yang terhampar luas sejauh mata memandang dan bercampur dengan pasir besi yang akan nampak berkilau saat terkena sinar matahari. Dibagian sisi lain dari pantai ini juga terdapat deretan perbukitan hijau yang memanjang dan tampak sangat rindang. Kamu bisa mencoba mendaki bukit ini untuk dapat melihat panorama pantai dari atas ketinggian. Dengan melihat dari atas bukit ini, kamu bisa memandang birunya lautan yang sangat luas.</p>
                    <p>Pengunjung bisa berteduh di antara pepohonan yang banyak tumbuh di tepi pantai ini sambil memandang birunya samudra. Pantai Wonogoro berombak cukup besar, jadi pengunjung disarankan untuk tidak berenang di pantai ini. Pengunjung bisa menyusuri hamparan Pantai Wonogoro sepanjang kira-kira satu kilometer lebih dengan dibatasi bukit kecil di kedua tepinya. Pasir pantainya putih dengan campuran pasir besi yang kelihatan berkilauan bila ditimpa sinar matahari. Di tepi pantai terdapat batu karang memanjang setinggi pantai yang menahan deburan ombak laut selatan. Di sebelah timur pantai terdapat sungai kecil yang bermuara di ujung timur area pantai. Biasanya banyak komunitas pemancing yang mendatangi Pantai Wonogoro ini.</p>
                </div>
            </div>
            <div class="ticket-destination">
                <p>Tiket Wisata</p>
                <div class="price-ticket-destination">
                    <div class="weekday-price">
                        <p>Hari Biasa(Senin - Jumat)</p>
                        <div class="category-weekday-price">
                            <div class="category" id="person">
                                <img src="/images/icons/person.png" alt="person">
                                <p>Rp.10.000/orang</p>
                            </div>
                            <div class="category" id="motorcycle">
                                <img src="/images/icons/motorcycle.png" alt="">
                                <p>Rp.10.000</p>
                            </div>
                            <div class="category" id="car">
                                <img src="/images/icons/car.png" alt="">
                                <p>Rp.15.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="weekend-price">
                        <p>Hari Libur(Sabtu - Minggu) *Termasuk tanggal merah*</p>
                        <div class="category-weekend-price">
                            <div class="category" id="person">
                                <img src="/images/icons/person.png" alt="person">
                                <p>Rp.10.000/orang</p>
                            </div>
                            <div class="category" id="motorcycle">
                                <img src="/images/icons/motorcycle.png" alt="">
                                <p>Rp.10.000</p>
                            </div>
                            <div class="category" id="car">
                                <img src="/images/icons/car.png" alt="">
                                <p>Rp.15.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="location-destination">
                <p>Lokasi Wisata</p>
                <div class="location-address">
                    <p>Area Gn., Sidurejo, Gedangan, Kabupaten Malang, Jawa Timur 65178</p>
                </div>
                <div class="image-location-destination">
                    <iframe width="100%"  height="100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15787.842388324683!2d112.5661405!3d-8.4055308!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce9207c736fa4152!2sPantai%20Wonogoro!5e0!3m2!1sid!2sid!4v1675336226709!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
