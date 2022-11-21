<?php

class HTMLHeader{
    
        public function __construct($title="BODO"){
            $base = BASEURL;
            echo "

            <!DOCTYPE html>
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href=' $base/public/styles/styles.css'>
                <link rel='shortcut icon' href='$base/public/images/favicon.png' type='image/x-icon'>
            
                <link rel='preconnect' href='https://fonts.googleapis.com'>
                <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap' rel='stylesheet'>
            
                <title>BODO | $title</title>
                
            </head>
            
            <body>
            
            ";
        }
}


?>
