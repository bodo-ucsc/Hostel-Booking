<?php

new HTMLHeader("Search | Place");
new Navigation();
$base = BASEURL;

?>

<div class='navbar-offset full-width'>
    <div class='row full-width margin-bottom-4'>
        <div class='col-12'>
            <?php
            $search = new Search("true");
    ?>
        </div>
    </div>
    <?php
    if ($data) {
        $resultCount = $data['resultCount'];
        $searchText = $data['searchText'];
    }
    echo "
            <div class='row full-width'>
                <span class='col-12 grey'>
                    Search result for '" . $searchText . "'<br>
                    There are " . $resultCount . " results found!!!
                </span>
            </div>";

    if ($resultCount > 0) {

        echo "<div class='center'>";
        while ($row = $data['result']->fetch_assoc()) {

            $PlaceId = $row['PlaceId'];
            //echo $PlaceId;
            $place = new PropertyCard($PlaceId);

            // echo "place id= ".$row['PlaceId']."<br>";
            // echo $row['Title']."<br>";
            // echo $row['Description']."<br>";
            // echo $row['Price']."<br>";
            // echo $row['PriceType']."<br>";
            // echo $row['Street']."<br>";
            // echo $row['CityName']."<br>";
            // echo $row['NoOfMembers']."<br>";
            // echo $row['NoOfRooms']."<br>";
        }
    }

    ?>
</div>


<?php

new HTMLFooter();
?>

<script>
  
    var displayed = true;

    function closeFilter() {
        var sidebar = document.getElementById('FilterSidebar');
        if (displayed) {
            sidebar.style.display = 'block';
            displayed = false;
        } else {
            sidebar.style.display = 'none';
        }
    }
    

    function resetFilter() {

        document.getElementById('price-range').value = 0;
        document.getElementById('price-output').innerHTML = 0;
        document.getElementById('price-type').value = 'monthly';
        document.getElementById('street').value = '';
        document.getElementById('city').value = '';
        document.getElementById('no-of-rooms').value = 0;
        document.getElementById('no-of-members').value = 0;
        document.getElementById('no-of-wash-rooms').value = 0;
        document.getElementById('gender').value = '';
        document.getElementById('boarder-type').value = '';
        document.getElementById('square-feet').value = 0;
        document.getElementById('parking').checked = '';

    }

    var priceRange = document.getElementById("price-range");
    var priceOutput = document.getElementById("price-output");
    priceOutput.innerHTML = priceRange.value;
    
    priceRange.addEventListener("input", () => {
        priceOutput.innerHTML = priceRange.value;
        document.getElementById('price').value = priceRange.value;
    });
</script>