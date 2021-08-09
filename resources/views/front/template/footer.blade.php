<footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">

          <!-- Bagian Sosial Media -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>KJB</span>&nbsp;WebSite</h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="https://www.youtube.com/channel/UCAMsp1sJ-qsGaaP61xKJhYg"><i class="bi bi-youtube"></i></a>
                    </li>
                    <li>
                      <a href="https://www.facebook.com/106999204776215/"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/sionpriangan.kjb/"><i class="bi bi-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Bagian Kategories -->
          <div class="col-md-2">
            <h4>Kategories</h4>
            <ul>
              @foreach ($kategori as $row)
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('artikel-kategori', $row->slug) }}">{{ $row->nama_kategori }}</a></li>
              @endforeach
            </ul>
          </div>

          <!-- Bagian Playlist -->
          <div class="col-md-2">
            <h4>Playlist</h4>
            <ul>
              @foreach ($playlist as $row)
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('materi-playlist', $row->slug) }}">{{ $row->judul_playlist }}</a></li>
              @endforeach
            </ul>
          </div>

          <!-- Bagian Iklan A -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head text-center">
                @forelse ($iklan_a as $row)
                  <h4><strong>{{ $row->judul_iklan }}</strong></h4>
                  <div class="flicker-img">
                    <div class="single-well">
                      <a href="{{ $row->link }}">
                        <img src="{{ asset('uploads/' . $row->gambar_iklan) }}" alt="" width="350">
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
          </div>

        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->