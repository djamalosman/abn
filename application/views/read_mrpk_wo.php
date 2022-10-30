<?php echo $this->session->flashdata('message'); ?>
<style type="text/css">
/* CDN Font Awesome :
https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css
*/
.open-modal {
    cursor: pointer;
    /* color:blue;*/
    font-size: 15px;
}

#mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
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
    width: 400px;
    height: 300px;
    margin-left: -200px;
    margin-top: -150px;
    padding: 50px;
    z-index: 99;
}

.close-modal {
    color: #000;
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

    .close-modal {
        display: block;
        position: relative;
        padding: 5px 10px 20px 0
    }

    .modal-content {
        clear: both;
        padding-right: 1.25rem
    }
}
</style>

<div class="container-fluid">
    <?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>
    <div class="row">
        <div class="col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style="background-color : red;">
                    <h4 class="panel-title"><?php echo $pagename ?></h4>
                </div>
                <div class="panel-body">
                    <form name="myform" action="<?php echo base_url('Create_document/mrpk_wo_view_create')?>"
                        method="GET" class="form-horizontal group-border stripped">
                        <div class=" form-group">
                            <!--   <div class="col-lg-2">
                                <label for="f_untuk" class="control-label"></label>
                               
                                <select style=" height: 30px" name="mylist" onChange="nav()" class="fancy-select form-control">
                                    <option value="">Select MRPK</option>
                                        <option value="<?php echo base_url('content/read_mrpk') ?>">MRPK Pelunasan</option>
                                        <option value="<?php echo base_url('content/read_mrpk_ayda_perpanjangan') ?>">MRPK AYDA Perpanjangan</option>
                                        <option value="<?php echo base_url('content/read_mrpk_ayda_penjualan') ?>">MRPK Penjualan AYDA</option>
                                        <option value="<?php echo base_url('content/mrpk_wo') ?>">MRPK WO</option>
                                        <option value="<?php echo base_url('content/mrpk_PT_BAM') ?>">MRPK PT.BAM</option>

                                </select>
                                
                            </div> -->
                            <div class="btn-group mr10 mb10 col-lg-3">
                                <button type="button" class="btn  open-modal btn-primary">Create</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" style="height:33px;" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach ($loopingdropdown as $value1) { ?>
                                    <li>
                                        <input type="button" style="width: 175px;" value="<?php echo $value1->nama ?>"
                                            onclick="window.location.href='<?php echo $value1->f_desc ?>'" />
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div id="mask"></div>
                            <div class="modal">
                                <a class="close-modal" href="javascript:void(0)">
                                    <i class="fa fa-times"></i>
                                </a>
                                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                                    <div class='modal-content'>
                                        <div class="modal-header" style="background-color : red; ">
                                            <h5 class="modal-title" style="color:white;">search Debitur
                                                <?php echo $pagename ?></h5>
                                        </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">CIF</label>
                                            <div class="col-xs-8">
                                                <input id="myInput" name="myCountry" autocomplete="off"
                                                    class="form-control" type="text" placeholder="..." required
                                                    oninvalid="this.setCustomValidity('Cif Tidak Di Temukan')"
                                                    oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit">search</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php $arrax = array(); ?>
                            <?php foreach ($searchmrpkwo as $value) { $arrax[] = $value->NomorNasabah . '-' . $value->NamaDebitur;} ?>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <table id="example"
                                    class="table table-bordered table-striped table-hover dt-responsive non-responsive">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Cif</th>
                                            <th>First name</th>
                                            <th>Alamat Debitur </th>
                                            <!--                                                    <th>Tanggal Input MRK Restrukturisasi</th>-->

                                        </tr>
                                    </thead>

                                    <?php foreach ($read_mrpkView_wo as $item) { ?>
                                    <tr>
                                        <td>
                                            <a title="Edit"
                                                href="<?php echo base_url("Create_document/delete_deb_mrk_wo/".$item->cif) ?>"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            <a title="Edit"
                                                href="<?php echo base_url("Create_document/mrpk_wo_view_edit/". $item->cif . '-' . $item->id_wo) ?>"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a title="preview"
                                                href="<?php echo base_url("LaporanPdf/writeof/".$item->cif.'-'.$item->id_wo) ?>"
                                                target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                            <!-- col-lg-6 start here -->
                                            <!--<label for="input" class="control-label"></label>-->

                                            <!--<input type="text" class="form-control" id="text" placeholder="Input">-->

                                        </td>
                                        <td><?php echo $item->cif ?></td>
                                        <td><?php echo $item->nama_debitur ?></td>
                                        <td><?php echo $item->alamat_debitur ?></td>
                                        <!--                                            <td><?php //echo $item->create_date ?></td>-->


                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">

        </div>
    </div>
    <br>
    <br>

    <?php echo form_close() ?>
</div>
<br>
<br>

<div class="tmpl-loading" style="
     /*min-width: 240px;*/ 
     display: none;
     position: fixed;
     width: 100%; 
     height: 100%; 
     left: 0px;
     /*background: gray;*/
     /*opacity: 0.5;*/
     top: 0px;
     ">
    <div style="
          border: 2px solid black; 
          margin: 0px auto 0px auto;
          padding-top: 35px;
          position: absolute;
          /*opacity: 0.99;*/
          background: white;
          width: 240px;
          height: 100px;
          position: fixed;
          left: calc(50% - 120px);
          top: calc(50% - 150px);    

          -webkit-border-radius: 10px; 

          /* Firefox 1-3.6 */
          -moz-border-radius: 10px; 

          /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
          border-radius: 10px;             
          ">
        <p class="text-center" style="font-size: 21pt"><strong><i class="fa fa-spinner fa-spin"></i> Sending...
            </strong></p>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                //"scrollX": true,   
                "columnDefs": [{
                        "targets": [0], //first column / numbering column
                        "orderable": false //set not orderable

                    }],
                "order": [[1, "asc"]]
            });
        });
    </script>





<script>
$('.show-load').click(function() {
    $('.tmpl-loading').toggle();
});
</script>

<!-- <script>
    $('#imp_submit').submit(function () {
        if ($("select[name='source']").val() != null && $("input[name='file']").val()) {
            document.getElementById("imp_submit").submit();
        } else {
            swal("Oops!", "jenis sumber data atau file belum dipilih!", "warning");
        }
        return false;
    });

</script> -->

<script type="text/javascript">
function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
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
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

/*An array containing all the country names in the world:*/

var countries = <?php echo json_encode($arrax); ?>


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

<script type="text/javascript">
function nav() {
    var w = document.myform.mylist.selectedIndex;
    var url_add = document.myform.mylist.options[w].value;
    window.location.href = url_add;
}
</script>

<script type="text/javascript">
function openModalBox() {
    var modal = $('.modal, #mask');
    $('.open-modal').on('click', function() {
        modal.fadeIn(300);
    });
    $('.close-modal, #mask').on('click', function() {
        modal.fadeOut(800);
    });
}
openModalBox();
</script>