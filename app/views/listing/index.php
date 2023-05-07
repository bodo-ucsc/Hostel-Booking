<?php
$base = BASEURL;
new HTMLHeader("Listing | Place");
new Navigation("listing");
?>

<div class='navbar-offset full-width center top'>
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
</div>



<script>



    let displayed = true;
    updateFilterSearch();
    function toggleFilter(BarId) {

        let sidebar = document.getElementById(BarId);
        if (displayed) {
            sidebar.classList.add('display-block');
            sidebar.classList.remove('display-none');
            displayed = false;
        } else {
            sidebar.classList.add('display-none');
            sidebar.classList.remove('display-block');
            displayed = true;
        }
    }

    function closeFilter(closeElement) {
        document.getElementById(closeElement).classList.add('display-none');
        document.getElementById(closeElement).classList.remove('display-block');
    }
    function showPrice() {
        document.getElementById('price').value = document.getElementById('priceRange').value;
    }
    function updatePrice() {
        document.getElementById('priceRange').value = document.getElementById('price').value;
    }

    function toggleBox(Id1, Id2) {

        const checkbox1 = document.getElementById(Id1);
        const checkbox2 = document.getElementById(Id2);

        if (checkbox1.checked) {
            checkbox2.disabled = true;

        } else if (checkbox2.checked) {
            checkbox1.disabled = true;
        } else {
            checkbox1.disabled = false;
            checkbox2.disabled = false;
        }
    }


    function updateFilterSearch() {
        document.getElementById("searchQuery").value = document.getElementById("searchText").value;
    }

    function updateSearchBox() {
        document.getElementById("searchText").value = document.getElementById("searchQuery").value; 
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
        }
        else {
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
                }

                else {
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
<?php new HTMLFooter(); ?>