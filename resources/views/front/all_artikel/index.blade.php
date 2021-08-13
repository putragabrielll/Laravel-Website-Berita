@extends('front.layouts.dashboard')

@section('content')
    <!-- ======= Blog Section ======= -->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>

            <div class="container ">

                <div class="row">
                    <div class="mt-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Berita Terbaru</h2>
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

                <!-- Paginate Untuk Next datanya -->
                <div class="mt-5 col-md-12 text-center">
                    {{ $artikel->links() }}
                </div>

            </div>
        </div>
    </div><!-- End Blog Section -->
@endsection