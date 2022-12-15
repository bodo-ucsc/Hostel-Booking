<?php
// include("connect.php");
// if(isset($_POST['btn']))
// {
//     $item_name=$_POST['iname'];
//     $item_qty=$_POST['iqty'];
//     $istatus=$_POST['istatus'];
//     $date=$_POST['idate'];
//     $id = $_GET['id'];
//     $q= "update grocerytb set Item_name='$item_name', Item_Quantity='$item_qty', Item_status='$istatus', Date='$date' where Id=$id";
//     $query=mysqli_query($con,$q);
//     header('location:index.php');
// } 
// else if(isset($_GET['id'])) 
// {
//     $q = "SELECT * FROM grocerytb WHERE Id='".$_GET['id']."'";
//     $query=mysqli_query($con,$q);
//     $res= mysqli_fetch_array($query);
// }
?>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">heet">

    <title>Admin | Edit BoardingOnwer</title>
</head>

<body>

    <div class="row">
        <?php
        $header =   new Navigation();
        ?>
    </div>
    <?php
    if (isset($_SESSION["username"])) {
        //     $sidebar = new SideBarNav("user", "admin");
    ?>
        <div class="header-1 margin-bottom-3">Update Boarding Owner</div>
        <div class="container margin-top-5 padding-top-5">
            <div>
                <span class=" header-2">Edit Boarding Owner</span>
            </div>
            <form action="<?php echo BASEURL; ?>adminhome/updateboardingOwner" method="POST">
                <?php
                //foreach ($data as $row) {
                ?>

            

                <?php
                // } 
                ?>
            </form>


            <form action="<?php echo BASEURL; ?>adminhome/updateboardingOwner" method="POST">

                <?php
                $result = $data['res'];
                // //print_r($data); 
                // 
                ?>
                <label>First Name</label>
                <input autofocus type="text" name="first_name" value="<?php echo $result['first_name']; ?>" /><br>
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" /><br>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $result['email']; ?>" /><br>
                <input type="hidden" name="user_id" value="<?php echo $result['user_id']; ?>" /><br>
                <input type="submit" name="submit" value="Update" />
            </form>

        <?PHP
    } ?>
        </div>

        <div>
            <button><a href="<?php echo BASEURL ?>/adminhome/viewboardingOwner">Back</a></button></br>
        </div>
</body>

</html>