<!DOCTYPE html>
<html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuc8u410N20YYP_280jkEFFyTNZZDdF3U"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

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
            $(function () {
                findLokasi();
            });
        </script>

    </body>
</html>