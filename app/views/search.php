<?php

new HTMLHeader("Search | Place");
new Navigation();
$base = BASEURL;
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class='navbar-offset full-width'>
    <div class='row full-width margin-bottom-4'>
        <div class='col-12'>
            <?php
            $search = new Search(); ?>
            <div id="suggested-places"></div>
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
            new PropertyCard($PlaceId);
        }
    }

    echo "</div>";
    echo "
</div>";
    
?>
    <script>
        $(document).ready(function() {
            $('#search-text').on('input', function() {
                var searchText = $(this).val();

                $.ajax({
                    url: '/Bodo/SearchProperty/getSuggestions',
                    method: 'POST',
                    data: {
                        searchText: searchText
                    },
                    success: function(response) {
                        var suggestedPlaces = JSON.parse(response);

                        $('#suggested-places').empty();
                        for (var i = 0; i < suggestedPlaces.length; i++) {
                            var placeName = suggestedPlaces[i];
                            var suggestedPlace = $('<div class="suggested-place"></div>');
                            suggestedPlace.text(placeName);
                            suggestedPlace.click(function() {
                                $('#search-text').val(placeName);
                                $('#suggested-places').empty();
                            });
                            $('#suggested-places').append(suggestedPlace);
                        }
                    }
                });
            });
        });
    </script>

<?php

new HTMLFooter();
?>