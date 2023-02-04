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
                <a class="active" href="#">Wisata</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="activity-place">
                <p class="name-activity">{{ $kegiatan->judul_kegiatan }}</p>
                <p class="place-activity">{{ $kegiatan->tempat_kegiatan }} - {{ \Carbon\Carbon::parse($kegiatan->created_at)->format('d M Y') }}</p>
            </div>
            <div class="view-activity">
                @foreach ($kegiatan->image->take(9) as $image)
                    <img src="{{ asset('storage/' . $image->gambar) }}" alt="detail-activity">
                @endforeach
            </div>
            <div class="about-activity">
                <p>Tentang Kegiatan</p>
                <div class="description-about-activity">
                    {!! $kegiatan->deskripsi_kegiatan !!}
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
