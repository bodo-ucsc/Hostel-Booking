<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("home");
?>

<main class=" home full-width full-height  ">
    <div class="row  no-gap margin-medium-left-5 margin-horizontal-3 full-height">
        <div class="display-block  display-small-none"></div>

        <div class=" col-large-7 col-medium-9 col-12 fill-container padding-horizontal-3  ">
            <div class="fill-container cover-text">Boarding?</div>
            <div class="margin-medium-left-3">
                <?php
                $search = new Search();
                // $filter = new Filter();
                // $sidebar = new SideBarNav("user","admin"); //pass the parameter to set active
                ?>
            </div>
        </div>
        <div class="fill-container padding-5 display-block  display-small-none"></div>
        <div class="col-small-1 "></div>

    </div>


    <?php new pageFooter(); ?>
</main>


<script>

     
    function autocomplete(inp, arr1) {

        let currentFocus;
        inp.addEventListener('input', function (e) {
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
                    b.addEventListener('click', function (e) {
                        inp.value = this.getElementsByTagName('input')[0].value;
                        updateFilterTags();
                        closeAllLists();
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        inp.addEventListener('keydown', function (e) {
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
        document.addEventListener('click', function (e) {
            closeAllLists(e.target);
        });
    }

    let place = ['bambalapitiya', 'borella', 'colombo', 'colombo 5', 'colombo 3', 'colombo 2', 'colombo 7', 'colombo 10', 'kelaniya', 'kotte', 'kirulapana', 'kirula road', 'kohuwala', 'kolonnawa', 'gampaha', 'nugegoda', 'rajagiriya', 'Ratmalana', 'wijerama', 'Moratuwa', 'Vavuniya', 'Battaramulla', 'Peradeniya', 'Gampaha', 'Ruhuna', 'campus', 'university', 'kandy', 'kurunegala', 'matara', 'galle', 'jaffna', 'negombo', 'kalmunai', 'vavuniya', 'anuradhapura', 'trincomalee', 'batticaloa', 'badulla', 'ratnapura', 'bandarawela', 'nuwara eliya', 'hambantota', 'ambalangoda', 'ampara', 'chilaw', 'house in bambalapitiya', 'house in borella', 'house in colombo', 'house in colombo 5', 'house in colombo 3', 'house in colombo 2', 'house in colombo 7', 'house in colombo 10', 'house in kelaniya', 'house in kotte', 'house in kirulapana', 'house in kirula road', 'house in kohuwala', 'house in kolonnawa', 'house in gampaha', 'house in nugegoda', 'house in rajagiriya', 'house in Ratmalana', 'house in wijerama', 'house in Moratuwa', 'house in Vavuniya', 'house in Battaramulla', 'house in Peradeniya', 'house in Gampaha', 'house in Ruhuna', 'house near campus', 'house near university', 'house in kandy', 'house in kurunegala', 'house in matara', 'house in galle', 'house in jaffna', 'house in negombo', 'house in kalmunai', 'house in vavuniya', 'house in anuradhapura', 'house in trincomalee', 'house in batticaloa', 'house in badulla', 'house in ratnapura', 'house in bandarawela', 'house in nuwara eliya', 'house in hambantota', 'house in ambalangoda', 'house in ampara', 'house in chilaw', 'hostel in bambalapitiya', 'hostel in borella', 'hostel in colombo', 'hostel in colombo 5', 'hostel in colombo 3', 'hostel in colombo 2', 'hostel in colombo 7', 'hostel in colombo 10', 'hostel in kelaniya', 'hostel in kotte', 'hostel in kirulapana', 'hostel in kirula road', 'hostel in kohuwala', 'hostel in kolonnawa', 'hostel in gampaha', 'hostel in nugegoda', 'hostel in rajagiriya', 'hostel in Ratmalana', 'hostel in wijerama', 'hostel in Moratuwa', 'hostel in Vavuniya', 'hostel in Battaramulla', 'hostel in Peradeniya', 'hostel in Gampaha', 'hostel in Ruhuna', 'hostel near campus', 'hostel near university', 'hostel in kandy', 'hostel in kurunegala', 'hostel in matara', 'hostel in galle', 'hostel in jaffna', 'hostel in negombo', 'hostel in kalmunai', 'hostel in vavuniya', 'hostel in anuradhapura', 'hostel in trincomalee', 'hostel in batticaloa', 'hostel in badulla', 'hostel in ratnapura', 'hostel in bandarawela', 'hostel in nuwara eliya', 'hostel in hambantota', 'hostel in ambalangoda', 'hostel in ampara', 'hostel in chilaw',
    ];

    autocomplete(document.getElementById('searchText'), place);
</script>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>