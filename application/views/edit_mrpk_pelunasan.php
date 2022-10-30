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
label{
    font-size: 15px;
}
td,tr,tbody,th,thead{
    border: 1px solid black!important;
    border-collapse: collapse;
}
th,td{
    font-family: "Quattrocento Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
     font-size: 15px!important;
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
.inputx {
        min-width: 105% !important;
        width: 115px !important;
        padding-right: 0px !important;
        margin-left: 5px;

    }

</style>
<script>
$(document).on("keyup", ".qty", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty").each(function(){
        var val = $(this).val();
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.total1').val(sum);
});

 $(document).on("keyup", ".qty2", function() {
    var sum = 0;
    var i = $(".qty2").index(this); //get index
    var total = 0;
    $(".qty2").each(function(){
        sum += +$(this).val();
    });
    $('#total_os').val(sum);
    var qty2 = $(this).val();
    var qty4 = $(".qty4").eq(i).val();
    var qty5 = $(".qty5").eq(i).val();
    var qty6 = parseInt(qty2) + parseInt(qty4) + parseInt(qty5);
    $("#totalABC").eq(i).val(qty6);
    $(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
    var total2 = $('#total_os').val();
    var total4 = $('#total_tunggakan_bunga').val();
    var total5 = $('#total_tunggakan_denda').val();
    //var total4 = $('.total4').text();
    //var total5 = $('.total5').text();
    total = parseInt(total2) + parseInt(total4) + parseInt(total5);
    //$('.total6').val(total);
    $('#total_ABC').val(total);
});

$(document).on("keyup", ".qty3", function() {
    var sum = 0;
    $(".qty3").each(function(){
        sum += +$(this).val();
    });
    $('.total3').html(sum);
});

$(document).on("keyup", ".qty4", function() {
    var sum = 0; var i = $(".qty4").index(this);
    $(".qty4").each(function(){
        sum += +$(this).val();
    });
    //$('.total4').html(sum);
    $('#total_tunggakan_bunga').val(sum);
    var qty4 = $(this).val();
    var qty2 = $(".qty2").eq(i).val();
    var qty5 = $(".qty5").eq(i).val();
    var qty6 = parseInt(qty4) + parseInt(qty2) + parseInt(qty5);
    $("#totalABC").eq(i).val(qty6);
    $(".qty6").eq(i).val(qty6);
    //var total2 = $('.total2').text();
    var total2 = $('#total_os').val();
    var total4 = $('#total_tunggakan_bunga').val();
    var total5 = $('#total_tunggakan_denda').val();

    //$('.total4').text();
    //var total5 = $('.total5').text();
    total = parseInt(total2) + parseInt(total4) + parseInt(total5);
    //$('.total6').val(total);
    $('#total_ABC').val(total);
});

$(document).on("keyup", ".qty5", function() {
    var sum = 0; var i = $(".qty5").index(this);
    $(".qty5").each(function(){
        sum += +$(this).val();
    });
    $('#total_tunggakan_denda').val(sum);
    var qty5 = $(this).val();
    var qty2 = $(".qty2").eq(i).val();
    var qty4 = $(".qty4").eq(i).val();
    var qty6 = parseInt(qty5) + parseInt(qty2) + parseInt(qty4);
    $("#totalABC").eq(i).val(qty6);
    $(".qty6").eq(i).val(qty6);
    //var total2 = $('.total2').text();
    var total2 = $('#total_os').val();
    var total4 = $('#total_tunggakan_bunga').val();
    var total5 = $('#total_tunggakan_denda').val();
    //var total4 = $('.total4').text();
    //var total5 = $('.total5').text();
    total = parseInt(total2) + parseInt(total4) + parseInt(total5);
    //$('.total6').val(total);
    $('#total_ABC').val(total);
});

$(document).on("keyup", ".qty7", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty7").each(function(){
        var val = $(this).val();
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.total7').val(sum);
});

$(document).on("keyup", ".qty8", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty8").each(function(){
        var val = $(this).val();
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.total8').val(sum);
});

$(document).on("keyup", ".qty81", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty81").each(function(){
        var val = $(this).val();
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.total81').val(sum);
});

$(document).on("keyup", ".qty82", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty82").each(function(){
        var val = $(this).val();
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.total82').val(sum);
});

$(document).on("keyup", ".qty83", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty83").each(function(){
        var val = $(this).val();
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.total83').val(sum);
});

$(document).on("keyup", ".porsipokok", function() {
    var sum = 0;
    var i = $(".porsipokok").index(this); //get index
    var total = 0;
    $(".porsipokok").each(function(){
        sum += +$(this).val();
    });
    $('#total_os').val(sum);
    var porsipokok = $(this).val();
    var ttldibayarkan = $(".ttldibayarkan").eq(i).val();
    var ckpnper = $(".ckpnper").eq(i).val();
    var qty66 = parseInt(porsipokok) - parseInt(ttldibayarkan);
    $("#totalABC").eq(i).val(qty66);
    $(".qty66").eq(i).val(qty66); // equal to set index
    // equal to set index
    var kekuranganckpn = parseInt(qty66) - parseInt(ckpnper);
    $(".kekuranganckpn").eq(i).val(kekuranganckpn); // equal to set index

});

$(document).on("keyup", ".ttldibayarkan", function() {
    var sum = 0;
    var i = $(".ttldibayarkan").index(this); //get index
    var total = 0;
    $(".ttldibayarkan").each(function(){
        sum += +$(this).val();
    });
    $('#total_os').val(sum);
    var ttldibayarkan = $(this).val();
    var porsipokok = $(".porsipokok").eq(i).val();
    var ckpnper = $(".ckpnper").eq(i).val();
    var qty66 = parseInt(porsipokok) - parseInt(ttldibayarkan);
    $("#totalABC").eq(i).val(qty66);
    $(".qty66").eq(i).val(qty66); // equal to set index
    //var total2 = $('.total2').text();
    var kekuranganckpn = parseInt(qty66) - parseInt(ckpnper);
    $(".kekuranganckpn").eq(i).val(kekuranganckpn); // equal to set index
   
});

$(document).on("keyup", ".ckpnper", function() {
    var sum = 0;
    var i = $(".ckpnper").index(this); //get index
    var total = 0;
    $(".ckpnper").each(function(){
        sum += +$(this).val();
    });
    $('#total_os').val(sum);
    var ckpnper = $(this).val();
    var porsipokok = $(".porsipokok").eq(i).val();
    var ttldibayarkan = $(".ttldibayarkan").eq(i).val();
    var qty66 = parseInt(porsipokok) - parseInt(ttldibayarkan);
    var kekuranganckpn = parseInt(qty66) - parseInt(ckpnper);
    $(".kekuranganckpn").eq(i).val(kekuranganckpn); // equal to set index
});





</script>
<script type="text/javascript">
         function insertRow(){
                var table=document.getElementById("myTable");
                var row=table.insertRow(table.rows.length);
                var cell1=row.insertCell(0);
                var t1=document.createElement("input");
                    t1.id = "deskripsi_a[]";
                    t1.name = "deskripsi_a[]";
                    cell1.appendChild(t1).style="width:100%!important; border: 0;";
                var cell2=row.insertCell(1);
                var t2=document.createElement("input")
                    t2.id = "pokok_a[]";
                    t2.name = "pokok_a[]";
                    cell2.appendChild(t2).style="width:100%!important; border: 0;";
                var cell3=row.insertCell(2);
                var t3=document.createElement("input");
                    t3.id = "persen_1a[]";
                     t3.name = "persen_1a[]";
                    cell3.appendChild(t3).style="width:100%!important; border: 0;";
               var cell4=row.insertCell(3);
               var t4=document.createElement("input");
                    t4.id = "bunga_a[]";
                    t4.name = "bunga_a[]";
                    cell4.appendChild(t4).style="width:100%!important; border: 0;";
               var cell5=row.insertCell(4);
               var t5=document.createElement("input");
                    t5.id = "persen_2a[]";
                    t5.name = "persen_2a[]";
                    cell5.appendChild(t5).style="width:100%!important; border: 0;";
               var cell6=row.insertCell(5);
               var t6=document.createElement("input");
                    t6.id = "denda_a[]";
                    t6.name = "denda_a[]";
                    cell6.appendChild(t6).style="width:100%!important; border: 0;";
               var cell7=row.insertCell(6);
               var t7=document.createElement("input");
                    t7.id = "persen_3a[]";
                    t7.name = "persen_3a[]";
                    cell7.appendChild(t7).style="width:100%!important; border: 0;";

    }
    
    function myDeleteFunction() {
  document.getElementById("myTable").deleteRow(2);

  document.getElementById("total1").innerHtml("test");
}
</script>

<script type="text/javascript">
  function insertRow2() {
        var table = document.getElementById("myTable2");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "datadokumen[]";
        
        t1.name = "datadokumen[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        
        var ada_dokumen = $('.adadokumen').length;
        console.log(ada_dokumen);
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.type = "checkbox";
        t2.value = "Ada";
        t2.id = "ada_dokumen";
        t2.name = "ada_dokumen_"+ada_dokumen;
        t2.className = "adadokumen";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";


    }

    function myDeleteFunction2() {
        document.getElementById("myTable2").deleteRow(2);
    }
</script>


<script type="text/javascript">
         function insertRow3(){
                var table=document.getElementById("myTable3");
                var row=table.insertRow(table.rows.length);
                var cell1=row.insertCell(0);
                var t1=document.createElement("input");
                    t1.id = "jenis_devisiasi[]";
                     
                    t1.name = "jenis_devisiasi[]";
                    cell1.appendChild(t1).style="width:100%!important; border: 0;";
                var cell2=row.insertCell(1);
              var t2=document.createElement("input")
                    t2.type="checkbox";
                    t2.value="Ada";
                    t2.id = "adadevisiasi[]";
                    t2.name = "adadevisiasi[]";
                    cell2.appendChild(t2).style="width:100%!important; border: 0;";
                
               
    }
    
    function myDeleteFunction3() {
  document.getElementById("myTable3").deleteRow(2);
}
</script>
<script type="text/javascript">
         function insertRow4(sId, sTable){
                var table=document.getElementById(sTable);
                var row=table.insertRow(table.rows.length);
                var cell1=row.insertCell(0);
                var t1=document.createElement("textarea");
                    //t1.id = "jenis_fasilitas_a1[]";
                    //t1.name = "jenis_fasilitas_a1[]";
                    t1.id = sId+"_jenis_fasilitas_T1[]";
                    t1.name = sId+"_jenis_fasilitas_T1[]";
                    //t1.rows = "2";
                    //t.cols="5";
                    cell1.appendChild(t1).style="width:100%!important; border: 0;";
                var cell2=row.insertCell(1);
              var t2=document.createElement("textarea")
              t2.id = sId+"_jenis_fasilitas_T2[]";
                    t2.name = sId+"_jenis_fasilitas_T2[]";
                    cell2.appendChild(t2).style="width:100%!important; border: 0;";
                var cell3=row.insertCell(2);
              var t3=document.createElement("textarea")
              t3.id = sId+"_jenis_fasilitas_T3[]";
                    t3.name = sId+"_jenis_fasilitas_T3[]";
                    cell3.appendChild(t3).style="width:100%!important; border: 0;";
                   
               
    }
    
    function myDeleteFunction4() {
  document.getElementById("myTable4").deleteRow(7);
}
</script>
<script type="text/javascript">
         function insertRow5(){
                var table=document.getElementsByClassName("myTable5");
                var row=table.insertRow(table.rows.length);
                var cell1=row.insertCell(0);
                var t1=document.createElement("input");
                    t1.id = "jenis_fasilitas_b1[]";
                    t1.name = "jenis_fasilitas_b1[]";
                    cell1.appendChild(t1).style="width:100%!important; border: 0;";
                var cell2=row.insertCell(1);
              var t2=document.createElement("input")
                    t2.id = "jenis_fasilitas_b2[]";
                    t2.name = "jenis_fasilitas_b2[]";
                    cell2.appendChild(t2).style="width:100%!important; border: 0;";
                var cell3=row.insertCell(2);
              var t3=document.createElement("input")
                    t3.id = "jenis_fasilitas_b3[]";
                    t3.name = "jenis_fasilitas_b3[]";
                    cell3.appendChild(t3).style="width:100%!important; border: 0;";
               
    }
    
    function myDeleteFunction5() {
  document.getElementsByClassName("myTable5").deleteRow(6);


}


// $(document).on("keyup", ".pokok1", function() { 
//         var i = $(".pokok1").index(this); //get index
//        //total ke samping
      
//         var pokok1 = $(this).val();
//         var pokok2 = $(".pokok2").eq(i).val();
//         var denda1 = $(".denda1").eq(i).val();
//         if(!pokok2){pokok2 = 0;}
//         var pokok3 = parseInt(pokok1) - parseInt(pokok2);
//         $(".pokok3").eq(i).val(pokok3); // equal to set index
//         // // total ke bawah
//         var pokok1 = $(this).val();
//         var bunga1 = $(".bunga1").eq(i).val();
//         var denda1 = $(".denda1").eq(i).val();
//         if(!pokok1){pokok1 = 0;}
//         if(!bunga1){bunga1 = 0;}
//         if(!denda1){denda1 = 0;}
//         var total1 = parseInt(pokok1) + parseInt(bunga1) + parseInt(denda1);
//         $('.tlt1').eq(i).val(total1);
//         totalhpstgh(i);
//     });

//     $(document).on("keyup", ".pokok2", function() {
//         var i = $(".pokok2").index(this);
       
//         //total kurang samping
//         var pokok2 = $(this).val();
//         var pokok1 = $(".pokok1").eq(i).val();
//         if(!pokok2){pokok2 = 0;}
//         if(!pokok1){pokok1 = 0;}
//         var pokok3 =parseInt(pokok1) - parseInt(pokok2);
//         $(".pokok3").eq(i).val(pokok3);
//         //total tambah bawah
//         var pokok2 = $(this).val();
//         var bunga2 = $(".bunga2").eq(i).val();
//         var denda2 = $(".denda2").eq(i).val();
//         if(!pokok2){pokok2 = 0;}
//         if(!bunga2){bunga2 = 0;}
//         if(!denda2){denda2 = 0;}
//         var total2 = parseInt(pokok2) + parseInt(bunga2) + parseInt(denda2);
//         $('.tlt2').eq(i).val(total2);
      
//     });
//     $(document).on("keyup", ".bunga1", function() {
//         var i = $(".bunga1").index(this);
        
//         //total kurang samping
//         var bunga1 = $(this).val();
//         var bunga2 = $(".bunga2").eq(i).val();
//         if(!bunga1){bunga1 = 0;}
//         if(!bunga2){bunga2 = 0;}

//         var bunga3 = parseInt(bunga1) - parseInt(bunga2);
//         $(".bunga3").eq(i).val(bunga3);

//         var bunga1 = $(this).val();
//         var pokok1 = $(".pokok1").eq(i).val();
//         var denda1 = $(".denda1").eq(i).val();
//         if(!bunga1){bunga1 = 0;}
//         if(!pokok1){pokok1 = 0;}
//         if(!denda1){denda1 = 0;}
//         var total2 = parseInt(pokok1) + parseInt(bunga1) + parseInt(denda1);
//         $('.tlt1').eq(i).val(total2);
//         totalhpstgh(i);
//     });

//     $(document).on("keyup", ".bunga2", function() {
       
//         var i = $(".bunga2").index(this);
//         //total disamping
//         var bunga2 = $(this).val();
//         var bunga1 = $(".bunga1").eq(i).val();
//         if(!bunga1){bunga1 = 0;}
//         if(!bunga2){bunga2 = 0;}
//         var bunga3 =parseInt(bunga1) - parseInt(bunga2);
//         $(".bunga3").eq(i).val(bunga3);
      
//         //total dibawah
//         var bunga2 = $(this).val();
//         var pokok2 = $(".pokok2").eq(i).val();
//         var denda2 = $(".denda2").eq(i).val();
//         if(!bunga2){bunga2 = 0;}
//         if(!pokok2){pokok2 = 0;}
//         if(!denda2){denda2 = 0;}
//         var total2 = parseInt(pokok2) + parseInt(bunga2) + parseInt(denda2);
//         $('.tlt2').eq(i).val(total2);
//         totalhpstgh(i);
//     });
   
//     $(document).on("keyup", ".denda1", function() {
//         var i = $(".denda1").index(this);
//        //total samping kurang
//         var denda1 = $(this).val();
//         var denda2 = $(".denda2").eq(i).val();
//         if(!denda2){denda2 = 0;}
//         if(!denda1){denda1 = 0;}
//         var denda3 = parseInt(denda1) - parseInt(denda2);
//         $(".denda3").eq(i).val(denda3);

//         //total tambah bawah
//         var denda1 = $(this).val();
//         var pokok1 = $(".pokok1").eq(i).val();
//         var bunga1 = $(".bunga1").eq(i).val();
//         if(!denda1){denda1 = 0;}
//         if(!pokok1){pokok1 = 0;}
//         if(!bunga1){bunga1 = 0;}
//         var total2 = parseInt(pokok1) + parseInt(bunga1) + parseInt(denda1);
//         $('.tlt1').eq(i).val(total2);
//         totalhpstgh(i);
        

//     });

//     $(document).on("keyup", ".denda2", function() {
        
//         var i = $(".denda2").index(this);
       
        
//         //total samping kurang
//         var denda2 = $(this).val();
//         var denda1 = $(".denda1").eq(i).val();
//         if(!denda2){denda2 = 0;}
//         if(!denda1){denda1 = 0;}
//         var denda3 =parseInt(denda1) - parseInt(denda2);
//         $(".denda3").eq(i).val(denda3);

//         //total tambah bawah
//         var bunga2 = $(this).val();
//         var pokok2 = $(".pokok2").eq(i).val();
//         var denda2 = $(".denda2").eq(i).val();
//         if(!bunga2){bunga2 = 0;}
//         if(!denda2){denda2 = 0;}
//         if(!pokok2){pokok2 = 0;}
//         var total2 = parseInt(pokok2) + parseInt(bunga2) + parseInt(denda2);
//         $('.tlt2').eq(i).val(total2);
      
//         totalhpstgh(i);
      
//     });

//     $(document).on("keyup", ".hapustagih_a1", function() {
        
//         var i = $(".hapustagih_a1").index(this);
       

//         //total tambah bawah
//         var hapustagih_a1 = $(this).val();
//         var hapustagih_a2 = $(".hapustagih_a2").eq(i).val();
//         var hapustagih_a3 = $(".hapustagih_a3").eq(i).val();
//         if(!hapustagih_a1){hapustagih_a1 = 0;}
//         if(!hapustagih_a2){hapustagih_a2 = 0;}
//         if(!hapustagih_a3){hapustagih_a3 = 0;}
//         var tlthpstgh1 = parseInt(hapustagih_a1) + parseInt(hapustagih_a2) + parseInt(hapustagih_a3);
//         $('.hpstghtotal').eq(i).val(tlthpstgh1);
//         totalhpstgh(i);(i);
      
      
//     });

function onKeyPress(i, isCount, column) {
        if (column == "pokok") {
            var pokok1 = $("#pokok1\\["+i+"\\]").val();
            var pokok2 = $("#pokok2\\["+i+"\\]").val();
            var pokok3 = $("#pokok3\\["+i+"\\]").val();
            var resultPokok3 = pokok3;

            if(!isCount) {
                resultPokok3 = pokok1 - pokok2;
            }
            var resultHapusTagihan = pokok1 - pokok2 - resultPokok3;
            $("#pokok3\\["+i+"\\]").val(resultPokok3);
            $("#tlthpstgh11\\["+i+"\\]").val(resultHapusTagihan);

            var resultpersen1 = pokok2 / pokok1;
            $("#resultpersen1\\["+i+"\\]").val(resultpersen1);

            var resultpersen2 = resultHapusTagihan / pokok1;
            $("#resultpersen2\\["+i+"\\]").val(resultpersen2);
        }
        else if (column == "bunga") {
            var bunga1 = $("#bunga1\\["+i+"\\]").val();
            var bunga2 = $("#bunga2\\["+i+"\\]").val();
            var bunga3 = $("#bunga3\\["+i+"\\]").val();
            var resultbunga3 = bunga3;

            if(!isCount) {
                resultbunga3 = bunga1 - bunga2;
            }
            var resultHapusTagihan = bunga1 - bunga2 - resultbunga3;
            $("#bunga3\\["+i+"\\]").val(resultbunga3);
            $("#bunga4\\["+i+"\\]").val(resultHapusTagihan);

            var resultpersen3 = bunga2 / bunga1;
            $("#resultpersen3\\["+i+"\\]").val(resultpersen3);
           
            var resultpersen4 = resultHapusTagihan / bunga1;
            $("#resultpersen4\\["+i+"\\]").val(resultpersen4);
        }
        else if (column == "denda") {
            var denda1 = $("#denda1\\["+i+"\\]").val();
            var denda2 = $("#denda2\\["+i+"\\]").val();
            var denda3 = $("#denda3\\["+i+"\\]").val();
            var resultdenda3 = denda3;

            if(!isCount) {
                resultdenda3 = denda1 - denda2;
            }
            var resultHapusTagihan = denda1 - denda2 - resultdenda3;
            $("#denda3\\["+i+"\\]").val(resultdenda3);
            $("#denda4\\["+i+"\\]").val(resultHapusTagihan);

            var resultpersen5 = denda2 / denda1;
            $("#resultpersen5\\["+i+"\\]").val(resultpersen5);

            var resultpersen6 = resultHapusTagihan / denda1;
            $("#resultpersen6\\["+i+"\\]").val(resultpersen6);
        }
        var kewajiban1 = parseFloat($("#pokok1\\["+i+"\\]").val());
        var kewajiban2 = parseFloat($("#bunga1\\["+i+"\\]").val());
        var kewajiban3 = parseFloat($("#denda1\\["+i+"\\]").val());

        var pelunasan1 = parseFloat($("#pokok2\\["+i+"\\]").val());
        var pelunasan2 = parseFloat($("#bunga2\\["+i+"\\]").val());
        var pelunasan3 = parseFloat($("#denda2\\["+i+"\\]").val());

        var sisaKewajiban1 = parseFloat($("#pokok3\\["+i+"\\]").val());
        var sisaKewajiban2 = parseFloat($("#bunga3\\["+i+"\\]").val());
        var sisaKewajiban3 = parseFloat($("#denda3\\["+i+"\\]").val());

        var tagihan1 = parseFloat($("#tlthpstgh11\\["+i+"\\]").val());
        var tagihan2 = parseFloat($("#bunga4\\["+i+"\\]").val());
        var tagihan3 = parseFloat($("#denda4\\["+i+"\\]").val());

        var totalKewajiban = kewajiban1 + kewajiban2 + kewajiban3;
        var totalPelunasan = pelunasan1 + pelunasan2 + pelunasan3;
        var totalSisaKewajiban = sisaKewajiban1 + sisaKewajiban2 + sisaKewajiban3;
        var totalTagihan = tagihan1 + tagihan2 + tagihan3;

        $("#ttlkewajiban\\["+i+"\\]").val(totalKewajiban);
        $("#ttldibayar\\["+i+"\\]").val(totalPelunasan);
        $("#ttlsisakewajiban\\["+i+"\\]").val(totalSisaKewajiban);
        $("#ttlsisahapustagih\\["+i+"\\]").val(totalTagihan);

          // FUNGSI UNTUK HITUNG GRAND TOTAL

        var grandTtlKewajiban = 0;
        var grandTtlDibayar = 0;
        var grandTtlSisaKewajiban = 0;
        var grandTtlSisaHapusTagih = 0;

        for (var i = 0; i < $('input[id^="ttlkewajiban"]').length; i++) {
            var grdKewajiban = 0;
            var grdDibayar = 0;
            var grdSisaKewajiban = 0;
            var grdSisaTagih = 0;

            if(!isNaN(parseFloat($("#ttlkewajiban\\["+i+"\\]").val()))) {
                grdKewajiban = parseFloat($("#ttlkewajiban\\["+i+"\\]").val());
            }
            if(!isNaN(parseFloat($("#ttldibayar\\["+i+"\\]").val()))) {
                grdDibayar = parseFloat($("#ttldibayar\\["+i+"\\]").val());
            }
            if(!isNaN(parseFloat($("#ttlsisakewajiban\\["+i+"\\]").val()))) {
                grdSisaKewajiban = parseFloat($("#ttlsisakewajiban\\["+i+"\\]").val());
            }
            if(!isNaN(parseFloat($("#ttlsisahapustagih\\["+i+"\\]").val()))) {
                grdSisaTagih = parseFloat($("#ttlsisahapustagih\\["+i+"\\]").val());
            }
            
            grandTtlKewajiban = grandTtlKewajiban + grdKewajiban;
            grandTtlDibayar = grandTtlDibayar + grdDibayar;
            grandTtlSisaKewajiban = grandTtlSisaKewajiban + grdSisaKewajiban;
            grandTtlSisaHapusTagih = grandTtlSisaHapusTagih + grdSisaTagih;
        }

        $("#grandTotalKewajiban").val(grandTtlKewajiban);
        $("#grandTotalDibayar").val(grandTtlDibayar);
        $("#grandTotalSisaKewajiban").val(grandTtlSisaKewajiban);
        $("#grandTotalSisaHapusTagih").val(grandTtlSisaHapusTagih);

        // END FUNGSI
}

    $(document).on("keyup", ".hapustagih_a2", function() {
        
        var i = $(".hapustagih_a2").index(this);
       

        //total tambah bawah
        var hapustagih_a2 = $(this).val();
        var hapustagih_a1 = $(".hapustagih_a1").eq(i).val();
        var hapustagih_a3 = $(".hapustagih_a3").eq(i).val();
        if(!hapustagih_a2){hapustagih_a2 = 0;}
        if(!hapustagih_a1){hapustagih_a1 = 0;}
        if(!hapustagih_a3){hapustagih_a3 = 0;}
        var tlthpstgh2 = parseInt(hapustagih_a2) + parseInt(hapustagih_a1) + parseInt(hapustagih_a3);
        $('.hpstghtotal').eq(i).val(tlthpstgh2);
        // hpstghtotal(i);
        totalhpstgh(i);
    });


    $(document).on("keyup", ".hapustagih_a3", function() {
        
        var i = $(".hapustagih_a3").index(this);
       

        //total tambah bawah
        var hapustagih_a3 = $(this).val();
        var hapustagih_a1 = $(".hapustagih_a1").eq(i).val();
        var hapustagih_a2 = $(".hapustagih_a2").eq(i).val();
        if(!hapustagih_a3){hapustagih_a2 = 0;}
        if(!hapustagih_a1){hapustagih_a1 = 0;}
        if(!hapustagih_a2){hapustagih_a3 = 0;}
        var tlthpstgh3 = parseInt(hapustagih_a3) + parseInt(hapustagih_a1) + parseInt(hapustagih_a2);
        $('.hpstghtotal').eq(i).val(tlthpstgh3);
        //hpstghtotal(i);
        totalhpstgh(i);
    });


    function totalhpstgh(index){
     
        var a = $('.pokok3').eq(index).val();
        var b = $('.bunga3').eq(index).val();
        var c =  $('.denda3').eq(index).val();

        if(!a){a = 0;}
        if(!b){b = 0;}
        if(!c){c = 0;}
        var ttlhpstgh = parseInt(a) - parseInt(b) - parseInt(c);
        $('.ttlhpstgh').eq(index).val(ttlhpstgh);
        // console.log(a);
        // console.log(b);
        // console.log(c);
    }
    
</script>
<script type="text/javascript">
        function insertRow8() {
        var table = document.getElementById("myTable");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "txtbiayalain[]";
        t1.name = "biayalain[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "txtdibayar[]";
        t2.name = "dibayar[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input");
        t3.id = "txtdihapus[]";
        t3.name = "dihapus[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";




    }

    function myDeleteFunction8() {
        document.getElementById("myTable").deleteRow(2);
    }
</script>

<script type="text/javascript">
        function insertRow1() {
        var table = document.getElementById("myTable1");
        var row = table.insertRow(table.rows.length);
       
        var cell2 = row.insertCell(0);
        var t2 = document.createElement("input")
        t2.id = "desc_penagihan[]";
        t2.name = "desc_penagihan[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(1);
        var t3 = document.createElement("input");
        t3.id = "pihak_hadir_penagihan[]";
        t3.name = "pihak_hadir_penagihan[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";
        //              var cell4=row.insertCell(3);
        //              var t4=document.createElement("input")
        //                    t4.type="checkbox";
        //                    t4.id = "desc_penagihan[]";
        //                    t4.name = "iddesc_penagihan[]";
        //                    cell4.appendChild(t4).style="width:100%!important; border: 0;";


    }

        function myDeleteFunction1() {
        document.getElementById("myTable1").deleteRow(2);
    }
</script>
</head>
<body>
     
    <div id="wrapper">
<div class="pagetabel-content.sidebar-pageTabel right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
 <div class="page-content-wrapper">
    <div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form action="<?php echo base_url('create_document/update_pelunasan_mrpk/').$pelunasan_row->cif.'-'.$pelunasan_row->id_pelunasan;?>" method="POST">
            <div id="printablediv">
               <div class="form-group row">
                     <div class="col-sm-11">
                        <label for="inputState">Jenis Pengajuan</label>
                        <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote1"><?php echo $pelunasan_row->jenis_pengajuan ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote3" class="summernote3" id="sm3" cols="5" rows="3"></textarea>
                    </div>  
                </div>
                <div class="form-group row">
                
                    <div class="col-sm-11">
                        <label for="inputFirstname">Informasi Debitur</label>
                       
                        <table id="printTable" class="table table-bordered table-striped table-hover dt-responsive non-responsive" style="width:95%;height: 10%;">
                          <tbody>

                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input value="<?php echo $pelunasan_row->nama_debitur ?>" name="name" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;"></td>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $pelunasan_row->alamat_debitur ?>" name="alamat" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;">
                                  
                               </td>
                            </tr>
                             <tr>
                                <td>Cif</td>
                                <td>:</td>
                                <td>
                                 <input value="<?php echo $pelunasan_row->cif ?>" name="cif" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Bidang Usaha</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->bidang_usaha ?>" name="bidang_usaha" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>

                            </tr>
                            <tr>
                                <td>Lokasi Usaha</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $pelunasan_row->lokasi_usaha ?>" name="lokasi_usaha" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Group Usaha</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->nama_group_usaha ?> "name="nama_group_usaha" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                            </tr>
                            

                            <tr>
                                <td>Debitur Sejak</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->debitur_sejak ?>" name="debitur_sejak" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                            </tr>
                            <tr>
                                <td>Menunggak Sejak</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->menunggak_sejak ?>" name="menunggak_sejak" autocomplete="off" style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                            </tr>
                            <tr>
                                <td>Hari Tunggakan (DPD)</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->dpd ?>" name="dpd" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Kolektibilitas</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->kolektibilitas ?>"  name="col" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                            </tr>
                            <tr>
                                <td>CKPN</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $pelunasan_row->ckpn ?>"  name="ckpn" autocomplete="off"  style="border:1px; background-color:transparent;width: 75%;">
                                </td>
                            </tr>
                        </tr>
                        </tbody>
                        </table>
                       
                    </div>
                    <div class="col-sm-11">
                                            <label for="inputFirstname">Fasilitias yang dimiliki oleh debitur</label>

                                            <table class="tablex table-bordered table-striped table-hover" id="table2">

                                                <tr>
                                                    <th rowspan="9">No</th>
                                                    <th hidden>norek</th>
                                                    <th hidden>id_pelunasan</th>
                                                    <th>Jenis <p>Fasilitas</p>
                                                    </th>
                                                    <th>Plafond</th>
                                                    <th>O/S per <p><?php echo  date('d F Y') ?></p>
                                                        <p> A</p>
                                                    </th>
                                                    <th>Jangka <p> Waktu/tenor</p>
                                                    </th>
                                                    <th>Tunggakan <p>Bunga(Rp)</p>
                                                        <p> B</p>
                                                    </th>
                                                    <th>Tunggakan <p>Denda</p>
                                                        <p> C</p>
                                                    </th>
                                                    <th>Total<p>(A+B+C)</p>
                                                    </th>
                                                </tr>
                                                <tbody>


                                                    <?php
                                                         $_idx_loop = 1;
                                                         $_data_length = count($pelunasan_result);
                                                         $totalPlafond = 0;
                                                         $totalA = 0;
                                                         $totalB = 0;
                                                         $totalC = 0;
                                                         $totalD = 0;
                                                     ?>
                                                    <?php foreach ($pelunasan_result as $value) { 
                                                        $total = $value->os_per+$value->tunggakan_bunga+$value->tunggakan_denda;
                                                        $totalPlafond = $totalPlafond + $value->plafond;
                                                        $totalA = $totalA + $value->os_per;
                                                        $totalB = $totalB + $value->tunggakan_bunga;
                                                        $totalC = $totalC + $value->tunggakan_denda;
                                                        $totalD = $totalD + $total;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $_idx_loop ?></td>
                                                        <td hidden>
                                                        <input value="<?php echo $value->norek ?>"name="norek[]"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td hidden>
                                                        <input value="<?php echo $value->id_pelunasan ?>"name="id_pelunasan[]"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                       
                                                        <td>
                                                            <textarea name="jenis_fasilitas[]" cols="15"
                                                                style="background-color: transparent;"
                                                                rows="5"><?php echo $value->jenis_fasilitas ?></textarea>
                                                        </td>

                                                        <td>
                                                            <input class="qty"
                                                                value="<?php echo $value->plafond ?>"
                                                                name="plafond[]"
                                                                style="width:110px!important; border: 0;background-color: transparent">

                                                        </td>
                                                        <td>
                                                            <input class="qty2"
                                                                value="<?php echo $value->os_per ?>"
                                                                name="os_per[]"
                                                                style="border: 0;background-color: transparent;width:100%">

                                                        </td>
                                                        <td>

                                                            <input class="qty3" value="<?php echo $value->jangka_waktu_tenor ?>"
                                                                name="jangka_waktu_tenor[]"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td>
                                                            <input class="qty4"
                                                                value="<?php echo $value->tunggakan_bunga ?>"
                                                                name="tunggakan_bunga[]"
                                                                style="border: 0;background-color: transparent;width:100%">


                                                        </td>
                                                        <td>
                                                            <input class="qty5"
                                                                value="<?php echo  $value->tunggakan_denda ?>"
                                                                name="tunggakan_denda[]"
                                                                style="border: 0;background-color: transparent;width:100%">

                                                        </td>
                                                        <td><input value="<?php echo  $value->totalABC ?>"
                                                                class="qty6" id="totalABC" name="totalABC[]"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>



                                                    </tr>
                                                    <?php $_idx_loop++; $total = 0;?>
                                                    <?php } ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Total</th>
                                                       
                                                        <td hidden></td>
                                                        <td></td>
                                                        <td><input class="total1" value="<?php echo $pelunasan_row->total_plafond ?>"
                                                                readonly="" id="total_plafond" name="total_plafond"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td class="total2"><input value="<?php echo $pelunasan_row->total_os ?>"
                                                                readonly="" id="total_os" name="total_os"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td class="total3"></td>
                                                        <td class="total4"><input value="<?php echo $pelunasan_row->total_tunggakan_bunga ?>"
                                                                readonly="" id="total_tunggakan_bunga" name="total_tunggakan_bunga"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td class="total5"><input value="<?php echo $pelunasan_row->total_tunggakan_denda ?>"
                                                                readonly="" id="total_tunggakan_denda" name="total_tunggakan_denda"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td class="total6"><input value="<?php echo $pelunasan_row->total_keseluruhan_abc ?>"
                                                                readonly="" id="total_ABC" name="total_ABC"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>


                                         </div>
                                
                                        <div class="col-sm-11">
                                            <label for="inputFirstname">Agunan Yang di miliki oleh debitur</label>
                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tipe penjamin</th>
                                                        <th>Diskripsi</th>
                                                        <th>MV LPJ Lama</th>
                                                        <th>LV LPJ Lama</th>
                                                        <th>MV LPJ Baru</th>
                                                        <th>LV LPJ Baru</th>
                                                        <th>Keterangan Aprasial</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $_idx_loop = 1; $_data_length = count($pelunasan_result);
                                                          $totalPlafond = 0;
                                                          $totalA1 = 0;
                                                          $totalB1 = 0;
                                                          $totalC1 = 0;
                                                          $totalD1 =0;                                    
                                                    ?>
                                                    <?php foreach ($pelunasan_result as $key) { 
                                                           $totalA1 = $totalA1 + $key->mv_lama;
                                                           $totalB1 = $totalB1 + $key->lv_lama;
                                                           $totalC1= $totalC1 + $key->mv_baru; 
                                                           $totalD1=$totalD1 + $key->lv_baru; //+ $key->DUE_CH;   
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $_idx_loop; ?></td>
                                                        <td>
                                                            <textarea name="tipe_jaminan_agunan[]" cols="5" rows="8" style="width:100%"><?php echo $key->tipe_jaminan_agunan ?></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea name="desc_agunan[]"  cols="5" rows="8"style="width:100%"><?php echo $key->desc_agunan ?></textarea>
                                                        </td>
                                                        <td>
                                                            <input class="qty7"
                                                                value="<?php echo $key->mv_lama ?>"name="mv_lama[]"
                                                                style="width:100%!important;background-color: transparent; border: 0;">
                                                        </td>
                                                        <td>
                                                            <input class="qty81"
                                                                value="<?php echo $key->lv_lama ?>"name="lv_lama[]"
                                                                style="width:100%!important;background-color: transparent; border: 0;">

                                                        </td>
                                                        <td>
                                                            <input class="qty82" value="<?php echo $key->mv_baru ?>"
                                                                name="mv_baru[]"
                                                                style="width:100%!important;background-color: transparent; border: 0;">

                                                        </td>
                                                        <td>
                                                            <input class="qty83" value="<?php echo $key->lv_baru ?>"
                                                                name="lv_baru[]"
                                                                style="width:100%!important;background-color: transparent; border: 0;">
                                                        </td>
                                                        <td>
                                                            <textarea name="ket_appraisal[]" rows="8"><?php echo $key->ket_appraisal ?></textarea>
                                                        </td>

                                                        <?php if($_idx_loop == 0) { ?>

                                                        <?php } ?>

                                                    </tr>
                                                    <?php $_idx_loop++; ?>
                                                    <?php   } ?>
                                                    <tr>
                                                        <th colspan="3" align="center">Total</th>
                                                        <td><input class="total7" value="<?php   echo $pelunasan_row->total_mv_lama   ?>"
                                                                name="total_mv_lama"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td><input class="total81" value="<?php  echo $pelunasan_row->total_lv_lama  ?>"
                                                                name="total_lv_lama"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td><input class="total82" value="<?php  echo $pelunasan_row->total_mv_baru  ?>"
                                                                name="total_mv_baru"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td><input class="total83" value="<?php  echo $pelunasan_row->total_lv_baru  ?>"
                                                                name="total_lv_baru"
                                                                style="border: 0;background-color: transparent;width:100%">
                                                        </td>
                                                        <td><?php echo ''; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
            </div>
            <div class="form-group row">
                                        <div class="col-sm-11">
                                            <label for="inputFirstname">Pengajuan Pelunasan</label>
                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <thead>
                                                    <tr>
                                                        <th>Deskripsi</th>
                                                        <th>Kewajiban A</th>
                                                        <th>Pelunasan B</th>
                                                        <th>%</th>
                                                        <th>Sisa Kewajiban (A-B)=C</th>
                                                        <th>Hapus Tagihan C</th>
                                                        <th>%</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $_idx_loop = 1; $_data_length = count($pelunasan_result); ?>
                                                    <?php if(!empty($pelunasan_result)){ ?>
                                                    <?php $fs_idx = 0; ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($pelunasan_result  as $value) { ?>
                                                    <tr>
                                                        <td colspan="7"><?php echo 'Fasilitas :',$value->jenis_fasilitas ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input class="" value="<?php echo 'Pokok'  ?>"
                                                                name="pokok_a1[]"
                                                                style="width:100%!important; border: 1;">Pokok</td>
                                                        <td>
                                                            <input class="pokok1" value="<?php echo (float)$value->kewajiban_a1 ?>"
                                                                data-index="<?php echo $fs_idx; ?>"
                                                                name="kewajiban_a1[]" id="pokok1[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, false, 'pokok')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="pokok2" value="<?php echo (float)$value->kewajiban_a2 ?>"
                                                                name="kewajiban_a2[]" id="pokok2[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, false, 'pokok')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class=""  id="resultpersen1[<?php echo $i ?>]" value="<?php echo (float)$value->persen_a1 ?>" name="persen_a1[]"style="width:100px!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="pokok3"  value="<?php echo (float)$value->sisa_kewajiban_a1 ?>"
                                                            name="sisa_kewajiban_a1[]" id="pokok3[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, true, 'pokok')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="" id="tlthpstgh11[<?php echo $i ?>]" value="<?php echo (float)$value->hapustagih_a1 ?>" name="hapustagih_a1[]"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="" id="resultpersen2[<?php echo $i ?>]" value="<?php echo (float)$value->persen_a2 ?>"  name="persen_a2[]"style="width:100px!important; border: 1;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input class="" value="<?php echo 'Bunga'  ?>"
                                                                name="bunga_a1[]"
                                                                style="width:100%!important; border: 1;">Bunga</td>
                                                        <td>
                                                            <input class="bunga1" value="<?php echo (float) $value->bunga_1 ?>"
                                                            data-index="<?php echo $fs_idx; ?>"
                                                                name="bunga_1[]" id="bunga1[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, false, 'bunga')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="bunga2" value="<?php echo (float) $value->bunga_2 ?>"
                                                                name="bunga_2[]" id="bunga2[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, false, 'bunga')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class=""  id="resultpersen3[<?php echo $i ?>]" value="<?php echo (float)$value->persen_a3 ?>" name="persen_a3[]"style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="bunga3" value="<?php echo (float) $value->sisa_kewajiban_a2 ?>"
                                                            name="sisa_kewajiban_a2[]" id="bunga3[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, true, 'bunga')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="hapustagih_a2" name="hapustagih_a2[]" value="<?php echo (float) $value->hapustagih_a2 ?>"
                                                                id="bunga4[<?php echo $i ?>]"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class=""  id="resultpersen4[<?php echo $i ?>]"  value="<?php echo (float)$value->persen_a4 ?>"  name="persen_a4[]"style="width:100%!important; border: 1;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input class="" value="<?php echo 'Denda'  ?>"
                                                                name="denda_a1[]"
                                                                style="width:100%!important; border: 1;">Denda</td>
                                                        <td>
                                                            <input class="denda1" value="<?php echo (float) $value->denda_1 ?>"
                                                            data-index="<?php echo $fs_idx; ?>"
                                                                name="denda_1[]" id="denda1[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, false, 'denda')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="denda2" value="<?php echo (float) $value->denda_2 ?>"
                                                                name="denda_2[]" id="denda2[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, false, 'denda')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="" id="resultpersen5[<?php echo $i ?>]" value="<?php echo (float)$value->persen_a5 ?>" name="persen_a5[]"style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="denda3" value="<?php echo (float) $value->sisa_kewajiban_a3 ?>"
                                                            name="sisa_kewajiban_a3[]" id="denda3[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, true, 'denda')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="hapustagih_a3" name="hapustagih_a3[]" value="<?php echo (float) $value->hapustagih_a3 ?>"
                                                                id="denda4[<?php echo $i ?>]"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class=""  id="resultpersen6[<?php echo $i ?>]"  value="<?php echo (float)$value->persen_a6 ?>" name="persen_a6[]"style="width:100%!important; border: 1;">
                                                        </td>
                                                    </tr>
                                                    <?php $_idx_loop++; ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Total</th>
                                                        <td><input  value="<?php echo (float) $value->tltkewajiban ?>" class="tlt1"name="tltkewajiban[]" readonly="" id="ttlkewajiban[<?php echo $i?>]" data-index="<?php echo $fs_idx; ?>"></td>
                                                        <td><input  value="<?php echo (float) $value->ttldibayar ?>" class="tlt2"name="ttldibayar[]" readonly="" id="ttldibayar[<?php echo $i?>]"></td>
                                                        <td></td>
                                                        <td><input  value="<?php echo (float) $value->ttlsisakewajiban ?>" class="ttlhpstgh"name="ttlsisakewajiban[]"readonly="" id="ttlsisakewajiban[<?php echo $i?>]"></td>
                                                        <td><input  value="<?php echo (float) $value->ttlsisahapustagih ?>" class="hpstghtotal"name="ttlsisahapustagih[]"readonly="" id="ttlsisahapustagih[<?php echo $i?>]"></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php $fs_idx++; ?>
                                                    <?php $i++;  }  ?>
                                                    <?php } ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Grand Total</th>
                                                        <td><input value="<?php echo $pelunasan_row->grand_tltkewajiban ?>" class="tlt1"name="Grand_tltkewajiban" id="grandTotalKewajiban" readonly=""   data-index="<?php echo $fs_idx; ?>"></td>
                                                        <td><input value="<?php echo $pelunasan_row->grand_ttldibayar ?>" class="tlt2"name="Grand_ttldibayar" id="grandTotalDibayar"  readonly="" ></td>
                                                        <td></td>
                                                        <td><input value="<?php echo $pelunasan_row->grand_ttlsisakewajiban ?>" class="ttlhpstgh"name="Grand_ttlsisakewajiban" id="grandTotalSisaKewajiban" readonly="" ></td>
                                                        <td><input value="<?php echo $pelunasan_row->grand_ttlsisahapustagih ?>" class="hpstghtotal"name="Grand_ttlsisahapustagih" id="grandTotalSisaHapusTagih" readonly="" ></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                <div class="col-sm-11">
                        <label for="inputState">Catatan Kondisi saat ini</label>
                    <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote13"><?php echo $pelunasan_row->catatan_kondisi_saatini ?></div>
                    </div>
                        <textarea style="display: none;" name="summernote14" class="summernote14" id="sm3" cols="5" rows="3"></textarea>
                </div> 

            <div class="col-sm-11">
                <table class="tablex table-bordered table-striped table-hover" id="table2">
                    <tbody>
                        <tr>
                            <tr>
                                    <td><input name="porsi_pokok" id="porsi_pokok" value="<?php $pelunasan_row->porsi_pokok ?>"style="background-color:transparent;border:0px;"></td>
                                    <td>Rp</td>
                                    <td>
                                        <input value="<?php echo $pelunasan_row->hsl_porsi_pokok ?>"  class="porsipokok"  name="hsl_porsi_pokok" id="hsl_porsi_pokok" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;">  
                                    </td>
                                    
                            </tr>
                            <tr>
                                    <td><input name="total_dibayar" id="total_dibayar" value="<?php echo $pelunasan_row->total_dibayar ?>"style="background-color:transparent;border:0px;"></td>
                                    <td>Rp</td>
                                    <td>
                                        <input value="<?php echo  $pelunasan_row->hsl_dibayar ?>" class="ttldibayarkan"  name="hsl_dibayar" id="hsl_dibayar" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;">  
                                    </td>
                                    
                            </tr>
                            <tr>
                                    <td><input name="pengajuan_waive" id="pengajuan_waive" value="<?php echo $pelunasan_row->pengajuan_waive ?>"style="background-color:transparent;border:0px;"></td>
                                    <td>Rp</td>
                                    <td>
                                        <input value="<?php echo  $pelunasan_row->hsl_pengajuan_waive ?>" readonly=""  class="qty66" name="hsl_pengajuan_waive" id="hsl_pengajuan_waive" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;">  
                                    </td>
                                    
                            </tr>
                            <tr>
                                    <td><input name="ckpn_per" id="ckpn_per" value="<?php echo $pelunasan_row->ckpn_per ?>"style="background-color:transparent;border:0px;"></td>
                                    <td>Rp</td>
                                    <td>
                                        <input value="<?php echo  $pelunasan_row->hsl_ckpn_per ?>" class="ckpnper" name="hsl_ckpn_per" id="hsl_ckpn_per" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;">  
                                    </td>
                                    
                            </tr>
                            <tr>
                                    <td><input name="kekurangan_ckpn" id="kekurangan_ckpn" value="<?php echo $pelunasan_row->kekurangan_ckpn ?>"style="background-color:transparent;border:0px;"></td>
                                    <td>Rp</td>
                                    <td>
                                        <input value="<?php echo $pelunasan_row->hsl_kekurangan_ckpn ?>" class="kekuranganckpn" name="hsl_kekurangan_ckpn" id="hsl_kekurangan_ckpn" autocomplete="off"   style="border:1px; background-color:transparent;width: 75%;">  
                                    </td>
                                    
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div>   
               
               <div class="form-group row">
                     <div class="col-sm-11">
                              <label for="inputFirstname">Kondisi Penyelesaian</label>
                              <table id="myTable" border="1" style="width: 96%;">
                                  <th>Biaya Lain</th>
                                  <th>Dibayar**)</th>
                                  <th>Dihapus**)</th>
                                  <?php foreach ($kondisi_penjualan as $value2) { ?>
                                    <tr>
                                        <td><input value="<?php echo $value2->biayalain; ?>" type="text" name="biayalain[]" id="txtbiayalain[]" style="width:100%!important; border: 0;" /></td>
                                        <td><input value="<?php echo $value2->dibayar; ?>" type="text" name="dibayar[]" id="txtdibayar[]" style="width:100%!important; border: 0;" /></td>
                                        <td><input value="<?php echo $value2->dihapus; ?>" type="text" name="dihapus[]" id="txtdihapus[]" style="width:100%!important; border: 0;" /></td>
                                    </tr>
                                    <?php } ?>
                              </table>
                              <button type="button" id="btnAdd[]" class="button-add" onClick="insertRow8()"
                                  value="add">ADD</button>
                              <button type="button" id="btnAdd[]" class="button-add"
                                  onClick="myDeleteFunction8()" value="add">Delete</button>                                       
                      </div>
                <div class="col-sm-11">
                        <label for="inputState">Catatan Analisa Permasalahan Debitur</label>
                    <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote2"><?php echo $pelunasan_row->catatan_analisa_permasalahan_debitur ?></div>
                    </div>
                        <textarea style="display: none;" name="summernote4" class="summernote4" id="sm3" cols="5" rows="3"></textarea>
                </div>  
                <div class="form-group">
                    <div class="col-sm-11">
                        <label for="inputState">Catatan Kondisi Penyelesaian </label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote5"><?php echo $pelunasan_row->catatan_kondisi_penyelesaian ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote6" class="summernote6" id="sm3" cols="5" rows="3"></textarea>
                   </div>
                  <br>
                  <br>
                  <div class="col-sm-11">
                             <label for="inputFirstname">Upaya Penagihan Yang Telah Dilakukan</label>
                             <table id="myTable1" border="1" style="width: 96%;">
                                 <thead>
                                   
                                     <th>Deskripsi</th>
                                     <th>Pihak Yang Hadir</th>
                                 </thead>
                                 <tbody>
        
                                     <?php foreach ($ambil_upayapenagihan as $value3){ ?>
                            <tr>
                            
                            <td><input value="<?php echo $value3->desc_penagihan; ?>" type="text" name="desc_penagihan[]" id="desc_penagihan[]" style="border:0px;width: 100%;"></td>
                    
                            <td><input value="<?php echo $value3->pihak_hadir_penagihan; ?>" type="text" name="pihak_hadir_penagihan[]" id="pihak_hadir_penagihan[]" style="border:0px;width: 100%;"></td>
                        </tr>
                        <?php } ?>
                         
                                 </tbody>
                             </table>
                             <button type="button" id="btnAdd[]" class="button-add"
                                 onClick="insertRow1()" value="add">ADD</button>
                             <button type="button" id="btnAdd[]" class="button-add"
                                 onClick="myDeleteFunction1()" value="add">Delete</button>
                    </div>


                <div class="form-group">
                   <div class="col-sm-11">
                        <label for="inputState">Catatan Dasar Pertimbangan </label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote8"><?php echo  $pelunasan_row->catatan_dasar_pertimbangan ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote7" class="summernote7" id="sm3" cols="5" rows="3"></textarea>
                </div>
                <div class="col-sm-11">
                                                <label for="inputPostalCode">Lampiran </label>
                                                <table id="myTable2" border="1" style="width: 96%;">
                                                    <thead>
                                                        <tr>

                                                            <th>Dokumen</th>
                                                            <th>Ada</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                
                                <?php $indx=0; ?>
                                 <?php foreach ($ambil_lampiran as $value4){ ?>
                                   
                            <tr>
                                
                                <td><input value="<?php echo $value4->data_dokumen; ?>" type="text" name="datadokumen[]" id="datadokumen[]" 
                                style="width:100%!important; border: 2;" /></td>
                                    <?php $ada_checked = ''; ?>
                                    <?php if(!empty($value4->ada_dokumen)) { $ada_checked = 'checked'; } ?>
                                <td><input value="Ada"  <?php echo $ada_checked; ?>  type="checkbox" name="ada_dokumen_<?php echo $indx ?>" id="ada_dokumen" 
                                class="adadokumen" style="margin: 0 auto;display: flex;"><br></td>
                                 
                                   
                            </tr>
                            <?php $indx++ ?>
                                 <?php } ?>
                            </tbody>
                                                </table>
                                                <button type="button" id="btnAdd[]" class="button-add"
                                                    onClick="insertRow2()" value="add">ADD</button>
                                                <button type="button" id="btnAdd[]" class="button-add"
                                                    onClick="myDeleteFunction2()" value="add">Delete</button>
                                            </div>
                <div class="col-sm-11">
                        <label for="inputState">Rekomendasi penyelesaian Kredit</label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote11"><?php echo  $pelunasan_row->rekomendasi_penyelesaian_kredit ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote12" class="summernote12" id="sm3" cols="5" rows="3"></textarea>
                </div>
                   </div> 
                </div>
                
            </div>
                <button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit" style="display: none">Save</button>
                <button type="button" class="btn btn-primary px-4 float-right" onclick="test()">Save</button>
                <a href="<?php echo base_url ('create_document/read_mrpk_pelunasan')?>" button type="submit" class="btn btn-primary px-4 float-right">Cancel</button></a>
              <!--  <input type="button"  value="Print 1st Div" onclick="javascript:printDiv('printablediv')" /> -->
            </form>
        </div>
        </div>
    </div>
</div>
 </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
  //var dasarpertimbangan = $('.summernote1').summernote();      
  //$('.summernote2').summernote();
  $('.summernote1').summernote();
  $('.summernote2').summernote();
  $('.summernote5').summernote();
   $('.summernote8').summernote();
   $('.summernote11').summernote();
   $('.summernote13').summernote();
});
    function test(){
        //var test = $('.summernote3').summernote('code');
        //alert(test.editable());
        //alert($('#sm3').summernote('code'));
        var text = document.getElementsByClassName('note-editable');
        //alert(text[0].innerText+" - "+text[1].innerText);
        $('.summernote3').val(text[0].innerHTML);
        $('.summernote4').val(text[1].innerHTML);
        $('.summernote6').val(text[2].innerHTML);
        $('.summernote7').val(text[3].innerHTML);
        $('.summernote12').val(text[4].innerHTML);
        $('.summernote14').val(text[5].innerHTML);

        $('#btn-submit').click();
    }
</script>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              // "" + 
              // divElements + "</table>";
               "<html><head><title></title></head><body><table><th><tr><td></td></tr></th>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
    <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/forms-advanced.js') ?>"></script>
 <!-- style="border: 0; text-overflow: '';text-indent: 1px;-moz-appearance:none;-webkit-appearance:none;" -->
 <script type="text/javascript">
    $(".chb1").change(function()
    {
    $(".chb1").prop('checked',false);
    $(this).prop('checked',true);

    });

    $(".chb2").change(function()
    {
    $(".chb2").prop('checked',false);
    $(this).prop('checked',true);
    });
     $(".chb3").change(function()
    {
    $(".chb3").prop('checked',false);
    $(this).prop('checked',true);
    });
      $(".chb4").change(function()
    {
    $(".chb4").prop('checked',false);
    $(this).prop('checked',true);
    });
     $(".chb5").change(function()
    {
    $(".chb5").prop('checked',false);
    $(this).prop('checked',true);
    });
</script>
</body>