@extends('front.layouts.dashboard')
<!-- ======= Carousel ======= -->
@include('front.template.carousel')

@section('content')

    <main id="main">
        <!-- ======= About KJB ======= -->
        <div id="about" class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>konfrens Jawa Barat</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                    <div class="single-well">
                        <a href="{{ route('about.index') }}">
                            <img src="back_utama/img/about/1.jpg" alt="">
                        </a>
                    </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                    <div class="single-well">
                        <a href="{{ route('about.index') }}">
                        <h4 class="sec-head">Konfrens Jawa Barat</h4>
                        </a>
                        <p>
                        Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                        </p>
                        <ul>
                        <li>
                            <i class="bi bi-check"></i> Interior design Package
                        </li>
                        <li>
                            <i class="bi bi-check"></i> Building House
                        </li>
                        <li>
                            <i class="bi bi-check"></i> Reparing of Residentail Roof
                        </li>
                        <li>
                            <i class="bi bi-check"></i> Renovaion of Commercial Office
                        </li>
                        <li>
                            <i class="bi bi-check"></i> Make Quality Products
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <!-- End col-->
                </div>
            </div>
        </div><!-- End About Section -->

        <!-- ======= Blog Section ======= -->
        <div id="blog" class="blog-area">
            <div class="blog-inner area-padding">
                <div class="blog-overly"></div>

                <div class="container ">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-headline text-center">
                                <h2>Latest News</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Card Mater -->
                    <div class="row">
                        @forelse ($artikel as $row)
                        <!-- Start Left Blog -->
                            <div class="col-md-4 mt-3 col-sm-4 col-xs-12">
                                <div class="single-blog">
                                    <div class="single-blog-img">
                                        <a href="{{ route('detail-artikel', $row->slug) }}">
                                            <img src="{{ asset('uploads/' . $row->gambar_artikel) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-meta">
                                        <span class="comments-type">
                                            <i class="fa fa-comment-o"></i>
                                            <a href="{{ route('artikel-kategori', $row->kategori->slug) }}">{{ $row->kategori->nama_kategori}}</a>
                                        </span>
                                        <span class="date-type">
                                            <i class="fa fa-calendar"></i>{{ $row->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="blog-text">
                                        <h4>
                                            <a href="{{ route('detail-artikel', $row->slug) }}">{{ $row->judul }}</a>
                                        </h4>
                                        <p>
                                            {!! substr($row->body, 0, 180) !!}
                                        </p>
                                    </div>
                                    <span>
                                        <a href="{{ route('detail-artikel', $row->slug) }}" class="ready-btn">Read more</a>
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p>Data Masi Kosong</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div><!-- End Blog Section -->

        <!-- ======= Semua Artikel Lebih Lanjut ======= -->
        <div class="suscribe-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                        <div class="suscribe-text text-center">
                            <h3>Lihat Berita Lebih Lengkap</h3>
                            <a class="sus-btn" href="{{ route('berita-all.index') }}">Go to see</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Semua Artikel Lebih Lanjut -->

        <!-- ======= Highlight Program ======= -->
        <div id="services" class="services-area area-padding">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline services-head text-center">
                            <h2>Highlight Program</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reviews-area">
                <div class="row g-0">

                    @foreach($materi as $row)
                        <div class="col-lg-6">
                            <div class="video-container">
                                <iframe width="560" height="315" src="{{ $row->link }}" frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-6 work-right-text d-flex align-items-center">
                            <div class="px-5 py-5 py-lg-0">
                                <h2>{{ $row->judul_materi }}</h2>
                                <h5>{{ $row->playlist->judul_playlist }}</h5>
                                <a href="{{ route('materi-vidio', $row->slug) }}" class="ready-btn scrollto">Detail</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div><!-- End Highlight Program -->

    </main>



    <main id="main">


        <!-- ======= Pricing Section ======= -->

        <!-- ======= Testimonials Section ======= -->
        

        <!-- ======= Blog Section ======= -->
        <div id="blog" class="blog-area">
            <div class="blog-inner area-padding">

                <div class="blog-overly"></div>

                <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-headline text-center">
                                <h2>Latest News</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    
                        <!-- Start Left Blog -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                <a href="blog.html">
                                    <img src="back_utama/img/blog/1.jpg" alt="">
                                </a>
                                </div>
                                <div class="blog-meta">
                                <span class="comments-type">
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#">13 comments</a>
                                </span>
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                                </span>
                                </div>
                                <div class="blog-text">
                                <h4>
                                    <a href="blog.html">Assumenda repud eum veniam</a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                                </p>
                                </div>
                                <span>
                                <a href="blog.html" class="ready-btn">Read more</a>
                                </span>
                            </div>
                            <!-- Start single blog -->
                        </div>
                        <!-- End Left Blog-->
                        
                        <!-- Start Left Blog -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                <a href="blog.html">
                                    <img src="back_utama/img/blog/2.jpg" alt="">
                                </a>
                                </div>
                                <div class="blog-meta">
                                <span class="comments-type">
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#">130 comments</a>
                                </span>
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                                </span>
                                </div>
                                <div class="blog-text">
                                <h4>
                                    <a href="blog.html">Explicabo magnam quibusdam.</a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                                </p>
                                </div>
                                <span>
                                <a href="blog.html" class="ready-btn">Read more</a>
                                </span>
                            </div>
                            <!-- Start single blog -->
                        </div>
                        <!-- End Left Blog-->

                        <!-- Start Right Blog-->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                <a href="blog.html">
                                    <img src="back_utama/img/blog/3.jpg" alt="">
                                </a>
                                </div>
                                <div class="blog-meta">
                                <span class="comments-type">
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#">10 comments</a>
                                </span>
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                                </span>
                                </div>
                                <div class="blog-text">
                                <h4>
                                    <a href="blog.html">Lorem ipsum dolor sit amet</a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                                </p>
                                </div>
                                <span>
                                <a href="blog.html" class="ready-btn">Read more</a>
                                </span>
                            </div>
                        </div>
                        <!-- End Right Blog-->


                    </div>
                </div>
            </div>
        </div><!-- End Blog Section -->


    </main><!-- End #main -->
@endsection