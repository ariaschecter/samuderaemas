<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('template.favicon')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_index.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_footer.css') }}">
    <title>Landing Page | Samudera Emas</title>
</head>
<body>
    <header>
        <div class="header">
            @include('template.logo')
            <nav id="navbar" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                        <a class="active" href="{{ url('/') }}">Beranda</a>
                        <a href="{{ url('/#article-activity') }}">Kegiatan</a>
                        <a href="{{ url('/#article-destination') }}">Wisata</a>
                        <a href="{{ url('/#article-bussiness') }}">Usaha</a>
                        @include('template.lokasi_bumdes')
                        <a href="{{ url('staff') }}">Staff</a>
                </div>
            </nav>
            @include('template.menu')
        </div>
        <div class="content-header">
            <div class="tagline-header">
                <p class="text-tagline-header">DESA TUMPAKREJO</p>
                <img src="{{ asset('frontend/images/backgorund_mobile/line-header.png') }}" alt="">
                <p class="description-text-tagline-header">Desa yang berada diselatan dengan destinasi wisata yang sangat menawan</p>
            </div>
            <div class="information-header">
                <div class="activity">
                    <p class="total-activity">14</p>
                    <p class="description-activity">Kegiatan yang telah dilaksanakan pada kepengurusan kali ini</p>
                </div>
                <div class="destination">
                    <p class="total-destination">2</p>
                    <p class="description-destination">Destinasi Wisata yang dapat dikunjugi yaitu Pantai ngantep dan wonogoro</p>
                </div>
                <div class="bussiness-category">
                    <p class="total-bussines-category">3</p>
                    <p class="description-bussines-category">Kategori usaha yang bergerak dalam sektor pangan dan jasa</p>
                </div>
                <div class="distance">
                    <p class="total-distance">62</p>
                    <p class="description-distance">KM jarak dari pusat kota untuk sampai ke desa Tumpakrejo</p>
                </div>
            </div>
        </div>
    </header>
    <main>
        <article id="article-activity">
            <p class="tagline-our-activity">Kegiatan Kami</p>
            <div class="our-activity">
                @php
                    $satu = $kegiatans->first();
                @endphp
                    <section class="focal-point-bumdes-activity">
                        <div class="focal-image">
                            <img src="{{ asset('storage/' . $satu->image->first()->gambar) }}" alt="">
                        </div>
                        <div class="text-focal-point-bumdes-activity">
                            <p class="tagline">{{ $satu->judul_kegiatan }}</p>
                            <div class="description">{!! Str::of($satu->deskripsi_kegiatan)->limit(110) !!}</div>
                            <a href="{{ route('home.kegiatan.detail', $satu->slug_kegiatan) }}" class="read-more">(Baca selengkapnya)</a>
                        </div>
                    </section>
                <section class="slide-activity">
                    @foreach ($kegiatans->skip(1)->take(PHP_INT_MAX)->get() as $kegiatan)
                        <div class="bumdes-activity">
                            <div class="bumdes-activity-image">
                                <img src="{{ asset('storage/' . $kegiatan->image->first()->gambar) }}" alt="">
                            </div>
                            <div class="text-bumdes-activity">
                                <p class="tagline">{{ $kegiatan->judul_kegiatan }}</p>
                                <div class="description">{!! Str::of($kegiatan->deskripsi_kegiatan) !!}</div>
                                <a href="{{ route('home.kegiatan.detail', $kegiatan->slug_kegiatan) }}" class="read-more">(Baca selengkapnya)</a>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </article>
        <article id="article-destination">
            <p class="tagline-our-activity">Wisata Kami</p>
            <div class="our-destinations">
                @foreach ($wisatas as $wisata)
                    <section class="destination-content">
                        <div class="image-destination">
                            <img src="{{ asset('storage/' . $wisata->image->first()->gambar) }}" alt="">
                        </div>
                        <div class="text-destination">
                            <div class="place-destination">
                                <p>{{ $wisata->judul_wisata }}</p>
                            </div>
                            <img src="{{ asset('frontend/images/image-content/destination/line.png') }}" alt="">
                            <div class="destination-description">
                                {!! Str::of($wisata->deskripsi_wisata)->limit(710) !!}
                            </div>
                            <a href="{{ route('home.wisata.detail', $wisata->slug_wisata) }}">(Baca selengkapnya)</a>
                        </div>
                    </section>
                @endforeach
            </div>
        </article>
        <article id="article-bussiness">
            <p class="tagline-our-activity">Usaha Kami</p>
            <div class="our-bussiness">
                @foreach ($usahas as $usaha)
                <section>
                    <div class="grid-container">
                        <div class="focal-bussiness">
                            <img src="{{ asset('storage/' . $usaha->image->first()->gambar) }}" alt="">
                        </div>
                    </div>
                    <div class="text-bussiness">
                        <div class="bussiness-name">
                            <p>{{ $usaha->nama_usaha }}</p>
                        </div>
                        <img src="{{ asset('frontend/images/image-content/destination/line.png') }}" alt="">
                        <div class="bussiness-description">
                            <div class="about-bussiness">

                                {!! Str::of($usaha->deskripsi_usaha)->limit(710) !!}
                            </div>
                            <p class="focus-description"><a href="{{ route('home.usaha.detail', $usaha->usaha_slug) }}">Detail Usaha</a></p>
                        </div>
                    </div>
                </section>
                @endforeach
            </div>
        </article>
    </main>
    <footer>
        <div class="footer">
            <div class="footer-description">
                <img src="{{ asset('frontend/images/logo/logo.png') }}" alt="logo" width="50">
                <p>BUMDES Samudera Emas merupakan suatu organisasi dibawah kepengurusan desa yang bertanggung jawab atas kegiatan yang ada pada desa</p>
            </div>
            <div class="footer-nav">
                    <a class="active" href="">Beranda</a>
                    <a href="{{ url('/#article-activity') }}">Kegiatan</a>
                    <a href="{{ url('staff') }}">Staff</a>
                    <a href="{{ url('/#article-destination') }}">Wisata</a>
                    <a href="{{ url('/#article-bussiness') }}">Usaha</a>
            </div>
            <div class="footer-our-contact">
                <p>Kontak Kami</p>
                <p>Lokasi : Gombangan, Tumpakrejo, Gedangan, Kota Malang, Jawa Timur, 65178</p>
                <div class="sosmed">
                    <a href=""><img src="{{ asset('frontend/images/sosmed/whatsapp.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('frontend/images/sosmed/gmail.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('frontend/images/sosmed/instagram.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
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
