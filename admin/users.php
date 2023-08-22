<?php
session_start() ; 

if(!$_SESSION['admin_user']){
    header('location:login.php');
}

if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');

}

include "header.php" ; 

require_once "config.php" ;



if(isset($POST['submit'])){

}


?>





<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="./user.png" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Admin</span>
                    <h5 class="mt-2 mb-0"><?php echo $_SESSION['admin_user']?></h5>
                    <div class="px-4 mt-1">
                        <p class="fonts">mail@mail.com</p>
                    </div>
                    
                    <div class="buttons">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <button type='submit' name="logout" class="btn btn-danger px-4 ms-3">logout</button>
                        </form>
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
        <h1 class='mt-5'>All Users</h1>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>

  <?php   
    $all_Users = new Database();
    $data = $all_Users->all_admin_users();

    foreach ($data as $row):

  ?>
    <tr>
      <th ><?php echo $row['id']?></th>
      <td><?php echo $row['username']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['role']?></td>
    </tr>

    <?php endforeach; ?>
  </tbody>
</table>



</div>