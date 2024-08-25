@extends('pages.home.layouts.master')

@section('hero')
    <?php
    use Carbon\Carbon;
    ?>
    <!-- Page Title -->
    <div class="page-title mt-5" data-aos="fade">
        <div class="container mt-5">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Gereja</li>
                </ol>
            </nav>
            <h1>{{ $data->nama_jemaat }}</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="portfolio-details-slider swiper init-swiper">

                        <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>

                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                @if ($data->nama_jemaat == 'Jemaat Mandai')
                                    <img height="600px" src="{{ asset('home_assets') }}/img/gereja/mandai.jpg"
                                        alt="">
                                @elseif ($data->nama_jemaat == 'Jemaat Tamalanrea')
                                    <img height="600px" src="{{ asset('home_assets') }}/img/gereja/tamalanrea.jpg"
                                        alt="">
                                @endif
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                        <h3>Detail Gereja :</h3>
                        <ul>
                            <li><strong>Nama :</strong> {{ $data->nama_jemaat }}</li>
                            <li><strong>Klasis :</strong> {{ $data->klasis->nama_klasis }}</li>
                            <li><strong>Alamat : </strong>{{ $data->alamat }}</li>
                        </ul>
                    </div>
                    {{-- <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                        <h2>Exercitationem repudiandae officiis neque suscipit</h2>
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia
                            quia.
                            Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem
                            officia
                            accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum
                            deserunt
                            eius.
                        </p>
                    </div> --}}
                </div>

            </div>

        </div>
    </section>

    <section class="faq-2 section ">
        <div class="container section-title" data-aos="fade-up">
            <h2>Jadwal Ibadah {{ $data->nama_jemaat }} </h2>
        </div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Ibadah</th>
                        <th>Tempat</th>
                        <th>Pelayan Firman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal_ibadah as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon::parse($d->tanggal)->format('d-m-Y') }} </td>
                            <td> {{ $d->nama }} </td>
                            <td>{{ $d->tempat }}</td>
                            <td>{{ $d->pelayan_firman }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section><!-- /Faq 2 Section -->


    <section class="faq-2 section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pegurus {{ $data->nama_jemaat }} </h2>
            {{-- <p>Daftar Gereja Anggota Persekutuan Pemuda Gereja Toraja Mamasa</p> --}}
        </div><!-- End Section Title -->

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Bidang</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengurus as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $d->nama }} </td>
                            <td> {{ $d->bidang }} </td>
                            <td>{{ $d->jabatan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section><!-- /Faq 2 Section -->
@endsection
