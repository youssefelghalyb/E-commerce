<?php



include "header.php" ; 

require 'config.php' ; 

$product_id =  $_GET['id'];


$delete_product = new Database() ; 

    $delete_product->delete_data($product_id);
?>



<center class="mt-5 mb-5 alert alert-danger">
    <h1 >  Product Deleted Successfully   </h1>
    <h3>Back To Products Page <a href="products.php" class='btn btn-primary' >Products</a></h3>
</center>










<?php include "footer.php" ;?> 