<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPGTM</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .navbar-custom {
            background: linear-gradient(90deg, #c8c9ce, #3c4055);
            color: #ffffff;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }

        .navbar-custom .nav-link:hover {
            color: #ffeb3b;
        }

        .btn-custom {
            background-color: #ff5722;
            color: #ffffff;
        }

        .btn-custom:hover {
            background-color: #ff9800;
            color: #ffffff;
        }

        .hero {
            position: relative;
            background-image: url('{{ asset('assets/images/hero.jpg') }}');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: inherit;
            background-size: inherit;
            background-position: inherit;
            filter: blur(8px);
            z-index: 1;
        }

        .hero .container {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #3f51b5;
        }

        .custom-table {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>

    @php
        use Carbon\Carbon;
    @endphp

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            {{-- <a class="navbar-brand" href="#">Komunitas Kaum Bapak</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Jadwal Ibadah </a>
                    </li>
                </ul>
                <a href="login" class="btn btn-custom">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang</h1>
            <h1> Persekutuan Pemuda Gereja Toraja Mamasa</h1>
            {{-- <p>Memperkuat ikatan antar ayah dalam komunitas yang peduli dan mendukung.</p> --}}
        </div>
    </section>

    <!-- Home Section -->
    <section id="profile" class="py-5">
        <div class="container">
            <h2 class="section-title">Sejarah Singkat</h2>
            <p>
                <span class="fw-bold">Persekutuan Pemuda Gereja Toraja Mamasa</span> disingkat PPGTM adalah merupakan
                salah satu
                penatalayanan
                kategorial dalam lingkup Gereja Toraja Mamasa yang dibentuk pada tanggal 13 Maret 1970 dan melembaga
                disemua lingkup pelayanan Gereja Toraja Mamasa. PPGTM memiliki tanggung jawab untuk melaksanakan Tri
                Panggilan Gereja yaitu bersaksi, bersekutu dan melayani sebagai bentuk implementasi iman dan kasih dalam
                mewujudkan amanat agung Yesus Kristus
            </p>
            <p>
                Bahwa PPGTM adalah juga merupakan bagian yang tidak terpisahkan dari warga Negara Kesatuan Republik
                Indonesia yang kehadirannya diharapkan memberikan nuansa kasih dan kedamaian, serta terpanggil untuk
                mewujudkan kesejahteraan dan keadilan sosial di tengah-tengah bangsa dan umat yang majemuk dengan
                berlandaskan pada Pancasila dan UUD 1945 sebagai dasar Negara.
            </p>
            <p>
                Bahwa untuk menjalankan dan menata proses kelembagaan dan kepemimpinannya, maka PPGTM memiliki
                konstitusi penatalayanan yang disebut Pedoman Pelayanan PPGTM.
            </p>
        </div>
    </section>

    <!-- Profile Section -->
    <section id="profile" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="row">
                <!-- Card for Visi -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Visi</h3>
                            <p class="card-text">
                                PPGTM bertujuan untuk mempersekutukan, memperlengkapi dan menggerakkan warganya menjadi
                                umat Allah yang
                                mengemban tugas panggilan Allah
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card for Misi -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Misi</h3>
                            <ul class="card-text">
                                <li>PPGTM berbentuk penatalayanan kategorial yang merupakan wadah pelayanan khusus bagi
                                    warga Gereja kategori pemuda.
                                </li>

                                <li>
                                    PPGTM merupakan bagian yang tidak terpisahkan dari Gereja Toraja Mamasa
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kegiatan Section -->
    <section id="kegiatan" class="py-5">
        <div class="container">
            <h2 class="section-title">Jadwal Ibadah PPGTM</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Pelayan Firman</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Carbon::parse($d->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->pelayan_firman }}</td>
                                <td>{{ $d->tempat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
