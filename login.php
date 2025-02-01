<?php  
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css"> 
    <!-- <link rel="stylesheet" href="css/loginstylecopy.css"> -->
    <title>Document</title>
    <script>
        check.onclick=togglePassword;

        function togglePassword(){
         if(check.checked) pass.type="text";
         else pass.type= "password";
        }

    </script>

</head>
<body>
<h1>EXPENSE & INCOME <span style="color:cyan"> TRACKER</span></h1>

    <div class="wholepage">
    <form action="login.php" method="post">
        <?php
        if(isset($_POST["login"])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            require_once "database.php";
            $sql="SELECT * FROM users WHERE email= '$email'";
            $result= mysqli_query($conn, $sql);
            $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($user){
                if(password_verify($password,$user["password"])){
                    //  session_start();
                    $_SESSION["user"]=$user["ID"];
                    // $_SESSION["user"]=$user["email"];
                    header("Location: sidebar2.php");
                    die();
                }else{
                    echo "<span class='alert'>! Password does not match..</span>";
                }   
            }else{
                echo "<span class='alert'>! Email does not match..</span>"; 
            }
        }
        ?>
        <!-- <marquee><h3>Please login with the correct information</h3></marquee> -->
        <div class="logindemo">
            <h1>Login Form</h1>
        </div>
     <form>
        <span>
             <!-- <i class="fa-solid fa-user"></i>  -->
            <input type="email" name="email" autocomplete="off" placeholder="Email" required>
        </span><br>
        <span>
            <!-- <i class="fa-sharp fa-solid fa-lock"></i> -->
            <input type="password" id="pass" name="password" autocomplete="off" placeholder="Password" required>
        </span>
        <button name="login" class="login">LOGIN</button>
    </form>
      <input class="check" id="check" onclick=togglePassword() type="checkbox">show password
    <h4>Forgot Password? <a href="forgot.php">Click here</a></h4>
    <h4>Not Regestered Yet? <a href="register.php">Register here</a></h4>
 </div>
</body>
</html>
