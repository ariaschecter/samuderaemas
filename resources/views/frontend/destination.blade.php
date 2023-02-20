<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('template.favicon')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_destinaton.css') }}">
    <title>Detail Wisata</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="navigation">
                @include('template.logo')
                <nav id="navbar" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a href="{{ url('/') }}">Beranda</a>
                        <a href="{{ url('/#article-activity') }}">Kegiatan</a>
                        <a class="active" href="{{ url('/#article-destination') }}">Wisata</a>
                        <a href="{{ url('/#article-bussiness') }}">Usaha</a>
                        @include('template.lokasi_bumdes')
                        <a href="{{ url('staff') }}">Staff</a>
                    </div>
                </nav>
                @include('template.menu')
            </div>
            <div class="text-navigation">
                <a href="{{ url('/') }}">Beranda /</a>
                <a class="active" href="#">Wisata</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="destination-place">
                <p class="name-destination">{{ $wisata->judul_wisata }}</p>
                <p class="place-destination">{{ $wisata->lokasi_wisata }}</p>
            </div>
            <div class="view-destination">
                @foreach ($wisata->image->take(9) as $image)
                    <img src="{{ asset($image->gambar) }}" alt="detail-destination">
                @endforeach
                {{-- <img src="/images/image-content/detail-destination/wonogoro/wonogoro-5.png" alt="wonogoro"> --}}

            </div>
            <div class="about-destination">
                <p>Tentang Wisata</p>
                <div class="description-about-destination">
                    {!! $wisata->deskripsi_wisata !!}
                </div>
            </div>
            <div class="ticket-destination">
                <p>Tiket Wisata</p>
                <div class="price-ticket-destination">
                    @foreach ($wisata->tiket as $tiket)
                        <div class="weekday-price">
                            <p>{{ $tiket->hari_tiket }}</p>
                            <div class="category-weekday-price">
                                <div class="category" id="person">
                                    <img src="{{ asset('frontend/images/icons/person.png') }}" alt="Orang">
                                    <p>Rp. {{ number_format($tiket->orang_tiket) }}/orang</p>
                                </div>
                                <div class="category" id="motorcycle">
                                    <img src="{{ asset('frontend/images/icons/motorcycle.png') }}" alt="Motor">
                                    <p>Rp. {{ number_format($tiket->motor_tiket) }}</p>
                                </div>
                                <div class="category" id="car">
                                    <img src="{{ asset('frontend/images/icons/car.png') }}" alt="Mobil">
                                    <p>Rp. {{ number_format($tiket->mobil_tiket) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="location-destination">
                <p>Lokasi Wisata</p>
                <div class="location-address">
                    <p>{{ $wisata->lokasi_wisata }}</p>
                </div>
                <div class="image-location-destination">
                    <iframe width="100%"  height="100%" src="{{ $wisata->link_lokasi_wisata }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
