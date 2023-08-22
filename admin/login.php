<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">
    <title>Login</title>
</head>
<body>


    <?php   

        $auth_method = new Database;

        $incorrect = '';
    
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $authResult = $auth_method->admin_login($username , $pass);

            if($authResult){
                session_start() ;
                $_SESSION['admin_user']  = $username ; 
                header("location:index.php");

            }else{
                $incorrect ="Wrong Username Or Password";
            }

        }
    
    ?>





    <form class="login-form" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

    <?php if($incorrect != ""):?>
        <div class="main-page-title text-center text-bg-danger p-3 mt-3 mb-3 w-34">   
                    <div class="row ">
                        <div class="col-sm-12">
                            <?php echo $incorrect; ?>
                        </div>
                    </div>
                </div>
            <?php endif ;?>


        <div class="log-cont">
            <div class="head">
                <h4>Admin Login</h4>
            </div>

            <div class="inputs">
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>

                <div class="sub-btn">
                    <button type="submit" class="btn btn-primary mt-5 text-center"  name="login">Login</button>
                </div>
            </div>

        </div>
    </form>



</body>
</html>



<?php  include "footer.php" ?>