<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8/">
  <meta name="viewport" content="width=device-width, initial scale=1.0" />
  <meta http-equiv="X/UA-Compatible" content="ie=edge" />
  <title> Akademi Bela Negara NasDem</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins&display=swap"
    rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url("template/images/favicon.ico") ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/galery.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/bright.sass') ?>">
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

<body>
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

<!-- galery show -->
    <div class="bank-foto">
        <div class="animasi"><b>Bank Foto</b></div>
        <h2 class="liputan1"><?php echo $nmkegiatan->nama_Kegiatan ?> </h2>
        <div class="gambar">
        <?php foreach($foto_one as $file){ ?>  
            <div class="box">
              <img src="<?php echo base_url('uploads/'.$file->nameFolder.'/' . $file->file_content)?>">
            </div>
        <?php } ?>
          <!-- <div class="box">
            <img src="img/IMG_9180-min.JPG">
          </div>
          <div class="box">
            <img src="img/IMG_4937-min.JPG">
          </div>
          <div class="box">
            <img src="img/IMG_8694-min.JPG">
          </div> -->
        </div>
    </div>
    
    <form method="post" action="<?php echo base_url('Gallery/DownloadZipImg'); ?>">
        <div class="btn-next">
       
          <input type="hidden" name="imagezip" class="select" value="<?php echo $nmkegiatan->nameFolder ?>" />
        
            <a href="#">
                <button class="btnd" type="submit">
                <i class="fas fa-download"></i>
                <span>Download</span>
                </button>
            </a>
        </div>
    </form>
    <p class="download-text">Kamu dapat mengunduh file ini untuk melihat gambar lainya</p>
    <div class="bank-foto">
        <div class="animasi"><b>Bank Foto</b></div>
        <h2 class="liputan1"><?php echo $nmkegiatanTwo->nama_Kegiatan ?></h2>
        <div class="gambar">
        <?php foreach($foto_two as $file2){ ?>  
            <div class="box">
              <img src="<?php echo base_url('uploads/'.$file2->nameFolder.'/' . $file2->file_content)?>">
            </div>
        <?php } ?>
          <!-- <div class="box">
            <img src="img/17 agustus 02.jpeg">
          </div>
          <div class="box">
            <img src="img/17 agustus 04.jpeg">
          </div>
          <div class="box">
            <img src="img/17 agustus 01.jpeg">
          </div> -->
        </div>
    </div>
    <form method="post" action="<?php echo base_url('Gallery/DownloadImageTozip'); ?>">
        <div class="btn-next">
       
          <input type="hidden" name="imagezipTwo" class="select" value="<?php echo $nmkegiatanTwo->nameFolder ?>" />
        
            <a href="#">
                <button class="btnd" type="submit">
                <i class="fas fa-download"></i>
                <span>Download</span>
                </button>
            </a>
        </div>
    </form>
    <p class="download-text">Kamu dapat menduh file ini untuk melihat gambar lainya</p>

  </main>

  <footer>
    <h3 class="space">Address :</h3>
    <ul type="none" class="space">
      <li><a href="https://goo.gl/maps/N2Ab6esDszFFhLUw7"><b>Akademi Bela Negara NasDem</b></a></li>
      <li><a href="https://goo.gl/maps/N2Ab6esDszFFhLUw7">Jl.Pancoran Timur II, Jakarta Selatan</a></li>
      <li>abn@gmail.com</li>
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