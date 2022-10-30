<?php echo $this->session->flashdata('message'); ?>
<head>
 
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<style type="text/css">

.open-modal {
  cursor: pointer;
  /*color:#;*/
  font-size: 15px;
}
#mask {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  display: none;  
  background: black;
  z-index: 98;
  opacity: 0.8;
}
.modal {
  background-color: #fff;
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  width: 700px;
  height: 350px;
  margin-left: -200px;
  margin-top: -150px;
  padding: 50px;
  z-index: 99;
}
.close-modal {
  color:  #000;
  text-decoration: none;
  float: right;
  position: absolute;
  top: 10px;
  right: 20px
}
@media (max-width : 37.500rem) {
  .modal {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 1.250rem
  }
  .close-modal{
    display: block;
   position: relative;
   padding: 5px 10px 20px 0
  } 
  .modal-content{
    clear: both;
    padding-right: 1.25rem
  } 
}
    </style>
</head>
<body>
<div class="col-lg-12">
<!-- col-lg-12 start here -->
<div class="panel panel-danger toggle panelMove panelClose panelRefresh">
    <!-- Start .panel -->
<div class="panel-heading" style = "background-color : red;">

    <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">
                <i class="fa fa-plus"></i>
                Create
            </a> -->
         <h4 class="panel-title">Basic Data tables</h4> 
</div>
<div class="scrollmenu">
<div class="panel-body">
 
<div class="">
  <div id="buttons">
   
   <!-- button type="button" class="btn  open-modal btn-primary">create Lelang</button> -->
   </div>
   <br>
   <br>

<div class="container">
<!--   <h2>Form control: textarea</h2> -->
  <form method="POST" action="<?php echo base_url('menu/inputheader') ?>">
    <div class="form-group">
      <!-- <label for="comment">Comment:</label> -->
      <textarea required="" style="width: 80%;" class="form-control" name="header" rows="5" id="comment"></textarea>
      <br>
      <br>
      <div id="buttons">
    <button type="submit" style="background-color: #0bacd3;" class="btn btn-primary">Simpan</button>
   <!-- button type="button" class="btn  open-modal btn-primary">create Lelang</button> -->
   </div>
    </div>
  </form>
</div>

</div>

</div>
</div>
</div>
</div>
<!-- <script src="<?php //echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php //echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script> -->

</body>