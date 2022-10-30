<script src="<?php echo base_url("template/assets/js/vendor/jquery-2.1.4.min.js") ?>"></script>

<!-- START GOOGLE MAP -->

<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>

<script src="<?php echo base_url("template/assets/js/lib/gmap/gmaps.js") ?>"></script>
<script src="<?php echo base_url("template/assets/js/lib/gmap/gmap.init.js") ?>"></script>
<!-- END GOOGLE MAP -->

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="<?php echo base_url("template/images/shortcut-icon.png") ?>">
<link rel="stylesheet" href="<?php echo base_url("template/assets/css/normalize.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("template/assets/css/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("template/assets/css/font-awesome.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("template/assets/css/themify-icons.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("template/assets/css/flag-icon.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("template/assets/css/cs-skin-elastic.css") ?>">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="<?php echo base_url("template/assets/scss/style.css") ?>">
<link href="<?php echo base_url("template/assets/css/lib/vector-map/jqvmap.min.css") ?>" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<script>
    $(document).ready(function () {
        $('.data').DataTable({
            "pageResize": true,
            "autoWidth": false
        });
    });
</script>    
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $(function(){
        $('.tombol').click(function(){
            $('.logo-al').toggle();
        });
    })
</script>


<!--TANGGAL PLUGIN-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
        var options = $.extend(
                {}, // empty object
                $.datepicker.regional["id"], // fr regional
                {dateFormat: "d MM, y" /*, ... */} // your custom options
        );        

        $(".tanggal").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "DD, d MM yy"
        });      
       
    })
</script>
<!--TANGGAL PLUGIN-->

<!--RESPONSIVE BOOTSTRAP WINDOW-->
<script src='https://cdn.rawgit.com/JacobLett/IfBreakpoint/e9fcd4fd/if-b4-breakpoint.min.js'></script>
<script>
    $(document).ready(function(){
    // Update on window resize
    
//    $('.navbar-toggler').click(function(){
//       $('#menuToggle').trigger('click'); 
//    });
    
    $( window ).resize( function(){
        if ( xs == true ) { 
            $('body').removeClass('open');
            $('.logo-al').show();
        }
        
        if( sm == true){
//            alert('sm');
        }
        
        if( md == true){
//            $('#menuToggle').trigger('click');
//            alert('md');
        }
        
        if( lg == true){
//            alert('lg');
        }
    }); 

});
</script>
<!--RESPONSIVE BOOTSTRAP WINDOW-->

<script>
    function findLokasi() {
        
        $.ajax({
            type: "GET",
            url: "lokasi.json",
            dataType: " json",
            success: function (data) {
                var d = new google.maps.InfoWindow();
                var e;

                $.each(data, function (i, b) {
                    e = new google.maps.Marker({
                        position: new google.maps.LatLng(b.lat, b.lng),
                        map: map
                    });

                    lokasi.push(e);
                    google.maps.event.addListener(e, 'click', (function (a, i) {
                        return function () {
                            d.setContent('<div><h3>' + b.alamat + '<h3><p>' + b.keterangan + '</p><p>' + b.keterangan1 + '</p></div>');
                            d.open(map, a)
                        }
                    })(e, i))
                });


            }
        });
        
    }
    
    
    $(document).ready(function(){
        alert('haai Al Bahri');
    }));
</script>