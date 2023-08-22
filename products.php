<?php
include "header.php";
require_once "./admin/config.php";


    $show_all = new Database();

    $data = $show_all->show_data() ; 


    ?>


<section class='sec2' id="new-arr">
    <div class="container">
        <h3 class='text-center'>ALL Products</h3>
        <div class="row">
            
        <?php 

        foreach($data as $row):
            $product_name = $row['pname'];
            $product_img_path = $row['pimg'];
            $product_description = $row['pdescription'] ; 
            $product_price = $row['pprice'];
        
        ?>

        <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="product-img d-flex justify-content-center flex-column">
                        <img  src="./admin/<?php echo $product_img_path?>" alt="" >
                            <div class="add-t-card d-flex justify-content-between bg-dark">
                                <div>
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Add to card</span>
                                </div>
                                <div>
                                    <i class="fa-regular fa-heart" ></i>
                                </div>
                            </div>
                    </div>
                    <div class="product-data text-center">
                        <h5><?php echo $product_name?></h5>
                        <h6><?php echo $product_price ?>$</h6>
                    </div>
                </div>
        </div>

            <?php endforeach;?>
        </div>
    </div>

</section>

<?php
include "footer.php";