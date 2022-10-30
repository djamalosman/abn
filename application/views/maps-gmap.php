<!--<div class="d-inline-block w-100" >
    <div class="content mt-3">
        <div class="animated fadeIn">-->

<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>
<script src="assets/js/lib/gmap/gmaps.js"></script>
<script src="assets/js/lib/gmap/gmap.init.js"></script>
<script>
    var map;
    var lokasi = [];
    function initialize() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -0.789275, lng: 113.92132},
            zoom: 5,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    findLokasi();

    function findLokasi() {
        //            alert($('base').attr('href')+"lokasi.json");
        $.ajax({
            type: "GET",
            url: $('base').attr('href') + "als_asset/map/lokasi.json",
            dataType: "json",
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
</script>            

        
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <div class="panel-heading">
                <h4 class="panel-title"> Basic Map</h4>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="col-md-5">
                            <input type="text"  class="form-control" placeholder=" Search...">     
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary" style="border-radius: 0px 10px 0px 0px"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                         <div class="map" id="map"></div>
                    </div>
                </div>


            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Basic Map</h4>
            </div>

            <div class="form-inline" style="margin-top: 15px; margin-left: 15px">
                <input type="text" placeholder=" Search..." class="form-control">
                <button type="submit" class="btn btn-primary" style="border-radius: 0px 10px 0px 0px"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>

            <div class="gmap_unix card-body">
                <div class="map" id="map"></div>
            </div>
        </div>
        <!-- /# card -->
    </div>
</div>
<!-- /# row -->
<!--        </div> .animated 
    </div> .content 
</div>-->

<!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>-->
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<!-- Gmaps -->
