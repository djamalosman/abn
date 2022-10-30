<?php echo $this->session->flashdata('message'); ?>
<head>
  <!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<style type="text/css">
.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}

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
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid ;
  background-color: #FFFFFF ;
  padding: 10px;
  font-size: 10px;
}

input[type=text] {
  background-color: #FFFFFF;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
    </style>
</head>
<body>
<div class="col-lg-12">
<!-- col-lg-12 start here -->
<div class="panel panel-danger toggle panelMove panelClose panelRefresh">
    <!-- Start .panel -->
<div class="panel-heading" style = "background-color : red;">
         <h4 class="panel-title">Data Spesial Stage</h4> 
</div>
<div class="scrollmenu">
<div class="panel-body">
 
<div class="">
    <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary btn-xs mr2 mb10">Create Lelang</button></a> -->
 <div class="form-group">
	<form autocomplete="off" action="<?php echo base_url ('Spesial_stage/read_actionsp_page/')?>">
	  <div class="autocomplete" style="width:300px;">
		<input id="myInput" type="text" name="myCountry" placeholder="Search By CIF">
	  </div>
	  <input type="submit">
	   <a href="<?php echo base_url("Spesial_stage/createdataspecialstage_excel"); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Download Excel</button></a>
	</form>
	
 </div>
 <div class ="form-group">
 <?php echo form_open("Spesial_stage/delete_specialstage", "id='delet'") ?>
<table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px; margin-top :20px;">
<thead>
<tr>  
              
                <th class="text-center"><button onclick="delet()" type="button" class="btn btn-danger btn-xs mr5 mb10" style="margin-top:  10px;"><i class="fa fa-trash-o"></i></button></th>
                <td>Aksi</td>
                <th>CIF</th>
                <th>Account Number</th>
                <th>Nama Customer</th>
                <th>Loan ID</th>
                <th>Status Special Stage</th>
                 <th>File</th>
        </thead>
        <tbody>
          <?php foreach ($viewstagespecial as $item) { ?>
                <tr>      
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_loanid ?>" name="idnya[]"/>
                     
                    </td>                   
                   <td><a title="Edit" href="<?php echo base_url("Spesial_stage/view_specialstage_update/".$item->f_loanid) ?>"><i class="fa fa-list" aria-hidden="true"></i></a> </td>
                    <td><?php echo $item->f_cif ?></td>
                    <td><?php echo $item->f_acctno ?></td>
                    <td><?php echo $item->f_custname ?></td>
                    <td><?php echo $item->f_loanid ?></td>
					<td><?php echo $item->f_flagspecialstage ?></td>
                    <td>
                      <!-- <img src="<?php //echo '../uploads/'.$item->f_filemanager; ?>" /> -->
                      <a href="<?php echo '../uploads/'.$item->f_filemanager; ?>"target="_blank">Download</a>
                    </td>
                    
                </tr>                            
            <?php } ?> 
        </tbody> 
</table>
<?php echo form_close() ?>
 </div>
  
<div class="modal">
  <a class="close-modal" href="javascript:void(0)">
    <i class="fa fa-times"></i>
  </a>
  <div class='modal-content'>
          <div class="modal-header">
                <h5 class="modal-title">search Dedibutr</h5>
            </div>
                <div class="modal-body">
                    <form action="<?php echo base_url("content/create_mntr_lelang") ?>" method="GET">       
                    <div class="form-group">
                        <label class="control-label col-xs-3" >LOAN</label>
                        <div class="col-xs-8">
                            <input id="myInput"  name="myCountry" autocomplete="off"  class="form-control" type="text" placeholder="..." required>
                        </div>
                    </div>
                   
                <div class="modal-footer">
                  <button type="submit">search</button>
                    <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" type="btn-primary">search</button></a> -->
                </div>
                </div> 
                 </form>  
  </div>
</div>
<?php $arrax = array(); ?>
<?php foreach ($stagespecial as $value) { 
  $arrax[] = $value->NomorNasabah.'-'.$value->NamaDebitur.'-'.$value->LD_Temenos;
} ?>
</div>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
</script><script type="text/javascript">$(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             columnDefs : [
        { targets: 0, sortable: false},
    ],
    order: [[ 1, "asc" ]]
        });
    });
</script>
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
 function openModalBox(){
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
<script type="text/javascript">

function delet() {
    //event.preventDefault(); // prevent form submit
    var form = $('#delet');//event.target.form; // storing the form
    Swal.fire({
        title: 'Anda Yakin ?',
        text: "Ingin Menghapus Data Ini ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            form.submit();
        } else {
            swal({
                position: 'top',
                title: 'Cancel',
                text: 'Anda Tidak Jadi Menghapus',
                type: 'error',
                showConfirmButton: false,
                timer: 1500,
                onOpen: function () {
                    setTimeout(function () {
                        swal.close()
                    }, 2000)
                }
            });

        }
    })

}
function formsubmit(b) {
    $('#nik').val(b);
    $('#edit').submit();
}
function formsubmit_detail(c) {
    $('#nik1').val(c);
    $('#detail').submit();
}
//    var table = $('#example').DataTable()

</script>
</body>