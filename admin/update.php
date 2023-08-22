<?php

session_start();

if(!$_SESSION['admin_user']){
    header('location:login.php');

}

include "header.php" ; 

require 'config.php' ; 

//##TO SHOW THE DATA 
$product_id =  $_GET['id'];


$update_data = new Database() ; 

$product_data = $update_data ->select_product($product_id);

$product = $product_data[0];


$old_name =   $product['pname'];
$old_description =   $product['pdescription'];
$old_price =   $product['pprice'];
$old_img = $product['pimg'];

$status = '';

if(isset($_POST['update'])){
        $product_id = $_POST['product_id'];
        $new_name = $_POST['name'];
        $new_description = $_POST['description'];
        $new_price = $_POST['price'];
        $img = $_FILES['img'];
        $img_location = $_FILES['img']['tmp_name']; 
        $img_name = $_FILES['img']['name'] ; 
        $img_upload = "uploads/".$img_name; 


            if(move_uploaded_file($img_location,$img_upload)){
                $update_data->update_data($product_id ,$new_name , $new_description , $new_price , $img_upload);
                $status = "Product Updated Successfully" ; 
            }else{
                echo "Problem to Upload";
            }
        


    }





?>




<div class="container">
<center class="mt-5 mb-5 alert alert-primary">
    <h1 class='mb-5 mt-5 text-center'>Update Product With ID: <?php echo $product_id?> </h1>
    </center>

    <?php if($status !=''):?>
        <div class="container">
                <div class="main-page-title text-center text-bg-success p-3 mt-3 mb-3">   
                    <div class="row ">
                        <div class="col-sm-12">
                            <?php echo $status; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif ; ?>


    <form action="update.php?id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">New Product Name:</label>
                <input value="<?php echo $old_name?>" type="text" class="form-control" name="name" >
            </div>
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

            <div class="mb-3">
                <label for="description" class="form-label">New Product Description:</label>
                <input value="<?php echo $old_description?>" type="text" class="form-control" name="description" >
            </div>
            <div class="mb-3">
                <label class="form-label">New Product Price:</label>
                <input value="<?php echo $old_price?>"  type="number" class="form-control" name="price">
            </div>

            <div class="mb-3">
                <label class="form-label">Existing Product Image:</label>
                <img src="<?php echo $old_img; ?>" alt="Existing Product Image" width="100">
            </div>

            <div class="mb-3">
                <label class="form-label">New Product Image:</label>
                <input type="file" class="form-control" name="img" >
            </div>
        <div class='text-center mt-5'>
            <input type="submit" name="update" class="btn main-btn" value="Update">
        </div>
    </form>
</div>






<?php include "footer.php" ;?> 