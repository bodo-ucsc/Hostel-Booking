<?php
$header = new HTMLHeader("All Property");
$nav = new Navigation("home");
$sidebar = new SidebarNav($active="user");
?>

<main class=" navbar-offset sidebar-offset">
    <div class="row margin-left-5">
        <div class="col-8 header-1 fill-container">Hello <?php
            if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
            }else{
                echo "Random User";
            }
        ?>! </div>
        <div class="col-4 fill-container flex">
            <div>
            <button class=" bg-blue-hover white-hover padding-2 border-rounded-more padding-3 flex justify-content center margin-right-4"><i data-feather="plus"></i>Add Boarding</button>
            </div>
            <div class=" header-nb">
            <?php
                if(isset($_SESSION['userid'])){
//                    $num = numRowsWhere('boardingplace', "'UserId' = $_SESSION['userid']");
                }else{
                    $num = 69;
                }
               echo $num;
            ?> Properties
            </div>
        </div>     
    </div>
    <div class="margin-left-5 margin-vertical-5  flex-wrap">

    <?php    
        for ($x = 0; $x <= 10; $x++) {
        $viewcard = new ViewCard(255, 'Wellawatta', '7/6, Wellawatta', 2, null, 5);
        }
    ?> 
        
        
    </div>
</main>

<?php
$footer = new HTMLFooter();
?>

// $viewcard = new ViewCard('Wellawatta', '7/6, Wellawatta', 2, null, 5);