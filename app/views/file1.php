<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo BASEURL . '/public/styles/styles.css' ?>">
    <title>Document</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    $header = new Navigation("feed");

    $search = new Search();
    $filter = new Filter();
    $sidebar = new SideBarNav("user","verification");

    ?>


    <main class=" margin-top-5 padding-top-5">
        <div class="row border-red border-1 margin-2 padding-2">
            <div class=" padding-2 margin-2 border-1 border-accent fill-container flex">
                <i data-feather='star'></i>

            </div>
        </div>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>