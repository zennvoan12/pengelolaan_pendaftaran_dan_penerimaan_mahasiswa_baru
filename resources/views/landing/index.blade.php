<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">

    <title>Khayangan Universitas</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <!-- TOP NAV -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i> khayangan.info@ac.com</p>
                    <p> <i class='bx bxs-phone-call'></i> (0263 243178)</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">

            <a class="navbar-brand" href="#">Universitas Khayangan<span class="dot">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Biaya Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
                <a href="/pendaftaran" class="btn btn-brand ms-lg-3">Pendaftaran <span
                        class="badge text-bg-info">Online</span></a>
            </div>
        </div>
    </nav>

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">Designed for Excellence</h6>
                        <h1 class="display-3 my-4">We Create Excellent <br />Graduates</h1>
                        <a href="#" class="btn btn-brand">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">We craft amazing experiances</h6>
                        <h1 class="display-3 my-4">Featured Student Campus <br />Professionals</h1>
                        <a href="#" class="btn btn-brand">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <h3 class="text-center">VISI</h3>
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-12">
                        <div class="ms-4">
                            <p>Pada Tahun 2031 Universitas Suryakancana Menjadi Perguruan Tinggi Berstandar
                                Internasional, Unggul, Mandiri dalam Ilmu Pengetahuan dan Teknologi, Beriman dan
                                Bertaqwa kepada Tuhan Yang Maha Esa serta Mewujudkan Kesejahteraan bagi Masyarakat. </p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-center">MISI</h3>
            <div class="row justify-content-center">
                <div class="col-lg-5 py-5">
                    <div class="row">

                        <div class="col-12">
                            <div class="info-box">
                                <img src="img/icon6.png" alt="">
                                <div class="ms-4">
                                    <h5>Mencerdaskan Bangsa</h5>
                                    <p>Ikut serta dalam pembangunan SDM yang berkualitas untuk Indonesia Maju </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="img/icon4.png" alt="">
                                <div class="ms-4">
                                    <h5>Inspiratif</h5>
                                    <p>Mencetak generasi inspiratif setiap tahunnya </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="img/icon5.png" alt="">
                                <div class="ms-4">
                                    <h5>Inovatif</h5>
                                    <p>Mencetak generasi yang inovatif dan berguna untuk nusa dan Bangsa </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="img/k.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- MILESTONE -->
    <section id="milestone">
        <div class="container">
            <div class="row text-center justify-content-center gy-4">
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4">5.000</h1>
                    <p class="mb-0">Mahasiswa Aktif</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4">400</h1>
                    <p class="mb-0">Dosen</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4">34</h1>
                    <p class="mb-0">Program Studi Unggulan</p>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h6>Apa saja Fakultas di Universitas Khayangan?</h6>
                        <h1>Fakultas</h1>
                        <p class="mx-auto">Semenjak didirikannya Universitas Khayangan ini, setidaknya ada 5 Fakultas
                            yang menjadi Unggulan
                            , dan 34 program studi.
                        </p>
                    </div>
                </div>
            </div>

            <div class="containers">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="face face1">
                                <div class="content">
                                    <img src="img/Fakultas-Hukum.webp">
                                    <h3>Fakultas Hukum</h3>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p>Ilmu Hukum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="face face1">
                                <div class="content">
                                    <img src="img/Fakultas-Keguruan-dan-Ilmu-Pendidikan.webp">
                                    <h3>FKIP</h3>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p>
                                        <li>Pendidikan Sastra dan Bahasa Indonesia</li>
                                        <li>Pendidikan Pancasila dan Kewarganegaraan</li>
                                        <li>Pendidikan Matematika</li>
                                        <li>Pendidikan Bahasa Inggris</li>
                                        <li>Pendidikan Jasmani Kesehatan dan Rekreasi</li>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="face face1">
                                <div class="content">
                                    <img src="img/Fakultas-Teknik.webp">
                                    <h3>Fakultas Teknik</h3>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p></p>
                                    <li>Program Studi Informatika</li>
                                    <li>Program Studi Sipil</li>
                                    <li>Program Studi Industri</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containers">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="face face1">
                                <div class="content">
                                    <img src="img/Fakultas-Ekonomi-dan-Bisnis.webp">
                                    <h3>Fakultas Ekonomi dan Bisnis</h3>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p></p>
                                    <li>Ekonomi Syariah</li>
                                    <li>Perbankan Syariah</li>
                                    <li>Akuntansi Syariah</li>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="face face1">
                                <div class="content">
                                    <img src="img/Fakultas-Ilmu-Sain-Terapan.webp">
                                    <h3>Faster</h3>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p>
                                        <li>Agribisnis</li>
                                        <li>Agro Teknologi</li>
                                        <li>Administrasi Bisnis Internasional</li>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="face face1">
                                <div class="content">
                                    <img src="img/k1.png">
                                    <h3>Pasca Sarjana </h3>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p> segera </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light" id="portfolio">
    </section>

    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h6>Pimpinan</h6>
                        <h1>Rekor dan Wakil</h1>
                        <p class="mx-auto">berikut adalah Rekor dan Wakil rekor dari Universitas Khayangan</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/team_1.jpg" alt="">
                            <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram'></i></a>
                                <a href="#"><i class='bx bxl-pinterest'></i></a>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <h5>Dr. Rendi Nugraha</h5>
                        <p>Wakil Rektor I</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/team_2.jpg" alt="">
                            <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram'></i></a>
                                <a href="#"><i class='bx bxl-pinterest'></i></a>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <h5>Dr. Bill Coulson</h5>
                        <p>Rektor</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/team_3.jpg" alt="">
                            <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram'></i></a>
                                <a href="#"><i class='bx bxl-pinterest'></i></a>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <h5>Dr. Luke Shaw</h5>
                        <p>Wakil Rektor II</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">Universitas Khayangan<span class="dot">.</span></h4>
                        <p></p>
                        <div class="col-auto social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-pinterest'></i></a>
                        </div>
                        <div class="col-auto conditions-section">
                            <a href="#">privacy</a>
                            <a href="#">terms</a>
                            <a href="#">disclaimer</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">Copyright vicpra 2022. All rights Reserved</p> Distributed By <a
                hrefs="https://themewagon.com">ThemeWagon</a>
        </div>
    </footer>



    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>