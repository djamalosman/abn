
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
                <link rel="shortcut icon" href="<?php echo base_url("template/images/favicon.ico") ?>">
              <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/style1.css') ?>">
              <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/style2.css') ?>">
              <link href="<?php echo base_url('assets/pago/icon/css/all.css') ?>" rel="stylesheet">
              <link href="<?php echo base_url('assets/pago/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
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
    <nav>
        <div class="btn-add" type="none">
          <a href="<?php echo base_url('Welcome/Index') ?>" target="_self">
          <img src="<?php echo base_url ('assets/pago/img/logo_abn.png')?>" alt="Logo ABN NasDem">
        </a>
        </div>
        <div>
        <ul type="none">
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
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo base_url ('assets/pago/img/20.jpg')?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo base_url ('assets/pago/img/21.jpg')?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo base_url ('assets/pago/img/22.jpg')?>" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        
        <div class="animasi"><b>Tentang Akademi Bela Negara NasDem</b></div>
        <h2 class="liputan1"> Informasi tentang ABN NasDem dan Partai NasDem</h2>

          <div id="testi">
            <img src="<?php echo base_url ('assets/pago/img/testi.jpg')?>" alt="About ABN NasDem" id="imgTestimoni">
            <h2 id="h2Testimoni">Akademi Bela Negara NasDem</h2>
            <p id="pTesti">"Akademi Bela Negara (ABN) merupakan lembaga pendidikan politik yang didirikan Partai NasDem pada tahun 2017. Lembaga ini bertujuan untuk membekali para kader partai dengan pendidikan karakter, nilai-nilai kebangsaan dan wawasan kepartaian. Ketiga simpul ini diharapkan menghasilkan satu kesatuan yang kuat dalam membentuk kepribadian kader-kader partai. Dengan kader-kader yang berkualitas, fungsi perubahan dapat berjalan maksimal membawa Indonesia menjadi bangsa mandiri dan makmur, terbebas dari belenggu kebodohan, kemiskinan, dan keterbelakangan.

              Akademi ini memiliki visi utama untuk mendidik para kader bangsa (terutama kader partai) menjadi politisi yang cerdas, militan dan terampil. Visi ini dikonkretkan dalam misi penting lembaga pendidikan ini yakni menyelenggarakan pendidikan yang bermutu dan berkelanjutan bagi kader partai melalui penguatan aspek-aspek kepribadian, kepartaian, dan kebangsaan.
              
              Sebagai lembaga pendidikan, ABN memiliki kurikulum sebagai panduan penyelenggaraan proses belajar mengajar. Kurikulum tersebut mencakup tiga aspek penting yang dibutuhkan kader-kader partai politik, yakni kepribadian, kepartaian, dan kebangsaan. Aspek kepribadian merupakan fondasi awal untuk membentuk dan memperkaya aspek afeksi kader secara psikologis dan individual. Titik tekan aspek ini adalah menumbuhkan kemampuan dan keterampilan kader dalam mengelola emosi secara cerdas dan bertanggung jawab. Aspek kepartaian bertujuan untuk membekali kemampuan kognisi kader terkait eksistensi partai dalam dinamika politik bangsa. Sedangkan titik tekan aspek kebangsaan adalah memperteguh keyakinan kader untuk memperjuangkan cita-cita bangsa Indonesia melalui gerakan perubahan.
              
              Secara pedagogis, setiap aspek diramu dan dikelola sedemikian rupa sehingga menjangkau ranah kognitif, afektif dan psikomotorik peserta secara proporsional. Sejumlah kegiatan pendidikan yang diselenggarakan ABN seperti sekolah reguler, pelatihan tematik, seminar, konsultasi politik, sosialisasi kemitraan, dan aktivitas sosial kemasyarakatan?selalu memprioritaskan ketiga aspek tersebut.
              
              "</p>
            <p id="pTesti2"><b>IGK Manila,</b> Gubernur ABN NasDem</p>
          </div>
          <div class="animasi"><b>Visi & Misi</b></div>
          <h2 class="liputan1"> Visi Misi dari Akademi Bela Negara NasDem</h2>
        <div id="testi2">
          <img src="<?php echo base_url ('assets/pago/img/halama1.jpg')?>" alt="About ABN NasDem" id="imgTestimoni2">
          <h2 id="h2Testimoni">VISI</h2>
          <p id="pTesti1">"Terwujudnya kader partai yang cerdas, militan dan terampil dalam memperjuangkan cita-cita Partai
            Nasdem sebagai Gerakan Perubahan."</p>
          <h2 id="h2Testimoni">MISI</h2>
          <p id="pTesti1">"Menyelenggarakan pendidikan yang bermutu dan berkelanjutan bagi kader partai melalui penguatan
            aspek-aspek kepribadian, kepartaian dan kebangsaan."</p>
        </div>
        <div class="animasi"><b>Tujuan ABN NasDem</b></div>
        <div id="testi">
        <img src="<?php echo base_url ('assets/pago/img/image3-min.jpg')?>" alt="About ABN NasDem" id="imgTestimoni2">
        <h2 id="h2Testimoni"> Tujuan dari Akademi Bela Negara NasDem</h2>
            <p id="pTesti">1.  Membentuk komunitas belajar yang mandiri, cerdas dan setia kepada cita-cita partai.</p>
            <p id="pTesti">2.  Menyelenggarakan proses belajar-mengajar yang menyenangkan dan demokratis.</p>
            <p id="pTesti">3.  Menerapkan manajemen akademi yang transparan dan akuntabel.</p>
            <p id="pTesti">4.  Mengadakan kunjungan akademik secara berkala untuk mengembangkan wawasan kader.</p>
            <p id="pTesti">5.  Melakukan monitoring dan evaluasi yang sistematis selama dan sesudah program berjalan.</p>
          </div>
        <div>
          <div class="bank-foto">
            <div class="animasi"><b>Info dan data </b></div>
            <h2 class="liputan1">Dokumentasi Kegiatan, Logo Sayap & Partai NasDem, Struktur ABN NasDem Serta DPP Partai NasDem</h2>
            <div class="gambar">
              <div class="box">
                <img src="<?php echo base_url ('assets/pago/img/STRUKTUR.png')?>">
              </div>
              <div class="box">
                <img src="<?php echo base_url ('assets/pago/img/BIODATA.png')?>">
              </div>
              <div class="box">
                <a href="<?php echo base_url('Gallery/Index') ?>">
                  <img src="<?php echo base_url ('assets/pago/img/GALERY.png')?>">
                </a>
              </div>
              <div class="box">
                <img src="<?php echo base_url ('assets/pago/img/LOGOFILOSOFI.png')?>">
              </div>
            </div>
          </div>
          <div class="animasi"><b>Cuplikan kegiatan</b></div>
          <h2 class="liputan1"><span>Subscribe Youtube Chanel Akademi Bela Negara NasDem</span></h2>

          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators" style="margin-bottom: -30px;">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="carousel-video">
                  <iframe width="500" height="315" style="display: block; margin: 10px auto;"
                    src="https://www.youtube.com/embed/nNA7cUXhqXw" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                    <iframe width="500" height="315" style="display: block; margin: 10px auto;"
                    src="https://www.youtube.com/embed/oy7wSJcV8lw" title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <div class="carousel-video">
                  <iframe width="500" height="315" style="display: block; margin: 10px auto;"
                  src="https://www.youtube.com/embed/oUp2WuZIrqk" title="YouTube video player" frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen></iframe>
                  <iframe width="500" height="315" style="display: block; margin: 10px auto;"
                  src="https://www.youtube.com/embed/enOURTJi-os" title="YouTube video player" frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen></iframe>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-video">
                  <iframe width="500" height="315" style="display: block; margin: 10px auto;"
                  src="https://www.youtube.com/embed/axQ1chP97Pw" title="YouTube video player" frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen></iframe>
                  <iframe width="500" height="315" style="display: block; margin: 10px auto;"
                  src="https://www.youtube.com/embed/yAU1yPzHsqw" title="YouTube video player" frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <!-- <span class="visually-hidden">Previous</span> -->
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <!-- <span class="visually-hidden">Next</span> -->
            </button>
          </div>
        </div>
        </div>
        
        <div>
          <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
          </a>
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
      
      <script src="<?php echo base_url ('assets/pago/css/script.js')?>"></script>
      <script type="text/ javascript" src="<?php echo base_url ('assets/pago/js/bootstrap.min.js')?>"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/95a02bd20d.js"></script> 
        
    
</body>

</html>