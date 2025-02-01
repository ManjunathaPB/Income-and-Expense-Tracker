<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <!-- <link rel="stylesheet" href="css/otp.css"> -->
    <style>
       *
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body
{
    height: auto;
    width: 100%;
    display: flex;
    background: #f5f5f5;
    background-image: url("images/4.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;

}
#container
{
    height: auto;
    width: 350px;
    padding: 40px;
    margin-top: 200px;
    border-radius: 20px;
    position: relative;
    box-shadow:0 0 5px rgb(0, 0,0);
    background-color: white;

}
#container h2
{
    font-size: 30px;
    color: black;
    font-family:'Times New Roman', Times, serif;
    /* text-align: center; */
}
#container #line
{
    height: 2px;
    width: 100%;
    background: #151313f6;
    margin: 5px 0;
}
#alert
{
    height: auto;
    width: 100%;
    margin-top: 5px ;
    color:#dc3545;; 
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    background-color: bisque;
    border-radius:5px ;
    margin-bottom: 5px;
    /* padding: 5px; */
    /* margin-bottom: 10px; */
}
#container input
{
    height: 33px;
    width: 100%;
    margin: 5px 0;
    border: 1px solid #00000031;
    font-size: 15px;
    background: #f5f6f7;
    outline: none;
    border-radius: 10px;
    padding: 0px 12px;
}
#container input[type="submit"]
{
    height: 40px;
    border: none; 
    background-color:cyan;
    border-radius: 20px;
    /* box-shadow: 0 0 5px yan, */
                /* 0 0 15px cyan; */
    font-size: 15px;
    margin: 30px 0 0 0;
    cursor: pointer;
    width: 100px ;
    margin-left: 90px;
}
#container input[type="submit"]:hover
{
    box-shadow: 
                0 0 5px cyan,0 0 15px cyan,
                0 0 25px cyan;
   border-color: rgb(36, 35, 35);
   /* border-width:5px; */
   border:2px solid;

}

    </style>
</head>
<body>
<h1>EXPENSE & INCOME <span style="color:cyan"> TRACKER</span></h1>

    <div id="container">
        <h2>Email</h2>
        <div id="line"></div>
        <form action="verifyEmail.php" method="POST" autocomplete="off">
            <?php
            if(isset($_SESSION['message'])){
                ?>
                <div id="alert"><?php echo $_SESSION['message']; ?></div>
                <?php
            }
            ?>

            <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?>      
            <input type="number" name="OTPverify" placeholder="Verification Code" required><br>
            <input type="submit" name="verifyEmail" value="Verify">
        </form>
    </div>
</body>
</html>