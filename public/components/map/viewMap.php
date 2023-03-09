<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.card {
    width: 15%;
    padding: 20px;
    box-sizing: border-box;
    background-color: #fff;
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.2);
    margin-bottom: 10px;
    border-radius: 5px;
}

.card img {
    width: 100%;
}

.card h2 {
    margin-top: 0;
    margin-bottom: 5px;
}
</style>

<?php

function viewMap($address)
{
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
        //<!-- <div id='lat'>latitude:<?php echo $lats </div>
        //<div id='lng'>longitude:<?php echo $lngs </div>

    
        echo "<script>initMap($lats,$lngs);</script>";
        //when window load then call initMap function
        //window.addEventListener('load', initMap);
    } else {
        echo 'Geocode was not successful for the following reason: ' . $results['status'];
    }
  
    echo '
    <span class="header-1">Near By Places</span>
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
    
    foreach ($places as $place) {
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
                    echo '<img src="'.$photoUrl.'" alt="Place Image">';
                    echo '<h2>'.$name.'</h2>';
                    echo '<p>'.$address.'</p>';
                    echo '<i data-feather="star"></i>
                    <p>Rating: '.$rating.'</p>';
                    echo '</div>';
                    
                }
            }
        }
    }

}

    

    echo '</div>';

echo '
    <script>
        function initMap(lats, lngs) {

            var location = {
                lat: parseFloat(lats),
                lng: parseFloat(lngs)
            };

            var map = new google.maps.Map(document.getElementById("map_container"), {
                zoom: 17,
                center: location
            });
            var marker = new google.maps.Marker({
                map: map,
                position: location
            });

        }
    </script>';
 
    echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap"></script>';
    ?>

    <!-- <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initMap'></script> -->

    <!-- 
    // const apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
    // const radius = 1000;
    // const type = 'restaurant';
    // const url = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$apiKey&location=$lats,$lngs&radius=$radius&type=$type`;

    // fetch(url)
    //     .then(response => response.json())
    //     .then(data => {
    //         const places = data.results;
    //         let results = '';
    //         for (let i = 0; i < places.length; i++) {
    //             let place = places[i];
    //             let name = place.name;
    //             let address = place.vicinity;
    //             let rating = place.rating;
    //             let photos = place.photos;
    //             let photoUrl = '';
    //             if (photos) {
    //                 let photoReference = photos[i].photo_reference;
    //                 photoUrl = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=photoReference&key=$apiKey';
    //             }
    //             results += '{$name} ({address}) ({rating}) <img src=' {
    //                 photoUrl
    //             }
    //             '> <br>';
    //         }
    //         document.getElementById('nearby').innerHTML = results;
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     }); -->
<?php
    echo '<script>';
        /*
    function near(lats, lngs) {

        const apiKey = 'AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8';
        const radius = 1000;
        const type = 'restaurant';
        const url = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=${apiKey}&location=${lat},${lng}&radius=${radius}&type=${type}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const places = data.results;
                let results = "";
                for (let i = 0; i < places.length; i++) {
                    let place = places[i];
                    let name = place.name;
                    let address = place.vicinity;
                    let rating = place.rating;
                    let photos = place.photos;
                    let photoUrl = "";
                    if (photos) {
                        let photoReference = photos[i].photo_reference;
                        photoUrl = `https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${photoReference}&key=${apiKey}`;
                    }
                    results += `${name} (${address}) (${rating}) <img src='${photoUrl}'> <br>`;
                }
                document.getElementById('nearby').innerHTML = results;
            })
            .catch(error => {
                console.error(error);
            });
    } 
    // function getData(lats, lngs) {
    //     window.$.ajax({
    //         url: "nearby.php",
    //         async: true,
    //         type: "POST",
    //         data: {
    //             lats: lats,
    //             lngs: lngs
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //             const places = data.results;
    //             // create an empty string to store the results
    //             let results = '';
    //             // iterate through the array of places

    //             for (let i = 0; i < places.length; i++) {
    //                 let place = places[i];
    //                 let name = place.name;
    //                 let address = place.vicinity;
    //                 let rating = place.rating;
    //                 let photos = place.photos;
    //                 // let photoUrl = "";
    //                 // if (photos) {
    //                 //     let photoReference = photos[i].photo_reference;
    //                 //     photoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${photoReference}&key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8";
    //                 // }
    //                 results += "${name} (${address}) (${rating}) <img src='${photos}'> <br>";
    //             }
    //             // Select the element where you want to display the results
    //             document.getElementById('nearby').innerHTML = results;
    //             //document.getElementById("rating-value").innerHTML=rating;
    //         }
    //     });
    // }
    
    */
    echo '
    </script>';

   
    ?>