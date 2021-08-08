@extends('front.layouts.dashboard')

@section('content')
    <main id="main">

        <!-- ======= Blog Header ======= -->
        <div class="header-bg page-area">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="slider-content text-center">
                            <div class="header-bottom">
                                <div class="layer3">
                                    <h2 class="title3">{{ $materi->judul_materi }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Blog Header -->

        <!-- ======= Blog Page ======= -->
        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">

                    <!-- Start Detail Artikel -->
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <!-- single-blog start -->
                                <article class="blog-post-wrapper">
                                    <div class="post-thumbnail">
                                        <div class="video-container">
                                            <iframe width="560" height="315" src="{{ $materi->link }}" frameborder="0" allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <div class="post-information">
                                        <u><h2>{{ $materi->judul_materi }}</h2></u>
                                        <div class="entry-content">
                                            {!! $materi->deskripsi !!}
                                        </div>
                                    </div>
                                </article>

                                <!-- Untuk Koment dengan disqust -->

                            </div>
                        </div>
                    </div>
                    <!-- End Detail Artikel -->

                    <!-- Start sidebar -->
                    <div class="col-lg-4 col-md-4">
                        <div class="page-head-blog">

                            <!-- Bagian Search -->
                            <div class="single-blog-page">
                                <!-- search option start -->
                                <form action="#">
                                    <div class="search-option">
                                        <input type="text" placeholder="Search...">
                                        <button class="button" type="submit">
                                        <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- search option end -->
                            </div>

                            <!-- Bagian Iklan B -->
                            <div class="single-blog-page">
                                <div class="left-blog">
                                    @forelse ($iklan_b as $row)
                                        <h4><strong>{{ $row->judul_iklan }}</strong></h4>
                                        <div class="flicker-img text-center">
                                            <div class="single-well mt-3">
                                            <a href="{{ $row->link }}">
                                                <img src="{{ asset('uploads/' . $row->gambar_iklan) }}" alt="" width="200">
                                            </a>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td class="text-center">Data Masih Kosong !!!</td>
                                        </tr>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Bagian Recent Post -->
                            <div class="single-blog-page">
                                <!-- recent start -->
                                <div class="left-blog">
                                    <h4>recent post</h4>
                                    <div class="recent-post">

                                        <!-- start single post -->
                                        @forelse ($recent_post as $row)
                                            <div class="recent-single-post">
                                                <div class="post-img">
                                                    <a href="{{ route('detail-artikel', $row->slug) }}">
                                                    <img src="{{ asset('uploads/' . $row->gambar_artikel) }}" alt="" width="90">
                                                    </a>
                                                </div>

                                                <div class="pst-content">
                                                    <p><a href="{{ route('detail-artikel', $row->slug) }}">{{ $row->judul }}</a></p>
                                                    <p><p>{{ $row->created_at->format('d M Y') }}</p></p>
                                                </div>
                                            </div>
                                        @empty
                                            <p>Data Masi Kosong</p>
                                        @endforelse
                                        <!-- End single post -->

                                    </div>
                                </div>
                                <!-- recent end -->
                            </div>
                            
                            <!-- Bagian Kategories -->
                            <div class="single-blog-page">
                                <div class="left-blog">
                                <h4>Kategories</h4>
                                <ul>
                                    @foreach ($kategori as $row)
                                        <li><a href="{{ route('artikel-kategori', $row->slug) }}">{{ $row->nama_kategori }}<span>&nbsp;&nbsp;({{ $row->artikel_count}})</span></a></li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                            
                            <!-- <div class="single-blog-page">
                                <div class="left-tags blog-tags">
                                <div class="popular-tag left-side-tags left-blog">
                                    <h4>popular tags</h4>
                                    <ul>
                                    <li>
                                        <a href="#">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="#">Project</a>
                                    </li>
                                    <li>
                                        <a href="#">Design</a>
                                    </li>
                                    <li>
                                        <a href="#">wordpress</a>
                                    </li>
                                    <li>
                                        <a href="#">Joomla</a>
                                    </li>
                                    <li>
                                        <a href="#">Html</a>
                                    </li>
                                    <li>
                                        <a href="#">Masonry</a>
                                    </li>
                                    <li>
                                        <a href="#">Website</a>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <!-- End sidebar -->
                    
                </div>
            </div>
        </div><!-- End Blog Page -->

    </main><!-- End #main -->
@endsection