@extends('front.layouts.dashboard')

@section('content')
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">

            <div class="row">
                <div class="mt-5 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Video Terbaru</h2>
                    </div>
                </div>
            </div>

            <div class="row awesome-project-content portfolio-container">

                <!-- portfolio-item start -->
                @forelse ($materi as $row)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <a href="{{ route('materi-vidio', $row->slug) }}"><img src="{{ asset('uploads/' . $row->gambar_materi) }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <a href="{{ route('materi-vidio', $row->slug) }}"><h4>{{ $row->judul_materi }}</h4></a>
                                <span>{{ $row->playlist->judul_playlist }}</span>
                                <div class="portfolio-links">
                                    <a href="{{ asset('uploads/' . $row->gambar_materi) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $row->judul_materi }}"><i class="bx bx-plus"></i></a>
                                    <a href="{{ route('materi-vidio', $row->slug) }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="{{ $row->judul_materi }}"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Data Masi Kosong</p>
                @endforelse
                <!-- portfolio-item end -->

            </div>

            <!-- Paginate Untuk Next datanya -->
            <div class="mt-5 col-md-12 text-center">
                {{ $materi->links() }}
            </div>

        </div>
    </div>
@endsection