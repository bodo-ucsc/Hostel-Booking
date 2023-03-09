<?php

class ShowMap
{
    public $lats;
    public $lngs;
    public $src;
    public $dest;

    public function __construct($address, $destination = null)
    {
        $src = $address;
        $dest = $destination;

        echo '<div class=" margin-left-5 map" id="map_container">MAP</div>';

        //echo "<div id='address'>Address: $address</div>";
        $apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
        $base = BASEURL;
        $radius = 1000;
        $type = 'restaurant';
        $address = str_replace(array(','), '', $address);
        $address = str_replace(' ', '+', $address);
        $APIKEY = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=$APIKEY";
        $response = file_get_contents($url);
        $results = json_decode($response, true);

        if ($results['status'] == 'OK') {
            $lats = $results['results'][0]['geometry']['location']['lat'];
            $lngs = $results['results'][0]['geometry']['location']['lng'];

            //when window load then call initMap function
            //window.addEventListener('load', initMap);
        } else {
            echo 'Geocode was not successful for the following reason: ' . $results['status'];
        }

        echo '
    <br><span class="header-2 margin-left-4">Near By Places</span>
    <div id="nearby"></div>';

        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$apiKey&location=$lats,$lngs&radius=$radius&type=$type";
        $response = file_get_contents($url);
        $results = json_decode($response, true);

        //echo json_encode($results);
        // //print_r($results);
        $places = array();
        $places = $results['results'];
        // print_r($places);
        // return $results;
        //return $places;
        //$results = '';

        echo '<div class=" row padding-4">';

        $limit = 10;
        $count = 0;
        foreach ($places as $place) {
            if ($count >= $limit) {
                break;
            }

            $name = $place['name'];
            $address = $place['vicinity'];
            if (isset($place['rating'])) {

                $rating = $place['rating'];
                if (isset($place['photos'])) {
                    $photos = $place['photos'];
                    $photoUrl = '';
                    if ($photos) {
                        $photoReference = $photos[0]['photo_reference'];
                        $photoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=200&photoreference=$photoReference&key=$apiKey";

                        echo '<div class="col-4 margin-horizontal-2 margin-vertical-1 fill-container">';
                        echo "<div class='shadow border-rounded padding-3 map-card img-cover'>";
                        echo "<img class='fill-container img-cover border-rounded' src='$photoUrl' alt='Place Image'>";
                        echo "<div class='margin-top-n4 flex cursor-default'> <div class='bg-white border-rounded-more shadow padding-2 padding-horizontal-4'><i class='vertical-align-middle feather-body' data-feather='star'></i><span class='vertical-align-middle margin-left-2'>$rating</span></div></div>";
                        echo "<h2>$name</h2>";
                        echo "<p>$address</p>";
                        echo '</div>';
                        echo '</div>';

                    }
                }
            }
            $count++;
        }

        echo '</div>
        <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap"></script>
        ';

        if (isset($lats) && isset($lngs)) {
            echo "
            <script>
                initMap(); 
        
                function initMap( ) { 
                    
                    var location = {
                        lat: parseFloat($lats),
                        lng: parseFloat($lngs)
                    };
        
                    var map = new google.maps.Map(document.getElementById('map_container'), {
                        zoom: 17,
                        center: location
                    });

                    var marker = new google.maps.Marker({
                        map: map,
                        position: location
                    });
                    
                    if (typeof '$src' !== 'undefined' && typeof '$dest' !== 'undefined') {
                        var routeFinder = new google.maps.DirectionsService();
                        var showRoute = new google.maps.DirectionsRenderer({
                            map: map,
                            suppressMarkers: true,
                            preserveViewport: true
                        });

                        var direction = {
                            origin: '$src',
                            destination: '$dest',
                            travelMode: 'TRANSIT'
                        };

                        routeFinder.route(direction, function(result, status) {
                            if (status == 'OK') {
                                var numOfRoutes = result.routes.length;
                                for (var i = 0;i < numOfRoutes;i++) {

                                    var route = result.routes[i];
                                    var sectionLength = route.legs.length
                                    for (var j = 0;j < sectionLength;j++) {

                                        var leg = route.legs[j];
                                        var legLength = leg.steps.length;
                                        for (var k = 0;k < legLength;k++) {

                                            var step = leg.steps[k];
                                            if (step.travel_mode == 'TRANSIT') {

                                                var transit_info = step.transit;
                                                var transit_line = transit_info.line.name;
                                                var transit_details = transit_info.line.vehicle;
                                                var transit_location = step.end_location;
                                                var transit_marker = new google.maps.Marker({
                                                    position: transit_location,
                                                    map: map,
                                                    icon: {
                                                        url: transit_details.icon,
                                                        size: new google.maps.Size(32, 32),
                                                        scaledSize: new google.maps.Size(24, 24),
                                                        origin: new google.maps.Point(0, 0),
                                                        anchor: new google.maps.Point(12, 12)
                                                    }
                                                });
                                                google.maps.event.addListener(transit_marker, 'click', function() {
                                                    infowindow.setContent('<div><strong>' + transit_line + '</strong><br>' + transit_details.name + '</div>');
                                                    infowindow.open(map, transit_marker);
                                                });
                                               
                                            }
                                        }
                                    }
                                }
                                showRoute.setDirections(result);
                            }
                        });

                        var infowindow = new google.maps.InfoWindow();

                    }
                }
            </script> 
            ";
        }
    }
}
