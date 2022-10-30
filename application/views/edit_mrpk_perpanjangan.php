<head>
    <style type="text/css">
    textarea {
        border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;

        resize: none;
        /*remove the resize handle on the bottom right*/
    }

    label {
        font-size: 15px;
    }

    td,
    tr,
    tbody,
    th,
    thead {
        border: 1px solid black !important;
        border-collapse: collapse;
    }

    th,
    td {
        font-family: "Quattrocento Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 15px !important;
    }

    .tablex {
        table-layout: auto !important;
        min-width: 95% !important;
        max-width: 95% !important;
        width: 1px !important;
        white-space: nowrap;

    }

    .tablex tr {
        height: 28px !important;
    }

    .inputx {
        min-width: 105% !important;
        width: 125px !important;
        padding-right: 0px !important;
        margin-left: 5px;

    }
    </style>
<script type="text/javascript" src="<?php echo base_url ('assets/jquery-inputmask/jquery.inputmask.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery-inputmask/jquery.inputmask.extensions.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url ('assets/jquery-inputmask/jquery.inputmask.numeric.extensions.js')?>"></script>

    <script type="text/javascript">
     function initNominal(className){
        $(className).inputmask('decimal',{groupSeparator:'.',digits:2,autoGroup:true,isNumeric:false,allowMinus:false,radixPoint:','});
    }
    $(function(){

        initNominal('.qtyplafond_a');
        initNominal('.totalplafond_a');

        initNominal('.qtyos_a');
        initNominal('.totalos_a');

        initNominal('.qtypokok_a');
        initNominal('.totalpokok_a');

        initNominal('.qtybunga_a');
        initNominal('.totalbunga_a');
         
        initNominal('.qtydenda_a');
        initNominal('.totaldenda_a');
         
         
        initNominal('.qtyplafond_b');
        initNominal('.totalplafond_b');

        initNominal('.qtyos_b');
        initNominal('.totalos_b');

        initNominal('.qtypokok_b');
        initNominal('.totalpokok_b');

        initNominal('.qtybunga_b');
        initNominal('.totalbunga_b');

        initNominal('.qtydenda_b');
        initNominal('.totaldenda_b');

        initNominal('.qty_nilaipasar');
        initNominal('.totalnilaipasar');

        initNominal('.qty_nilailikuidasi');
        initNominal('.totalnilailikuidasi');


        initNominal('.i_debet');
        initNominal('.ttl_debet');
        initNominal('.ttl_debet_avarage');
        initNominal('.i_ex_one');
        initNominal('.ttl_ex_one');
        initNominal('.ttl_ex_one_avarage');
        initNominal('.i_kredit');
        initNominal('.ttl_kredit');
        initNominal('.ttl_kredit_avarage');
        initNominal('.i_ex_two');
        initNominal('.ttl_ex_two');
        initNominal('.ttl_ex_two_avarage');
        
    });
    </script>
    <script>
    function insertRow() {
        var table = document.getElementById("myTable");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "txtbunga_persen[]";
        t1.name = "bunga_persen[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "txtprovinsi[]";
        t2.name = "provinsi[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input");
        t3.id = "txtadministrasi[]";
        t3.name = "administrasi[]";
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

        t1.id = "txtno[]";
        t1.name = "no[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "txtbulan[]";
        t2.name = "bulan[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input");
        t3.id = "txtamount[]";
        t3.name = "amount[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";




    }

    function myDeleteFunction1() {
        document.getElementById("myTable1").deleteRow(2);
    }
    </script>
    <script type="text/javascript">
    function insertRow2() {
        var table = document.getElementById("myTable2");
        var row = table.insertRow(table.rows.length);

        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "txtno_c[]";
        t1.name = "no_c[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";

        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "txtbulan_c[]";
        t2.name = "bulan_c[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";

        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input");
        t3.id = "txtdebet_c[]";
        t3.name = "debet_c[]";
        t3.className = "i_debet";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";

        var cell4 = row.insertCell(3);
        var t4 = document.createElement("input");
        t4.id = "txtex1_c[]";
        t4.name = "ex1_c[]";
        t4.className="i_ex_one";
        cell4.appendChild(t4).style = "width:100%!important; border: 0;";

        var cell5 = row.insertCell(4);
        var t5 = document.createElement("input");
        t5.id = "txtkredit_c[]";
        t5.name = "kredit_c[]";
        t5.className="i_kredit";
        cell5.appendChild(t5).style = "width:100%!important; border: 0;";

        var cell6 = row.insertCell(5);
        var t6 = document.createElement("input")
        t6.id = "txtex2_c[]";
        t6.name = "ex2_c[]";
        t6.className="i_ex_two";
        cell6.appendChild(t6).style = "width:100%!important; border: 0;";

        initNominal('.i_debet');
        initNominal('.i_ex_one');
        initNominal('.i_kredit');
        initNominal('.i_ex_two');
    }

    function myDeleteFunction2() {
        document.getElementById("myTable2").deleteRow(2);
    }
    </script>

    <script type="text/javascript">
    function insertRow3() {
        var table = document.getElementById("myTable3");
        var row = table.insertRow(table.rows.length);

        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "txtno_d[]";
        t1.name = "no_d[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";

        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "txtbank_d[]";
        t2.name = "bank_d[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";

        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input");
        t3.id = "txtfasilitas_d[]";
        t3.name = "fasilitas_d[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";

        var cell4 = row.insertCell(3);
        var t4 = document.createElement("input");
        t4.id = "txtbunga_d[]";
        t4.name = "bunga_d[]";
        cell4.appendChild(t4).style = "width:100%!important; border: 0;";

        var cell5 = row.insertCell(4);
        var t5 = document.createElement("input")
        t5.id = "txtjangakawaktu_d[]";
        t5.name = "jangakawaktu_d[]";
        cell5.appendChild(t5).style = "width:100%!important; border: 0;";

        var cell6 = row.insertCell(5);
        var t6 = document.createElement("input")
        t6.id = "txtplafond_d[]";
        t6.name = "plafond_d[]";
        cell6.appendChild(t6).style = "width:100%!important; border: 0;";

        var cell7 = row.insertCell(6);
        var t7 = document.createElement("input")
        t7.id = "txtospokok_d[]";
        t7.name = "ospokok_d[]";
        cell7.appendChild(t7).style = "width:100%!important; border: 0;";

        var cell8 = row.insertCell(7);
        var t8 = document.createElement("input")
        t8.id = "txtangsuran_d[]";
        t8.name = "angsuran_d[]";
        cell8.appendChild(t8).style = "width:100%!important; border: 0;";

        var cell9 = row.insertCell(8);
        var t9 = document.createElement("input")
        t9.id = "txtkol_d[]";
        t9.name = "kol_d[]";
        cell9.appendChild(t9).style = "width:100%!important; border: 0;";
    }

    function myDeleteFunction3() {
        document.getElementById("myTable3").deleteRow(5);
    }
    </script>

<script>

$(document).on("keyup", ".i_debet", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".i_debet").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        //console.log(val);
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    //console.log(sum);
    var total_deb = $(".i_debet").length;
    var avarage=sum/total_deb;
    $('.ttl_debet_avarage').val(avarage);
    $('.ttl_debet').val(sum);

    // Set ,00
    //$_deb = $(this).val() + ',00';
    //console.log($_deb);
    //$(this).val($_deb);
});
$(document).on("keyup", ".i_ex_one", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".i_ex_one").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        //console.log(val);
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    //console.log(sum);
    var total_ex_one = $(".i_ex_one").length;
    var avarage=sum/total_ex_one;
    $('.ttl_ex_one_avarage').val(avarage);
    $('.ttl_ex_one').val(sum);
    
    // Set ,00
    //$_deb = $(this).val() + ',00';
    //console.log($_deb);
    //$(this).val($_deb);
});
$(document).on("keyup", ".i_kredit", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".i_kredit").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        //console.log(val);
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    //console.log(sum);
    var total_i_kredit = $(".i_kredit").length;
    var avarage=sum/total_i_kredit;
    $('.ttl_kredit_avarage').val(avarage);
    $('.ttl_kredit').val(sum);
    
    // Set ,00
    //$_deb = $(this).val() + ',00';
    //console.log($_deb);
    //$(this).val($_deb);
});
$(document).on("keyup", ".i_ex_two", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".i_ex_two").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        //console.log(val);
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    //console.log(sum);
    var total_ex_two = $(".i_ex_two").length;
    var avarage=sum/total_ex_two;
    // $('.ttl_ex_two_avarage').val(avarage+',00');
    // $('.ttl_ex_two').val(sum+',00');
    $('.ttl_ex_two_avarage').val(avarage);
    $('.ttl_ex_two').val(sum);

    // Set ,00
    //$_deb = $(this).val() + ',00';
    //console.log($_deb);
    //$(this).val($_deb);
    });

 $(document).on("keyup", ".qty2", function() {
    var sum = 0;
    var i = $(".qty2").index(this); //get index
    var total = 0;
    $(".qty2").each(function(){
        sum += +$(this).val();
    });
    $('#totalplafond').val(sum);
    var qty2 = $(this).val();
    var qty4 = $(".qty4").eq(i).val();
    var qty5 = $(".qty5").eq(i).val();
    var qty6 = parseInt(qty2) + parseInt(qty4) + parseInt(qty5);
    $("#totalABC").eq(i).val(qty6);
    $(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
    var total2 = $('#totalplafond').val();
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
    var sum = 0; var i = $(".qty5").index(this);
    $(".qty5").each(function(){
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

//fasilitas Awal
$(document).on("keyup", ".qtyplafond_a", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtyplafond_a").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalplafond_a').val(sum+',00');

    initNominal('.qtyplafond_a');
    
    
});
$(document).on("keyup", ".qtyos_a", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtyos_a").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalos_a').val(sum+',00');

    initNominal('.qtyos_a');
});
$(document).on("keyup", ".qtypokok_a", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtypokok_a").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalpokok_a').val(sum+',00');
    initNominal('.qtypokok_a');
});
$(document).on("keyup", ".qtybunga_a", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtybunga_a").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalbunga_a').val(sum+',00');
    initNominal('.qtybunga_a')
});
$(document).on("keyup", ".qtydenda_a", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtydenda_a").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totaldenda_a').val(sum+',00');
    initNominal('qtydenda_a')
});
//end fasilitas Awal

//fasilitas baru
$(document).on("keyup", ".qtyplafond_b", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtyplafond_b").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalplafond_b').val(sum+',00');
    initNominal('qtyplafond_b');
}); 
$(document).on("keyup", ".qtyos_b", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtyos_b").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalos_b').val(sum+'');
    initNominal('totalos_b');
});
$(document).on("keyup", ".qtypokok_b", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtypokok_b").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalpokok_b').val(sum+',00');
    initNominal('totalpokok_b');
});
$(document).on("keyup", ".qtybunga_b", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtybunga_b").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalbunga_b').val(sum+',00');
    initNominal('totalbunga_b');
});
$(document).on("keyup", ".qtydenda_b", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qtydenda_b").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totaldenda_b').val(sum+',00');
    initNominal('totaldenda_b');
});
//end fasilitas baru

//Agunan Yang di miliki oleh debitur
$(document).on("keyup", ".qty_nilaipasar", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty_nilaipasar").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalnilaipasar').val(sum+',00');
    initNominal('totalnilaipasar');
});
$(document).on("keyup", ".qty_nilailikuidasi", function() {
    var sum = 0;
    //var number = Number(sum.replace(/[^0-9.-]+/g,""));
    //console.log(number);
    $(".qty_nilailikuidasi").each(function(){
        var val = $(this).val();
        val = val.replace(/\./g, "");
        val = val.replace(/\,00/g, "");
        var number = Number(val.replace(/[^0-9.-]+/g,""));
        sum += +number;
    });
    $('.totalnilailikuidasi').val(sum+',00');
    initNominal('totalnilailikuidasi');
});
//end Agunan Yang di miliki oleh debitur

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
                            <form action="<?php echo base_url('Create_document/update_mrpk_perpanjangan/'). $perpanjangan_row->cif.'-'.$perpanjangan_row->id_mrpk_perpanjangan ?>" method="POST">
                                <div id="printablediv">
                                    <div class="form-group row">
                                 <!--Informasi Debitur-->
                                        <div class="col-sm-11">
                                            <label for="inputFirstname">Informasi Debitur</label>

                                            <table id="printTable"
                                                class="table table-bordered table-striped table-hover dt-responsive non-responsive"
                                                style="width:95%;height: 10%;">
                                                <tbody>

                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->nama_debitur ?>"
                                                                name="nama_debitur"
                                                                style="background-color:transparent; width:100% ; border: 0;">
                                                        </td>
                                                    <tr>
                                                        <td>Nama Grup Usaha</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->nma_grup_usaha ?>" name="nma_grup_usaha"
                                                                style="background-color:transparent; width:100% ; border: 0;">

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Cif</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->cif ?>"
                                                                name="cif"
                                                                style="background-color:transparent; width:100% ; border: 0;">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Suku Bunga</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->suku_bunga ?>" name="suku_bunga"
                                                                style="background-color:transparent; width:100% ; border: 0;">

                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Bidang Usaha</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->bidang_usaha ?>" name="bidang_usaha"
                                                                style="background-color:transparent; width:100% ; border: 0;">

                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kolektibilitas</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->kolektibilitas ?>"
                                                                name="kolektibilitas"
                                                                style="background-color:transparent; width:100% ; border: 0;">

                                                        </td>
                                                    </tr>




                                                    <tr>
                                                        <td>Hari Tunggakan (DPD)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input
                                                                value="<?php echo $perpanjangan_row->dpd ?>"
                                                                name="dpd"
                                                                style="background-color:transparent; width:100% ; border: 0;">

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Sektor Industri BSS</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input value="<?php echo $perpanjangan_row->sektorindustri_bss ?>" name="sektorindustri_bss"
                                                                style="background-color:transparent; width:100% ; border: 0;">
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                 <!--Fasilitas Awal-->
                                        <div class="col-sm-11">
                                            <label for="inputFirstname">Fasilitas Awal</label>
                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <tr>
                                                <th rowspan="2" hidden>ID</th>
                                                <th rowspan="2" hidden>Nomor Rekening</th>
                                                    <th rowspan="2">Fasilitas</th>
                                                    <th  rowspan="2">Plafond (RP)</th>
                                                    <th  rowspan="2">O/S (Rp) Per  <?php echo date('Y-m-d') ?></th>
                                                    <th colspan="3">Tunggakan</th>
                                                    <th colspan="2">Tanggal</th>
                                                </tr>
                                                <tr>
                                                    <td>Pokok (Rp)</td>
                                                    <td>Bunga (Rp)</td>
                                                    <td>Denda (Rp)</td>
                                                    <td>Jatuh Tempo</td>
                                                    <td>Perpanjangan</td>
                                                </tr>
                                                <tbody>
                                                <?php
                                                ?>
                                                    <?php foreach ($perpanjangan_result as $value) {
                                                         
                                                        
                                                    ?>
                                                    <tr>
                                                    <td hidden>
                                                            <input class="inputx" 
                                                                value="<?php echo $value->id_mrpk_perpanjangan ?>"name="id_mrpk_perpanjangan[]"
                                                                style="border:0;background-color: transparent;min-width:125%!important;">
                                                        </td>
                                                    <td hidden>
                                                            <input class="inputx" 
                                                                value="<?php echo $value->norek ?>"name="norek[]"
                                                                style="border:0;background-color: transparent;min-width:125%!important;">
                                                        </td>
                                                        <td>
                                                        <textarea cols="10" rows="3" name="jenis_fasilitas_a[]" style="width:100%"><?php echo $value->jenis_fasilitas_a ?></textarea>
                                                        </td>
                                                        <td>
                                                            <input class="inputx qtyplafond_a"
                                                                value="<?php echo $value->plafond_a ?>"name="plafond_a[]"
                                                                style="border:0;background-color: transparent;min-width:125%!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx qtyos_a"
                                                                value="<?php echo $value->os_a ?>"name="os_a[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx qtypokok_a"  value="<?php echo $value->tunggakan_pokok_a ?>" name="tunggakan_pokok_a[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        
                                                        <td>
                                                            <input class="inputx qtybunga_a"value="<?php echo $value->tunggakan_bunga_a ?>" name="tunggakan_bunga_a[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx qtydenda_a"value="<?php echo $value->tunggakan_denda_a ?>"name="tunggakan_denda_a[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx"value="<?php echo $value->jatuhtempo_a ?>"name="jatuhtempo_a[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx"value="<?php echo $value->perpanjangan_a ?>"name="perpanjangan_a[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>


                                                    </tr>

                                                    <?php } ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Total</th>
                                                        <td hidden></td>
                                                        <td hidden></td>
                                                        <td ><input class="totalplafond_a" value ="<?php echo $perpanjangan_row->totalplafond ?>" readonly=""id="totalplafond" name="totalplafond"style="border: 0;background-color: transparent;width:100%"  ></td>
                                                        <td ><input class="totalos_a" value ="<?php echo $perpanjangan_row->total_os ?>" readonly=""id="total_os" name="total_os"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td ><input class="totalpokok_a"  value ="<?php echo $perpanjangan_row->total_tunggakan_pokok ?>"  readonly=""id="total_tunggakan_pokok" name="total_tunggakan_pokok"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td ><input class="totalbunga_a" value ="<?php echo $perpanjangan_row->total_tunggakan_bunga ?>"  readonly=""id="total_tunggakan_bunga" name="total_tunggakan_bunga"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td ><input class="totaldenda_a" value ="<?php echo $perpanjangan_row->total_tunggakan_denda ?>"  readonly=""id="total_tunggakan_denda" name="total_tunggakan_denda"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                 <!--Fasilitas Baru-->
                                        <div class="col-sm-11">
                                            <label for="inputFirstname">Fasilitas Baru</label>
                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <tr>
                                                    <th rowspan="2"hidden>Nomor rekening</th>
                                                    <th rowspan="2">Fasilitas</th>
                                                    <th  rowspan="2">Plafond (RP)</th>
                                                    <th  rowspan="2">O/S (Rp) Per <?php echo date('Y-m-d') ?></th>
                                                    <th colspan="3">Tunggakan</th>
                                                    <th colspan="2">Tanggal</th>
                                                </tr>

                                                <tr>
                                                    <td>Pokok (Rp)</td>
                                                    <td>Bunga (Rp)</td>
                                                    <td>Denda (Rp)</td>
                                                    <td>Jatuh Tempo</td>
                                                    <td>Perpanjangan</td>

                                                </tr>
                                                <tbody>
                                                <?php
                                                    
                                                ?>
                                                    <?php foreach ($perpanjangan_result as $value) { 
                                                         
                                                    ?>
                                                       
                                                    <tr>
                                                    <td hidden>
                                                            <input class="inputx "
                                                                value="<?php echo $value->norek ?>"name="norekening[]"
                                                                style="border:0;background-color: transparent;min-width:125%!important;">

                                                        </td>
                                                        <td>
                                                        <textarea cols="10" rows="3" name="jenis_fasilitas_b[]" style="width:100%"><?php echo $value->jenis_fasilitas_b ?></textarea>
                                                        </td>
                                                       
                                                        <td>
                                                            <input class="inputx qtyplafond_b"
                                                                value="<?php echo $value->plafond_b ?>"name="plafond_b[]"
                                                                style="border:0;background-color: transparent;min-width:125%!important;">

                                                        </td>
                                                        <td>
                                                            <input class="inputx qtyos_b"
                                                                value="<?php echo $value->os_b ?>"name="os_b[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx qtypokok_b" value="<?php echo $value->tunggakan_pokok_b ?>" name="tunggakan_pokok_b[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        
                                                        <td>
                                                            <input class="inputx qtybunga_b"value="<?php echo $value->tunggakan_bunga_b ?>" name="tunggakan_bunga_b[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx qtydenda_b"value="<?php echo $value->tunggakan_denda_b ?>"name="tunggakan_denda_b[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx"value="<?php echo $value->jatuhtempo_b ?>"name="jatuhtempo_b[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>
                                                        <td>
                                                            <input class="inputx"value="<?php echo $value->perpanjangan_b ?>"name="perpanjangan_b[]"
                                                                style="border:0;background-color: transparent;min-width:95px!important;">
                                                        </td>


                                                    </tr>

                                                    <?php } ?>
                                                    <tr>
                                                        <th colspan="1" align="center">Total</th>
                                                        <td hidden></td>
                                                        <td ><input class="totalplafond_b" value ="<?php echo number_format($perpanjangan_row->totalplafond_b,2,'','') ?>" readonly=""id="totalplafond_b" name="totalplafond_b"style="border: 0;background-color: transparent;width:100%"  ></td>
                                                        <td ><input class="totalos_b" value ="<?php echo number_format($perpanjangan_row->total_os_b,2,'','') ?>" readonly=""id="total_os_b" name="total_os_b"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td ><input class="totalpokok_b"  value ="<?php echo $perpanjangan_row->total_tunggakan_pokok_b ?>" readonly=""id="total_tunggakan_pokok_b" name="total_tunggakan_pokok_b"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td ><input class="totalbunga_b" value ="<?php echo $perpanjangan_row->total_tunggakan_bunga_b ?>" readonly=""id="total_tunggakan_bunga_b" name="total_tunggakan_bunga_b"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td ><input class="totaldenda_b" value ="<?php echo $perpanjangan_row->total_tunggakan_denda_b ?>" readonly=""id="total_tunggakan_denda_b" name="total_tunggakan_denda_b"style="border: 0;background-color: transparent;width:100%"  ></td> 
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                 <!--Agunan Yang di miliki oleh debitur-->
                                        <div class="col-sm-11">
                                            <label for="inputFirstname">Agunan Yang di miliki oleh debitur</label>
                                            <table
                                                class="table table-bordered table-striped table-hover dt-responsive non-responsive"
                                                id="tab" style="width:95%;">

                                                <tr>
                                                    <th rowspan="2">Jenis Jaminan</th>
                                                    <th rowspan="2">Deskripsi</th>
                                                    <th rowspan="2">Dokumen Jaminan</th>
                                                    <th colspan="3">Nilai (Rp)</th>

                                                    <th rowspan="2">Keterangan</th>
                                                </tr>

                                                <tr>
                                                    <td>Nilai Pasar (Fisik)</td>
                                                    <td>Nilai Likuidasi (Fisik)</td>
                                                    <td>HT/FEO</td>
                                                </tr>
                                                <?php foreach ($perpanjangan_result as $value) { ?>
                                                <tr>
                                                    <td>
                                                        <textarea name="jenis_jaminan[]" cols="10" rows="5"
                                                                style="background-color: transparent;width :100%"
                                                                rows="1"><?php echo $value->jenis_jaminan ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="deskripsi[]" cols="25" rows="5"
                                                                style="background-color: transparent;width :100%;"><?php echo $value->deskripsi ?></textarea>
                                                       
                                                    </td>
                                                    <td>
                                                    <textarea name="dokumen_jaminan[]" cols="10" rows="5"
                                                                style="background-color: transparent;width :100%;"><?php echo $value->dokumen_jaminan ?></textarea>
                                                    </td>
                                                    <td>
                                                        <input class="inputx qty_nilaipasar" value="<?php echo $value->nilai_pasar ?>"name="nilai_pasar[]"
                                                            style="border:0;background-color: transparent;min-width:90px!important;">
                                                    </td>
                                                    <td>
                                                        <input class="inputx qty_nilailikuidasi" value="<?php echo $value->nilai_likuidasi ?>"name="nilai_likuidasi[]"
                                                            style="border:0;background-color: transparent;min-width:90px!important;">
                                                    </td>
                                                    <td>
                                                        <input class="inputx" value="<?php echo $value->ht_feo ?>" name="ht_feo[]"
                                                            style="border:0;background-color: transparent;min-width:90px!important;">
                                                    </td>
                                                    <td>
                                                    <textarea name="keterangan_jaminan[]" cols="10" rows="5"
                                                                style="background-color: transparent;width :100%;"><?php echo $value->keterangan_jaminan ?></textarea>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                        <th></th>
                                                        <td ><input class="" readonly="" id="hsil_desc_1" value="<?php echo $perpanjangan_row->hsil_desc_1 ?>" name="hsil_desc_1"style="border: 0;background-color: transparent;width:100%"></td>
                                                        <td ><input class=""  readonly="" style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td ><input class="totalnilaipasar" value="<?php echo $perpanjangan_row->ttl_nilaipasar_1 ?>" readonly=""id="ttl_nilaipasar_1" name="ttl_nilaipasar_1"style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td ><input class="totalnilailikuidasi" value="<?php echo $perpanjangan_row->ttl_nilailikuidasi_1 ?>"  readonly=""id="ttl_nilailikuidasi_1" name="ttl_nilailikuidasi_1"style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td ><input class=""  readonly="" style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td><input class=""  id="keterangan_jaminan_1" name="keterangan_jaminan_1" style="border: 0;background-color: transparent;width:100%"></td>
                                                      
                                                </tr>
                                                <tr>
                                                        <th></th>
                                                        <td ><input class=""  id="hsil_desc_2" value="<?php echo $perpanjangan_row->hsil_desc_2 ?>" name="hsil_desc_2"style="border: 0;background-color: transparent;width:100%"></td>
                                                        <td ><input class=""  readonly="" style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td ><input class="totalnilaipasar" value="<?php echo $perpanjangan_row->ttl_nilaipasar_2 ?>" readonly=""id="ttl_nilaipasar_2" name="ttl_nilaipasar_2"style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td ><input class="totalnilailikuidasi" value="<?php echo $perpanjangan_row->ttl_nilailikuidasi_2 ?>" readonly=""id="ttl_nilailikuidasi_2" name="ttl_nilailikuidasi_2"style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td ><input class=""  readonly="" style="border: 0;background-color: transparent;width:100%"></td> 
                                                        <td><input class=""  id="keterangan_jaminan_2" value="<?php echo $perpanjangan_row->keterangan_jaminan_2 ?>" name="keterangan_jaminan_2" style="border: 0;background-color: transparent;width:100%"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                 <!--Catatan Jaminan-->                          
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Jaminan</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="smnote1"><?php echo $perpanjangan_row->catatan_jaminan ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote6" class="summernote6" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>
                                    <br>

                                 <!--Note Jaminan-->
                                    <label for="inputState">Note Jaminan</label>
                                    <div class="col-sm-11">
                                        <table id="myTable" border="1" style="width: 96%;">
                                            <th>Bunga %</th>
                                            <th>Provinsi</th>
                                            <th>Administrasi (Rp)</th>
                                            <tr>
                                            <?php foreach($note_jaminan_edit as $value1) { ?>
                                                <td><input type="text" name="bunga_persen[]"  id="txtbunga_persen[]" value="<?php echo $value1->bunga_persen ?>"
                                                        style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" value="<?php echo $value1->provinsi ?>" name="provinsi[]" id="txtprovinsi[]"
                                                        style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" value="<?php echo $value1->administrasi ?>" name="administrasi[]" id="txtadministrasi[]"
                                                        style="width:100%!important; border: 0;" /></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <button type="button" id="btnAdd[]" class="button-add" onClick="insertRow()"
                                            value="add">ADD</button>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="myDeleteFunction()" value="add">Delete</button>
                                    </div>
                                    <br>

                                <!--Catatan Analisa Usaha Debitur-->
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Analisa Usaha Debitur</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="smnote2"><?php echo $perpanjangan_row->catatan_analisausahadebitur ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote7" class="summernote7" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>
                                    
                                <!--Financial Highlights-->
                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Financial Highlights</label>
                                        <p>


                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <tr>
                                                    <td colspan="3"><b>Laporan Rugi Laba(Posisi Histroical Terakhir)</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Periode : <input value="<?php echo $perpanjangan_row->periode_a ?>" type="text"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="input data" name="periode_a"></b></td>
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>Penjualan</td>
                                                        <td><input value="<?php echo $perpanjangan_row->penjualan_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="penjualan_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga Pokok Penjualan</td>
                                                        <td><input value="<?php echo $perpanjangan_row->hrga_pokok_penjualan_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="hrga_pokok_penjualan_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Depresisai dan Amortisasi</td>
                                                        <td><input value="<?php echo $perpanjangan_row->depresisai_amortisasi_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="depresisai_amortisasi_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Kotor</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_kotor_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_kotor_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Usaha - Variabel (spt.By Penjualan)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_variabel_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_variabel_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Usaha - Tetap (spt.listrik,tlp,air,gaji)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_tetap_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_tetap_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Operasional</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_opersaional_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_opersaional_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Bunga</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_bunga_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_bunga_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya lain-lain</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_lain_lain_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_lain_lain_a">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pendapatan Lain</td>
                                                        <td><input value="<?php echo $perpanjangan_row->pendapatan_lain_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pendapatan_lain_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba (Rugi)Sebelum Pajak</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_rugi_sebelum_pajak_a ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_rugi_sebelum_pajak_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pajak</td>
                                                        <td><input  type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title=""value="<?php echo $perpanjangan_row->pajak_a ?>" name="pajak_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Bersih</td>
                                                        <td><input  type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" value="<?php echo $perpanjangan_row->laba_bersih_a ?>" name="laba_bersih_a">
                                                        </td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>

                                    </div>
                                    
                                <!--Financial Highlights-->
                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Financial Highlights</label>
                                        <p>


                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <tr>
                                                    <td colspan="3"><b>Analisa Keuangan Proforma</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Periode : <input value="<?php echo $perpanjangan_row->periode_d ?>" type="text"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="input data" name="periode_d"></b></td>
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>Penjualan</td>
                                                        <td><input value="<?php echo $perpanjangan_row->penjualan_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="penjualan_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga Pokok Penjualan</td>
                                                        <td><input value="<?php echo $perpanjangan_row->hrga_pokok_penjualan_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="hrga_pokok_penjualan_d">
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td>Laba Kotor</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_kotor_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_kotor_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Usaha - Variabel (spt.By Penjualan)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_variabel_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_variabel_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Usaha - Tetap (spt.listrik,tlp,air,gaji)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_tetap_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_tetap_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Operasional</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_opersaional_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_opersaional_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya hidup (U/deb perorangan)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_hidup_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_hidup_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Angsuran di tempat lain</td>
                                                        <td><input value="<?php echo $perpanjangan_row->angsuran_tempatlain_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="angsuran_tempatlain_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendapatan Lain</td>
                                                        <td><input value="<?php echo $perpanjangan_row->pendapatan_lain_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pendapatan_lain_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya lain-lain</td>
                                                        <td><input value="<?php echo $perpanjangan_row->biaya_lain_lain_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_lain_lain_d">
                                                        </td>
                                                    </tr>

                                                   
                                                    
                                                    <tr>
                                                        <td>Pajak</td>
                                                        <td><input value="<?php echo $perpanjangan_row->pajak_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pajak_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba (Rugi) bersih</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_rugi_bersih_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_rugi_bersih_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pembayaran Bunga Bank</td>
                                                        <td><input value="<?php echo $perpanjangan_row->pembayaran_bunga_bank_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pembayaran_bunga_bank_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Angsuran restruktur (PA)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->angsuran_restruktur_d ?>"type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="angsuran_restruktur_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba(rugi)angsuran restruktur</td>
                                                        <td><input value="<?php echo $perpanjangan_row->laba_rugi_angsuran_restruktur_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_rugi_angsuran_restruktur_d">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>DSR(%)</td>
                                                        <td><input value="<?php echo $perpanjangan_row->dsr_d ?>" type="text" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="dsr_d">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                    </div>

                                <!--Catatan Financial Highlights-->
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Financial Highlights</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="smnote3"><?php echo $perpanjangan_row->catatan_financial_highlights ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote8" class="summernote8" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>

                                <!--Rekap Rekening -->
                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Rekap Rekening </label>
                                        <table id="myTable2" border="1" style="width: 96%;">

                                            <th style="width: 2%;">No</th>
                                            <th>Bulan</th>
                                            <th>Debet</th>
                                            <th>X</th>
                                            <th>Kredit</th>
                                            <th>X</th>
                                            <?php foreach ($rekap_rekening_edit as $value2) { ?> 
                                            <tr>
                                                <td><input type="text" value="<?php echo $value2->no_c ?>" name="no_c[]" id="txtno_c[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" value="<?php echo $value2->bulan_c ?>" name="bulan_c[]" id="txtbulan_c[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" class="i_debet"  value="<?php echo $value2->debet_c ?>" name="debet_c[]" id="txtdebet_c[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" class="i_ex_one" value="<?php echo $value2->ex1_c ?>" name="ex1_c[]" id="txtex1_c[]" style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" class="i_kredit" value="<?php echo $value2->kredit_c ?>" name="kredit_c[]" id="txtkredit_c[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input type="text" class="i_ex_two" value="<?php echo $value2->ex2_c ?>" name="ex2_c[]" id="txtex2_c[]"style="width:100%!important; border: 0;" /></td>

                                            </tr>
                                            <?php } ?>
                                            <table>
                                            <button type="button" id="btnAdd[]" class="button-add" onClick="insertRow2()"
                                            value="add">ADD</button>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="myDeleteFunction2()" value="add">Delete</button>
                                           <tr>
                                                <td><input value="total" readonly="" type="text" name="total" id="id_total"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_debet ?>"  class="ttl_debet" readonly="" type="text" name="ttl_debet" id="total_debet_d[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_ex_one ?>" class="ttl_ex_one" readonly="" type="text" name="ttl_ex_one" id="totalex1_d[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_kredit ?>" class="ttl_kredit" readonly="" type="text" name="ttl_kredit" id="totalkredit_d[]"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_ex_two ?>" class="ttl_ex_two" readonly="" type="text" name="ttl_ex_two" id="totalex2_d[]"style="width:100%!important; border: 0;" /></td>
                                            </tr>
                                            <tr>
                                                <td><input value="Average" readonly="" type="text" name="total_average" id="total_average"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_debet_avarage ?>" class="ttl_debet_avarage" readonly="" type="text" name="ttl_debet_avarage" id="ttl_debet_avarage"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_ex_one_avarage ?>" class="ttl_ex_one_avarage" readonly="" type="text" name="ttl_ex_one_avarage" id="ttl_ex_one_avarage"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_kredit_avarage ?>" class="ttl_kredit_avarage" readonly="" type="text" name="ttl_kredit_avarage" id="ttl_i_kredit_avarage"style="width:100%!important; border: 0;" /></td>
                                                <td><input value="<?php echo $rekap_rekening_edit_row->ttl_ex_two_avarage ?>" class="ttl_ex_two_avarage" readonly="" type="text" name="ttl_ex_two_avarage" id="txtex2_e"style="width:100%!important; border: 0;" /></td>
                                            </tr>
                                        </table>
                                       
                                    </div>
                                    
                                <!-- Catatan Rekap Rekening -->
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Rekap Rekening </label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="smnote4"><?php echo $perpanjangan_row->catatan_rekaprekening ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote9" class="summernote9" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>


                                <!-- Hasil BI Checking -->
                                <div class="col-sm-11">
                                        <label for="inputFirstname">Hasil BI Checking Upload By Excel</label>
                                        <p>


                                            <table class="tablex table-bordered table-striped table-hover"id="myTable3">
                                                <tr>
                                                    <td colspan="9"><b>informasi SID (3 Bulan Terakhir)</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9"><input name="periode_BI_cheking" value="Posisi per <?php echo Date ('Y-d-m') ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9"><b>Debitur an. <?php echo $perpanjangan_row->nama_debitur ?></b></td>
                                                </tr>
                                                <tr>
                                                    <th style="width : 2%;">No</th>
                                                    <th style="width:10%!important;">bank</th>
                                                    <th>Fasilitas</th>
                                                    <th>Bunga </th>
                                                    <th>Jangka <p>Waktu/tenor</p></th>
                                                    <th style="width:20%!important;">Plafond</th>
                                                    <th style="width:20%!important;">o/s pokok</th>
                                                    <th style="width:20%!important;">angsuran</th>
                                                    <th>kol</th>
                                                </tr>
                                                <tbody>
                                                <?php foreach ($informasi_sid_edit as $value3){ ?>
                                                    <tr>
                                                        <td><input type="text" value="<?php echo $value3->no_d ?>"  name="no_d[]" id="txtno_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td>
                                                        <textarea cols="10" rows="3" name="bank_d[]" id="txtbank_d[]" style="width:100%"><?php echo $value3->bank_d ?></textarea>
                                                      
                                                        </td>
                                                        <td><input type="text" value="<?php echo $value3->fasilitas_d ?>" name="fasilitas_d[]"
                                                                id="txtfasilitas_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td><input type="text" value="<?php echo $value3->bunga_d ?>" name="bunga_d[]" id="txtbunga_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td><input type="text"value="<?php echo $value3->jangakawaktu_d ?>" name="jangakawaktu_d[]"
                                                                id="txtjangakawaktu_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td><input type="text"value="<?php echo $value3->plafond_d ?>" name="plafond_d[]" id="txtplafond_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td><input type="text"value="<?php echo $value3->ospokok_d ?>" name="ospokok_d[]" id="txtospokok_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td><input type="text"value="<?php echo $value3->angsuran_d ?>" name="angsuran_d[]" id="txtangsuran_d[]"
                                                                style="width:100%!important; border: 0;" /></td>
                                                        <td><input type="text"value="<?php echo $value3->kol_d ?>" name="kol_d[]" id="txtkol_d[]"
                                                                style="width:100%!important; border: 0;" /></td>

                                                    </tr>
                                                   <?php } ?>
                                                </tbody>
                                                
                                            </table>
                                            <button type="button" id="btnAdd[]" class="button-add"
                                                        onClick="insertRow3()" value="add">ADD</button>
                                                    <button type="button" id="btnAdd[]" class="button-add"
                                                        onClick="myDeleteFunction3()" value="add">Delete</button>
                                    </div>
                                    
                                <!-- Catatan Hasil BI Checking -->
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Hasil BI Checking</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="smnote5"><?php echo $perpanjangan_row->catatan_hasilbi_checking ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote11" class="summernote11"
                                            id="sm3" cols="5" rows="3"></textarea>
                                    </div>
                                    
                                <!-- Alasan Perpanjangan -->
                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Alasan Perpanjangan</label>
                                        <table id="printTable"
                                            class="table table-bordered table-striped table-hover dt-responsive non-responsive"
                                            style="width:95%;height: 10%;">
                                            <tbody>
                                                <tr>
                                                    <td>Data debitur belum lengkap</td>
                                                    <td>:</td>
                                                    <td><input value="<?php echo $perpanjangan_row->data_debitur_blmlengkap ?>" name="data_debitur_blmlengkap"
                                                            style="background-color:transparent; width:100% ; border: 0;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Covenant belum dipenuhi</td>
                                                    <td>:</td>
                                                    <td><input value="<?php echo $perpanjangan_row->covenant_belum_dipenuhi ?>" name="covenant_belum_dipenuhi"
                                                            style="background-color:transparent; width:100% ; border: 0;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Proposal dalam proses</td>
                                                    <td>:</td>

                                                    <td><input value="<?php echo $perpanjangan_row->proposal_dalam_proses ?>" name="proposal_dalam_proses"
                                                            style="background-color:transparent; width:100% ; border: 0;">
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td>Lain-lain</td>
                                                    <td>:</td>
                                                    <td>
                                                    <textarea cols="10" rows="5" name="lain_lain" style="width:100%"><?php echo $perpanjangan_row->lain_lain ?></textarea>
                                                    
                                                    </td>


                                                </tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                <!-- Catatan Rekomendasi -->
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Rekomendasi</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="smnote6"><?php echo $perpanjangan_row->catatan_rekomendasi ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote12" class="summernote12"
                                            id="sm3" cols="5" rows="3"></textarea>
                                    </div>

                                    <div class="form-group row">


                                    </div>





                                </div>
                                <button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit"
                                    style="display: none">Save</button>
                                <button type="button" class="btn btn-primary px-4 float-right"
                                    onclick="test()">Save</button>
                                <a href="<?php echo base_url ('create_document/read_mrpk_perpanjangan')?>" button
                                    type="submit" class="btn btn-primary px-4 float-right">cancel</button></a>
                                <<!-- input type="button" value="Print 1st Div"
                                    onclick="javascript:printDiv('printablediv')" /> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/forms-advanced.js') ?>"></script>
    <!-- style="border: 0; text-overflow: '';text-indent: 1px;-moz-appearance:none;-webkit-appearance:none;" -->
    <script type="text/javascript">
    $(document).ready(function() {
        //var dasarpertimbangan = $('.summernote1').summernote();      
        //$('.summernote2').summernote();
        $('.smnote1').summernote();
        $('.smnote2').summernote();
        $('.smnote3').summernote();
        $('.smnote4').summernote();
        $('.smnote5').summernote();
        $('.smnote6').summernote();
    });

    function test() {
        //var test = $('.summernote3').summernote('code');
        //alert(test.editable());
        //alert($('#sm3').summernote('code'));
        var text = document.getElementsByClassName('note-editable');
        //alert(text[0].innerText+" - "+text[1].innerText);
        $('.summernote6').val(text[0].innerHTML);
        $('.summernote7').val(text[1].innerHTML);
        $('.summernote8').val(text[2].innerHTML);
        $('.summernote9').val(text[3].innerHTML);
        $('.summernote11').val(text[4].innerHTML);
        $('.summernote12').val(text[5].innerHTML);


        $('#btn-submit').click();
    }
    </script>
    <script type="text/javascript">
    $(".chb1").change(function() {
        $(".chb1").prop('checked', false);
        $(this).prop('checked', true);

    });

    $(".chb2").change(function() {
        $(".chb2").prop('checked', false);
        $(this).prop('checked', true);
    });
    $(".chb3").change(function() {
        $(".chb3").prop('checked', false);
        $(this).prop('checked', true);
    });
    $(".chb4").change(function() {
        $(".chb4").prop('checked', false);
        $(this).prop('checked', true);
    });
    $(".chb5").change(function() {
        $(".chb5").prop('checked', false);
        $(this).prop('checked', true);
    });
    </script>
</body>