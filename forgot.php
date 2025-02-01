<?php include_once ("controller.php"); ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Your Password In Php</title>
    <!-- <link rel="stylesheet" href="css/forgot1.css"> -->
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
    margin-top: 200px;
    width: 350px;
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
        <h2>Email Check</h2>
        <div id="line"></div>
        <form action="forgot.php" method="POST" autocomplete="off">
             <?php 
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
             ?>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="submit" class="btn" name="forgot_password" value="CHECK">
        </form>
    </div>
</body>

</html>