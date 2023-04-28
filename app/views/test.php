<?php

new HTMLHeader("Search | Place");
//new Navigation();
$base = BASEURL;

?>

<style>
  .suggest {
    position: relative;
    border: none;
    margin: 0%; 
  }

  .suggest-items {
    position: absolute;
    z-index: 99;
    /*position the suggeste items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
    font-size: 16px;
  }

  .suggest-items div {
    padding: 8px;
    cursor: pointer;
    background-color: #fff;
    border-bottom: 1px solid #d4d4d4;
    border-radius: 2px;
  }

  /*when hovering an item:*/
  .suggest-items div:hover {
    background-color: aqua;
  }

  /*when navigating through the items using the arrow keys:*/
  .suggest-active {
    background-color: DodgerBlue !important;
    color: #d4d4d4;
  }
</style>
</head>

<body>

  <?php
  //$suggs='show("searchText")';
  echo "
  <form autocomplete='off' action='/action_page.php'>
  <div class='flex margin-top-5'>
    <div class='row border-rounded-more'>
      <div class='display-small-block  display-none  col-1 '>
            <i data-feather='search'></i>
      </div>
        <div id='searchBar' class='suggest searchbar col-10  col-small-8 fill-container' style='width:500px;'>
          <input id='searchText' type='text' class='header-nb border-none fill-container' name='searchText' required name='searchText' placeholder='Search Boarding places, Hostels...'>
        </div>
        
    </div>
  </div>  
</form>
    ";
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
            b.innerHTML += '<input type="hidden" value="' + arr[i] + '">';
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

    var place = ['america', 'v bvb', 'v nama', 'v nankcndkma', 'v gamama', 'Boarding places', 'Hostels', 'Hotels', 'Motel', 'Resort', 'Villas',
      'Vacation rentals', 'Bed and Breakfast', 'Guesthouse', 'Inn', 'Camping', 'RV park', 'Restaurants',
      'Coffee Shops', 'Bars', 'Clubs', 'Events', 'Movies', 'Museums', 'Parks', 'Sports'
    ];


    autocomplete(document.getElementById('searchText'), place);

    function show(Id) {
      autocomplete(document.getElementById(Id), place);
    }
  </script>

<?php
new HTMLFooter();
?>