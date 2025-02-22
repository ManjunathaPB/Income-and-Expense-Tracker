<?php
    include_once("database.php");
    // Connection Created Successfully

    session_start();

    // Store All Errors
    $errors = [];
    // if forgot button will clicked
    if (isset($_POST['forgot_password']))
     {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        // if query run
        if ($emailCheckResult) 
        {
            // if email matched
            if (mysqli_num_rows($emailCheckResult) > 0) 
            {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE users SET code = $code WHERE email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                if ($updateResult)
                 {
                    $subject = 'Email Verification Code';
                    $message = "
                            Dear customer,
                            Your OTP to verify your email with Income 
                            and     is $code .";
                    $sender = 'From: 23mcad13@kristujayanti.com';

                    if (mail($email, $subject, $message, $sender)) 
                    {
                        $message = "We've sent a verification code to your Email <br> $email";

                        $_SESSION['message'] = $message;
                        header('location: verifyEmail.php');
                    } else 
                    {
                        $errors['otp_errors'] = 'Failed while sending code!';
                    }
                } 
                else 
                {
                    $errors['db_errors'] = "Failed while inserting data into database!";
                }
            }
            else
            {
                $errors['invalidEmail'] = "Invalid Email Address";
            }
        }
        else 
        {
            $errors['db_error'] = "Failed while checking email from database!";
        }
    }
if(isset($_POST['verifyEmail'])){
    $_SESSION['message'] = "";
    $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
    $verifyQuery = "SELECT * FROM users WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn,$verifyQuery);
    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            $newQuery = "UPDATE users SET code = 0";
            $run = mysqli_query($conn,$newQuery);
            header("location: newPassword.php");
        }else{
            $errors['verification_error'] = "Invalid Verification Code";
        }
    }else{
        $errors['db_error'] = "Failed while checking Verification Code from database!";
    }
}

// change Password
if(isset($_POST['changePassword'])){
    $password =$_POST['password'];
    $passwordRepeat = $_POST["repeat_password"];
    
    if (strlen($_POST['password']) < 6) {
        $errors['password_error'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['repeat_password']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE users SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            // session_unset($email);
            session_destroy();
            header('location: index.php');
        }
    }
}