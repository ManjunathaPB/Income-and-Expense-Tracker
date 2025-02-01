<?php include_once ("controller.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <script src="sweetalert2@11.js"> </script>
    <!-- <link rel="stylesheet" href="css/forgot.css"> -->
    <style>
         * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    height: auto;
    width: 100%;
    display: flex;
    background-image: url("images/4.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
#container {
    height: auto;
    width: 350px;
    margin-top: 200px;
    background-color: #ffffff;
    padding: 40px;
    border-radius: 20px;
    position: relative;
    /* box-shadow: -2px 2px 12px rgba(0,0,0,0.3); */
    box-shadow: 0 0 5px rgb(0, 0, 0);

}

#container h2 {
    font-size: 30px;
    color: black;
    font-family: 'Times New Roman', Times, serif;
    /* text-align: center; */
}

#container #line {
    height: 2px;
    width: 100%;
    background: #151313f6;
    margin: 5px 0;
}

#alert {
    height: auto;
    width: 100%;
    /* padding: 0 15px; */
    /* line-height: 10px; */
    margin-top: 5px;
    color: #dc3545;
    background-color: bisque;
    border-radius: 5px;
    padding: 5px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

#container input {
    height: 33px;
    width: 100%;
    margin-top: 20px;
    border: 1px solid #00000031;
    font-size: 15px;
    background: #f5f6f7;
    text-align: center;
    border-radius: 10px;
    padding: 0px 12px;
}

#container input[type="submit"] {
    height: 40px;
    border: none;
    background-color: cyan;
    border-radius: 20px;
    /* box-shadow: 0 0 5px yan, */
    /* 0 0 15px cyan; */
    font-size: 15px;
    margin: 30px 0 0 0;
    cursor: pointer;
    width: 50%;
    margin-left: 65px;
}

#container input[type="submit"]:hover {
    box-shadow:
        0 0 5px cyan, 0 0 15px cyan,
        0 0 25px cyan;
    border-color: rgb(36, 35, 35);
    /* border-width:5px; */
    border: 2px solid;

}
    </style>
</head>
<body>
<h1>EXPENSE & INCOME <span style="color:cyan"> TRACKER</span></h1>
<div id="container">
        <h2>New Password</h2>
        <div id="line"></div>
        <form action="newPassword.php" method="POST" autocomplete="off">
            <?php
            // change Password
                if(isset($_POST['changePassword'])){
                $password = ($_POST['password']);
                $confirmPassword = ($_POST['repeat_password']);
                $passwordHash=password_hash($password, PASSWORD_DEFAULT);

    
                if (strlen($_POST['password']) < 6) {
                 $errors['password_error'] = '-> Use 6 or more characters with a mix of letters, numbers & symbols';
                } else {
        // if password not matched so
                if ($_POST['password'] != $_POST['repeat_password']) {
                    $errors['password_error'] = '-> Password not matched';
                } else {
                    $email = $_SESSION['email'];
                    $updatePassword = "UPDATE users SET password = '$passwordHash' WHERE email = '$email'";
                     $updatePass = mysqli_query($conn, $updatePassword) ;
                    /* if($updatePass){
                         echo  "<script>
                                       Swal.fire('Update Successfully..')
                                </script>";
                     }
                     else{
                                 or die("-> Query Failed");
                       }*/      
                        // session_unset($email);
                        session_destroy();
                        header('location: login.php');

          }
    }
}
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="text" name="repeat_password" placeholder="Confirm Password" required><br>
            <input type="submit" name="changePassword" value="Save">
        </form>
    </div>
</body>
</html>