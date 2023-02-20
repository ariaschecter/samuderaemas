<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('template.favicon')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_bussiness.css') }}">
    <title>Detail Usaha</title>
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
                        <a class="active" href="{{ url('/#article-activity') }}">Kegiatan</a>
                        <a href="{{ url('/#article-destination') }}">Wisata</a>
                        <a href="{{ url('/#article-bussiness') }}">Usaha</a>
                        @include('template.lokasi_bumdes')
                        <a href="{{ url('staff') }}">Staff</a>
                    </div>
                </nav>
                @include('template.menu')
            </div>
            <div class="text-navigation">
                <a href="{{ url('/') }}">Beranda /</a>
                <a class="active" href="#">Usaha</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="bussiness-place">
                <p class="name-bussiness">{{ $usaha->nama_usaha }}</p>
                <p class="place-bussiness">{{ $usaha->lokasi_usaha }}</p>
            </div>
            <div class="view-bussiness">
                @foreach ($usaha->image->take(9) as $image)
                    <img src="{{ asset($image->gambar) }}" alt="detail-bussiness">
                @endforeach
            </div>
            <div class="about-bussiness">
                <p>Tentang Usaha</p>
                <div class="description-about-bussiness">
                        {!! $usaha->deskripsi_usaha !!}
                </div>
            </div>
            <div class="price-bussiness">
                <p>Harga {{ $usaha->nama_usaha }}</p>
                    <div class="price" id="rp">
                        <img src="{{ asset('frontend/images/icons/price.png') }}" alt="person">
                        <p>{{ $usaha->harga_usaha }}/{{ $usaha->satuan_usaha }}</p>
                    </div>
            </div>
            <div class="payment-bussiness">
                <p>Metode Pembayaran</p>
                    <div class="payment-method">
                        <div class="list-method">
                            <div class="list-atm">
                                @foreach($payments as $payment)
                                    <div class="card-method">
                                        <div class="image-card">
                                            <img src="{{ asset($payment->payment_method) }}" alt="Metode Pembayaran">
                                        </div>
                                        <div class="rekening-number">
                                            <p>{{ $payment->payment_rekening }}</p>
                                        </div>
                                        <div class="rekening-name">
                                            <p>a.n. {{ $payment->payment_name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
            </div>
            <div class="contact-bussiness">
                <p>Kontak Kami</p>
                    <div class="list-contact">
                        <div class="contact" id="wa">
                            <a href="https://wa.me/{{ $usaha->cp_usaha }}" target="_blank"><img src="{{ asset('frontend/images/sosmed/wa.png') }}" alt=""></img></a>
                            <a href="https://wa.me/{{ $usaha->cp_usaha }}" target="_blank">WhatsApp</a>
                        </div>
                    </div>
            </div>
            <div class="location-bussiness">
                <p>Lokasi Usaha</p>
                <div class="location-address">
                    <p>{{ $usaha->lokasi_usaha }}</p>
                </div>
                <div class="image-location-destination">
                    <iframe width="100%"  height="100%" src="{{ $usaha->link_lokasi_usaha }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
