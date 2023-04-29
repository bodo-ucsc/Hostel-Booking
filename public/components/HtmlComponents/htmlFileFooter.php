<?php

class HTMLFooter
{

    public function __construct($alert = null, $message = null)
    {
        $base = BASEURL;
        
        echo "<div class='fill-container navbar-offset'>
        <div class='row'>
            <div class='col-12'></div>

            <div class='col-4'></div>
            <div class='col-4'>
                
                <span>Created By <a href='$base./about'>BODO</a> | </span> 2023 All rights reserved.</span>
               
            </div>
            <div class='col-4'></div>

            <div class='col-12'></div>


        </div>






    </div>";









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
                feather.replace();
            </script>
        </body>
        
        </html>
            
            ";


    }

}


?>