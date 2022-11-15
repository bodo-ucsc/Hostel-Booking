<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo BASEURL . '/public/styles/styles.css' ?>">
    <link rel="shortcut icon" href=" <?php echo BASEURL . '/public/images/favicon.png' ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Home</title>
</head>

<body>

    <?php
    $header = new Navigation('home');
    ?>

    <main class=" home full-width full-height overflow-hidden ">
        <div class="row margin-left-5 full-height">
            <div class=" col-large-7 fill-container  left  ">
                <div class=" fill-container cover-text">Boarding?</div>
                <div class="margin-left-3">
                    <?php
                        $search = new Search();
                    ?>
                </div>
            </div>
            <div class="col-1"></div>

        </div>


    </main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>