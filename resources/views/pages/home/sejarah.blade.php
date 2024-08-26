@extends('pages.home.layouts.master')

@section('hero')
    <section id="hero" class="hero section dark-background">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1>Persekutuan Pemuda Gereja Toraja Mamasa</h1>
                    <p>Bahwa sesungguhnya Persekutuan Pemuda Gereja Toraja Mamasa adalah generasi masa kini dan masa
                        depan Gereja serta penerus cita-cita perjuangan bangsa.</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('home_assets') }}/img/ppgtm.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section id="sejarah" class="section why-us light-background" data-builder="section">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-12 d-flex flex-column justify-content-center order-2 order-lg-1">
                    <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                        <h3><span>Sejara Singkat </span><strong>Persekutuan Pemuda Gereja Toraja Mamasa</strong>
                        </h3>
                        <p>
                            Persekutuan Pemuda Gereja Toraja Mamasa disingkat PPGTM adalah merupakan salah satu
                            penatalayanan kategorial dalam lingkup Gereja Toraja Mamasa yang dibentuk pada tanggal
                            13 Maret 1970 dan melembaga disemua lingkup pelayanan Gereja Toraja Mamasa. PPGTM
                            memiliki tanggung jawab untuk melaksanakan Tri Panggilan Gereja yaitu bersaksi,
                            bersekutu dan melayani sebagai bentuk implementasi iman dan kasih dalam mewujudkan
                            amanat agung Yesus Kristus
                        </p>
                        <p>
                            Bahwa PPGTM adalah juga merupakan bagian yang tidak terpisahkan dari warga Negara
                            Kesatuan Republik Indonesia yang kehadirannya diharapkan memberikan nuansa kasih dan
                            kedamaian, serta terpanggil untuk mewujudkan kesejahteraan dan keadilan sosial di
                            tengah-tengah bangsa dan umat yang majemuk dengan berlandaskan pada Pancasila dan UUD
                            1945 sebagai dasar Negara.
                        </p>
                        <p>
                            Bahwa untuk menjalankan dan menata proses kelembagaan dan kepemimpinannya, maka PPGTM
                            memiliki konstitusi penatalayanan yang disebut Pedoman Pelayanan PPGTM.
                        </p>
                    </div>
                </div>
                {{-- <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                <img src="{{ asset('home_assets') }}/img/why-us.png" class="img-fluid" alt=""
                    data-aos="zoom-in" data-aos-delay="100">
            </div> --}}
            </div>
        </div>
    </section><!-- /Why Us Section -->
@endsection
