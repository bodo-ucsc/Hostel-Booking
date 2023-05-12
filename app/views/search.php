<?php
$base = BASEURL;
new HTMLHeader("Listing | Place");
new Navigation("listing");
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

<main class='navbar-offset full-width center top'>
    <div class='row center'>
        <div class='col-12'>
            <?php
            if (isset($data['searchText'])) {
                $query = $data['searchText'];
            } else {
                $query = null;
            }
            new Search("true", $query);

            ?>
        </div>
    </div>

    <div class=' fill-container top'>
        <?php

        if (isset($data['placeId'])) {
            new PropertyCard($data['placeId']);
        } else if (isset($data['places'])) {
            while ($row = $data['places']->fetch_assoc()) {
                new PropertyCard($row['PlaceId']);
            }
        } else if (isset($data['searchText'])) {
            $resultCount = $data['resultCount'];
            $searchText = $data['searchText'];
            $searchText = str_replace("%", " ", $searchText);

            if ($searchText == '' || $searchText == null) {
                $searchSentence = 'Searching All Records';
            } else {
                $searchSentence = "Search result for '$searchText'";
            }


            echo "
            <div class='row full-width'>
                <span class='col-12 grey'>
                    $searchSentence <br>
                    There are $resultCount results found!!!
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
        }

        ?>
    </div>

    <?php new pageFooter(); ?>
</main>


<script>
    updateFilterSearch();

    function clearfilters() {
        //document.getElementById("Filter-Form").reset();
        document.getElementById("district").innerHTML = "";
    }

    function updateFilterSearch() {
        document.getElementById("searchQuery").value = document.getElementById("searchText").value;
    }

    function updateSearchBox() {
        document.getElementById("searchText").value = document.getElementById("searchQuery").value;
    }
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

    function autocomplete(inp, arr1) {

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

            for (i = 0; i < arr1.length; i++) {
                if (arr1[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement('DIV');
                    b.innerHTML = '<strong>' + arr1[i].substr(0, val.length) + '</strong>';
                    b.innerHTML += arr1[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr1[i] + "'>";
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
                // e.preventDefault();
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

    let place = ['bambalapitiya', 'borella', 'colombo', 'colombo 5', 'colombo 3', 'colombo 2', 'colombo 7', 'colombo 10', 'kelaniya', 'kotte', 'kirulapana', 'kirula road', 'kohuwala', 'kolonnawa', 'gampaha', 'nugegoda', 'rajagiriya', 'Ratmalana', 'wijerama', 'Moratuwa', 'Vavuniya', 'Battaramulla', 'Peradeniya', 'Gampaha', 'Ruhuna', 'campus', 'university', 'kandy', 'kurunegala', 'matara', 'galle', 'jaffna', 'negombo', 'kalmunai', 'vavuniya', 'anuradhapura', 'trincomalee', 'batticaloa', 'badulla', 'ratnapura', 'bandarawela', 'nuwara eliya', 'hambantota', 'ambalangoda', 'ampara', 'chilaw', 'house in bambalapitiya', 'house in borella', 'house in colombo', 'house in colombo 5', 'house in colombo 3', 'house in colombo 2', 'house in colombo 7', 'house in colombo 10', 'house in kelaniya', 'house in kotte', 'house in kirulapana', 'house in kirula road', 'house in kohuwala', 'house in kolonnawa', 'house in gampaha', 'house in nugegoda', 'house in rajagiriya', 'house in Ratmalana', 'house in wijerama', 'house in Moratuwa', 'house in Vavuniya', 'house in Battaramulla', 'house in Peradeniya', 'house in Gampaha', 'house in Ruhuna', 'house near campus', 'house near university', 'house in kandy', 'house in kurunegala', 'house in matara', 'house in galle', 'house in jaffna', 'house in negombo', 'house in kalmunai', 'house in vavuniya', 'house in anuradhapura', 'house in trincomalee', 'house in batticaloa', 'house in badulla', 'house in ratnapura', 'house in bandarawela', 'house in nuwara eliya', 'house in hambantota', 'house in ambalangoda', 'house in ampara', 'house in chilaw', 'hostel in bambalapitiya', 'hostel in borella', 'hostel in colombo', 'hostel in colombo 5', 'hostel in colombo 3', 'hostel in colombo 2', 'hostel in colombo 7', 'hostel in colombo 10', 'hostel in kelaniya', 'hostel in kotte', 'hostel in kirulapana', 'hostel in kirula road', 'hostel in kohuwala', 'hostel in kolonnawa', 'hostel in gampaha', 'hostel in nugegoda', 'hostel in rajagiriya', 'hostel in Ratmalana', 'hostel in wijerama', 'hostel in Moratuwa', 'hostel in Vavuniya', 'hostel in Battaramulla', 'hostel in Peradeniya', 'hostel in Gampaha', 'hostel in Ruhuna', 'hostel near campus', 'hostel near university', 'hostel in kandy', 'hostel in kurunegala', 'hostel in matara', 'hostel in galle', 'hostel in jaffna', 'hostel in negombo', 'hostel in kalmunai', 'hostel in vavuniya', 'hostel in anuradhapura', 'hostel in trincomalee', 'hostel in batticaloa', 'hostel in badulla', 'hostel in ratnapura', 'hostel in bandarawela', 'hostel in nuwara eliya', 'hostel in hambantota', 'hostel in ambalangoda', 'hostel in ampara', 'hostel in chilaw', ];

    autocomplete(document.getElementById('searchText'), place);

    function updateDistricts() {
        let province = document.getElementById('province').value;
        let districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '';

        let defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.innerHTML = 'Select District';
        districtSelect.appendChild(defaultOption);

        let districts = <?php echo json_encode($provinces); ?>[province];
        for (let i = 0; i < districts.length; i++) {
            let option = document.createElement('option');
            option.value = districts[i];
            option.innerHTML = districts[i];
            districtSelect.appendChild(option);
        }
    }

    let filterArray = [];

    <?php
    if (isset($data['filters']) && !empty($data['filters'])) {
        echo "filterArray = " . $data['filters'] . ";";
        echo "console.log(" . $data['filters'] . ");";
        echo "assignFilterValues();";
        echo "updateFilterTags();";
        echo "updatePrice();";
    }
    ?>

    function clearfilters() {
        //make filter array empty
        filterArray = [];
        console.log(filterArray);
        updateFilterTags();
    }

    function assignFilterValues() {
        filterArray.forEach(element => {
            if (document.querySelector('input[name="' + element.id + '"]')) {

                if (document.querySelector('input[name="' + element.id + '"]').type === "checkbox") {
                    document.getElementsByName(element.id).forEach(item => {
                        if (item.value === element.value) {
                            console.log(item);
                            item.checked = true;
                            toggleBox("parkingYes", "parkingNo");
                        }
                    });
                } else {
                    document.getElementById(element.id).value = element.value;
                }

            } else {
                document.getElementById(element.id).value = element.value;
            }
        });
        document.getElementById('searchQuery').defaultValue = '';
    }

    // console.log(filterArray);

    function updateFilterArray(id) {
        let filter = {
            id: id,
            value: document.getElementById(id).value
        }

        let index = filterArray.findIndex(item => item.id === filter.id);
        if (index !== -1) {
            filterArray[index] = filter;
        } else {
            filterArray.push(filter);
        }

        console.log(filterArray);
        updateFilterTags();
    }

    // update filter array radio button
    function updateFilterArrayRadio(id) {
        let val;
        if (document.querySelector('input[name="' + id + '"]:checked') === null) {
            val = null;
        } else {
            val = document.querySelector('input[name="' + id + '"]:checked').value;
        }
        let filter = {
            id: id,
            value: val
        }

        // if filter id already exist, replace it with new value, else add it
        let index = filterArray.findIndex(item => item.id === filter.id);
        if (index !== -1) {
            filterArray[index] = filter;
        } else {
            filterArray.push(filter);
        }

        console.log(filterArray);
        updateFilterTags();
    }

    // add all filter array values to tags
    function updateFilterTags() {
        let clearBtn = document.getElementById('filter-clear-btn');

        let filterTags = document.getElementById("filter-tags");
        if (filterArray.length === 0) {
            filterTags.innerHTML = "";
            document.getElementById("searchQuery").defaultValue = document.getElementById("searchText").defaultValue;
            clearBtn.classList.add("display-none");
            return;
        }

        filterTags.innerHTML = "";
        let appFilter = document.createElement("div");
        appFilter.classList.add("display-block", "padding-2");
        appFilter.innerHTML = "Applied Filters:";
        filterTags.appendChild(appFilter);
        filterArray.forEach(element => {
            let tag = document.createElement("div");
            tag.classList.add("display-inline-block", "padding-left-4", "padding-1", "margin-2", "white", "border-rounded", "bg-black", 'small', "rounded");
            tag.innerHTML = element.id + " : " + element.value;
            // close button
            let close = document.createElement("button");
            close.classList.add("border-rounded", "white", "bold", "padding-horizontal-3", "padding-vertical-2", "margin-left-4", "bg-red", "cursor-pointer");
            close.innerHTML = " X ";
            close.addEventListener("click", () => {

                if (document.querySelector('input[name="' + element.id + '"]:checked')) {
                    document.querySelector('input[name="' + element.id + '"]:checked').checked = false;
                    toggleBox("parkingYes", "parkingNo");
                } else if (document.getElementById(element.id).tagName === "SELECT") {
                    document.getElementById(element.id).selectedIndex = 0;
                } else {
                    document.getElementById(element.id).value = document.getElementById(element.id).defaultValue;
                    updatePrice();
                    updateSearchBox();
                }

                filterArray = filterArray.filter(item => item !== element);
                // set element values to value in array
                console.log(filterArray);
                updateFilterTags();
                // submit form
                document.getElementById("submitBtn").click();

            });
            tag.appendChild(close);
            filterTags.appendChild(tag);

            // tag.classList.add("tag");
            // tag.classList.add("is-info");
            // tag.classList.add("is-light");
            // tag.classList.add("is-medium");
            // tag.classList.add("mr-1");
            // tag.classList.add("mb-1");
            // tag.innerHTML = element.value;
            // // add close button to tag
            // let close = document.createElement("button");
            // close.classList.add("delete");
            // close.classList.add("is-small");
            // close.classList.add("ml-1");
            // close.addEventListener("click", () => {
            //     filterArray = filterArray.filter(item => item !== element);
            //     updateFilterTags();
            // });
            // filterTags.appendChild(tag);
        });
        clearBtn.classList.remove("display-none");

    }
</script>
<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
