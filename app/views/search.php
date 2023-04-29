<?php

new HTMLHeader("Listing | Place");
new Navigation("listing");
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
        $searchText = str_replace("%", " ", $searchText);
    }
    echo "
            <div class='row full-width'>
                <span class='col-12 grey'>
                    Search result for '" . $searchText . "'<br>
                    There are " . $resultCount . " results found!!!
                </span>
            </div>
            ";

    if ($resultCount > 0) {

        echo "<div class='center'>";
        while ($row = $data['result']->fetch_assoc()) {

            $PlaceId = $row['PlaceId'];
            $place = new PropertyCard($PlaceId);
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

    var priceRange = document.getElementById("price-range");
    var priceOutput = document.getElementById("price-output");
    priceOutput.innerHTML = priceRange.value;

    priceRange.addEventListener("input", () => {
        priceOutput.innerHTML = priceRange.value;
        document.getElementById('price').value = priceRange.value;
    });
</script>