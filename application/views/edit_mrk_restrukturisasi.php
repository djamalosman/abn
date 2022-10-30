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
        font-size: 16px !important;
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
        min-width: 111px !important;
        width: 1px !important;
        padding-right: 0px !important;
        margin-left: 5px;

    }

    inputx2 {
        min-width: 150px !important;
        width: 1px !important;
        padding-right: 0px !important;
        margin-left: 5px;

    }

    inputx3 {
        min-width: 50px !important;
        width: 1px !important;
        padding-right: 0px !important;
        margin-left: 5px;

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
        $('#totalplafond').val(sum);
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
    $(document).on("keyup", ".qty81", function() {
        var sum = 0;
        //var number = Number(sum.replace(/[^0-9.-]+/g,""));
        //console.log(number);
        $(".qty81").each(function() {
            var val = $(this).val();
            var number = Number(val.replace(/[^0-9.-]+/g, ""));
            sum += +number;
        });
        $('.total81').val(sum);
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
    </script>
    <script type="text/javascript">
    function insertRow() {
        var table = document.getElementById("myTable");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "deskripsi_a[]";
        t1.name = "deskripsi_a[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "pokok_a[]";
        t2.name = "pokok_a[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input");
        t3.id = "persen_1a[]";
        t3.name = "persen_1a[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";
        var cell4 = row.insertCell(3);
        var t4 = document.createElement("input");
        t4.id = "bunga_a[]";
        t4.name = "bunga_a[]";
        cell4.appendChild(t4).style = "width:100%!important; border: 0;";
        var cell5 = row.insertCell(4);
        var t5 = document.createElement("input");
        t5.id = "persen_2a[]";
        t5.name = "persen_2a[]";
        cell5.appendChild(t5).style = "width:100%!important; border: 0;";
        var cell6 = row.insertCell(5);
        var t6 = document.createElement("input");
        t6.id = "denda_a[]";
        t6.name = "denda_a[]";
        cell6.appendChild(t6).style = "width:100%!important; border: 0;";
        var cell7 = row.insertCell(6);
        var t7 = document.createElement("input");
        t7.id = "persen_3a[]";
        t7.name = "persen_3a[]";
        cell7.appendChild(t7).style = "width:100%!important; border: 0;";

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
    function insertRow3() {
        var table = document.getElementById("myTable3");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "jenis_devisiasi[]";

        t1.name = "jenis_devisiasi[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.type = "checkbox";
        t2.value = "Ada";
        t2.id = "adadevisiasi[]";
        t2.name = "adadevisiasi[]";
        t2.name = "ada_devisiasi_"+ada_dokumen;
        t2.className = "adadevisiasi";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";


    }

    function myDeleteFunction3() {
        document.getElementById("myTable3").deleteRow(2);
    }
    </script>
    <script type="text/javascript">
    function insertRow4(sId, sTable) {
        var table = document.getElementById(sTable);
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        //t1.id = "jenis_fasilitas_a1[]";
        //t1.name = "jenis_fasilitas_a1[]";
        t1.id = sId + "_jenis_fasilitas_T1[]";
        t1.name = sId + "_jenis_fasilitas_T1[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = sId + "_jenis_fasilitas_T2[]";
        t2.name = sId + "_jenis_fasilitas_T2[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input")
        t3.id = sId + "_jenis_fasilitas_T3[]";
        t3.name = sId + "_jenis_fasilitas_T3[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";

    }

    function myDeleteFunction4() {
        document.getElementById("myTable4").deleteRow(7);
    }
    </script>
    <script type="text/javascript">
    function insertRow5() {
        var table = document.getElementsByClassName("myTable5");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var t1 = document.createElement("input");
        t1.id = "jenis_fasilitas_b1[]";
        t1.name = "jenis_fasilitas_b1[]";
        cell1.appendChild(t1).style = "width:100%!important; border: 0;";
        var cell2 = row.insertCell(1);
        var t2 = document.createElement("input")
        t2.id = "jenis_fasilitas_b2[]";
        t2.name = "jenis_fasilitas_b2[]";
        cell2.appendChild(t2).style = "width:100%!important; border: 0;";
        var cell3 = row.insertCell(2);
        var t3 = document.createElement("input")
        t3.id = "jenis_fasilitas_b3[]";
        t3.name = "jenis_fasilitas_b3[]";
        cell3.appendChild(t3).style = "width:100%!important; border: 0;";

    }

    function myDeleteFunction5() {
        document.getElementsByClassName("myTable5").deleteRow(6);


    }
    </script>

<script type="text/javascript">
$(document).on("keyup", ".plafond_rp_1a", function() {
    var sum = 0;
    var i = $(".plafond_rp_1a").index(this); //get index
    var total = 0;
    $(".plafond_rp_1a").each(function(){
        sum += +$(this).val();
    });
    $('#totalplafond1234').val(sum);
    var plafond_rp_1a = $(this).val();
    var plafond_rp_2a = $(".plafond_rp_2a").eq(i).val();
    var plafond_rp_3a = $(".plafond_rp_3a").eq(i).val();
	var plafond_rp_4a = $(".plafond_rp_4a").eq(i).val();
    var qty60 = parseInt(plafond_rp_1a) + parseInt(plafond_rp_2a) + parseInt(plafond_rp_3a) +parseInt(plafond_rp_4a);
    $("#totalplafond1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".plafond_rp_2a", function() {
    var sum = 0;
    var i = $(".plafond_rp_2a").index(this); //get index
    var total = 0;
    $(".plafond_rp_2a").each(function(){
        sum += +$(this).val();
    });
    $('#totalplafond1234').val(sum);
    var plafond_rp_2a = $(this).val();
    var plafond_rp_1a = $(".plafond_rp_1a").eq(i).val();
    var plafond_rp_3a = $(".plafond_rp_3a").eq(i).val();
	var plafond_rp_4a = $(".plafond_rp_4a").eq(i).val();
    var qty60 = parseInt(plafond_rp_2a) + parseInt(plafond_rp_1a) + parseInt(plafond_rp_3a) +parseInt(plafond_rp_4a);
    $("#totalplafond1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".plafond_rp_3a", function() {
    var sum = 0;
    var i = $(".plafond_rp_3a").index(this); //get index
    var total = 0;
    $(".plafond_rp_3a").each(function(){
        sum += +$(this).val();
    });
    $('#totalplafond1234').val(sum);
    var plafond_rp_3a = $(this).val();
    var plafond_rp_1a = $(".plafond_rp_1a").eq(i).val();
    var plafond_rp_2a = $(".plafond_rp_2a").eq(i).val();
	var plafond_rp_4a = $(".plafond_rp_4a").eq(i).val();
    var qty60 = parseInt(plafond_rp_3a) + parseInt(plafond_rp_1a) + parseInt(plafond_rp_2a) +parseInt(plafond_rp_4a);
    $("#totalplafond1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".plafond_rp_4a", function() {
    var sum = 0;
    var i = $(".plafond_rp_4a").index(this); //get index
    var total = 0;
    $(".plafond_rp_4a").each(function(){
        sum += +$(this).val();
    });
    $('#totalplafond1234').val(sum);
    var plafond_rp_4a = $(this).val();
    var plafond_rp_1a = $(".plafond_rp_1a").eq(i).val();
    var plafond_rp_2a = $(".plafond_rp_2a").eq(i).val();
	var plafond_rp_3a = $(".plafond_rp_3a").eq(i).val();
    var qty60 = parseInt(plafond_rp_4a) + parseInt(plafond_rp_1a) + parseInt(plafond_rp_2a) +parseInt(plafond_rp_3a);
    $("#totalplafond1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});

//os_pokok_rp_1a

$(document).on("keyup", ".os_pokok_rp_1a", function() {
    var sum = 0;
    var i = $(".os_pokok_rp_1a").index(this); //get index
    var total = 0;
    $(".os_pokok_rp_1a").each(function(){
        sum += +$(this).val();
    });
    $('#totalos_pokok1234').val(sum);
    var os_pokok_rp_1a = $(this).val();
    var os_pokok_rp_2a = $(".os_pokok_rp_2a").eq(i).val();
    var os_pokok_rp_3a = $(".os_pokok_rp_3a").eq(i).val();
	var os_pokok_rp_4a = $(".os_pokok_rp_4a").eq(i).val();
    var qty60 = parseInt(os_pokok_rp_1a) + parseInt(os_pokok_rp_2a) + parseInt(os_pokok_rp_3a) +parseInt(os_pokok_rp_4a);
    $("#totalos_pokok1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".os_pokok_rp_2a", function() {
    var sum = 0;
    var i = $(".os_pokok_rp_2a").index(this); //get index
    var total = 0;
    $(".os_pokok_rp_2a").each(function(){
        sum += +$(this).val();
    });
    $('#totalos_pokok1234').val(sum);
    var os_pokok_rp_2a = $(this).val();
    var os_pokok_rp_1a = $(".os_pokok_rp_1a").eq(i).val();
    var os_pokok_rp_3a = $(".os_pokok_rp_3a").eq(i).val();
	var os_pokok_rp_4a = $(".os_pokok_rp_4a").eq(i).val();
    var qty60 = parseInt(os_pokok_rp_2a) + parseInt(os_pokok_rp_1a) + parseInt(os_pokok_rp_3a) +parseInt(os_pokok_rp_4a);
    $("#totalos_pokok1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".os_pokok_rp_3a", function() {
    var sum = 0;
    var i = $(".os_pokok_rp_3a").index(this); //get index
    var total = 0;
    $(".os_pokok_rp_3a").each(function(){
        sum += +$(this).val();
    });
    $('#totalos_pokok1234').val(sum);
    var os_pokok_rp_3a = $(this).val();
    var os_pokok_rp_1a = $(".os_pokok_rp_1a").eq(i).val();
    var os_pokok_rp_2a = $(".os_pokok_rp_2a").eq(i).val();
	var os_pokok_rp_4a = $(".os_pokok_rp_4a").eq(i).val();
    var qty60 = parseInt(os_pokok_rp_3a) + parseInt(os_pokok_rp_1a) + parseInt(os_pokok_rp_2a) +parseInt(os_pokok_rp_4a);
    $("#totalos_pokok1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".os_pokok_rp_4a", function() {
    var sum = 0;
    var i = $(".os_pokok_rp_4a").index(this); //get index
    var total = 0;
    $(".os_pokok_rp_4a").each(function(){
        sum += +$(this).val();
    });
    $('#totalos_pokok1234').val(sum);
    var os_pokok_rp_4a = $(this).val();
    var os_pokok_rp_1a = $(".os_pokok_rp_1a").eq(i).val();
    var os_pokok_rp_2a = $(".os_pokok_rp_2a").eq(i).val();
	var os_pokok_rp_3a = $(".os_pokok_rp_3a").eq(i).val();
    var qty60 = parseInt(os_pokok_rp_4a) + parseInt(os_pokok_rp_1a) + parseInt(os_pokok_rp_2a) +parseInt(os_pokok_rp_3a);
    $("#totalos_pokok1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
//angsuran_rp_1a
$(document).on("keyup", ".angsuran_rp_1a", function() {
    var sum = 0;
    var i = $(".angsuran_rp_1a").index(this); //get index
    var total = 0;
    $(".angsuran_rp_1a").each(function(){
        sum += +$(this).val();
    });
    $('#total_angsuran_1234').val(sum);
    var angsuran_rp_1a = $(this).val();
    var angsuran_rp_2a = $(".angsuran_rp_2a").eq(i).val();
    var angsuran_rp_3a = $(".angsuran_rp_3a").eq(i).val();
	var angsuran_rp_4a = $(".angsuran_rp_4a").eq(i).val();
    var qty60 = parseInt(angsuran_rp_1a) + parseInt(angsuran_rp_2a) + parseInt(angsuran_rp_3a) +parseInt(angsuran_rp_4a);
    $("#total_angsuran_1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".angsuran_rp_2a", function() {
    var sum = 0;
    var i = $(".angsuran_rp_2a").index(this); //get index
    var total = 0;
    $(".angsuran_rp_2a").each(function(){
        sum += +$(this).val();
    });
    $('#total_angsuran_1234').val(sum);
    var angsuran_rp_2a = $(this).val();
    var angsuran_rp_1a = $(".angsuran_rp_1a").eq(i).val();
    var angsuran_rp_3a = $(".angsuran_rp_3a").eq(i).val();
	var angsuran_rp_4a = $(".angsuran_rp_4a").eq(i).val();
    var qty60 = parseInt(angsuran_rp_2a) + parseInt(angsuran_rp_1a) + parseInt(angsuran_rp_3a) +parseInt(angsuran_rp_4a);
    $("#total_angsuran_1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});
$(document).on("keyup", ".angsuran_rp_3a", function() {
    var sum = 0;
    var i = $(".angsuran_rp_3a").index(this); //get index
    var total = 0;
    $(".angsuran_rp_3a").each(function(){
        sum += +$(this).val();
    });
    $('#total_angsuran_1234').val(sum);
    var angsuran_rp_3a = $(this).val();
    var angsuran_rp_1a = $(".angsuran_rp_1a").eq(i).val();
    var angsuran_rp_2a = $(".angsuran_rp_2a").eq(i).val();
	var angsuran_rp_4a = $(".angsuran_rp_4a").eq(i).val();
    var qty60 = parseInt(angsuran_rp_3a) + parseInt(angsuran_rp_1a) + parseInt(angsuran_rp_2a) +parseInt(angsuran_rp_4a);
    $("#total_angsuran_1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});

$(document).on("keyup", ".angsuran_rp_4a", function() {
    var sum = 0;
    var i = $(".angsuran_rp_4a").index(this); //get index
    var total = 0;
    $(".angsuran_rp_4a").each(function(){
        sum += +$(this).val();
    });
    $('#total_angsuran_1234').val(sum);
    var angsuran_rp_4a = $(this).val();
    var angsuran_rp_1a = $(".angsuran_rp_1a").eq(i).val();
    var angsuran_rp_2a = $(".angsuran_rp_2a").eq(i).val();
	var angsuran_rp_3a = $(".angsuran_rp_3a").eq(i).val();
    var qty60 = parseInt(angsuran_rp_4a) + parseInt(angsuran_rp_1a) + parseInt(angsuran_rp_2a) +parseInt(angsuran_rp_3a);
    $("#total_angsuran_1234").eq(i).val(qty60);
    //$(".qty6").eq(i).val(qty6); // equal to set index
    //var total2 = $('.total2').text();
   
});

</script>
	
</head>

<body>
    <?php echo $this->session->flashdata('message'); ?>
    <div id="wrapper">
        <div class="pagetabel-content.sidebar-pageTabel right-sidebar-page clearfix">
            <!-- .page-content-wrapper -->
            <div class="page-content-wrapper">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <form action="<?php echo base_url('Create_document/update_mrk_restrukturisasi/')
             .$getdata_restrukturisasi->nomor_nasabah.'-'.$getdata_restrukturisasi->id_restruktur ?>" method="POST">

                                <div class="form-group row">

                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Informasi Debitur</label>
                                        <table id="printTable"
                                            class="table table-bordered table-striped table-hover dt-responsive non-responsive"
                                            style="width:95%;height: 10%;">
                                            <tbody>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->nama_debitur ?>"
                                                            name="name"
                                                            style="width:100% ; border: 0px;background-color: transparent">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CIF</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->nomor_nasabah ?>"
                                                            name="cif"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pasangan</td>
                                                    <td>:</td>

                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->nama_pasangan ?>"
                                                            name="name_pasangan"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value=" <?php echo $getdata_restrukturisasi->temp_tgl_lhir?>"
                                                            name="tmpt_tgllhr"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat Tanggal Lahir Pasangan</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value=" <?php echo $getdata_restrukturisasi->temp_tgl_lhir_psngn;?>"
                                                            name="tmpt_tgllhr_pasangan"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor KTP Debitur</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value=" <?php echo $getdata_restrukturisasi->no_ktp_debitur;?>"
                                                            name="ktp"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Nomor KTP Pasangan</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value=" <?php echo $getdata_restrukturisasi->no_ktp_pasangan;?>"
                                                            name="ktp_pasangan"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Alamat Debitur</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value=" <?php echo $getdata_restrukturisasi->alamat_debitur;?>"
                                                            name="alamat"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td>Alamat pasangan</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value=" <?php echo $getdata_restrukturisasi->alamat_pasangan;?>"
                                                            name="alamat_pasangan"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Bidang Usaha</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php  echo $getdata_restrukturisasi->bidang_usaha ?>"
                                                            name="bidang_usaha"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Lokasi Usaha</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->lokasi_usaha;?>"
                                                            name="lokasi_usaha"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Nama Group Usaha</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->nama_grup_usaha;?>"
                                                            name="group_usaha"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Debitur Sejak</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->debitur_sejak; ?>"
                                                            name="debitur_sejak"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Menunggak Sejak</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->menunggak_sejak; ?>"
                                                            name="menunggak_sejak"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Hari tungakan</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->hari_tunggakan  ?>"
                                                            name="hari_tunggakan"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Kolektibilitas</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->kolektibilitas;  ?>"
                                                            name="kolektibilitas"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Approval Saat Inisiasi Awal</td>
                                                    <td>:</td>
                                                    <td><input
                                                            value="<?php echo $getdata_restrukturisasi->approval_saat_inisiasi_awal ?>"
                                                            name="approval_inisial_awal"
                                                            style=" width:100% ; border: 0px;background-color: transparent">
                                                    </td>

                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Seluruh Fasilitias Pembiyaan/Pinjaman yang dimiliki
                                            oleh debitur di BSS</label>

                                        <table class="tablex table-bordered table-striped table-hover" id="table2">

                                            <tr>
                                                <th rowspan="9">No</th>
                                                <th hidden>NomorRekening</th>
                                                <th>Jenis <p>Fasilitas</p>
                                                </th>
                                                <th>DPD</th>
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
            $_data_length = count($restrukturisasi_getdata);
            $totalPlafond = 0;
            $totalA = 0;
            $totalB = 0;
            $totalC = 0;
            $totalD = 0;
        ?>
            <?php foreach ($restrukturisasi_getdata as $value) { 
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
                                                        <textarea name="norek[]" cols="10"
                                                            style="background-color: transparent;"
                                                            rows="1"><?php echo $value->norek ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="jenis_fasilitas[]" cols="10"
                                                            style="background-color: transparent;" rows="5"
                                                            cols="2"><?php echo $value->jenis_fasilitas_pembayaran ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="dpd[]" cols="4"
                                                            style="background-color: transparent;"
                                                            rows="1"><?php echo $value->dpd ?></textarea>

                                                    </td>
                                                    <td>
                                                        <input class="qty" value="<?php echo $value->plafond ?>"
                                                            name="plafond[]"
                                                            style="width:110px!important; border: 0;background-color: transparent">

                                                    </td>
                                                    <td>
                                                        <input class="qty2" value="<?php echo $value->os_per ?>"
                                                            name="os_per[]"
                                                            style="border: 0;background-color: transparent;width:100%">

                                                    </td>
                                                    <td>

                                                        <input class="qty3"
                                                            value="<?php echo $value->jangka_waktu_tenor ?>"
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
                                                            value="<?php echo $value->tunggakan_denda ?>"
                                                            name="tunggakan_denda[]"
                                                            style="border: 0;background-color: transparent;width:100%">

                                                    </td>
                                                    <td>
                                                        <input value="<?php echo $total ?>" id="totalABC[]" class="qty6"
                                                            name="totalABC[]"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>


                                                </tr>
                                                <?php $_idx_loop++; $total = 0;?>
                                                <?php } ?>
                                                <tr>

                                                    <th colspan="2" align="center">Total</th>
                                                    <td hidden></td>
                                                    <td></td>
                                                    <td class="total1"><input value="<?php echo $getdata_restrukturisasi->totalplafond ?>"
                                                            readonly="" id="totalplafond" name="totalplafond"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td class="total2"><input
                                                            value="<?php echo $getdata_restrukturisasi->totalBakiDebet ?>"
                                                            readonly="" id="totalBakiDebet" name="totalBakiDebet"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td class="total3"></td>
                                                    <td class="total4"><input
                                                            value="<?php echo $getdata_restrukturisasi->totalDueBunga ?>"
                                                            readonly="" id="totalDueBunga" name="totalDueBunga"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td class="total5"><input
                                                            value="<?php echo $getdata_restrukturisasi->totalDUE_CH ?>"
                                                            readonly="" id="totalDUE_CH" name="totalDUE_CH"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td class="total6"><input
                                                            value="<?php echo $getdata_restrukturisasi->total_ABC ?>"
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
                                                    <th>Tipe <p>Jaminan</p>
                                                    </th>
                                                    <th>Deskripsi</th>
                                                    <th>Nilai <p> Pasar(Rp)</p>
                                                    </th>
                                                    <th>Nilai <p> Likuidasi(Rp)</p>
                                                    </th>
                                                    <th>Nilai Penjaminan<p> HT / Fidusia (Rp)</p>
                                                    </th>
                                                    <th>Keterangan<p> Aprasial</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $_idx_loop = 1; $_data_length = count($restrukturisasi_getdata);
                                                      $totalPlafond = 0;
                                                      $totalA1 = 0;
                                                      $totalB1 = 0;
                                                      $totalC1 = 0    ;
                                                ?>
                                                <?php foreach ($restrukturisasi_getdata as $key) { 
                                                       $totalA1 = $totalA1 + $key->mv_lama;
                                                       $totalB1 = $totalB1 + $key->lv_lama;
                                                       $totalC1= $totalC1; //+ $key->DUE_CH;      
                                                 ?>
                                                <tr>

                                                    <td><?php echo $_idx_loop ?></td>
                                                    <td>
                                                        <textarea name="jenis_fasilitas_agunan[]"
                                                            style="border: 0;background-color: transparent;width:100%"
                                                            cols="25"
                                                            rows="7"><?php echo $key->jenis_fasilitas_dimiliki ?></textarea>

                                                    </td>
                                                    <td>
                                                        <textarea name="deskripsi[]"
                                                            style="border: 0;background-color: transparent;width:100%"
                                                            cols="25" rows="7"><?php echo $key->deskripsi ?></textarea>
                                                    </td>
                                                    <td><input class="qty7" value="<?php echo $key->mv_lama ?>"
                                                            name="mv_lama[]"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="qty8" value="<?php echo $key->lv_lama ?>"
                                                            name="lv_lama[]"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="qty81" value="<?php echo $key->mv_baru ?>"
                                                            name="mv_baru[]"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>

                                                    <td>
                                                        <textarea name="keterangan_aprasisal[]"
                                                            style="border: 0;background-color: transparent;width:100%"
                                                            cols="20" cols="2"
                                                            rows="7"><?php echo $key->ket ?></textarea>

                                                    </td>

                                                </tr>
                                                <?php $_idx_loop++; ?>
                                                <?php   } ?>
                                                <tr>
                                                    <th colspan="2" align="center">Total</th>
                                                    <td></td>
                                                    <td><input class="total7"
                                                            value="<?php echo $getdata_restrukturisasi->total_mv_lama ?>"
                                                            name="total_mv_lama"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="total8"
                                                            value="<?php echo $getdata_restrukturisasi->total_lv_lama ?>"
                                                            name="total_lv_lama"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="total81"
                                                            value="<?php echo $getdata_restrukturisasi->total_mv_baru ?>"
                                                            name="total_mv_baru"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>

                                                    <td></td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Agunan Yang Dimiliki</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="summernote1">
<?php echo $getdata_restrukturisasi->catatan_agunandimiliki ?>
                                            </div>
                                        </div>
<textarea style="display: none;" name="summernote3" class="summernote3" id="sm3"
 cols="5" rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-11">
                                        <label for="inputFirstname"></label>

                                        <table class="tablex table-bordered table-responsive table-hover" id="table2">

                                            <tr>
                                                <th>No</th>
                                                <th>Bank</th>
                                                <th>Fasilitas</th>
                                                <th>Bunga (%)</th>
                                                <th>Jangka Waktu</th>
                                                <th>Plafond (Rp)</th>
                                                <th>O/S Pokok (Rp)</th>
                                                <th>Angsuran (Rp)</th>
                                                <th>Kol</th>
                                            </tr>
                                            <tbody>




                                                <tr>



                                                    <td>1</td>
                                                    <td><input class="inputx2"
                                                            value="<?php echo $getdata_restrukturisasi->bank_1a; ?>"
                                                            name="bank_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->fasilitas_1a; ?>"
                                                            name="fasilitas_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->bunga_persen_1a; ?>"
                                                            name="bunga_persen_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->jangka_waktu_1aa; ?>"
                                                            name="jangka_waktu_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx plafond_rp_1a"
                                                            value="<?php echo $getdata_restrukturisasi->plafond_rp_1a ; ?>"
                                                            name="plafond_rp_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx os_pokok_rp_1a"
                                                            value="<?php echo $getdata_restrukturisasi->os_pokok_rp_1a; ?>"
                                                            name="os_pokok_rp_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx angsuran_rp_1a"
                                                            value="<?php echo $getdata_restrukturisasi->angsuran_rp_1a; ?>"
                                                            name="angsuran_rp_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->kol_1a; ?>"
                                                            name="kol_1a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>



                                                </tr>
                                                <tr>



                                                    <td>2</td>
                                                    <td><input class="inputx2"
                                                            value="<?php echo $getdata_restrukturisasi->bank_2a; ?>"
                                                            name="bank_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->fasilitas_2a; ?>"
                                                            name="fasilitas_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->bunga_persen_2a; ?>"
                                                            name="bunga_persen_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->jangka_waktu_2aa; ?>"
                                                            name="jangka_waktu_2aa"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx plafond_rp_2a"
                                                            value="<?php echo $getdata_restrukturisasi->plafond_rp_2a ?>"
                                                            name="plafond_rp_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx os_pokok_rp_2a"
                                                            value="<?php echo $getdata_restrukturisasi->os_pokok_rp_2a ?>"
                                                            name="os_pokok_rp_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx angsuran_rp_2a"
                                                            value="<?php echo $getdata_restrukturisasi->angsuran_rp_2a  ?>"
                                                            name="angsuran_rp_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->kol_2a; ?>"
                                                            name="kol_2a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>



                                                </tr>
                                                <tr>



                                                    <td>3</td>
                                                    <td><input class="inputx2"
                                                            value="<?php echo $getdata_restrukturisasi->bank_3a; ?>"
                                                            name="bank_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->fasilitas_3a; ?>"
                                                            name="fasilitas_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->bunga_persen_3a; ?>"
                                                            name="bunga_persen_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->jangka_waktu_3aa; ?>"
                                                            name="jangka_waktu_3aa"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx plafond_rp_3a"
                                                            value="<?php echo $getdata_restrukturisasi->plafond_rp_3a ?>"
                                                            name="plafond_rp_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx os_pokok_rp_3a"
                                                            value="<?php echo $getdata_restrukturisasi->os_pokok_rp_3a ?>"
                                                            name="os_pokok_rp_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx angsuran_rp_3a"
                                                            value="<?php echo $getdata_restrukturisasi->angsuran_rp_3a ?>"
                                                            name="angsuran_rp_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->kol_3a; ?>"
                                                            name="kol_3a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>



                                                </tr>
                                                <tr>



                                                    <td>4</td>
                                                    <td><input class="inputx2"
                                                            value="<?php echo $getdata_restrukturisasi->bank_4a; ?>"
                                                            name="bank_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->fasilitas_4a; ?>"
                                                            name="fasilitas_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->bunga_persen_4a; ?>"
                                                            name="bunga_persen_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->jangka_waktu_4aa; ?>"
                                                            name="jangka_waktu_4aa"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx plafond_rp_4a"
                                                            value="<?php echo $getdata_restrukturisasi->plafond_rp_4a  ?>"
                                                            name="plafond_rp_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx os_pokok_rp_4a"
                                                            value="<?php echo $getdata_restrukturisasi->os_pokok_rp_4a ?>"
                                                            name="os_pokok_rp_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx angsuran_rp_4a"
                                                            value="<?php echo $getdata_restrukturisasi->angsuran_rp_4a ?>"
                                                            name="angsuran_rp_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx"
                                                            value="<?php echo $getdata_restrukturisasi->kol_4a; ?>"
                                                            name="kol_4a"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>



                                                </tr>

                                                <tr>
                                                    <th colspan="5">Total</th>
                                                    <td><input class="inputx" value="<?php echo $getdata_restrukturisasi->totalplafond_bank; ?>" name="totalplafond1234" id="totalplafond1234"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx" value="<?php echo $getdata_restrukturisasi->totalos_pokok_bank; ?>" name="totalos_pokok1234" id="totalos_pokok1234"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td><input class="inputx" value="<?php echo $getdata_restrukturisasi->total_angsuran_bank; ?>" name="total_angsuran_1234"  id="total_angsuran_1234"
                                                            style="border: 0;background-color: transparent;width:100%">
                                                    </td>
                                                    <td></td>




                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-sm-11">
                                        <label for="inputState">Permasalahan Debitur</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="summernote2">
<?php echo $getdata_restrukturisasi->catatan_dasar_permasalahandebitur ?>
                                            </div>
                                        </div>
                                        <textarea style="display: none;" name="summernote4" class="summernote4" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>
                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Usulan Restrukturisasi Kredit</label>
                                        <?php $idx = 0; ?>
                                        <?php foreach ($search_norek AS $norek) { ?>
                                        <?php if(!empty($norek)){ ?>
                                        <?php $_tbl = 'myTable4_'.$idx; ?>
                                        <?php //echo var_dump($norek); ?>
                                        <table class="tablex table-bordered table-striped table-hover"
                                            id="<?php echo $_tbl; ?>">
                                            <tr>

                                                <th>Jenis Fasilitas</th>
                                                <th>Fasilitas Awal Sebelum Restrukturisasi</th>
                                                <th>Restruktur 1</th>
                                                <th hidden>norek</th>

                                            </tr>
                                            <?php foreach ($usulan_kredit  as $value) { ?>
                                            <?php if($value->key == $norek->key) { ?>
                                            <tbody>

                                                <tr>

                                                    <td>
                                                        <textarea name="jenis_fasilitas_a1[]" id="jenis_fasilitas_a1[]"
                                                            cols="10" style="background-color: transparent;width: 100%"
                                                            rows="2"><?php echo $value->Jenis_fasilitas ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="jenis_fasilitas_a2[]" id="jenis_fasilitas_a2[]"
                                                            cols="10" style="background-color: transparent;width: 100%"
                                                            rows="2"><?php echo $value->fasilitas_sblm_restrukturisasi ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="jenis_fasilitas_a3[]" id="jenis_fasilitas_a3[]"
                                                            cols="10" style="background-color: transparent;width: 100%"
                                                            rows="3"><?php echo $value->fasilitas_stlh_restrukturisasi ?></textarea>
                                                    </td>
                                                    <td hidden>
                                                        <textarea name="idulasan[]" id="idulasan[]" cols="10"
                                                            style="background-color: transparent;width: 100%"
                                                            rows="2"><?php echo $value->key ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                            <?php } ?>
                                        </table>
                                        <?php $idx++; ?>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="insertRow4('<?php echo $norek->key; ?>', '<?php echo $_tbl; ?>')"
                                            value="add">ADD</button>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="myDeleteFunction4()" value="add">Delete</button>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>

                                    <div class="col-sm-11">

                                        <label for="inputState"><b>PENGHAPUSAN/KERINGANAN (apabila ada)</b></label>

                                        <table style="width: 96%;"
                                            class="tablex table-bordered table-striped table-hover" id="myTable">
                                            <!--    <table id="" border="1"  style="width: 96%;">-->
                                            <tr>
                                                <th style="min-width:10px!important;">Deskripsi</th>
                                                <th>Pokok</th>
                                                <th>%</th>
                                                <th>Bunga</th>
                                                <th>%</th>
                                                <th style="border:0;background-color: transparent;">Denda</th>
                                                <th>%</th>
                                            </tr>
                                            <?php foreach ($restrukturisasi_pengapusan as $value11) { ?>
                                            <tr>
                                                <td><input value="<?php echo $value11->deskripsi_a   ?> " class="inputx"
                                                        id="deskripsi_a[]" name="deskripsi_a[]"
                                                        style="border:0;background-color: transparent"></td>
                                                <td><input value="<?php echo $value11->pokok_a  ?> " class="inputx"
                                                        id="pokok_a[]" name="pokok_a[]"
                                                        style="border:0;background-color: transparent;width: 95%!important;">
                                                </td>
                                                <td><input value="<?php echo $value11->persen_1a  ?> " class="inputx"
                                                        id="persen_1a[]" name="persen_1a[]"
                                                        style="border:0;background-color: transparent;width: 95%!important;">
                                                </td>
                                                <td><input value="<?php echo $value11->bunga_a  ?> " class="inputx"
                                                        id="bunga_a[]" name="bunga_a[]"
                                                        style="border:0;background-color: transparent;width: 95%!important;">
                                                </td>
                                                <td><input value="<?php echo $value11->persen_2a  ?> " class="inputx"
                                                        id="persen_2a[]" name="persen_2a[]"
                                                        style="border:0;background-color: transparent;width: 95%!important;">
                                                </td>
                                                <td><input value="<?php echo $value11->denda_a  ?> " class="inputx"
                                                        id="denda_a[]" name="denda_a[]"
                                                        style="border:0;background-color: transparent;width: 95%!important;">
                                                </td>
                                                <td><input value="<?php echo $value11->persen_3a  ?> " class="inputx"
                                                        id="persen_3a[]" name="persen_3a[]"
                                                        style="border:0;background-color: transparent;width: 95%!important;">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <button type="button" id="btnAdd[]" class="button-add" onClick="insertRow()"
                                            value="add">ADD</button>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="myDeleteFunction()" value="add">Delete</button>
                                    </div>

                                    <div class="col-sm-11">
                                        <label for="inputState">Usulan Restrukturisasi Kredit </label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="summernote5">
<?php echo $getdata_restrukturisasi->catatan_restrukturisasi_kredit ?>
                                            </div>
                                        </div>
                                        <textarea style="display: none;" name="summernote6" class="summernote6" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>
                                    <div class="col-sm-11">
                                        <label for="inputState">Dasar Pertimbangan</label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="summernote8">
<?php echo $getdata_restrukturisasi->catatan_dasar_pertimbangan ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote7" class="summernote7" id="sm3"
                                            cols="5" rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Analisa Kuantitatif :</label>
                                        <p>


                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <tr>
                                                    <td colspan="3"><b>Laporan Rugi Laba proforma</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Periode : <input value="" type="text"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="input data" name="periode_a"></b></td>
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>Pendapatan</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->pendapatan_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pendapatan_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga Pokok Penjualan</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->hrga_pokok_penjualan_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="hrga_pokok_penjualan_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Depresisai dan Amortisasi</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->depresisai_amortisasi_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="depresisai_amortisasi_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Kotor</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_kotor_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_kotor_a">
                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td>Biaya Usaha - Variabel (spt.By Penjualan)</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_variabel_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_variabel_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Usaha - Tetap (spt.listrik,tlp,air,gaji)</td>

                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_tetap_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_tetap_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Operasional</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_opersaional_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_opersaional_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Hidup</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_hidup_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_hidup_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Angsuran di Tempat lain</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->angsuran_tempat_lain_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="angsuran_tempat_lain_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Angsuran di BSS</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->angsuran_bss_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="angsuran_bss_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>biaya lain</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_lain_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_lain_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Pendapatan Lain</td>

                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->pendapatan_lain_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pendapatan_lain_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba (Rugi)Sebelum Pajak</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_rugi_sebelum_pajak_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_rugi_sebelum_pajak_a">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pajak</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->pajak_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pajak_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Laba Bersih</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_bersih_a ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_bersih_a">
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                    </div>

                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Analisa Kuantitatif :</label>
                                        <p>


                                            <table class="tablex table-bordered table-striped table-hover" id="table2">
                                                <tr>
                                                    <td colspan="3"><b>Laporan Rugi Laba proforma</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><b>Periode : <input value="" type="text"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="input data" name="periode_a"></b></td>
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>Pendapatan</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->pendapatan_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pendapatan_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga Pokok Penjualan</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->hrga_pokok_penjualan_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="hrga_pokok_penjualan_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Depresisai dan Amortisasi</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->depresisai_amortisasi_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="depresisai_amortisasi_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Kotor</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_kotor_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_kotor_b">
                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td>Biaya Usaha - Variabel (spt.By Penjualan)</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_variabel_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_variabel_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Usaha - Tetap (spt.listrik,tlp,air,gaji)</td>

                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_tetap_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_tetap_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba Operasional</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_opersaional_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_opersaional_b">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Hidup</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_hidup_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_hidup_b">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Angsuran di Tempat lain</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->angsuran_tempat_lain_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="angsuran_tempat_lain_a">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Angsuran di BSS</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->angsuran_bss_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="angsuran_bss_b">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>biaya lain</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->biaya_lain_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="biaya_lain_b">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Pendapatan Lain</td>

                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->pendapatan_lain_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pendapatan_lain_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laba (Rugi)Sebelum Pajak</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_rugi_sebelum_pajak_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_rugi_sebelum_pajak_b">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pajak</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->pajak_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="pajak_b">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Laba Bersih</td>
                                                        <td><input
                                                                value="<?php echo $getdata_restrukturisasi->laba_bersih_b ?>"
                                                                type="number" title="input data"
                                                                style="border:0px; background-color: transparent; width: 100%;"
                                                                title="" name="laba_bersih_b">
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                    </div>
                                    <div class="col-sm-11">
                                        <label for="inputState">Catatan Analisa Kuantitatif </label>
                                        <div class="col-lg-10 col-md-9" style="width: 96%; ">
                                            <div style=" height: 50%;" id="" class="summernote11">
<?php echo $getdata_restrukturisasi->catatan_analisakuantitatif ?></div>
                                        </div>
                                        <textarea style="display: none;" name="summernote12" class="summernote12"
                                            id="sm3" cols="5" rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Lampiran</label>

                                        <table class="tablex table-bordered table-striped table-hover" id="myTable2">

                                            <tr>

                                                <th>Dokumen</th>
                                                <th>Ada</th>

                                            </tr>
                                            <tbody>
                                            <?php $indx=0; ?>
                                                <?php foreach ($restrukturisasi_lampiran as $value4){ ?>
                                                <tr>

                                                    <td><input value="<?php echo $value4->datadokumen; ?>" type="text"
                                                            name="datadokumen[]" id="datadokumen[]"
                                                            style="width:100%!important; border: 2;" /></td>
                                                    <?php $ada_checked = ''; ?>
                                                    <?php if(!empty($value4->adadokumen)) { $ada_checked = 'checked'; } ?>
                                                    <td><input value="Ada" <?php echo $ada_checked; ?> type="checkbox" name="ada_dokumen_<?php echo $indx ?>"
                                                     id="ada_dokumen"  class="adadokumen"style="margin: 0 auto;display: flex;"><br></td>
                                                       


                                                </tr>
                                                <?php $indx++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" id="btnAdd[]" class="button-add" onClick="insertRow2()"
                                            value="add">ADD</button>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="myDeleteFunction2()" value="add">Delete</button>
                                    </div>

                                    <div class="col-sm-11">
                                        <label for="inputFirstname">Deviasi restruktur</label>

                                        <table class="tablex table-bordered table-striped table-hover" id="myTable3">

                                            <tr>

                                                <th>Jenis Deviasi</th>
                                                <th>Ada</th>

                                            </tr>

                                            <tbody>
                                            <?php $indxx=0; ?>
                                                <?php foreach ($restrukturisasi_deversiasi as $value5){ ?>
                                                <tr>

                                                    <td><input type="text"
                                                            value="<?php echo $value5->jenis_devisiasi; ?>"
                                                            name="jenis_devisiasi[]" id="jenis_devisiasi[]"
                                                            style="width:100%!important; border: 2;" /></td>
                                                    <?php $ada_checked = ''; ?>
                                                    <?php if(!empty($value5->adadevisiasi)) { $ada_checked = 'checked'; } ?>
                                                    <td><input value="Ada" <?php echo $ada_checked; ?> type="checkbox"
                                                    name="ada_devisiasi_<?php echo $indxx ?>" class="adadevisiasi"
                                                            style="margin: 0 auto;display: flex;" value="Ada"><br></td>

                                                </tr>
                                                <?php $indxx++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" id="btnAdd[]" class="button-add" onClick="insertRow3()"
                                            value="add" >ADD</button>
                                        <button type="button" id="btnAdd[]" class="button-add"
                                            onClick="myDeleteFunction3()" value="add">Delete</button>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit"
                                    style="display: none">Save</button>
                                <button type="button" class="btn btn-primary px-4 float-right"
                                    onclick="test()">Save</button>
                                <a href="<?php echo base_url ('create_document/index')?>" button type="submit"
                                    class="btn btn-primary px-4 float-right">Cancel</button></a>
                                <!-- <input type="button"  value="Print 1st Div" onclick="javascript:printDiv('printablediv')" /> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.ready(function {} {
        $('#table2').removeClass('table');
        $('#table2').addClass('tablex');
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        //var dasarpertimbangan = $('.summernote1').summernote();      
        //$('.summernote2').summernote();
        $('.summernote1').summernote();
        $('.summernote2').summernote();
        $('.summernote5').summernote();
        $('.summernote8').summernote();
        $('.summernote11').summernote();
    });

    function test() {
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