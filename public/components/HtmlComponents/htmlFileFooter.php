<?php

class HTMLFooter
{

  public function __construct($alert = null, $message = null)
  {
    $base = BASEURL;
    echo "

            <script src='https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

            <script> 

            function toggleNav(openElement,closeElement) {
                document.getElementById(openElement).classList.add('display-block');
                document.getElementById(closeElement).classList.add('display-none'); 
                document.getElementById(openElement).classList.remove('display-none');
                document.getElementById(closeElement).classList.remove('display-block'); 
              } 

               
            var displayed = false;
            function toggleFilter(BarId) {
                
                var sidebar = document.getElementById(BarId);
                if (displayed) {
                    sidebar.style.display = 'block';
                    displayed = false;
                } else {
                    sidebar.style.display = 'none';
                    displayed = true;
                }
            }


             function openFilter(openElement) {
                document.getElementById(openElement).classList.add('display-block');
                document.getElementById(openElement).classList.remove('display-none'); 
              } 

              function closeFilter(closeElement) {
                document.getElementById(closeElement).classList.add('display-none'); 
                document.getElementById(closeElement).classList.remove('display-block'); 
              } 

              function showPrice(Element1,Element2) {
                var priceRange = document.getElementById('priceRange');
                var priceOutput = document.getElementById('priceOutput');
                priceOutput.innerHTML = priceRange.value;
                
                priceRange.addEventListener('input', () => {
                    priceOutput.innerHTML = priceRange.value;
                    document.getElementById('price').value = priceRange.value;
                });
              }

              function toggleBox(Id1,Id2){
              
                const checkbox1 = document.getElementById(Id1);
                const checkbox2 = document.getElementById(Id2);
  
                if (checkbox1.checked) {
                  checkbox2.disabled = true;

                }else if(checkbox2.checked) {
                  checkbox1.disabled = true;
                } else {
                  checkbox1.disabled = false;
                  checkbox2.disabled = false;
                }
              }
             
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
                      b.innerHTML += \"<input type='hidden' value='\" + arr[i] + \"'>\";
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
          
              var place = ['bambalapitiya','borella','colombo','colombo 5','colombo 3','colombo 2','colombo 7','colombo 10',
              'kelaniya','kotte','kirulapana','kirula road','kohuwala','gampaha','nugegoda','rajagiriya','wijerama','house','house in nugegoda','hostel','room',
               'Boarding places', 'Hostels', 'Hotels', 'Motel', 'Resort', 'Villas',
                'Vacation rentals', 'Bed and Breakfast', 'Guesthouse', 'Inn', 'Camping', 'RV park', 'Restaurants',
                'Coffee Shops', 'Bars', 'Clubs', 'Events', 'Movies', 'Museums', 'Parks', 'Sports'
              ];
          
              autocomplete(document.getElementById('searchText'), place);

              ";
    if (isset($alert) && isset($message)) {
      $title = ucfirst($alert);
      echo "
                Swal.fire({
                    icon: '$alert',
                    title: '$title',
                    text: '$message'
                })";
    }
    echo "
        document.addEventListener('DOMContentLoaded', function () {
            feather.replace();
          }, false);
          
            </script>
        </body>
        
        </html>
            
            ";
  }
}
