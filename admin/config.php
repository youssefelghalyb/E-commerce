<?php



class Database{
    private $dsn = "mysql:host=localhost;dbname=eCommerce" ;
    private $usr = 'root' ; 
    private $pass = '' ;
    private $conn ;


    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn , $this->usr , $this->pass );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error Connecting Database" ." ". $e->getMessage() ; 
        }
    }


    public function insert($name , $description , $price , $img){
        try{
            $sql = $this->conn->prepare("INSERT INTO `products`(`pname`,`pdescription`,`pprice`,`pimg`) VALUES (:pname , :pdescription ,:pprice , :pimg );");
            $sql->bindParam(':pname' , $name);
            $sql->bindParam(':pdescription' , $description);
            $sql->bindParam(':pprice' , $price,PDO::PARAM_INT);
            $sql->bindParam(':pimg' , $img);
            $sql->execute() ; 
        }catch(PDOException $e ){
            echo " Error In adding new product " ." ".$e->getMessage();
        }
    }



    public function show_data(){
        try{
            $sql = $this->conn->prepare("SELECT * FROM `products`");
            $sql->execute();

            $result =  $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result ;


        }catch(PDOException $e ){
            echo " Error In Showing  all products " ." ".$e->getMessage();
        }
    }


    /*
    /* Delete Data 
    */
    public function delete_data($id){
        try{
        $sql = $this->conn->prepare("DELETE FROM `products` WHERE id=$id");
        $sql->execute();

        



        }catch(PDOException $e){
            echo "Err Delete This Product" ." ".$e->getMessage();
        }
    }



    /*
    /* Show Product  Data before Update  
    */

    public function select_product($id){
        try{
            $sql = $this->conn->prepare("SELECT * FROM `products` WHERE id=:id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            $result =  $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result ;


        }catch(PDOException $e ){
            echo " Error In Showing  The  product To Update " ." ".$e->getMessage();
        }
    }

    /*
    *Update Data when needed 
    */ 

    public function update_data($id,$new_name , $new_description , $new_price , $new_img){
        try{
            $sql = $this->conn->prepare("UPDATE`products`  SET `pname`=:new_name , `pdescription`=:new_description , `pprice`=:new_price , `pimg`=:new_img WHERE id=:id");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':new_name', $new_name);
            $sql->bindParam(':new_description', $new_description);
            $sql->bindParam(':new_price', $new_price);
            $sql->bindParam(':new_img', $new_img);
            $sql->execute();

            }catch(PDOException $e){
                echo "Err Delete This Product" ." ".$e->getMessage();
            }
        
    }




    public function admin_login($usrname , $pass){
        try{
            $sql = $this->conn->prepare("SELECT * FROM `adminusr` WHERE `username` =:username AND `password`=:pass");
            $sql->bindParam(':username',$usrname);
            $sql->bindParam(':pass',$pass);
            $sql->execute();


            if($sql->rowCount()>0){
                return true ;

            }else{
                return false ;
            }



        }catch(PDOException $e){
            echo "Error Happened While Connecting You "." ".$e->getMessage();
        }
    }



    public function all_admin_users(){
        
        
        try{
        $sql = $this->conn->prepare("SELECT * FROM `adminusr`");
        $sql->execute() ; 

        $result = $sql->fetchAll(PDO::FETCH_ASSOC) ; 
        return $result; 

        }catch(PDOException $e){

            echo "ERROR IN USERS PAGE " ." ".$e->getMessage();
        }
    }


    


}
