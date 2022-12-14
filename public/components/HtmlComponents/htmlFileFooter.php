<?php

class HTMLFooter
{

    public function __construct($error = null)
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
              ";
        if (isset($error)) {
            
            if ($error == "Incorrect username or password") {
                echo "
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error'
                })";
                //unset($error);

            } else if ($error == "Password Update Successfully") {
                echo "
                Swal.fire({
                    icon: 'success',
                    title: 'Done...',
                    text: '$error'
                })";
                //unset($error);
            } 
           
            // echo "
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Oops...',
            //         text: '$error'
            //     })";
                unset($error);
            
                echo "
                feather.replace();
            </script>
        </body>
        
        </html>
            
            ";
            
        }
            
    }
}


?>