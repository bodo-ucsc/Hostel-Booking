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
                var priceRange = document.getElementById('price-range');
                var priceOutput = document.getElementById('price-output');
                priceOutput.innerHTML = priceRange.value;
                
                priceRange.addEventListener('input', () => {
                    priceOutput.innerHTML = priceRange.value;
                    document.getElementById('price').value = priceRange.value;
                });
              }

              function resetFilter(Id1,Id2,Id3,Id4,Id5,Id6,Id7,Id8,Id9,Id10,Id11,Id12){

                document.getElementById(Id1).value = 0;
                document.getElementById(Id2).innerHTML = 0;
                document.getElementById(Id3).value = 'monthly';
                document.getElementById(Id4).value = '';
                document.getElementById(Id5).value = '';
                document.getElementById(Id6).value = 0;
                document.getElementById(Id7).value = 0;
                document.getElementById(Id8).value = 0;
                document.getElementById(Id9).value = '';
                document.getElementById(Id10).value = '';
                document.getElementById(Id11).value = 0;
                document.getElementById(Id12).checked = '';
        
            }



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
