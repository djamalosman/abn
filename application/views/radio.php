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
  <link rel="stylesheet" href="<?php echo base_url ('assets/pago/css/radio.css')?>">
  <link rel="stylesheet" href="<?php echo base_url ('assets/pago/css/style2.css')?>">   
  <link href="<?php echo base_url ('assets/pago/icon/css/all.css')?>" rel="stylesheet">
  <link href="<?php echo base_url ('assets/pago/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url ('assets/pago/font/Poppins-Medium.otf')?>" rel="stylesheet">
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
  <div>
    <a>
    <button class="btn-play" class="fab fa-youtube" onclick="togglePlay()"><i class="fab fa-youtube"></i></button>
    <audio id="myAudio" src="https://cast3.my-control-panel.com/proxy/akademib/stream"></audio>
    </a>
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
    <div class="radiotop"> 
      <div class="animasi"><b>Radio Suara Perubahan 666</b></div>
      <p class="liputan1">Edukatif dan Menghibur</p>
    </div>
    <div class="radio-position">
      <div class="container">
        <div class="card">
           <div class="face face1">
             <div class="content">
                <img src="<?php echo base_url ('assets/pago/img/mic.png')?>" ></img> 
               <h3>Podcast Suara Perubahan</h3>
             </div>
           </div>
           <div class="face face2">
             <div class="content">
               <p> Jangan sampai ketinggalan pembahasan menarik yang edukatif dan menghibur, informasi teraktual dan juga menginspirasi, tentunya hanya di Podcast Suara Perubahan</p>
               <a href="https://cast3.my-control-panel.com/proxy/akademib/stream" type="button" class="btn-radio"><i class="fab fa-youtube"></i></a>
             </div>
           </div>
        </div>
        
        <div class="card">
           <div class="face face1">
             <div class="content">
            <img src="<?php echo base_url ('assets/pago/img/pngegg (30)-min.png')?>" ></img>     
            <h3>Radio Suara Perubahan</h3>
             </div>
           </div>
           <div class="face face2">
             <div class="content">
               <p>Tidak hanya soal politik melulu loh, kamu juga bisa dengarin lagu-lagu lawas hingga terupdate buat temani aktifitas mu biar lebih semangat.</p>
               <a href="https://cast3.my-control-panel.com/proxy/akademib/stream" type="button" class="btn-radio"><i class="fab fa-youtube"></i></a>
             </div>
           </div>
        </div>
        
        
      <div class="card">
           <div class="face face1">
             <div class="content">
                <img src="<?php echo base_url ('assets/pago/img/tv.png')?>" ></img> 
                <h3>TV Restorasi</h3>
             </div>
           </div>
           <div class="face face2">
             <div class="content">
               <p> Tonton juga Tv Restorasi bakal ada banyak konten konten menarik yang bikin kamu makin semangan menjadi agen perubahan menuju Indonesia lebih baik.</p>
               <a href="https://www.youtube.com/watch?v=My9y9xFZ08g" type="button" class="btn-radio">
                <i class="fab fa-youtube"></i>
               </a>
             </div>
           </div>
      </div>
      <div id="testi">
        <img src="<?php echo base_url ('assets/pago/img/suge-min.jpg')?>" alt="About ABN NasDem" id="imgTestimoni">
        <h2 id="h2Testimoni">Radio Suara Perubahan</h2>
        <p id="pTesti">" Radio suara perubahan berdiri sejak tahun 2021"</p>
        <p id="pTesti2"><b>IGK Manila,</b> Gubernur ABN NasDem</p>
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
 
  <script src="css/script.js"></script>
  <script type="text/ javascript" src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95a02bd20d.js"></script> 
    <script>
      var myAudio = document.getElementById("myAudio");
        var isPlaying = false;

        function togglePlay() {
        isPlaying ? myAudio.pause() : myAudio.play();
        };

        myAudio.onplaying = function() {
        isPlaying = true;
        };
        myAudio.onpause = function() {
        isPlaying = false;
        };
    </script>
</body>

</html>