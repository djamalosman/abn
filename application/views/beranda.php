<!DOCTYPE html>
<html>
    <head>
              <meta charset="UTF-8/">
              <meta name="viewport" content="width=device-width, initial scale=1.0" />
              <meta http-equiv="X/UA-Compatible" content="ie=edge" />
              <title> Akademi Bela Negara NasDem</title>
              <?php foreach($v_news as $item){ ?>  
              <link rel="preload" as="image" href="<?php echo base_url('uploads/' . $item->file_content)?>">
              <?php } ?>

              <?php foreach($v_image as $item){ ?>  
              <link rel="preload" as="image" href="<?php echo base_url('uploads/' . $item->file_content)?>">
              <?php } ?>
              <link rel="preload" as="image" href="<?php echo base_url('assets/pago/img/testi.jpg') ?>">
              
              <link rel="shortcut icon" href="<?php echo base_url("template/images/favicon.ico") ?>">
              <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins&display=swap"
                rel="stylesheet">
              <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/style1.css') ?>">
              <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/style2.css') ?>">
              <link href="<?php echo base_url('assets/pago/icon/css/all.css') ?>" rel="stylesheet">
              <link href="<?php echo base_url('assets/pago/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
                <!-- LEAFLET -->
              <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
              <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
              <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
              <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

               <!-- LEAFLET CONTROL SEARCH -->
              <link rel="stylesheet" href="<?= base_url('leaflet-search/src/leaflet-search.css'); ?>" />
              <script src="<?= base_url('leaflet-search/src/leaflet-search.js'); ?>"></script>
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
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php 
          foreach ($foto as $file) {
        ?>
        <div class="carousel-item active">
          <img src="<?php echo base_url('uploads/' . $file->file_content); ?>" class="d-block w-100" alt="...">
        </div>
        <?php } ?>
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

    <main>
              <!-- btn nasdem.id -->
              <div>
                <a href="https://digital.nasdem.id/" target="_blank">
                  <button class="btn-floating">
                    <img src="<?php echo base_url('assets/pago/img/new invite.png') ?>" alt="add" class="img-size">
                    <span><b>Daftar Sebagai Anggota Partai NasDem</b></span>
                  </button>
                </a>
              </div>
              <!-- and btn nasdem.id -->
              <form action="<?php echo base_url('Home/SearchBerita'); ?>" method="post">
                  <div class="button-search">
                    <div id="search">
                      <div id="search-input">
                        <input type="text" name="cariartikel" class="search-field berita" placeholder="Cari Artikel">
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
              </form>
              <div id="liputan"></div>
              <div class="animasi"><b>Berita Terkini</b></div>
              <p class="liputan1">Berita terkini Akademi Bela Negara NasDem dan Partai NasDem </p>
              <div id="section">
                <section id="card">
                  <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                      <?php foreach($v_news as $item){ ?>  
                          <div class="col mb-5">
                            <div class="card h-100">
                             
                                <a href="<?php echo base_url("DetailNews/" . $item->code_image . '-' . $item->id_docnews) ?>">
                                      <img src="<?php echo base_url('uploads/' . $item->file_content)?>" style="height:260px" class="card-img-top" alt="...">    
                                </a>
                              <div class="card-body">
                                
                                  <h6 class="card-title" ><?php echo $item->judul; ?></h6>

                                  <p class="card-text" style="text-align: left;">
                                    
                                    <?php 
                                    $string = strip_tags($item->description);
                                    if (strlen($string) > 500) {
                                    
                                        // truncate string
                                        $stringCut = substr($string, 0, 500);
                                        $endPoint = strrpos($stringCut, ' ');
                                    
                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '... <a href="DetailNews/'.$item->code_image."-".$item->id_docnews.'">Selengkapnya</a>';
                                    }
                                    echo $string; ?>
                                  </p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted"><i class="fa fa-calendar s16"></i>
                                                   <?php echo $item->tanggal_insert ?></small>
                              </div>
                            </div>
                      </div>
                      <?php  } ?> 
                    </div>
                  </div>
                </section>
              </div>
            </div>
            </div>
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
                  <?php foreach($v_image as $item){ ?>  
                    <div class="box">
                      <img src="<?php echo base_url('uploads/'.$item->nameFolder.'/'. $item->file_content)?>" style="height:130px">
                    </div>
                  <?php } ?>
                </div>
              </div>

              <div id="testi">
                <img src="<?php echo base_url('assets/pago/img/testi.jpg') ?>" alt="About ABN NasDem" id="imgTestimoni">
                <h2 id="h2Testimoni">Akademi Bela Negara NasDem</h2>
                <p id="pTesti">"Akademi Bela Negara (ABN) merupakan lembaga pendidikan politik yang didirikan Partai NasDem pada
                  tahun 2017. Lembaga ini bertujuan untuk membekali para kader partai dengan pendidikan karakter, nilai-nilai
                  kebangsaan dan wawasan kepartaian. Ketiga simpul ini diharapkan menghasilkan satu kesatuan yang kuat dalam
                  membentuk kepribadian kader-kader partai. Dengan kader-kader yang berkualitas, fungsi perubahan dapat berjalan
                  maksimal membawa Indonesia menjadi bangsa mandiri dan makmur, terbebas dari belenggu kebodohan, kemiskinan,
                  dan keterbelakangan."</p>
                <p id="pTesti2"><b>IGK Manila,</b> Gubernur ABN NasDem</p>
              </div>

              <div class="animasi"><b>Cuplikan kegiatan</b></div>
              <h2 class="liputan1"> Subscribe Youtube Chanel Akademi Bela Negara NasDem</h2>

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
            <div style="margin-top: 50px;">
              <h2 class="animasi"><b>Program Pertanian</b></h2>
              <p class="liputan1">Kerja sama ABN NasDem dengan DPP Partai NasDem Bidang Pertanian </p>
              <img src="<?php echo base_url('assets/pago/img/opazaky.png') ?>" alt="image" class="opazaky">
            </div>
            <div>
              <div id="map" style="width: 800px; height: 500px;"></div>
            </div>
            <div style="margin-top: 10px;">
              <h2 class="animasi"><b>Profil</b></h2>
              <p class="liputan1"><span>Profil Gubernur, Settama dan Deeputi ABN NasDem</span></p>
            </div>
            <div>
                <div class="containerr">
                  <div class="cards-container">
                    <!-- <div class="card-b">
                      <div class="elms-animation">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                        <span class="four"></span>
                      </div>
                      <img src="<?php echo base_url ('assets/pago/img/profil_opa.jpg')?>" alt=""/>
                      <div class="content">
                        <h2 class="jabatan">Mayjen TNI (Purn) Dr. IGK Manila. S.I.P</h2>
                      </div>
                      <div class="content">
                        <h3 class="pc">Gubernur ABN</h3>
                      </div>
                    </div> -->
                    <?php foreach ($profile as $tokoh_all){?> 
                      <div class="card-b">
                      
                        <div class="elms-animation">
                          <span class="one"></span>
                          <span class="two"></span>
                          <span class="three"></span>
                          <span class="four"></span>
                        </div>
                           
                          <img src="<?php echo base_url('uploads/' .  $tokoh_all->file_content)?>" alt=""/>
                          <div class="content">
                            <h2 class="jabatan"><?php echo $tokoh_all->nama_asli ?></h2>
                          </div>
                          <div class="content">
                          <a href="<?php echo base_url("Home/profiles/" . $tokoh_all->code_image . '-' . $tokoh_all->id_doctokoh) ?>" target="blank"><h3 class="pc">Gubernur ABN</h3></a>
                          </div>
                      </div>
                    <?php } ?>
                    
                    <div class="card-b">
                      <div class="elms-animation">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                        <span class="four"></span>
                      </div>
                      <img src="<?php echo base_url ('assets/pago/img/deputi1.jpg')?>" alt=""/>
                      <div class="content">
                        <h2 class="jabatan">Ahmad Baedhowi AR</h2>
                      </div>
                      <div class="content">
                        <h3 class="pc">Deputi I</h3>
                      </div>
                    </div>
                    <div class="card-b">
                      <div class="elms-animation">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                        <span class="four"></span>
                      </div>
                      <img src="<?php echo base_url ('assets/pago/img/deputi2.jpg')?>" alt=""/>
                      <div class="content">
                        <h2 class="jabatan">Damianus Bilo SH, M.Hum</h2>
                      </div>
                      <div class="content">
                        <h3 class="pc">Deputi II</h3>
                      </div>
                    </div>
                    <div class="card-b">
                      <div class="elms-animation">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                        <span class="four"></span>
                      </div>
                      <img src="<?php echo base_url ('assets/pago/img/deputi3.jpg')?>" alt=""/>
                      <div class="content">
                        <h2 class="jabatan">Sandra Kirana Kastor</h2>
                      </div>
                      <div class="content">
                        <h3 class="pc">Deputi III</h3>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="animasi"><b>Akademi Bela Negara NasDem</b></div>
            <div id="testi2">
              <img src="<?php echo base_url('assets/pago/img/halama1.jpg') ?>" alt="About ABN NasDem" id="imgTestimoni2">
              <h2 id="h2Testimoni">VISI</h2>
              <p id="pTesti">"Terwujudnya kader partai yang cerdas, militan dan terampil dalam memperjuangkan cita-cita Partai
                Nasdem sebagai Gerakan Perubahan."</p>
              <h2 id="h2Testimoni">MISI</h2>
              <p id="pTesti">"Menyelenggarakan pendidikan yang bermutu dan berkelanjutan bagi kader partai melalui penguatan
                aspek-aspek kepribadian, kepartaian dan kebangsaan."</p>
            </div>
            <div>
              <a href="#" class="to-top">
                <i class="fas fa-chevron-up"></i>
              </a>
            </div>
            <div style="margin-top: 50px;">
              <h2 class="animasi"><b>Sosial Media</b></h2>
              <p class="liputan1"><span>Sekilas cuplikan berita terbaru sosial Media</span></p>
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
      
  // data dari database
	var data = [
                <?php foreach($map as $key => $value) { ?>
                    {"lokasi":[<?= $value->latitude; ?>,<?= $value->longitude; ?>], "wilayah":"<?= $value->lokasi; ?>"},
                <?php } ?>
	            ];

              var map = new L.Map('map', {zoom: 10, center: new L.latLng(-6.246849, 106.846596),     zoomControl: false});	
//set center from first location
L.control.zoom({
    position: 'bottomright'
}).addTo(map);

    map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
		zoomOffset: -1
    }));

    var icon1 = L.icon({
        iconUrl: '<?= base_url('icon/icon-marker.png'); ?>',

        iconSize:     [30, 38], // size of the icon
        iconAnchor:   [15, 35], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

  // CONTROL SEARCH
	var markersLayer = new L.LayerGroup();	//layer contain searched elements
	
	map.addLayer(markersLayer);

	map.addControl( new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 17,
        collapsed: true
	}) );


	//populate map with markers from sample data
	for(i in data) {
		var wilayah = data[i].wilayah,	//value searched
			lokasi = data[i].lokasi,		//position found
			marker = new L.Marker(new L.latLng(lokasi), {title: wilayah, icon: icon1} );//se property searched
		marker.bindPopup('Lokasi: '+ wilayah );
		markersLayer.addLayer(marker);
	}
      //var map = L.map('map').setView([-6.246849, 106.846596], 10);

      // var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      //   maxZoom: 19,
      //   attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      // }).addTo(map);

      // var marker = L.marker([-6.246849, 106.846596]).addTo(map)
      //   .bindPopup('<b>Petani NasDem</b><br />Lokasi Pertanian Kedelai.').openPopup();




      // var popup = L.popup()
      //   .setLatLng([-6.246849, 106.846596])
      //   .setContent('Lokasi Petani NasDem.')
      //   .openOn(map);

      // function onMapClick(e) {
      //   popup
      //     .setLatLng(e.latlng)
      //     .setContent('You clicked the map at ' + e.latlng.toString())
      //     .openOn(map);
      // }

      // map.on('click', onMapClick);

    </script>
    <script src="<?php echo base_url ('assets/pago/css/script.js')?>"></script>
    <script type="text/ javascript" src="<?php echo base_url ('assets/pago/js/bootstrap.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95a02bd20d.js"></script> 
    
</body>
</html>
  