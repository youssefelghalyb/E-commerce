<?php

session_start();

if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');

}

if(!$_SESSION['admin_user']){
    header('location:login.php');

}


include 'header.php' ; 
require_once "config.php";
?>


<div class="container mt-5">
    <h1>Welcome <?php echo $_SESSION['admin_user']?></h1>
    <p>Select an option from the navigation menu.</p>

    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
        <button name="logout" class="btn btn-danger">Logout</button>
    </form>

</div>


<?php  include "footer.php" ?>
