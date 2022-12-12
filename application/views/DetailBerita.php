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
  <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/detilberita.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/pago/css/style2.css') ?>">
  <link href="<?php echo base_url('assets/pago/icon/css/all.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/pago/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" >
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }
    span {
    color: #141619;
    
  }
  a{
                color: #080808;
                text-decoration: none;
                }
                a:hover {
                color: #080808;
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
    <p class="animasi"><b>Berita Terkini</b></p>
    <hr />
    <div>
    <img src="<?php echo base_url('uploads/' . $v_one_news->file_content)?>" alt="Gambar" class="img-detilberita">
    </div>
    <div id="liputan"></div>
    
<a class="resp-sharing-button__link" data-action='share/whatsapp/share' expr:href='&quot;whatsapp://send?text=&quot; + data:post.title + &quot;%3A%20&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="WhatsApp" title='Share on WhatsApp'>
  <div class="resp-sharing-button resp-sharing-button--whatsapp"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg></div><span>WhatsApp</span></div>
</a>

<a class="resp-sharing-button__link" expr:href='&quot;https://telegram.me/share/url?text=&quot; + data:post.title + &quot;&amp;url=&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="Telegram" title='Share on Telegram'>
  <div class="resp-sharing-button resp-sharing-button--telegram"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z"/></svg></div><span>Telegram</span></div>
</a>
<a class="resp-sharing-button__link" expr:href='&quot;https://twitter.com/intent/tweet?text=&quot; + data:post.title + &quot;&amp;url=&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="Twitter" title='Share on Twitter'>
  <div class="resp-sharing-button resp-sharing-button--twitter"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg></div><span>Twitter</span></div>
</a>
<a class="resp-sharing-button__link" expr:href='&quot;https://www.facebook.com/sharer/sharer.php?u=&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="Facebook" title='Share on Facebook'>
  <div class="resp-sharing-button resp-sharing-button--facebook"><div aria-hidden="true" class="resp-sharing-button__icon">
    <svg viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg></div><span>Facebook</span></div>
</a>
<a aria-label='Copy Link' class='resp-sharing-button__link' expr:href='&quot;https://cdn.staticaly.com/gh/KompiAjaib/kompi-html/master/copier_2.10.html#&quot; + data:post.canonicalUrl' rel='noopener' target='_blank' title='Share on Copy Link'>
  <div class='resp-sharing-button resp-sharing-button--linkbtn'><div aria-hidden='true' class='resp-sharing-button__icon'>
  <svg viewBox='0 0 24 24'><path d='M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z'/></svg></div><span>Copy Link</span></div>
</a>



<!-- end share -->



    <p class="liputan1"><?php echo $v_one_news->judul ?> </p>
    <hr />
    <div  class= "p-berita">
    <p><?php echo $v_one_news->description ?></p>
    <!-- <p class="isi-berita">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio cumque facere sit ratione quasi accusamus assumenda unde rerum animi. Unde, officiis provident quasi in quia id nihil beatae. Consequuntur recusandae tempore dolorem. Eaque praesentium asperiores error facere porro atque quos accusantium aspernatur quisquam at soluta, eligendi id tempora deleniti. Possimus, harum quae quasi voluptatum, saepe amet aliquid earum voluptate dolor quibusdam reiciendis dolorem commodi suscipit ducimus praesentium doloribus rerum sequi. Esse hic, velit itaque adipisci quia officiis ea suscipit. Laboriosam suscipit enim voluptas repudiandae quisquam odit dolore optio hic eaque doloremque quae modi quo quaerat dolores pariatur maxime, asperiores culpa.</p>
    <p class="isi-berita">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa debitis, velit sit ipsum laudantium eos ullam unde delectus quae aperiam facere error voluptatibus voluptas at beatae ea illo labore corrupti nesciunt a reiciendis, minus dolor atque adipisci? Laborum quo consequuntur est similique tenetur voluptatum beatae minima ex. Pariatur, aut vitae dignissimos rerum alias, consectetur voluptatum delectus error iure nobis, officiis quod? Dolorum, magni eum sunt nesciunt quae cumque impedit est veniam necessitatibus, aliquam maiores modi dolore commodi! Asperiores sint architecto sapiente temporibus cum tempore natus pariatur voluptatibus? Quisquam, iusto animi soluta expedita quaerat distinctio similique repellendus enim tempora suscipit culpa ex nemo? Provident, quaerat architecto. Fuga odio nobis tempora placeat sit voluptate! Quia, exercitationem sit? Beatae enim exercitationem sint dolor soluta molestiae, odit tenetur explicabo? Explicabo assumenda quia vitae, enim commodi aliquam ut ipsa impedit, rem quaerat non libero incidunt, harum ex laudantium earum. Temporibus, possimus. Suscipit, ut velit odio harum facere iste, ipsum quasi nihil minus est nesciunt autem consequuntur eveniet at pariatur illum fugit rerum nobis perspiciatis vitae, obcaecati consequatur iure? Dolores, ut. Necessitatibus qui accusantium tempore sapiente, itaque aliquam! Facere quisquam atque earum nemo libero placeat eum voluptatum corporis, obcaecati iure repudiandae incidunt aspernatur, perferendis inventore ad.</p> -->
    <hr />
    <hr />
  </div>
            <div id="section">
                <section id="card">
                  <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                      <?php foreach($v_news as $item){ ?>  
                          <div class="col mb-5">
                            <div class="card h-100">
                             
                               
                                      <img src="<?php echo base_url('uploads/' . $item->file_content)?>" style="height:260px" class="card-img-top" alt="...">    
                             
                              <div class="card-body">
                                
                              <h6 class="card-title" ><a href="<?php echo base_url("Home/DetailNews/" . $item->code_image . '-' . $item->id_docnews) ?> style="color:black;""><?php echo $item->judul; ?> </a></h6>

                                  <p class="card-text" style="text-align: left;">
                                    
                                   
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
            <img src="<?php echo base_url('assets/pago/img/DIT_8764.JPG') ?>">
          </div>
          <div class="box">
            <img src="<?php echo base_url('assets/pago/img/DIT_9263.JPG') ?>">
          </div>
          <div class="box">
            <img src="<?php echo base_url('assets/pago/img/IMG_9200.JPG') ?>">
          </div>
          <div class="box">
            <img src="<?php echo base_url('assets/pago/img/ss.png') ?>">
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
    <script src="js/detilberita.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="social.js">	</script>
 
</body>

</html>