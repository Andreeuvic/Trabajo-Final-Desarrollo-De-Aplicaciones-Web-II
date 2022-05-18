<?php

include_once('db_connect.php');

if(isset($_POST['login'])){
  $email= $_POST['email'];
  $password= $_POST['password'];

  // Verificar si el usuario existe con estas credenciales
  $result=mysqli_query($connect, "SELECT 'email', 'password' FROM usuario WHERE email='$email' and password='$password'");

  // Contar el numero de usuarios 
  $user_match = mysqli_num_rows($result);

  // Si el usuario con el email existe que nos direccione a alguna pagina
  if($user_match >= 1){
    session_start();
    $_SESSION['usuario'] = $result;
    header("location: main.php");
  }else{
    header('location: error.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ZARA/LOGIN</title>
        <link rel="icon" type="image/x-icon" href="img/logo.jpg" />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div style="text-align:center">
            <div class="cuadro2" style="margin:0px auto">
                <div style="margin-top:50%">
                    <div>
                        <div>
                            <img class="logo" src="img/logo.jpg" alt="">
                        </div>
                        <div>
                            <form action="index.php" method="POST">
                                <div>
                                    <input type="email" name="email" class="text2" placeholder="Email">
                                </div>
                                <div>
                                    <input type="password" name="password" class="text2" placeholder="Password">
                                </div>
                                <div>
                                    <button type="submit" name="login" class="login">Sign in</button>
                                </div>
                                <p class="text-center mt-3">You have an account?
                                    <a href="register.php">Sign up</a> 
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>