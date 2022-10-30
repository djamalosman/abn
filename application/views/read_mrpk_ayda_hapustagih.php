

        
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
        <div id="page-header" class="clearfix">
                   
        </div>
         <div class="pagetabel-content.sidebar-pageTabel right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                          <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <i style="font-size:200%;"><?php echo isset($pagename) ? $pagename : "" ?></i>
                                <span class="txt"></span>
                                    </div>
                                    <br>
                                    <br>
                            <div class="border-primary col-sm-4">
                                <form name="myform">
                                     <select name="mylist" onChange="nav()">
                                        <option value="">Select MRPK..</option>
                                        <option value="<?php echo base_url('content/read_mrpk') ?>">MRPK Pelunasan</option>
                                        <option value="<?php echo base_url('content/read_mrpk_ayda_perpanjangan') ?>">MRPK AYDA Perpanjangan</option>
                                        <option value="<?php echo base_url('content/read_mrpk_ayda_penjualan') ?>">MRPK Penjualan AYDA</option>
                                        <option value="<?php echo base_url('content/mrpk_wo') ?>">MRPK WO</option>
                                        <option value="<?php echo base_url('content/mrpk_PT_BAM') ?>">MRPK PT.BAM</option>
                                        <option value="<?php echo base_url('content/mrpk_hapus_tagih') ?>">MRPK Hapus Tagih</option>

                                </select>
                            </form>  
                        </div>
                                    <br>
                                    <br>
                                    <!--modalsubmit -->
                                    <div class="pull-center col-sm-4"><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Create MRPK</a></div>
                                    <br>

                                    <!-- ============ MODAL ADD BARANG =============== -->
            <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">search Dedibutr</h3>
            </div>
            <form class="form-horizontal"action="<?php echo base_url('content/mrpk_wo_view_create')?>">
                <div class="modal-body">
                             
                    <div class="form-group">
                        <label class="control-label col-xs-3" >CIF-NAMA</label>
                        <div class="col-xs-8">
                            <input id="myInput" required=""  name="myCountry" autocomplete="off"  class="form-control" type="text" placeholder="..." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
                </div>
            </form>
            </div>
            </div>
            
        </div>
        <?php $arrax = array(); ?>
<?php foreach ($searchmrpkperpanjangan as $value) { 
  $arrax[] = $value->f_cif.'-'.$value->f_custname;
} ?>
        <!--END MODAL ADD BARANG-->
                                   
                                    <div class="panel-body">
                                        <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Aksi</th>
                                                    <th>Cif</th>
                                                    <th>First name</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php foreach ($wo as $item) { ?>
                                        <tr>      
                                                 <td>
                                                <a title="Edit" href="<?php echo base_url("content/update_tgh_list/".$item->f_acctno) ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                                                <a title="Review" href="#"><i class="
                                                    glyphicon glyphicon-search" aria-hidden="true"></i></a>
                                                </td>
                                            <td><?php echo $item->f_cif ?></td>
                                            <td><?php echo $item->f_namecustomer ?></td>
                                            
                    
                                        </tr>                            
                                        <?php } ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End .panel -->
                            </div>
                    <!-- / .page-content-inner -->
                </div>
                <!-- / page-content-wrapper -->
            </div>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/

var countries = <?php echo json_encode($arrax); ?>


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
<script type="text/javascript">
function nav()
   {
   var w = document.myform.mylist.selectedIndex;
   var url_add = document.myform.mylist.options[w].value;
   window.location.href = url_add;
   }
</script>



    </body>
</html>