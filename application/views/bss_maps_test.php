<!--<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7_f6fTQagVISVELyzcIML6i5ea3_kTeI"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPpwtHPht7fUkfsPVMtYAUpGk3vx0wQkE"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>


<script>
    var map;
    var lokasi;
    var bounds;
  
    function initMap() {
        map = new google.maps.Map(document.getElementById('googleMap'), {
            center: {lat: -6.200000, lng: 106.816666},
            zoom: 10
        });
    bounds = new google.maps.LatLngBounds();
      tampillatlong();
	  poly = new google.maps.Polyline({
            geodesic: true,
            strokeColor: '#000000',
            strokeOpacity: 1.0,
            strokeWeight: 3
        });
        
    }
    function tampillatlong() {
         //console.log('Debug Objects:');
       var agent = '';//$('#agent').val();
       var datestart =  '';//$('#start').val();
       var dateend = '';//$('#end').val();
       console.log($('#agent').val());
       console.log($('#start').val());
       console.log($('#end').val());
       if($('#agent').val()){
           agent = $('#agent').val();
       } 
       if($('#start').val()){
           datestart = $('#start').val();
       }
        
       if($('#end').val()){
           dateend = $('#end').val();
       }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("maps/getlocation") ?>',
            async: false,
            data : {
                agentid : agent,
                tglawal : datestart,
                tglakhir : dateend
            },
            dataType: 'json',
            success: function (data) {
                var i;
                var nama;
                var lat;
                var lng;
                for (i = 0; i <data.length; i++) {
                    nama = data[i].user;
                    lat = data[i].lat;
                    lng = data[i].lng;
                    addmarker(lat,lng,"Nama Collector :"+nama);
                    //console.log(nama + ' - ' + lat + ' - ' + lng);

                }
                console.log('Debug Objects:' + data);

            }

        });
    }
    

    function addmarker(lat, lng, nama) {
        lokasi = new google.maps.LatLng(lat, lng);
        bounds.extend(lokasi);
        var marker = new google.maps.Marker({
            map: map,
            position: lokasi
        });
		var path = poly.getPath();
        path.push(lokasi);

        var infowindow = new google.maps.InfoWindow({
            content: nama
        });
        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });

        map.fitBounds(bounds);
		poly.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initMap, map);

</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7_f6fTQagVISVELyzcIML6i5ea3_kTeI&callback=initMap"
async defer></script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <div class="panel-heading">
                <h4 class="panel-title"> Basic Map</h4>
            </div>
            <div class="panel-body">
                <div class="col-lg-12"> 
                    <form action="<?php echo base_url('content/read_um_map2'); ?>" method="POST"> 
                        <div class="col-md-2">
                            <select style=" height: 30px"  id="agent" name="agent" class="fancy-select form-control">
                                <option value="Non">Select Collector</option>
                                <?php foreach ($agent as $item) { ?>
                                <option  value="<?php echo $item->f_agentid ?>"><?php echo $item->f_agentname ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <div style=" height: 30px" class="input-daterange input-group">
                                <span style=" height: 30px"  class="input-group-addon" style=''><i class="fa fa-calendar"></i></span>
                                <input id="start" style=" height: 30px"   type="text" class="form-control" name="start" />
                                <span style=" height: 30px"  class="input-group-addon">to</span>
                                <input id="end" style=" height: 30px"  type="text" class="form-control" name="end" />
                            </div>
                        </div>
                        <div style=" height: 30px"  class="col-md-1">
                            <button type="button" onclick="initMap()"  class="btn btn-primary" style="border-radius: 0px 10px 0px 0px; height: 30px;"  ><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12"> 
                    <div class="googleMap" id="googleMap" style="width:100%;height:580px; margin-top: 20px;"></div>

                </div>

            </div>

        </div>
    </div>
</div>

<br>
<br>
<br>
<br>

<!-- Elemen yang akan menjadi kontainer peta -->
