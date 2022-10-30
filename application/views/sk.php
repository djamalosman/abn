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
  <link rel="stylesheet" href="<?php echo base_url ('assets/pago/css/sk.css')?>">
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
      <img src="<?php echo base_url('assets/pago/img/logo_abn.png') ?>" alt="Logo ABN NasDem">
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
            <div>
              <a href="https://digital.nasdem.id/" target="_blank"  style="text-decoration: none;">
                <button class="btn-floating">
                  <img src="<?php echo base_url ('assets/pago/img/new invite.png')?>" alt="add" class="img-size">
                  <span><b>Daftar Sebagai Anggota Partai NasDem</b></span>
                </button>
              </a>
            </div>
            <div class="animasi"><b>Input data peserata</b></div>
            <h2 class="liputan1">Input data diri.</h2>
            <!-- form peserta -->
<div class="form-peserta">
<form class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
      <div class="valid-feedback">
        Nama anda sudah terdaftar!
      </div>
    </div>
    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Nomer Kartu anggota NasDem</label>
      <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
      <div class="valid-feedback">
        Jika belum memiliki Nomer KTA NasDem, silahkan daftar sebagai anggota Partai NasDem. klik tombol biru diatas!
      </div>
    </div>
    <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Alamat Sesuai KTP</label>
        <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
        <div class="valid-feedback">
         Masukan alamat sesuai KTP anda!
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Alamat Domisili</label>
        <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
        <div class="valid-feedback">
          Masukan alamat domisili anda saat ini (Abaikan juka sama dengan Alamat KTP) 
        </div>
      </div>
    <div class="col-md-6">
      <label for="validationCustom03" class="form-label">Alamat e-mail</label>
      <input type="text" class="form-control" id="validationCustom03" required>
      <div class="invalid-feedback">
        Masukan Alamat e-mail.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom04" class="form-label">Dewan Pimpinan Wilayah</label>
      <select class="form-select" id="validationCustom04" required>
        <option selected disabled value="">Pilih DPW Anda</option>
        <option>DPW DKI</option>
        <option>DPW Jawa Barat</option>
        <option>DPW Jawa Tengah</option>
        <option>DPW Jawa Timur</option>
        <option>DPW Kalimantan Barat</option>
        <option>DPW Kalimantan Timur</option>
        <option>DPW Kalimantan Selatan</option>
        <option>DPW Nusa Tenggara Timur</option>
        <option>DPW Nusa Tenggara Barat</option>
        <option>DPW Bali</option>
      </select>
      <div class="invalid-feedback">
     Masukan DPW asal Anda
      </div>
    </div>

    <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Dewan Pimpinan Daerah</label>
        <select class="form-select" id="validationCustom04" required>
          <option selected disabled value="">Pilih DPD Anda</option>
          <option>DPD Jakarta Pusat</option>
              <option>DPD Jakarta Selatan</option>
              <option>DPD Jakarta Barat</option>
              <option>DPD Jakarta Timur</option>
              <option>DPD Jakarta Utara</option>
  
        </select>
        <div class="invalid-feedback">
       Masukan DPD asal Anda
        </div>
      </div>
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Kategori Sekolah</label>
        <select class="form-select" id="validationCustom04" required>
          <option selected disabled value="">Pilih kategori sekolah</option>
              <option>Sekolah Kader</option>
              <option>Sekolah Legislatif</option>
        </select>
        <div class="invalid-feedback">
            Pilih Kategori sekolah anda
        </div>
      </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          Setuju untuk Melakukan pendaftara.
        </label>
        <div class="invalid-feedback">
          Anda harus setuju untuk melakukan pendaftaran
        </div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Daftar</button>
    </div>
  </form>
</div>
      <div class="bank-foto">
        <div class="animasi"><b>Bank Foto</b></div>
        <h2 class="liputan1">Dokumentasi kegiatan Akademi Bela Negara NasDem </h2>
        <div class="gambar">
          <div class="box">
            <img src="<?php echo base_url ('assets/pago/img/IMG_5931-min.JPG')?>">
          </div>
          <div class="box">
            <img src="<?php echo base_url ('assets/pago/img/IMG_9180-min.JPG')?>">
          </div>
          <div class="box">
            <img src="<?php echo base_url ('assets/pago/img/IMG_4937-min.JPG')?>">
          </div>
          <div class="box">
            <img src="<?php echo base_url ('assets/pago/img/IMG_8694-min.JPG')?>">
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
  <script src="css/script.js"></script>
  <script type="text/ javascript" src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95a02bd20d.js"></script> 
</body>

</html>