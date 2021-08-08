<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          @foreach($slide as $key => $row)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <img src="{{ asset('uploads/' . $row->gambar_slide) }}" class="d-block w-100" alt="gambar">
              <div class="carousel-container">
                <div class="container">
                  <!-- <h2 class="animate__animated animate__fadeInDown">The Best Business Information </h2> -->
                  <p class="animate__animated animate__fadeInUp">{{ $row->judul_slide }}</p>
                  <a href="{{ $row->link }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
                </div>
              </div>
            </div>
          @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->