@include('layouts.header')

<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background background-index">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 text-center">
                        <img class="hero-logo" src="{{asset('img/logo-ponorogo.png')}}" alt="Logo Desa Jabung" />
                        <h2>Sukses Jabung untuk Indonesia</h2>
                        <p>
                            Platform digital pemerintah desa ini menyediakan informasi dan layanan kepada masyarakat
                            melalui website, Instagram, dan aplikasi mobile Android.
                            Bertujuan untuk meningkatkan pelayanan publik, mempermudah akses informasi,
                            meningkatkan transparansi, dan mempererat interaksi antara desa dan warganya.
                        </p>
                        <a href="#get-started" class="btn-get-started">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->
    <!-- Get Started Section -->
    <section id="get-started" class="get-started section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 content" data-aos="zoom-out" data-aos-delay="100">
                    <div class="header">
                        <div class="header-top">
                            <div class="title-box">
                                <div class="title-with-image">
                                    @if (empty($news))
                                    <div class="title">
                                        <h1>Tidak Ada Berita</h1>
                                    </div>
                                    @else
                                    <div class="image">
                                        <img src="{{asset('storage/'.$news['firstNews']->photo_path)}}" alt="Dawet Jabung" />
                                    </div>
                                    <div class="title">
                                        <h1>{{$news['firstNews']->title}}</h1>
                                        <p>Ponorogo adalah kota yang tak hanya terkenal dengan kekayaan budaya, tetapi juga menyajikan kenikmatan kuliner yang menggugah selera. Salah satu ikon kuliner yang melekat erat dengan kota ini adalah Dawet Jabung, minuman tradisional yang begitu khas dan lezat.</p>
                                        <a href="{{route("berita.show", ['id' => $news['firstNews']->id])}}" class="button">Selengkapnya ></a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="menu-box">
                                <div class="menu">
                                    <a href="#" class="menu-item">POPULER</a>
                                    <a href="#" class="menu-item">TERBARU</a>
                                </div>
                                <div class="additional-text">
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                    <p>----------------------------------------------------------------------</p>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="card-grid">
                                @if (empty($news))
                                <div class="card">
                                    <h2>Tidak Ada Berita</h2>
                                </div>
                                @else
                                @foreach ($news['allNewsExceptOne'] as $item)
                                <div class="card">
                                    <img src="{{asset('storage/'.$item->photo_path)}}" alt="Dawet Jabung" />
                                    <h2>{{$item->title}}</h2>
                                    <a href="{{route('berita.show', ['id' => $item->id])}}" class="button">Selengkapnya ></a>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="section-title">Surat Menyurat</h2>
            <div class="pdf-grid">
                @if ($docs->isEmpty())
                <h2 class="fs-2 fw-bold text-black">Tidak Ada Dokumen</h2>
                @endif
                @foreach ($docs as $doc)
                <a href="{{asset('storage/'.$doc->path)}}" target="_blank" class="pdf-card">
                    <img src="{{asset('img/pdf-icon.png')}}" alt="{{$doc->name}}" />
                    <h2>{{$doc->name}}</h2>
                </a>
                @endforeach
            </div>
        </div>
        <div class="text-center">
            <a href="{{route('surat.menyurat')}}" class="more-info-btn">Selengkapnya</a>
        </div>
    </div>

    <div class="row mt-5 container mx-auto">
        <div class="col-lg-12">
            <h2 class="section-title-custom">Transparansi Anggaran</h2>
            @foreach ($jumlahAnggaran as $tahun => $anggaran)
            <div class="budget-section">
                <h3 class="text-center">Realisasi Tahun Anggaran {{$tahun}}</h3>
                <div class="budget-grid">
                    <div class="budget-card">
                        <p>Jumlah Pendapatan</p>
                        <h3>Rp. {{number_format($anggaran['pendapatanDesa'])}}</h3>
                    </div>
                    <div class="budget-card">
                        <p>Jumlah Belanja</p>
                        <h3>Rp. {{number_format($anggaran['belanjaDesa'])}}</h3>
                    </div>
                    <div class="budget-card">
                        <p>Jumlah Pembiayaan</p>
                        <h3>Rp. {{number_format($anggaran['pembiayaanDesa'])}}</h3>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{route('anggaran.show', ['year' => $tahun])}}" class="more-info-btn">Selengkapnya ></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="section-title">Galery</h2>
            <div class="gallery-grid">
                @if ($galeries->isEmpty())
                <h2 class="fs-2 fw-bold text-black">Tidak Ada Galeri</h2>
                @else
                @foreach ($galeries as $galery)
                <img src="{{asset('storage/'.$galery->photo_path)}}" alt="Galeri Jabung">
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="section-title">Wilayah Desa Jabung</h2>
            <div class="map-grid">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7458390152196!2d111.4852305!3d-7.9215947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e790ab7b89963a9%3A0x2583c92c96359f8e!2zQmFsYWkgRGVzYSBKYWJ1bmcgLSDqp4vqpqfqpq3qprvqpqPqprrqprHqppfqpqfqprjqpoE!5e0!3m2!1sid!2sid!4v1722828429800!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    </section>
    <!-- /Get Started Section -->
</main>

@include('layouts.footer')