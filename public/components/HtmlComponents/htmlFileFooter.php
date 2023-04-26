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
                });
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
