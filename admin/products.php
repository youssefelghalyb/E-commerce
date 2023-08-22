<?php

session_start();

if(!$_SESSION['admin_user']){
    header('location:login.php');

}

include "header.php";
require_once "config.php";
?>
<center class="mt-5 mb-5 alert alert-primary">
    <h1 >  All Products  </h1>
</center>

<div class="container">
    <div class="row justify-content-around">




    <?php   
    
    $show_all = new Database();

    $data = $show_all->show_data() ; 

    foreach($data as $row):
        $product_name = $row['pname'];
        $product_img_path = $row['pimg'];
        $product_description = $row['pdescription'] ; 
        $product_price = $row['pprice'];
        $product_id = $row['id'];

    ?>
        <div class="col-md-3 m-3">
            <div class="card" style="width: 18rem;">
            <img src="<?php echo $product_img_path?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product_name; ?> </h5>
                <p>Price :<?php echo $product_price; ?> $ </p>
                <p class="card-text"><?php echo $product_description; ?> </p>
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <a href="update.php?id=<?php echo $product_id?>" class="btn btn-primary">Update </a>
                    </div>
                    <div class="col-md-6">
                        <a href="delete.php?id=<?php echo $product_id?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <?php endforeach;  ?>

    </div>
</div>






<?php  include "footer.php" ?>