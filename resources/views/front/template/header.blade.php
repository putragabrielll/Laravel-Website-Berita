<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="/"><span>KJB</span>&nbsp;WebSite</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="back_utama/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach ($kategori as $row)
                <li><a href="{{ $row->slug }}">{{ $row->nama_kategori }}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Playlist</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach ($playlist as $row)
                <li><a href="{{ $row->slug }}">{{ $row->judul_playlist }}</a></li>
              @endforeach
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="{{ route('berita-all.index') }}">News</a></li>
          <li><a class="nav-link scrollto" href="#team">Bible Study</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="{{ route('about.index') }}">About</a></li>
          <li><a class="nav-link scrollto" href="{{ route('contact.index') }}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->