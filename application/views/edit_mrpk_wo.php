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
.inputx{
    min-width:100px!important;
    width: 1px!important;
    padding-right: 0px!important;
    margin-left:5px; 
   
}

</style>

<script>

    $(document).on("keyup", ".qty", function() {
        var sum = 0;
        //var number = Number(sum.replace(/[^0-9.-]+/g,""));
        //console.log(number);
        $(".qty").each(function() {
            var val = $(this).val();
            var number = Number(val.replace(/[^0-9.-]+/g, ""));
            sum += +number;
        });
        $('.total1').val(sum);
    });

    $(document).on("keyup", ".qty2", function() {
        var sum = 0;
        var i = $(".qty2").index(this); //get index
        var total = 0;
        $(".qty2").each(function() {
            sum += +$(this).val();
        });
        $('#totalBakiDebet').val(sum);
        var qty2 = $(this).val();
        var qty4 = $(".qty4").eq(i).val();
        var qty5 = $(".qty5").eq(i).val();
        var qty6 = parseInt(qty2) + parseInt(qty4) + parseInt(qty5);
        $("#totalABC").eq(i).val(qty6);
        $(".qty6").eq(i).val(qty6); // equal to set index
        //var total2 = $('.total2').text();
        var total2 = $('#totalBakiDebet').val();
        var total4 = $('#totalDueBunga').val();
        var total5 = $('#totalDUE_CH').val();
        //var total4 = $('.total4').text();

        //var total5 = $('.total5').text();
        total = parseInt(total2) + parseInt(total4) + parseInt(total5);
        //$('.total6').val(total);
        $('#total_ABC').val(total);
    });

    $(document).on("keyup", ".qty3", function() {
        var sum = 0;
        $(".qty3").each(function() {
            sum += +$(this).val();
        });
        $('.total3').html(sum);
    });

    $(document).on("keyup", ".qty4", function() {
        var sum = 0;
        var i = $(".qty4").index(this);
        $(".qty4").each(function() {
            sum += +$(this).val();
        });
        //$('.total4').html(sum);
        $('#totalDueBunga').val(sum);
        var qty4 = $(this).val();
        var qty2 = $(".qty2").eq(i).val();
        var qty5 = $(".qty5").eq(i).val();
        var qty6 = parseInt(qty4) + parseInt(qty2) + parseInt(qty5);
        $("#totalABC").eq(i).val(qty6);
        $(".qty6").eq(i).val(qty6);
        //var total2 = $('.total2').text();
        var total2 = $('#totalBakiDebet').val();
        var total4 = $('#totalDueBunga').val();
        var total5 = $('#totalDUE_CH').val();
        //$('.total4').text();
        //var total5 = $('.total5').text();
        total = parseInt(total2) + parseInt(total4) + parseInt(total5);
        //$('.total6').val(total);
        $('#total_ABC').val(total);
    });

    $(document).on("keyup", ".qty5", function() {
        var sum = 0;
        var i = $(".qty5").index(this);
        $(".qty5").each(function() {
            sum += +$(this).val();
        });
        $('#totalDUE_CH').val(sum);
        var qty5 = $(this).val();
        var qty2 = $(".qty2").eq(i).val();
        var qty4 = $(".qty4").eq(i).val();
        var qty6 = parseInt(qty5) + parseInt(qty2) + parseInt(qty4);
        $("#totalABC").eq(i).val(qty6);
        $(".qty6").eq(i).val(qty6);
        //var total2 = $('.total2').text();
        var total2 = $('#totalDueBunga').val();
        var total4 = $('#totalDueBunga').val();
        var total5 = $('#totalDUE_CH').val();
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
        $(".qty7").each(function() {
            var val = $(this).val();
            var number = Number(val.replace(/[^0-9.-]+/g, ""));
            sum += +number;
        });
        $('.total7').val(sum);
    });
    $(document).on("keyup", ".qty8", function() {
        var sum = 0;
        //var number = Number(sum.replace(/[^0-9.-]+/g,""));
        //console.log(number);
        $(".qty8").each(function() {
            var val = $(this).val();
            var number = Number(val.replace(/[^0-9.-]+/g, ""));
            sum += +number;
        });
        $('.total8').val(sum);
    });
    $(document).on("keyup", ".qty9", function() {
        var sum = 0;
        //var number = Number(sum.replace(/[^0-9.-]+/g,""));
        //console.log(number);
        $(".qty9").each(function() {
            var val = $(this).val();
            var number = Number(val.replace(/[^0-9.-]+/g, ""));
            sum += +number;
        });
        $('.total9').val(sum);
    });
    $(document).on("keyup", ".qty10", function() {
        var sum = 0;
        //var number = Number(sum.replace(/[^0-9.-]+/g,""));
        //console.log(number);
        $(".qty10").each(function() {
            var val = $(this).val();
            var number = Number(val.replace(/[^0-9.-]+/g, ""));
            sum += +number;
        });
        $('.total10').val(sum);
    });

    $(document).on("keyup", ".qty12", function() {
        var sum = 0;
        var i = $(".qty12").index(this); //get index
        var total = 0;
        $(".qty12").each(function() {
            sum -= -$(this).val();
        });
        $('#totalkewajiban').val(sum);
        var qty12 = $(this).val();
        var qty14 = $(".qty4").eq(i).val();
        var qty15 = $(".qty5").eq(i).val();
        var qty16 = parseInt(qty12) - parseInt(qty14) - parseInt(qty15);
        $("#total_hps").eq(i).val(qty16);
        $(".qty16").eq(i).val(qty16); // equal to set index
        //var total2 = $('.total2').text();
        var total12 = $('#totalBakiDebet').val();
        var total14 = $('#totalDueBunga').val();
        var total15 = $('#totalDUE_CH').val();
        //var total14 = $('.total4').text();

        //var total5 = $('.total5').text();
        total = parseInt(total12) - parseInt(total14) - parseInt(total15);
        //$('.total16').val(total);
        $('#total_Akhir_hps').val(total);
    });
    $(document).on("keyup", ".qty14", function() {
        var sum = 0;
        var i = $(".qty4").index(this);
        $(".qty14").each(function() {
            sum -= -$(this).val();
        });
        //$('.total4').html(sum);
        $('#totalPelunasan').val(sum);
        var qty14 = $(this).val();
        var qty12 = $(".qty12").eq(i).val();
        var qty15 = $(".qty15").eq(i).val();
        var qty16 = parseInt(qty14) - parseInt(qty12) - parseInt(qty15);
        $("#total_hps").eq(i).val(qty16);
        $(".qty6").eq(i).val(qty6);
        //var total2 = $('.total2').text();
        var total12 = $('#totalBakiDebet').val();
        var total14 = $('#totalDueBunga').val();
        var total15 = $('#totalDUE_CH').val();
        //$('.total4').text();
        //var total5 = $('.total5').text();
        total = parseInt(total2) - parseInt(total4) - parseInt(total5);
        //$('.total16').val(total);
        $('#total_Akhir_hps').val(total);
    });
    $(document).on("keyup", ".qty15", function() {
        var sum = 0;
        var i = $(".qty15").index(this);
        $(".qty15").each(function() {
            sum -= -$(this).val();
        });
        $('#totalsiswakewajiban').val(sum);
        var qty15 = $(this).val();
        var qty12 = $(".qty2").eq(i).val();
        var qty14 = $(".qty4").eq(i).val();
        var qty16 = parseInt(qty15) - parseInt(qty12) - parseInt(qty14);
        $("#total_hps").eq(i).val(qty16);
        $(".qty16").eq(i).val(qty16);
        //var total12 = $('.total12').text();
        var total2 = $('#totalDueBunga').val();
        var total4 = $('#totalDueBunga').val();
        var total5 = $('#totalDUE_CH').val();
        //var total4 = $('.total4').text();
        //var total5 = $('.total5').text();
        total = parseInt(total2) - parseInt(total4) - parseInt(total5);
        //$('.total6').val(total);
        $('#total_Akhir_hps').val(total);
    });


    

    // $(document).on("keyup", ".pokok1", function() { 
    //     var i = $(".pokok1").index(this); //get index
    //    //total ke samping
      
    //     var pokok1 = $(this).val();
    //     var pokok2 = $(".pokok2").eq(i).val();
    //     var denda1 = $(".denda1").eq(i).val();
    //     if(!pokok2){pokok2 = 0;}
    //     var pokok3 = parseInt(pokok1) - parseInt(pokok2);
    //     $(".pokok3").eq(i).val(pokok3); // equal to set index
    //     // // total ke bawah
    //     var pokok1 = $(this).val();
    //     var bunga1 = $(".bunga1").eq(i).val();
    //     var denda1 = $(".denda1").eq(i).val();
    //     if(!pokok1){pokok1 = 0;}
    //     if(!bunga1){bunga1 = 0;}
    //     if(!denda1){denda1 = 0;}
    //     var total1 = parseInt(pokok1) + parseInt(bunga1) + parseInt(denda1);
    //     $('.tlt1').eq(i).val(total1);
    //     totalhpstgh(i);
    // });

    // $(document).on("keyup", ".pokok2", function() {
    //     var i = $(".pokok2").index(this);
       
    //     //total kurang samping
    //     var pokok2 = $(this).val();
    //     var pokok1 = $(".pokok1").eq(i).val();
    //     if(!pokok2){pokok2 = 0;}
    //     if(!pokok1){pokok1 = 0;}
    //     var pokok3 = parseInt(pokok2) - parseInt(pokok1);
    //     $(".pokok3").eq(i).val(pokok3);
    //     //total tambah bawah
    //     var pokok2 = $(this).val();
    //     var bunga2 = $(".bunga2").eq(i).val();
    //     var denda2 = $(".denda2").eq(i).val();
    //     if(!pokok2){pokok2 = 0;}
    //     if(!bunga2){bunga2 = 0;}
    //     if(!denda2){denda2 = 0;}
    //     var total2 = parseInt(pokok2) + parseInt(bunga2) + parseInt(denda2);
    //     $('.tlt2').eq(i).val(total2);
      
    // });
    // $(document).on("keyup", ".bunga1", function() {
    //     var i = $(".bunga1").index(this);
        
    //     //total kurang samping
    //     var bunga1 = $(this).val();
    //     var bunga2 = $(".bunga2").eq(i).val();
    //     if(!bunga1){bunga1 = 0;}
    //     if(!bunga2){bunga2 = 0;}

    //     var bunga3 = parseInt(bunga1) - parseInt(bunga2);
    //     $(".bunga3").eq(i).val(bunga3);

    //     var bunga1 = $(this).val();
    //     var pokok1 = $(".pokok1").eq(i).val();
    //     var denda1 = $(".denda1").eq(i).val();
    //     if(!bunga1){bunga1 = 0;}
    //     if(!pokok1){pokok1 = 0;}
    //     if(!denda1){denda1 = 0;}
    //     var total2 = parseInt(pokok1) + parseInt(bunga1) + parseInt(denda1);
    //     $('.tlt1').eq(i).val(total2);
    //     totalhpstgh(i);
    // });

    // $(document).on("keyup", ".bunga2", function() {
       
    //     var i = $(".bunga2").index(this);
    //     //total disamping
    //     var bunga2 = $(this).val();
    //     var bunga1 = $(".bunga1").eq(i).val();
    //     if(!bunga1){bunga1 = 0;}
    //     if(!bunga2){bunga2 = 0;}
    //     var bunga3 = parseInt(bunga2) - parseInt(bunga1);
    //     $(".bunga3").eq(i).val(bunga3);
      
    //     //total dibawah
    //     var bunga2 = $(this).val();
    //     var pokok2 = $(".pokok2").eq(i).val();
    //     var denda2 = $(".denda2").eq(i).val();
    //     if(!bunga2){bunga2 = 0;}
    //     if(!pokok2){pokok2 = 0;}
    //     if(!denda2){denda2 = 0;}
    //     var total2 = parseInt(pokok2) + parseInt(bunga2) + parseInt(denda2);
    //     $('.tlt2').eq(i).val(total2);
    // });
   
    // $(document).on("keyup", ".denda1", function() {
    //     var i = $(".denda1").index(this);
    //    //total samping kurang
    //     var denda1 = $(this).val();
    //     var denda2 = $(".denda2").eq(i).val();
    //     if(!denda2){denda2 = 0;}
    //     if(!denda1){denda1 = 0;}
    //     var denda3 = parseInt(denda1) - parseInt(denda2);
    //     $(".denda3").eq(i).val(denda3);

    //     //total tambah bawah
    //     var denda1 = $(this).val();
    //     var pokok1 = $(".pokok1").eq(i).val();
    //     var bunga1 = $(".bunga1").eq(i).val();
    //     if(!denda1){denda1 = 0;}
    //     if(!pokok1){pokok1 = 0;}
    //     if(!bunga1){bunga1 = 0;}
    //     var total2 = parseInt(pokok1) + parseInt(bunga1) + parseInt(denda1);
    //     $('.tlt1').eq(i).val(total2);
    //     totalhpstgh(i);
        

    // });

    // $(document).on("keyup", ".denda2", function() {
        
    //     var i = $(".denda2").index(this);
       
        
    //     //total samping kurang
    //     var denda2 = $(this).val();
    //     var denda1 = $(".denda1").eq(i).val();
    //     if(!denda2){denda2 = 0;}
    //     if(!denda1){denda1 = 0;}
    //     var denda3 = parseInt(denda2) - parseInt(denda1);
    //     $(".denda3").eq(i).val(denda3);

    //     //total tambah bawah
    //     var bunga2 = $(this).val();
    //     var pokok2 = $(".pokok2").eq(i).val();
    //     var denda2 = $(".denda2").eq(i).val();
    //     if(!bunga2){bunga2 = 0;}
    //     if(!denda2){denda2 = 0;}
    //     if(!pokok2){pokok2 = 0;}
    //     var total2 = parseInt(pokok2) + parseInt(bunga2) + parseInt(denda2);
    //     $('.tlt2').eq(i).val(total2);
      

      
    // });

    // $(document).on("keyup", ".hapustagih_a1", function() {
        
    //     var i = $(".hapustagih_a1").index(this);
       

    //     //total tambah bawah
    //     var hapustagih_a1 = $(this).val();
    //     var hapustagih_a2 = $(".hapustagih_a2").eq(i).val();
    //     var hapustagih_a3 = $(".hapustagih_a3").eq(i).val();
    //     if(!hapustagih_a1){hapustagih_a1 = 0;}
    //     if(!hapustagih_a2){hapustagih_a2 = 0;}
    //     if(!hapustagih_a3){hapustagih_a3 = 0;}
    //     var tlthpstgh1 = parseInt(hapustagih_a1) + parseInt(hapustagih_a2) + parseInt(hapustagih_a3);
    //     $('.hpstghtotal').eq(i).val(tlthpstgh1);
    //     // hpstghtotal(i);
      
      
    // });

    
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
      
    });


    function totalhpstgh(index){
     
        var a = $('.pokok3').eq(index).val();
        var b = $('.bunga3').eq(index).val();
        var c =  $('.denda3').eq(index).val();

        if(!a){a = 0;}
        if(!b){b = 0;}
        if(!c){c = 0;}
        var ttlhpstgh = parseInt(a) + parseInt(b) + parseInt(c);
        $('.ttlhpstgh').eq(index).val(ttlhpstgh);
        // console.log(a);
        // console.log(b);
        // console.log(c);
    }

</script>

<script type="text/javascript">
        function insertRow() {
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

    function myDeleteFunction() {
        document.getElementById("myTable").deleteRow(2);
    }
</script>

<script type="text/javascript">
        function insertRow1() {
        var table = document.getElementById("myTable1");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "tgl_penagihan[]";
        t1.type = "date";
        t1.name = "tgl_penagihan[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "desc_penagihan[]";
        t2.name = "desc_penagihan[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
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
        document.getElementById("myTable1").deleteRow1(2);
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
</head>
<body>
     
    <div id="wrapper">
<div class="pagetabel-content.sidebar-pageTabel right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
 <div class="page-content-wrapper">
    <div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form action="<?php echo base_url('Create_Document/update_mrpk_wo/').$wo_row->cif.'-'.$wo_row->id_wo ;?>" method="POST">
            <div id="printablediv">
                <div class="form-group row">
                     <div class="col-sm-11">
                        <label for="inputState">Jenis Pengajuan</label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote1"><?php echo $wo_row->jenis_pengajuan ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote3"class="summernote3" id="sm3" cols="5" rows="3"></textarea>
                   </div>
                        <div class="col-sm-11">
                        <label for="inputFirstname">Informasi Debitur</label>
                       
                        <table id="printTable" class="table table-bordered table-striped table-hover dt-responsive non-responsive" style="width:95%;height: 10%;">
                        <tbody>

                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input value="<?php echo $wo_row->nama_debitur ?>" name="nama_debitur"
                                       type="text" style="width:100% ; border: 1;">
                            </td>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $wo_row->alamat_debitur ?>" name="alamat_debitur"  
                                       type="text" style="width:100% ; border: 1;">
                                    
                                    </td>

                            </tr>
                             <tr>
                                <td>Cif</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $wo_row->cif ?>" name="cif" readonly=""  
                                       type="text" style="width:100% ; border: 1;">
                               </td>
                                
                            </tr>
                            <tr>
                                <td>Bidang Usaha</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $wo_row->bidang_usaha ?>"name="bidang_usaha"  
                                       type="text" style="width:100% ; border: 1;">
                                   
                                </td>

                            </tr>
                            <tr>
                                <td>Lokasi Usaha</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $wo_row->lokasi_usaha ?>" name="lokasi_usaha"  
                                      type="text" style="width:100% ; border: 1;">
                                   
                                </td>
                            </tr>

                            <tr>
                                <td>Nama Group Usaha</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $wo_row->nama_group_usaha ?>" name="nama_group_usaha"  
                                       type="text" style="width:100% ; border: 1;">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Debitur Sejak</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $wo_row->debitur_sejak ?>" name="debitur_sejak"  
                                       type="text" style="width:100% ; border: 1;">
                                </td>
                            </tr>
                             <tr>
                                <td>Menunggak Sejak</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $wo_row->menunggak_sejak ?>" name="menunggak_sejak"  
                                       type="text" style="width:100% ; border: 1;">
                                </td>
                            </tr>
                            <tr>
                                <td>Hari Tunggakan (DPD)</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $wo_row->dpd ?>" name="dpd"  
                                       type="text" style="width:100% ; border: 1;">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Kolektibilitas</td>
                                <td>:</td>
                                <td>
                                     <input value="<?php echo $wo_row->kolektibilitas ?>" name="kolektibilitas"  
                                       type="text" style="width:100% ; border: 1;">
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>CKPN</td>
                                <td>:</td>
                                <td>
                                    <input value="<?php echo $wo_row->ckpn ?>"
                                     name="ckpn"  
                                       type="text" style="width:100% ; border: 1;">
                                    </td>
                            </tr>
                        </tr>
                        </tbody>
                        </table>
                       
                    </div>
                                       <div class="col-sm-11">
                        <label for="inputFirstname">Fasilitias yang dimiliki oleh debitur</label>
                        
                        <table   class="tablex table-bordered table-striped table-hover" id="table2">
        
        <tr>
          <th rowspan="9">No</th>
          <th hidden>id</th>
          <th hidden>NomorRekening</th>
       <th>Jenis <p>Fasilitas</p></th>
       <th>Plafond</th>
       <th>O/S per <p><?php echo  date('d F Y') ?></p><p> A</p></th>
       <th>Jangka <p> Waktu/tenor</p></th>
       <th>Tunggakan <p>Bunga(Rp)</p> <p> B</p></th>
       <th>Tunggakan <p>Denda</p> <p> C</p></th>
       <th>Total<p>(A+B+C)</p></th>
        </tr>
   <tbody>
   
  
    <?php
        $_idx_loop = 1;
        $_data_length = count($wo_result);
    ?>
    <?php foreach ($wo_result as $value) { ?>
  <tr>
           
           <td><?php echo $_idx_loop ?></td>
                <td hidden>
                  
                   <input  value="<?php echo $value->id_wo ?>"   name="id_wo[]" style="border: 0;background-color: transparent;width:100%">
               </td>
              
               <td hidden>
                  
                   <input  value="<?php echo $value->NomorRekening ?>"   name="norek[]" style="border: 0;background-color: transparent;width:100%">
               </td>

               <td>
                   <textarea  name="jenis_fasilitas[]" cols="15"style="background-color: transparent;"  rows="5"><?php echo $value->jenis_fasilitas ?></textarea>
               </td>
              
               <td>
                    <input class="qty" value="<?php echo $value->plafond ?>"  name="plafond[]" style="width:110px!important; border: 0;background-color: transparent">
                   
               </td>
               <td>
                    <input class="qty2" value="<?php echo $value->bakidebet ?>"   name="os_per[]" style="border: 0;background-color: transparent;width:100%">
     
               </td>
               <td>
                  
                   <input class="qty3" value="<?php echo $value->jangka_waktu_tenor ?>"   name="jangka_waktu_tenor[]" style="border: 0;background-color: transparent;width:100%">
               </td>
               <td>
                    <input class="qty4" value="<?php echo $value->tunggakan_bunga ?>"   name="tunggakan_bunga[]" style="border: 0;background-color: transparent;width:100%">
                   
                   
               </td>           
               <td>
                      <input class="qty5" value="<?php echo $value->tunggakan_denda ?>"   name="tunggakan_denda[]" style="border: 0;background-color: transparent;width:100%">
                   
               </td>
               <td><input value="<?php echo  $value->totalABC ?>" class="qty6"  id="totalABC"  name="totalABC[]" style="border: 0;background-color: transparent;width:100%" ></td>
             
             
               
           </tr>
   <?php $_idx_loop++; $total = 0;?>
    <?php } ?>
    <tr>
       <th colspan="1" align="center">Total</th>
        <td hidden></td>
      <td></td>
       <td ><input class="total1" value ="<?php echo $value->totalplafond ?>" readonly=""id="totalplafond" name="totalplafond"style="border: 0;background-color: transparent;width:100%"  ></td>
       <td class="total2"><input value ="<?php echo $value->totalBakiDebet ?>" readonly="" id="totalBakiDebet" name="totalBakiDebet"style="border: 0;background-color: transparent;width:100%"  ></td>
       <td class="total3"></td>
       <td class="total4"><input value ="<?php echo $value->totalDueBunga ?>" readonly=""  id="totalDueBunga" name="totalDueBunga" style="border: 0;background-color: transparent;width:100%"  ></td>
       <td class="total5"><input value ="<?php echo $value->totalDUE_CH ?>" readonly=""id="totalDUE_CH" name="totalDUE_CH" style="border: 0;background-color: transparent;width:100%" ></td>
       <td class="total6"><input value ="<?php echo $value->total_ABC ?>" readonly=""  id="total_ABC" name="total_ABC" style="border: 0;background-color: transparent;width:100%" ></td>
    </tr>
   
   </tbody>
   </table>
                    
                    </div>
                <div class="col-sm-11">
                    <label for="inputFirstname">Agunan Yang di miliki oleh debitur</label>
                    <table  class="tablex table-bordered table-striped table-hover" id="table2">
                         <thead>
                             <tr>
                            <th>No</th>
                            <th hidden>id</th>
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
                             
                             <?php $_idx_loop = 1; $_data_length = count($wo_result); ?>
                            <?php foreach ($wo_result as $key) { ?>
                        <tr>
                                
                            <td><?php echo $_idx_loop; ?></td>
                            <td hidden>
                                <textarea name="id_pt_bam[]"   rows="1"style="background-color:transparent"><?php echo $key->id_pt_bam ?></textarea>
                            
                             </td>
                            <td>
                                <textarea name="tipe_jaminan_agunan[]"   rows="1"style="background-color:transparent"><?php echo $key->tipe_jaminan ?></textarea>
                            
                             </td>
                         
                            <td>
                                <textarea  name="desc_agunan[]" rows="8" style="background-color:transparent"><?php echo $key->desk_agunan ?></textarea>
                               
                            </td>
                            <td>
                                <input class="qty7" value="<?php echo $key->mv_lama ?>"   name="mv_lama[]" style="width:100%!important; border: 0;background-color:transparent">
                            </td>
                            <td>
                                <input class="qty8" value="<?php echo $key->lv_lama ?>"   name="lv_lama[]" style="width:100%!important; border: 0;background-color:transparent">
                                
                            </td> 
                             <td>
                                 <input class="qty9" value="<?php echo $key->mv_baru ?>"   name="mv_baru[]" style="width:100%!important; border: 0;background-color:transparent">
                                 
                             </td>
                            <td>
                                <input class="qty10" value="<?php echo $key->lv_baru ?>"   name="lv_baru[]" style="width:100%!important; border: 0;background-color:transparent">
                            </td> 
                            <td>
                                <textarea name="ket_appraisal[]"   rows="8" style="width:100%!important; border: 0;background-color:transparent"><?php echo $key->ket_appraisal ?></textarea>
                              
                            </td> 
                            
                             <?php if($_idx_loop == 0) { ?>
                                  
                                <?php } ?>
                                
                        </tr>
                        <?php $_idx_loop++; ?>
                      <?php   } ?>
                      <tr>
                            <th colspan="3" align="center">Total</th>
                            
                            <td hidden></td>
                            <td><input class="total7" value="<?php echo $wo_row -> total_mv_lama  ?>" readonly="" name="total_mv_lama" style="width:100%;background-color:transparent"></td>
                            <td><input class="total8" value="<?php echo $wo_row -> total_lv_lama; ?>" readonly="" name="total_lv_lama" style="width:100%;background-color:transparent"></td>
                            <td><input class="total9" value="<?php echo $wo_row -> total_mv_baru; ?>" readonly="" name="total_mv_baru" style="width:100%;background-color:transparent"></td>
                            <td><input class="total10" value="<?php echo $wo_row -> total_lv_baru;?>" readonly="" name="total_lv_baru"style="width:100%;background-color:transparent"></td>
                            <td></td>
                            
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
                                                        <th>Sisa Kewajiban (A-B)=C</th>
                                                        <th>Hapus Tagihan C</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php $_idx_loop = 1; $_data_length = count($wo_result); ?>
                                                    <?php if(!empty($wo_result)){ ?>
                                                    <?php $fs_idx = 0; ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($wo_result  as $value) { ?>
                                                    <tr>
                                                        <td colspan="5"><?php echo 'Fasilitas :',$value->jenis_fasilitas ?>
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
                                                            <input class="pokok3"  value="<?php echo (float)$value->sisa_kewajiban_a1 ?>"
                                                            name="sisa_kewajiban_a1[]" id="pokok3[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, true, 'pokok')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="" id="tlthpstgh11[<?php echo $i ?>]" value="<?php echo (float)$value->hapustagih_a1 ?>" name="hapustagih_a1[]"
                                                                style="width:100%!important; border: 1;">
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
                                                            <input class="bunga3" value="<?php echo (float) $value->sisa_kewajiban_a2 ?>"
                                                            name="sisa_kewajiban_a2[]" id="bunga3[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, true, 'bunga')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="hapustagih_a2" name="hapustagih_a2[]" value="<?php echo (float) $value->hapustagih_a2 ?>"
                                                                id="bunga4[<?php echo $i ?>]" 
                                                                style="width:100%!important; border: 1;">
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
                                                            <input class="denda3"  value="<?php echo (float) $value->sisa_kewajiban_a3 ?>"
                                                            name="sisa_kewajiban_a3[]" id="denda3[<?php echo $i ?>]" onkeyup="onKeyPress(<?php echo $i?>, true, 'denda')"
                                                                style="width:100%!important; border: 1;">
                                                        </td>
                                                        <td>
                                                            <input class="hapustagih_a3" name="hapustagih_a3[]"  value="<?php echo (float) $value->hapustagih_a3 ?>"
                                                                id="denda4[<?php echo $i ?>]"
                                                                style="width:100%!important; border: 1;">
                                                        </td>

                                                    </tr>


                                                    <?php $_idx_loop++; ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Total</th>
                                                        <td><input value="<?php echo $value->tltkewajiban ?>" class="tlt1"name="tltkewajiban[]" readonly="" id="ttlkewajiban[<?php echo $i?>]" data-index="<?php echo $fs_idx; ?>"></td>
                                                        <td><input value="<?php echo $value->ttldibayar ?>" class="tlt2"name="ttldibayar[]" readonly="" id="ttldibayar[<?php echo $i?>]"></td>
                                                        <td><input value="<?php echo $value->ttlsisakewajiban ?>" class="ttlhpstgh"name="ttlsisakewajiban[]"readonly="" id="ttlsisakewajiban[<?php echo $i?>]"></td>
                                                        <td><input value="<?php echo $value->ttlsisahapustagih ?>" class="hpstghtotal"name="ttlsisahapustagih[]"readonly="" id="ttlsisahapustagih[<?php echo $i?>]"></td>

                                                    </tr>
                                                    <?php $fs_idx++; ?>
                                                    <?php $i++;  }  ?>
                                                    <?php } ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Grand Total</th>
                                                        <td><input  value="<?php echo $wo_row->grand_tltkewajiban ?>" class="tlt1"name="Grand_tltkewajiban" id="grandTotalKewajiban" readonly=""  data-index="<?php echo $fs_idx; ?>"></td>
                                                        <td><input  value="<?php echo $wo_row->grand_ttldibayar ?>" class="tlt2"name="Grand_ttldibayar" id="grandTotalDibayar" readonly="" ></td>
                                                        <td><input  value="<?php echo $wo_row->grand_ttlsisakewajiban ?>" class="ttlhpstgh"name="Grand_ttlsisakewajiban" id="grandTotalSisaKewajiban" readonly="" ></td>
                                                        <td><input  value="<?php echo $wo_row->grand_ttlsisahapustagih ?>" class="hpstghtotal"name="Grand_ttlsisahapustagih" id="grandTotalSisaHapusTagih" readonly="" ></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> 
                </div>

                <div class="form-group row">
                     <div class="col-sm-11">
                        <label for="inputState">Catatan Kondisi Penyelesaian </label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote2"><?php echo $wo_row->catatan_kondisi_penyelesaian ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote4" class="summernote4" id="sm3" cols="5" rows="3"></textarea>
                </div>  
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
<button type="button" id="btnAdd[]" class="button-add" onClick="insertRow()"value="add">ADD</button>
        <button type="button" id="btnAdd[]" class="button-add"onClick="myDeleteFunction()" value="add">Delete</button>
                    </div>
                   
                <div class="form-group">
                  <div class="col-sm-11">
                        <label for="inputState">Catatan Analisa Permasalahan Debitur </label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote5"><?php echo $wo_row->permasalahan_debitur ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote6" class="summernote6" id="sm3" cols="5" rows="3"></textarea>
                </div>  
                  <br>
                  <br>

                    <div class="col-sm-11">
                        <label for="inputFirstname"> Upaya Penagihan Yang Telah Dilakukan</label>
                     <table id="myTable1" border="1" style="width: 96%;">
                         <thead>		 	
                         <th>Tanggal</th>
                         <th>Deskripsi</th>
                         <th>Pihak Yang Hadir</th>
                          
                         </thead>   
                        <tbody>  
                            <?php foreach ($ambil_upayapenagihan as $value3){ ?>
                        <tr>
                            
                            <td><input value="<?php echo $value3->tgl_penagihan; ?>" type="date" name="tgl_penagihan[]" id="idtgl_penagihan[]" style="border:0px;width: 100%;"></td>
                            <td><input value="<?php echo $value3->desc_penagihan; ?>" type="text" name="desc_penagihan[]" id="desc_penagihan[]" style="border:0px;width: 100%;"></td>
                            <td><input value="<?php echo $value3->pihak_hadir_penagihan; ?>" type="text" name="pihak_hadir_penagihan[]" id="pihak_hadir_penagihan[]" style="border:0px;width: 100%;"></td>
                        </tr>
                        <?php } ?>
                         
                        </tbody>
                        </table>
                        <button type="button" id="btnAdd[]" class="button-add"
                                                    onClick="insertRow1()"  value="add">ADD</button>
                                                <button type="button" id="btnAdd[]" class="button-add"
                                                    onClick="myDeleteFunction1()" value="add">Delete</button>

                    </div>
               
                </div>
                   <div class="form-group">
                   <div class="col-sm-11">
                        <label for="inputState">Dasar Pertimbangan </label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote8"><?php echo $wo_row->dasar_pertimbangan ?></div>
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
                        <div style=" height: 50%;" id="" class="summernote10"><?php echo $wo_row->rekomendasi_penyelesaian_kredit ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote9" class="summernote9" id="sm3" cols="5" rows="3"></textarea>
                </div>
                   </div> 
                </div>
                
            </div>
<button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit" style="display: none">Save</button>
<button type="button" class="btn btn-primary px-4 float-right" onclick="test()">Save</button>
<a href="<?php echo base_url ('Create_Document/read_mrpk_pelunasan_ptbam')?>" button type="submit" class="btn btn-primary px-4 float-right">cancel</button></a>
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
   $('.summernote10').summernote();
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
        $('.summernote9').val(text[4].innerHTML);

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


