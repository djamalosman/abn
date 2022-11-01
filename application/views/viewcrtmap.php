<head>
<style type="text/css">
    textarea {
    border: none;
    overflow: auto;
    outline: none;

    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;

    resize: none; /*remove the resize handle on the bottom right*/
}
img{
  max-width:180px;
}
input[type=file]{
padding:10px;
background:white;}
label{
    font-size: 15px;
}
td,tr,tbody,th,thead{
    border: 1px solid black!important;
    border-collapse: collapse;
}
th,td{
    font-family: "Quattrocento Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
     font-size: 16px!important;
}

.tablex{
     table-layout: auto!important;
     min-width:95%!important;
     max-width:95%!important;
     width: 1px!important;
     white-space: nowrap;
  
}
.tablex tr{
    height: 28px!important;
}
.inputx{
    min-width:111px!important;
    width: 1px!important;
    padding-right: 0px!important;
    margin-left:5px; 
   
}

h4 {
  text-align: center;
  
}


 
</style>


</head>
<body>
     <?php echo $this->session->flashdata('message'); ?>
    <div id="wrapper">
<div class="anel panel-danger toggle panelMove panelClose panelRefresh">
 <div class="page-content-wrapper">
    <div class="container py-5">
    <div class="panel panel-success ">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <form action="<?php echo base_url('Map/create_map') ?>"method="POST">            
                    <div class="form-group">
                            <div class="panel-body"style="width: 550px;">
                                <label for="usr">KodeMap:</label>
                                <input type="text" readonly value="<?php echo $kodemap ?>" class="form-control" name="kodemap">
                                <br>
                                <label for="usr">Wilayah:</label>
                                <input type="text" class="form-control" required name="wlyh" placeholder="cnth : Jakarta Pusat">
                                <br>
                                <label for="usr">Kecamatan</label>
                                <input type="text" class="form-control" required name="kecmtn" placeholder="cnth : Menteng">
                                <br>
                                <label for="usr">Nama Tempat</label>
                                <input type="text" class="form-control" required name="lokasi" placeholder="cnth : ABN">
                                <br>
                                <label for="usr">Latitude</label>
                                <input type="text" class="form-control" required name="latitude">
                                <br>
                                <label for="usr">Longitude</label>
                                <input type="text" class="form-control" required name="longitude">
                                <br>
                                <button type="submit" value="btn-submit"  class="btn btn-primary px-4 float-right">Save</button>
                                <a href="<?php echo base_url ('mapadmin')?>" button type="submit" class="btn btn-primary px-4 float-right">Cancel</button></a>
                            </div>
                           
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>
 </div>
</div>
   
    
  
</body


