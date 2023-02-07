<?php

class HTMLHeader
{

    public function __construct($title = null,$description = null,$image = null)
    {
        if($title == null){
            $title = "BODO";
        }else{
            $title = "BODO | $title";
        }
        if($description == null){
            $description = "BODO is a platform that bridges the gap between tenants and boarding owners by providing useful tools to make the process of finding and managing a boarding place easier.";
        }
        if($image == null){
            $image = "public/images/favicon.png";
        }
        $base = BASEURL;
        echo "

            <!DOCTYPE html>
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta name='description' content='$description' />

                <meta property='og:title' content='$title' />
                <meta property='og:description' content='$description' />
                <meta property='og:image' content='$base/$image' />

                <link rel='stylesheet' href=' $base/public/styles/styles.css'>
                <link rel='shortcut icon' href='$base/public/images/favicon.png' type='image/x-icon'>
                <link href='https://unpkg.com/filepond@^4/dist/filepond.css' rel='stylesheet' />
                <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'>


                <link rel='preconnect' href='https://fonts.googleapis.com'>
                <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap' rel='stylesheet'>
            
                <title>$title</title>
                
            </head>
            
            <body>
            
            ";
    }
}


?>