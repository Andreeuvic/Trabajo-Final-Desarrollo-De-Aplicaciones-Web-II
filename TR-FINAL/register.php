<?php

include_once('db_connect.php');

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $email= $_POST['email'];
    $password = $_POST['password'];

    $email_result = mysqli_query($connect,"SELECT 'email' from usuario where dni='$dni'and email='$email' and password='$password'");
    $user_match = mysqli_num_rows($email_result);

    if($user_match >0){
        
        echo "El usuario con este email '$email' ya existe";
    } else{
        $result = mysqli_query($connect,"INSERT INTO usuario(name,dni,email,password) VALUES('$name','$dni','$email','$password')");

        if($result){
            header("location: login.php");
        }else{
            echo "error de registro, intente nuevamente".mysqli_error($connect);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ZARA/REGISTER</title>
        <link rel="icon" type="image/x-icon" href="img/logo.jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <div style="text-align:center">
            <div class="cuadro1" style="margin:0px auto">
                <div style="margin-top:20%">
                    <div>
                        <div>
                            <div>
                                <img class="logo-register" src="img/logo.jpg" alt="">
                                <h3>Sign up</h3>
                            </div>
                            <form action="register.php" method="POST">
                                <div>
                                    <input type="text" name="name" class="text1" placeholder="Username">
                                </div>
                                <div>
                                    <input type="text" name="dni" class="text1" placeholder="Dni">
                                </div>
                                <div>
                                    <input type="email" name="email" class="text1" placeholder="Email">
                                </div>
                                <div>
                                    <input type="password" name="password" class="text1" placeholder="Password">
                                </div>
                                <div>
                                    <button class="login" type="submit" name="register"><span></span>Sign up</button>
                                </div>
                                <p class="text-center mt-3">You have an account?                                    
                                    <a href="login.php">Sign in</a>                                    
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>