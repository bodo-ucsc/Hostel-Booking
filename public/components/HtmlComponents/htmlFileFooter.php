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
