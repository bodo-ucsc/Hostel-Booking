<?php
$header = new HTMLHeader("Home");
$nav = new Navigation("home");
?>

<main class=" home full-height overflow-hidden ">
    <div class="row no-gap margin-medium-left-5 margin-horizontal-3 full-height">
        <div class="display-block  display-small-none"></div>

        <div class=" col-large-7 col-medium-9 col-12 fill-container padding-horizontal-3  ">
            <div class="fill-container cover-text">Boarding?</div>
            <div class="margin-medium-left-3">
                <?php
                $search = new Search();
                //$filter = new Filter();
                //$sidebar = new SideBarNav("user","admin"); //pass the parameter to set active
                ?>
            </div>
        </div>
        <div class="fill-container padding-5 display-block  display-small-none"></div>
        <div class="col-small-1 "></div>

    </div>


</main>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}
?>

<script>

    function autocomplete(inp, arr) {

        var currentFocus;
        inp.addEventListener('input', function(e) {
            var a, b, i, val = this.value;

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
            var x = document.getElementById(this.id + 'suggest-list');
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
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove('suggest-active');
            }
        }

        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName('suggest-items');
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener('click', function(e) {
            closeAllLists(e.target);
        });
    }

    var place = ['bambalapitiya', 'borella', 'colombo', 'colombo 5', 'colombo 3', 'colombo 2', 'colombo 7', 'colombo 10',
        'kelaniya', 'kotte', 'kirulapana', 'kirula road', 'kohuwala', 'kolonnawa', 'gampaha', 'house', 'Hotels', 'nugegoda', 'rajagiriya', 'Ratmalana', 'wijerama',
        'house in nugegoda', 'hostel', 'hostel in kohuwala', 'room', 'Boarding places', 'Hostels', 'Hotels', 'Moratuwa', 'Vavuniya',
        'Battaramulla', 'Gonawala', 'Inn', 'RV park', 'Restaurants',
        'Coffee Shops', 'Bars', 'Clubs', 'Events', 'Movies', 'Museums', 'Parks', 'Sports'
    ];

    autocomplete(document.getElementById('searchText'), place);
</script>