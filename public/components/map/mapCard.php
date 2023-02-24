<?php

class ShowMap
{
    public $lats;
    public $lngs;
    public $src;
    public $dest;

    public function __construct($address,$destination=null)
    {
        $src = $address;
        $dest= $destination;

        echo '<div id="map_container" style="width: 35%; height: 250px;">MAP</div>';
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
    <br><span class="header-2">Near By Places</span>
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

        echo '<div class="card-container">';

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

                        echo '<div class="card">';
                        echo '<img src="' . $photoUrl . '" alt="Place Image">';
                        echo '<h2>' . $name . '</h2>';
                        echo '<p>' . $address . '</p>';
                        echo '<i data-feather="star"></i>' . $rating . '</p>';
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
            $dest,$src
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
                        var directionsService = new google.maps.DirectionsService();
                        var directionsRenderer = new google.maps.DirectionsRenderer({
                            map: map,
                            suppressMarkers: true,
                            preserveViewport: true
                        });

                        var request = {
                            origin: '$src',
                            destination: '$dest',
                            travelMode: 'TRANSIT'
                        };

                        directionsService.route(request, function(result, status) {
                            if (status == 'OK') {
                                for (var i = 0, len = result.routes.length; i < len; i++) {
                                    var route = result.routes[i];
                                    for (var j = 0, len2 = route.legs.length; j < len2; j++) {
                                    var leg = route.legs[j];
                                    for (var k = 0, len3 = leg.steps.length; k < len3; k++) {
                                        var step = leg.steps[k];
                                        if (step.travel_mode == 'TRANSIT') {
                                        var transit_info = step.transit;
                                        var transit_line = transit_info.line.name;
                                        var transit_details = transit_info.line.vehicle;
                                        // Use transit_info and transit_details to customize the appearance of the transit route
                                        }
                                    }
                                    }
                                }
                                directionsRenderer.setDirections(result);
                            }
                        });

                    }
                }
            </script> 
            ";
        }
    }
}
