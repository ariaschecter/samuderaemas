<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_staff.css') }}">
    <title>Staff BUMDES</title>
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
                        <a href="{{ url('/#article-destination') }}">Wisata</a>
                        <a href="{{ url('/#article-bussiness') }}">Usaha</a>
                        <a href="">Lokasi</a>
                        <a class="active" href="{{ url('/staff') }}">Staff</a>
                    </div>
                </nav>
                @include('template.menu')
            </div>
            <div class="text-navigation">
                <a href="{{ url('/') }}">Beranda /</a>
                <a class="active" href="#">Staff</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="content">
                @php
                    $i = 1;
                @endphp
                @foreach ($staffs as $staff)
                    <div class="staff-content {{ $i % 2 == 1 ? 'left-up' : 'right-down' }}">
                        <div class="image-staff">
                            <img src="{{ asset('storage/' . $staff->gambar_staff) }}" alt="Foto {{ $staff->nama_staff }}">
                        </div>
                        <div class="description-staff">
                            <p class="tagline-staff">“ {{ $staff->motivasi_staff }} ”</p>
                            <div class="name-job-staff">
                                <p class="name-staff">{{ $staff->nama_staff }}</p>
                                <p class="job-staff">{{ $staff->jabatan_staff }}</p>
                            </div>
                            <img src="" alt="">
                            <div class="about-staff">
                                {!! $staff->bio_staff !!}
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
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
