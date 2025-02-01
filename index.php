 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link rel="stylesheet" href="Styles.css">
 </head>
 <body>
 
<header>
         <a href="#" class="brand"> INCOME & EXPENSE <span>TRACKER </span></a>
         <div class="menu-btn">
         <div class="navigation">
         <div class="navigation-items">
            <a href="index.php"> HOME </a>
            <a href="contacts.php"> CONTACT US</a>
            <a href="login.php"> LOGIN </a>
            <a href="register.php"> REGISTER </a>
          </div>
        </div>
        </div>
</header>


<section class="home">
    <img class="img-slide active" src="images/4.jpg">
    <img class="img-slide" src="images/77.jpg">
    <img class="img-slide" src="images/21.jpg">
    <img class="img-slide" src="images/48.jpg">
    <img class="img-slide" src="images/44.jpg"> 
    
    </div>
    <div class="content active">
        <h1><br><span>WELCOME to <br>INCOME & EXPENSE TRACKER </span></h1>
            <p> Easily Manage Income and Expenses </p><span></span>
                <!-- <a href="#">Read More</a> -->
    </div>
   <div class="content">
        <h1><br><span>UNDERSTANDING</span></h1>
            <p>It helps You to Understand your Income <br> and Spending.So You have Maximum <br>Control over your Money</p> 
         <!-- <a href="#">Read More</a> -->
    </div>
                
    <div class="content">
         <h1><br>STOP LOSING<br>RECIEPTS</h1>
            <p> Add Your Expenses directly into Expense Record<br>It will help Users not to use So Many Reciepts</p>
         <!-- <a href="#">Read More</a> -->
    </div>

    <div class="content">
        <h1><br>EVERYTHING IN ONE PLACE<span></span></h1>
            <p>All your Data(Income& Expense)<br> will be stored Systamatically<br>So it will be in One Place</p>
                <!-- <a href="#">Read More</a> -->
                </div>       

                <div class="content">
                    <h1><br><span>SAVING MONEY</span></h1>
                        <p>It helps to look at what You're Spending On,Where You are Speding Unnecessarily and Where You can Start Saving Money</p>
                            <!-- <a href="#">Read More</a> -->
                            </div>     
                        
  <div class="slider-navigation">
           <div class="nav-btn"></div>
           <div class="nav-btn"></div>
           <div class="nav-btn"></div>
           <div class="nav-btn"></div>
           <div class="nav-btn"></div>
        </div>
</section> 
<script src="homeslider.js.js"> </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var homeLink = document.querySelector('.navigation-items a[href="#"]');
    homeLink.addEventListener('click', function(event) {
    event.preventDefault();
         location.reload();
        });
    });
</script>
</body>
</html>
