<?php


session_start();

if(!$_SESSION['admin_user']){
    header('location:login.php');

}


include 'header.php' ; 
require_once "config.php";

$add_new = new Database();

    //DATA VALIDATION
    $missing_data = '';
    $new_product = '';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_FILES['img'];
        $img_location = $_FILES['img']['tmp_name']; 
        $img_name = $_FILES['img']['name'] ; 
        $img_upload = "uploads/".$img_name; 



        if(empty($name)  or empty($description) or empty($price)){
            $missing_data ="Missing Data Please Complete All Data " ; 
        }else{
            if(move_uploaded_file($img_location,$img_upload)){
                $add_new->insert($name , $description , $price , $img_upload);
                $new_product = 'New Product Added Successfully';
            }else{
                echo "Problem to Upload";
            }
        }


    }
 

?>


<div class="container">

    <h1 class='mb-5 mt-5 text-center'>Add New Product</h1>

    <?php if($missing_data !=''):?>
        <div class="container">
                <div class="main-page-title text-center text-bg-danger p-3 mt-3 mb-3">   
                    <div class="row ">
                        <div class="col-sm-12">
                            <?php echo $missing_data; ?>
                        </div>
                    </div>
                </div>
            </div>
    
    <?php endif; ?>



    <?php if($new_product != ''): ?>

        <div class="container">
                <div class="main-page-title text-center text-bg-success p-3 mt-3 mb-3">   
                    <div class="row ">
                        <div class="col-sm-12">
                            <?php echo $new_product; ?>
                        </div>
                    </div>
                </div>
            </div>

    <?php endif;?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="name" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Product Description:</label>
                <input type="text" class="form-control" name="description" >
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price:</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Image:</label>
                <input type="file" class="form-control" name="img">
            </div>
        <div class='text-center mt-5'>
            <input type="submit" name="submit" class="btn main-btn">
        </div>
    </form>
</div>


<?php  include "footer.php" ?>



