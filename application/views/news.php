<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8/">
  <meta name="viewport" content="width=device-width, initial scale=1.0" />
  <meta http-equiv="X/UA-Compatible" content="ie=edge" />
  <title> Akademi Bela Negara NasDem</title>
  <link rel="shortcut icon" href="<?php echo base_url("template/images/favicon.ico") ?>">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url ('assets/pago/css/news.css')?>">
  <link rel="stylesheet" href="<?php echo base_url ('assets/pago/css/style2.css')?>">
  <link href="icon/css/all.css" rel="stylesheet">
  <link href="<?php echo base_url ('assets/pago/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }


  </style>

</head>

<body>

<nav>
    <div class="btn-add" type="none">
      <a href="<?php echo base_url('Welcome/Index') ?>" target="_self">
      <img src="<?php echo base_url ('assets/pago/img/logo_abn.png')?>" alt="Logo ABN NasDem">
    </a>
    </div>
    <div>
          <ul>
            <li><a href="<?php echo base_url('Home/Index') ?>">Beranda</a></li>
            <li><a href="<?php echo base_url('News/Index') ?>">Berita</a></li>
            <li class="dropdown"><a href="#">Program</a>
              <ul class="dropdown-content">
                <li><a href="<?php echo base_url('Sk/Index') ?>">Sekolah Kader</a></li>
                <li><a href="#">Sekolah Legislatif</a></li>
                <li><a href="#">Kerja sama </a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('Radio/Index') ?>">Radio</a></li>
            <li><a href="http://rakartini.abn-nasdem.com/" target="_blank">Perpustakaan</a></li>
            <li><a href="<?php echo base_url('About/Index') ?>">Info Publik</a></li>
          </ul>
    </div>

    <div class="menu-toggle">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
   
  </div>
  </nav>

      <main>
                  <!-- btn nasdem.id -->
                  <div>
                    <a href="https://digital.nasdem.id/" target="_blank">
                      <button class="btn-floating">
                        <img src="<?php echo base_url ('assets/pago/img/new invite.png')?>" alt="add" class="img-size">
                        <span><b>Daftar Sebagai Anggota Partai NasDem</b></span>
                      </button>
                    </a>
                  </div>
                <!-- and btn nasdem.id -->
          <div class="button-search">
            <div id="search">
              <div id="search-input">
                <input type="text" class="search-field berita" placeholder="Cari Artikel">
                <button id="button"><i class="fa fa-search"></i></button>
              </div>
            </div>
            <div>

            <!-- Search Input when Mobile -->
            <div id="search-input2">
              <input type="text" class="search-field berita" placeholder="Cari Artikel">
              <button id="button"><i class="fa fa-search"></i></button>
            </div>
          </div>


          <!-- berita -->
          <div id="liputan"></div>
          <div class="animasi"><b>Berita Terkini</b></div>
          <p class="liputan1">Berita terkini Akademi Bela Negara NasDem dan Partai NasDem </p>
          <div id="section">
            <section id="card">
              <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                  <div class="col mb-5">
                    <div class="card h-100">
                      <img src="<?php echo base_url ('assets/pago/img/IMG_5554.JPG')?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">News ABN</h5>
                        <p class="card-text">GUBERNUR Akademi Bela Negara (ABN) NasDem IGK Manila sangat mengapresiasi aksi
                          panen perdana jagung hibrida
                          yang digagas Ketua Dewan Pakar NasDem Sukabumi Ayep Zaki.Opa Manila..</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="col mb-5">
                    <div class="card h-100 text-center">
                      <img src="<?php echo base_url ('assets/pago/img/IMG_5599.JPG')?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">News ABN</h5>
                        <p class="card-text">DPP Partai NasDem bekerja sama dengan Akademi Bela Negara NasDem menyerahkan
                          hewan kurban
                          kepada masjid dan panti asuhan daerah Jakarta Selatan untuk disembelih pada Hari Raya Idul adha..
                        </p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="col mb-5">
                    <div class="card h-100 text-end">
                      <img src="<?php echo base_url ('assets/pago/img/IMG_9941.JPG')?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">News ABN</h5>
                        <p class="card-text">Sebanyak 60 orang kader partai NasDem mengikuti Pendidikan Politik atau Dikpol
                          dengan tajuk Desain Roadmap Pemenangan NasDem 2024 berbasis Struktur Partai.</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          </div>
          </div>
          <!-- <div id="liputan"></div>
          <div class="animasi"><b>Berita Terkini</b></div>
          <p class="liputan1">Berita terkini Akademi Bela Negara NasDem dan Partai NasDem </p> -->
                  <div id="section">
                      <section id="card">
                          <div class="container">
                          <div class="row row-cols-1 row-cols-md-3 g-4">
                              <div class="col mb-5">
                              <div class="card h-100">
                                  <img src="<?php echo base_url ('assets/pago/img/IMG_5554.JPG')?>" class="card-img-top" alt="...">
                                  <div class="card-body">
                                  <h5 class="card-title">News ABN</h5>
                                  <p class="card-text">GUBERNUR Akademi Bela Negara (ABN) NasDem IGK Manila sangat mengapresiasi aksi
                                      panen perdana jagung hibrida
                                      yang digagas Ketua Dewan Pakar NasDem Sukabumi Ayep Zaki.Opa Manila..</p>
                                  </div>
                                  <div class="card-footer">
                                  <small class="text-muted">Last updated 3 mins ago</small>
                                  </div>
                              </div>
                              </div>
                              <div class="col mb-5">
                              <div class="card h-100 text-center">
                                  <img src="<?php echo base_url ('assets/pago/img/IMG_5599.JPG')?>" class="card-img-top" alt="...">
                                  <div class="card-body">
                                  <h5 class="card-title">News ABN</h5>
                                  <p class="card-text">DPP Partai NasDem bekerja sama dengan Akademi Bela Negara NasDem menyerahkan
                                      hewan kurban
                                      kepada masjid dan panti asuhan daerah Jakarta Selatan untuk disembelih pada Hari Raya Idul adha..
                                  </p>
                                  </div>
                                  <div class="card-footer">
                                  <small class="text-muted">Last updated 3 mins ago</small>
                                  </div>
                              </div>
                              </div>
                              <div class="col mb-5">
                              <div class="card h-100 text-end">
                                  <img src="<?php echo base_url ('assets/pago/img/IMG_9941.JPG')?>" class="card-img-top" alt="...">
                                  <div class="card-body">
                                  <h5 class="card-title">News ABN</h5>
                                  <p class="card-text">Sebanyak 60 orang kader partai NasDem mengikuti Pendidikan Politik atau Dikpol
                                      dengan tajuk Desain Roadmap Pemenangan NasDem 2024 berbasis Struktur Partai.</p>
                                  </div>
                                  <div class="card-footer">
                                  <small class="text-muted">Last updated 3 mins ago</small>
                                  </div>
                              </div>
                              </div>
                          </div>
                          <!-- </div> -->
                      </section>
                  </div>
          </div>
          </div>
          <!-- end berita -->
              <div class="btn-next">
                  <a href="news.html">
                  <button class="learn-more">
                      <span class="circle" aria-hidden="true">
                      <span class="icon arrow"></span>
                      </span>
                      <span class="button-text">Berita Lainnya</span>
                  </button>
                  </a>
              </div>
              <div class="bank-foto">
                  <div class="animasi"><b>Bank Foto</b></div>
                  <h2 class="liputan1">Dokumentasi kegiatan Akademi Bela Negara NasDem </h2>
                  <div class="gambar">
                  <div class="box">
                      <img src="<?php echo base_url ('assets/pago/img/DIT_8764.JPG')?>">
                  </div>
                  <div class="box">
                      <img src="<?php echo base_url ('assets/pago/img/DIT_9263.JPG')?>">
                  </div>
                  <div class="box">
                      <img src="<?php echo base_url ('assets/pago/img/IMG_9200.JPG')?>">
                  </div>
                  <div class="box">
                      <img src="<?php echo base_url ('assets/pago/img/ss.png')?>">
                  </div>
                  </div>
              </div>
        </main>

  <footer>
    <h3 class="space">Address :</h3>
    <ul type="none" class="space">
      <li><a href="https://goo.gl/maps/N2Ab6esDszFFhLUw7"><b>Akademi Bela Negara NasDem</b></a></li>
      <li><a href="https://goo.gl/maps/N2Ab6esDszFFhLUw7">Jl.Pancoran Timur II, Jakarta Selatan</a></li>
      <li>abn@gmail.com</li>
      <li>(021) 2552-xxxx</li>
    </ul>
    <h3 class="space">Follow :</h3>
    <div class="wrapper">
      <div class="icon facebook">
        <div class="tooltip">Facebook</div>
        <span>
          <a href="https://www.facebook.com/belanegaranasdem.belanegaranasdem">
            <i class="fab fa-facebook-f"></i>
          </a>
        </span>
      </div>
      <div class="icon twitter">
        <div class="tooltip">Twitter</div>
        <span>
          <a href="https://twitter.com/?lang=en">
            <i class="fab fa-twitter"></i>
          </a>
        </span>
      </div>
      <div class="icon instagram">
        <div class="tooltip">Instagram</div>
        <span>
          <a href="https://www.instagram.com/abnnasdem.official/">
            <i class="fab fa-instagram"></i>
          </a>
        </span>

      </div>
      <div class="icon youtube">
        <div class="tooltip">Youtube</div>
        <span>
          <a href="https://www.youtube.com/channel/UCKuC9u68Z5OL4FOqOba7D8Q">
            <i class="fab fa-youtube"></i>
          </a>
        </span>
      </div>
    </div>
    <p id="pInFooter">Copyright © 2022 ABN NasDem</p>
    
  </footer>
  <script>
    var map = L.map('map').setView([-6.246849, 106.846596], 10);

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([-6.246849, 106.846596]).addTo(map)
      .bindPopup('<b>Petani NasDem</b><br />Lokasi Pertanian Kedelai.').openPopup();




    var popup = L.popup()
      .setLatLng([-6.246849, 106.846596])
      .setContent('Lokasi Petani NasDem.')
      .openOn(map);

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent('You clicked the map at ' + e.latlng.toString())
        .openOn(map);
    }

    map.on('click', onMapClick);

  </script>
  <script src="<?php echo base_url ('assets/pago/css/script.js')?>"></script>
  <script type="text/ javascript" src="<?php echo base_url ('assets/pago/js/bootstrap.min.js')?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95a02bd20d.js"></script> 
</body>

</html>