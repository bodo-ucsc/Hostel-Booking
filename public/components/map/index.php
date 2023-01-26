<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("feed");
$base = BASEURL;

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<body>

    <div id="map_container" style="width: 50%; height: 350px;"> </div>
    <div id="lat"></div>
    <div id="lng"></div>
    <div id="nearby">Near By Places</div>

    <script type="text/javascript">
        function AddressCords() {

            var address = document.getElementById('address').value;
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == 'OK') {

                    var lats = results[0].geometry.location.lat();
                    var lngs = results[0].geometry.location.lng();
                    // document.getElementById("lat").innerHTML = lats;
                    // document.getElementById("lng").innerHTML = lngs;

                    var map = new google.maps.Map(document.getElementById('map_container'), {
                        zoom: 17,
                        center: results[0].geometry.location
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                    getData(lats, lngs)

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }

        function getData(lats, lngs) {
            window.$.ajax({
                url: "nearby.php",
                async: true,
                type: "POST",
                data: {
                    lats: lats,
                    lngs: lngs
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    const places = data.results;
                    // create an empty string to store the results
                    let results = '';
                    // iterate through the array of places

                    for (let i = 0; i < places.length; i++) {
                        let place = places[i];
                        let name = place.name;
                        let address = place.vicinity;
                        let rating = place.rating;
                        let photos = place.photos;
                        // let photoUrl = "";
                        // if (photos) {
                        //     let photoReference = photos[i].photo_reference;
                        //     photoUrl = `https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${photoReference}&key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8`;
                        // }
                        results += `${name} (${address}) (${rating})<img src="${photos}"> <br>`;
                    }

                    // Select the element where you want to display the results
                    document.getElementById('nearby').innerHTML = results;
                    //document.getElementById("rating-value").innerHTML=rating;

                }

            });
        }

        // ucsc,colombo, sri lanka
        // University of kelaniya,Kelaniya, sri lanka
        // University of Moratuwa,Moratuwa, sri lanka
        // University of Peradeniya,Peradeniya, sri lanka
        // University of Ruhuna,Galle, sri lanka
        // University of Jaffna,Jaffna, sri lanka
        // University of Sabaragamuwa,Keppetipola, sri lanka
        // University of Sri Jayewardenepura,Kotte, sri lanka
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8&callback=initialize_map"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4NA4TKBUNQ9WNgLUnwtD5HZaKdIfdx8">
    </script>
</body>

</html>