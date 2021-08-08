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
        <!-- <div id="pricing" class="pricing-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Pricing Table</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pri_table_list">
                    <h3>basic <br /> <span>$80 / month</span></h3>
                    <ol>
                        <li class="check"><i class="bi bi-check"></i><span>Online system</span></li>
                        <li class="check"><i class="bi bi-x"></i><span>Full access</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Free apps</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Multiple slider</span></li>
                        <li class="cross"><i class="bi bi-x"></i><span>Free domin</span></li>
                        <li class="cross"><i class="bi bi-x"></i><span>Support unlimited</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Payment online</span></li>
                        <li class="check"><i class="bi bi-x"></i><span>Cash back</span></li>
                    </ol>
                    <button>sign up now</button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pri_table_list active">
                    <span class="saleon">top sale</span>
                    <h3>standard <br /> <span>$110 / month</span></h3>
                    <ol>
                        <li class="check"><i class="bi bi-check"></i><span>Online system</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Full access</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Free apps</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Multiple slider</span></li>
                        <li class="cross"><i class="bi bi-x"></i><span>Free domin</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Support unlimited</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Payment online</span></li>
                        <li class="cross"><i class="bi bi-x"></i><span>Cash back</span></li>
                    </ol>
                    <button>sign up now</button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pri_table_list">
                    <h3>premium <br /> <span>$150 / month</span></h3>
                    <ol>
                        <li class="check"><i class="bi bi-check"></i><span>Online system</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Full access</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Free apps</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Multiple slider</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Free domin</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Support unlimited</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Payment online</span></li>
                        <li class="check"><i class="bi bi-check"></i><span>Cash back</span></li>
                    </ol>
                    <button>sign up now</button>
                    </div>
                </div>
                </div>
            </div>
        </div> -->

        <!-- ======= Testimonials Section ======= -->
        <div id="testimonials" class="testimonials">
        <div class="container">

            <div class="testimonials-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="back_utama/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="back_utama/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="back_utama/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="back_utama/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="back_utama/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>
        </div><!-- End Testimonials Section -->

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