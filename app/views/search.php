<?php

new HTMLHeader("Listing | Place");
new Navigation("listing");
$base = BASEURL;
$provinces = array(
    "Western" => array("Colombo", "Gampaha", "Kaluthara"),
    "Southern" => array("Galle", "Matara", "Hambantota"),
    "Eastern" => array("Ampara", "Batticaloa", "Trincomalee"),
    "Northern" => array("Jaffna", "Kilinochchi", "Vavuniya", "Mullaitivu", "Mannar"),
    "North Western" => array("Kurunegala", "Puttalam"),
    "North Central" => array(" Polonnaruwa", "Anuradhapure"),
    "Uva" => array("Badulla", "Moneragala"),
    "Sabaragamuwa" => array("Kegalle", "Ratnapura"),
    "Central" => array("Kandy", "Matale", "Nuwara Eliya")
);
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
    let show = false;

    function toggleFilter() {

        if (!show) {
            document.getElementById('FilterSidebar').classList.add('display-block');
            document.getElementById('FilterSidebar').classList.remove('display-none');
            show = true;
        } else {
            document.getElementById('FilterSidebar').classList.remove('display-block');
            document.getElementById('FilterSidebar').classList.add('display-none');
            show = false;
        }
    }

    function closeFilter() {
        document.getElementById('FilterSidebar').classList.remove('display-block');
        document.getElementById('FilterSidebar').classList.add('display-none');
    }

    function showPrice() {
        let priceRange = document.getElementById('priceRange');
        let priceOutput = document.getElementById('priceOutput');
        priceOutput.innerHTML = priceRange.value;

        priceRange.addEventListener('input', () => {
            priceOutput.innerHTML = priceRange.value;
            document.getElementById('price').value = priceRange.value;
        });
    }

    function toggleBox() {

        const checkbox1 = document.getElementById('parkingYes');
        const checkbox2 = document.getElementById('parkingNo');

        if (checkbox1.checked) {
            checkbox2.disabled = true;

        } else if (checkbox2.checked) {
            checkbox1.disabled = true;
        } else {
            checkbox1.disabled = false;
            checkbox2.disabled = false;
        }
    }

    function autocomplete(inp, arr) {

        let currentFocus;
        inp.addEventListener('input', function(e) {
            let a, b, i, val = this.value;

            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            a = document.createElement('DIV');
            a.setAttribute('id', this.id + 'suggest-list');
            a.setAttribute('class', 'suggest-items');
            this.parentNode.appendChild(a);
            for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement('DIV');
                    b.innerHTML = '<strong>' + arr[i].substr(0, val.length) + '</strong>';
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener('click', function(e) {
                        inp.value = this.getElementsByTagName('input')[0].value;
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        inp.addEventListener('keydown', function(e) {
            let x = document.getElementById(this.id + 'suggest-list');
            if (x) x = x.getElementsByTagName('div');
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add('suggest-active');
        }

        function removeActive(x) {
            for (let i = 0; i < x.length; i++) {
                x[i].classList.remove('suggest-active');
            }
        }

        function closeAllLists(elmnt) {
            let x = document.getElementsByClassName('suggest-items');
            for (let i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener('click', function(e) {
            closeAllLists(e.target);
        });
    }

    let place = ['bambalapitiya', 'borella', 'colombo', 'colombo 5', 'colombo 3', 'colombo 2', 'colombo 7', 'colombo 10',
        'kelaniya', 'kotte', 'kirulapana', 'kirula road', 'kohuwala', 'kolonnawa', 'gampaha', 'house', 'Hotels', 'nugegoda', 'rajagiriya', 'Ratmalana', 'wijerama',
        'house in nugegoda', 'hostel', 'hostel in kohuwala', 'room', 'Boarding places', 'Hostels', 'Hotels', 'Moratuwa', 'Vavuniya',
        'Battaramulla', 'Gonawala', 'Inn', 'RV park', 'Restaurants',
        'Coffee Shops', 'Bars', 'Clubs', 'Events', 'Movies', 'Museums', 'Parks', 'Sports'
    ];

    autocomplete(document.getElementById('searchText'), place);

    function updateDistricts() {
        let province = document.getElementById('province').value;
        let districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '';
        let districts = <?php echo json_encode($provinces); ?>[province];
        for (let i = 0; i < districts.length; i++) {
            let option = document.createElement('option');
            option.value = districts[i];
            option.innerHTML = districts[i];
            districtSelect.appendChild(option);
        }
    }
</script>