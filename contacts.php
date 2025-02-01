<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex; 
        justify-content: center;  
        align-items: center; 
        min-height: 100vh;
         background-image: url('images/m.jpg'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding-right: 50px; 
    }
    
     .container 
     {
        background-color:rgb(250, 249, 249); 
        border-radius: 10px;
        box-shadow: 200px 4px 200px rgba(0, 0, 0, 0.1); 
        padding: 50px;
        max-width: 400px;
        width: 100%;
        text-align: left; 
        display: flex; 
        flex-direction: column;
        margin-bottom: 30px;
        margin-left: 55px;  
        margin-top: 120px;
        transition: 0.4s ease;
    }
    
    .container:hover
    {
        background-color: #234e70;
        transform: scale(1.1);
         /* transition: background-color 0.3s ease,transform 0.3 ease;  */
    } 
    
    h1 {
        font-size: 32px;
        margin-bottom: 20px;
        color: rgb(0, 0, 0);
        /* text-align: center; */
    }
    
    p {
        font-size: 18px;
        margin: 5px 0; 
        color: #000000;
        display: flex;
        align-items: center;
    }
    
    .icon {
        font-size: 15px;
        margin-right: 10px;
        color: #000000;
    }

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
}

header
{
    z-index: 999;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    padding-top :none;  
    transition: 0.5s ease;
    margin-bottom: 10px;

}

body
{
   display: flex;
   justify-content: center;
   align-items: center;
   min-height: 100vh;
   background-size: cover;
   background-position: center;
}

header span
{
  color: aqua;
}

header .brand
{
    color: aqua;
    font-size: 3rem;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
}
header .navigation
{
    position: relative;
}

header .navigation .navigation-items a
{
   position: relative;
   color: aqua;
   font-size: 1.2em;
   font-weight: 500;
   text-decoration: none;
   margin-left: 30px;
   transition: 0.3s ease ;
   padding-right: 20px;
   
} 

header .navigation .navigation-items a:before
{
    content: '';
    position: absolute;
    background: #bd0e0e;
    width: 0;
    height: 3px;
    bottom: -6px;
    left: 0;
    transform-origin: right;
    transform: scale(0);
    transition: transform .5s;
    border-radius: 5px;
}

header .navigation .navigation-items a:hover:before
{
    transform-origin: left;
    transform: scale(1);
    width: 100%;
    background: rgb(203, 203, 203);
}

section
{
    padding: 100px 200px;
}

</style>
 
<header>
<a href="#" class="brand"> INCOME & EXPENSE <span>TRACKER </span>  </a>
<div class="menu-btn">
<div class="navigation">
 <div class="navigation-items">
   <a href="index.php">  HOME </a>
   <a href="contacts.php"> CONTACT US</a>
   <a href="login.php"> LOGIN </a>
   <a href="register.php"> REGISTER </a>
 </div> 

</header>
 <body> 
    
    <div class="container">
    <h1><i class="fas fa-user icon"></i>Manjunatha P B</h1> 
    <p><i class="fas fa-envelope icon"></i> manjunathapbmanju7259@gmail.com</p> 
    <p><i class="fas fa-phone icon"></i> +918147858242</p> 
    <p><i class="fas fa-compass icon"></i>Bengaluru</p> 
    </div>
    </body> 
</html>