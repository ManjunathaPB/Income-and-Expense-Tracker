<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="sweetalert2@11.js"> </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="registerstyle.css">
</head>

<body>
<h1>EXPENSE & INCOME <span style="color:cyan"> TRACKER</span></h1>
    <div class="container">
        <form action="register.php" method="post">
            <?php
            if (isset($_POST["submit"])) {
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordRepeat = $_POST["repeat_password"];
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                if (empty($fullname) or empty($email) or empty($password) or empty($passwordRepeat)) {
                    array_push($errors, "<p class='alerted'> ! all fields are required..</p>");
                }
                // if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                // array_push($errors,"email is not valid..,");  
                // }
                $allowedDomain = 'gmail.com';

                // Extract the domain from the email address
                $emailParts = explode('@', $email);
                $domain = end($emailParts);

                if ($domain !== $allowedDomain) {
                    array_push($errors, "<p class='alerted'>! Only Gmail format are allowed..</p>");
                }
                // if (strlen($password) < 5) {
                //     array_push($errors, "<p class='alerted'>! Password must be at least 6 characters long..</p>");
                // }

                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password); // Matches any non-word character
                
                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
                    array_push($errors, "<p class='alerted'>! Password must contain at least 8 characters, including uppercase, lowercase, numbers, and special characters.</p>");
                } 
                    
                
            //alpha numeric end
                

                if ($password !== $passwordRepeat) {
                    array_push($errors, "<p class='alerted'>! Password is not match..</p>");
                }
                require_once "database.php";
                // it take the only once code from other page
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 1) {
                    array_push($errors, "<p class='alerted'>! You entered email is already exists..</p>");
                }

                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        // it work on the only array values
                        echo '<span class="alert">' . $error . '</span>';
                    }
                } else {
                    $sql = "INSERT INTO users(full_name,email,password)VALUES(?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<script>
                     
                Swal.fire({
                    title: 'Success!',
                    text: 'Register successfully.',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
             </script>";

                        //   alert('Register successfully..');
                        //   echo "<script>window.location.href='login.php'</script>";

                    } else {
                        //die("Something went wrong");
                        echo "<script>
                  Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.',
                    icon: 'error'
                });
             </script>";
                    }
                }
            }
        
            ?>
            <div class="form1">
                <h1>Register Form</h1>
            </div>
            <div id="line"></div>

            <div class="form-group">
                <input type="text" class="form-control" name="fullname" autocomplete="off" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="repeat_password" autocomplete="off" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-primary" value="REGISTER" name="submit">
            </div>
            <div>
                <h4>Already Registered..!<a href="login.php">Login here</a></h4>
            </div>
        </form>
    </div>
</body>

</html>