<?php
session_start();
// error_reporting(0);
include('database.php');
if (strlen($_SESSION['user'] == 0)) {
    header('location:logout.php');
} else {
    // if (isset($_POST['submit'])) {
    //     $userid = $_SESSION['user'];
    //     $fullname = $_POST['fullname'];

    //     $query = mysqli_query($conn, "update users set full_Name ='$fullname' where ID='$userid'");
    //     if ($query) {
    //         //  echo "<span class='alert1'>-> User profile has been updated..</span>";
    //         echo "<script>alert('User profile has been updated..');</script>";
    //         echo "<script>window.location.href='sidebar2.php'</script>";

            
           
          

    //     } else {
    //         // echo "<span class='alert1'>-> Something Went Wrong.Please try again..</span>";
    //         echo "<script>alert('something went wrong. Please try again..');</script>";
    //     }
    // }
    
// if (isset($_POST['submit'])) {
//     $userid = $_SESSION['user'];
//     $fullname = $_POST['fullname'];

//     // Your database connection code here

//     $stmt = mysqli_prepare($conn, "UPDATE users SET full_Name = ? WHERE ID = ?");
//     mysqli_stmt_bind_param($stmt, "si", $fullname, $userid);

//     if (mysqli_stmt_execute($stmt)) {
//         // SweetAlert for success
//         echo "<script>
//                 Swal.fire({
//                     title: 'Success!',
//                     text: 'User profile has been updated.',
//                     icon: 'success'
//                 }).then((result) => {
//                     if (result.isConfirmed) {
//                         window.location.href = 'sidebar2.php';
//                     }
//                 });
//              </script>";
//     } else {
//         // SweetAlert for error
//         echo "<script>
//                 Swal.fire({
//                     title: 'Error!',
//                     text: 'Something went wrong. Please try again.',
//                     icon: 'error'
//                 });
//              </script>";
//     }

//     mysqli_stmt_close($stmt);
// }

if (isset($_POST['submit'])) {
    $userid = $_SESSION['user'];
    $fullname = $_POST['fullname'];

    // Your database connection code here

    $stmt = mysqli_prepare($conn, "UPDATE users SET full_Name = ? WHERE ID = ?");
    mysqli_stmt_bind_param($stmt, "si", $fullname, $userid);

    if (mysqli_stmt_execute($stmt)) {
        // SweetAlert for success
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: 'User profile has been updated.',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'sidebar2.php';
                        }
                    });
                });
             </script>";
    } else {
        // SweetAlert for error
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again.',
                        icon: 'error'
                    });
                });
             </script>";
    }

    mysqli_stmt_close($stmt);
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Expense dashboard </title>
        <script src="sweetalert2@11.js"> </script>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css"> -->
        <link rel="stylesheet" href="css/sidebarstylealll.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" charset="utf-8"></script>
    </head>

    <body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script> -->

        <section>
            <div class=main-bar>
                <p class="headline">INCOME & EXPENSE TRACKER</p>
            </div>

            <div class="user">
                <div class="userimg"><i class="fa-regular fa-user"></i></div>
                <h1 class="menu-btn">
                    <i class="fas fa-bars"></i>
                </h1>
                <div class="username">
                    <?php
                    $use = $_SESSION["user"];
                    if ($use) {
                        $ret = mysqli_query($conn, "SELECT full_name FROM users WHERE ID='$use'");
                        $row = mysqli_fetch_assoc($ret);
                        $name = $row['full_name'];
                    ?>

                        <div class="profile-us">
                            <p>
                            Hello, <?php echo $name; ?>
                            </p>
                        </div>
                        <!-- <div class="online"><span>.</span><p>Online</p></div>   -->
                    <?php
                    } else {
                        echo "user not found";
                    }
                    ?>
                    <div id="line"></div>
                </div>

            </div>




            <!-- <div class="menu-btn">
				<i class="fas fa-bars"></i>
			</div> -->
            <div class="side-bar">
				<div class="close-btn">
					<i class="fas fa-times"></i>
				</div>
				<div class="menu">
					<div class="item"><a href="sidebar2.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Income<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<div class="sub-items"><a href="addincome1.php">Add Income</a></div>
							<div class="sub-items"> <a href="manage-income1.php">View Income</a></div>
						</div>
					</div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Expenses<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<div class="sub-items"><a href="addexpense1.php">Add Expenses</a></div>
							<div class="sub-items"> <a href="manage-expense1.php">View expenses</a></div>
						</div>
					</div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Income report<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<a href="income-date-report.php" class="sub-items">Daywise Income</a>
							<a href="income-month-report.php" class="sub-items">Monthwise Income</a>
							<a href="income-year-report.php" class="sub-items">Yearwise Income</a>
						</div>
					</div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Expense report<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<a href="expense-datewise-reports1.php" class="sub-items">Daywise Expenses</a>
							<a href="expense-monthwise-reports1.php" class="sub-items">Monthwise Expenses</a>
							<a href="expense-yearwise-reports1.php" class="sub-items">Yearwise Expenses</a>
						</div>
					</div>
					<div class="item"><a href="balance1.php"><i class="fas fa-bars"></i>Balance</a></div>
					<div class="item"><a href="calculator1.php"><i class="fas fa-calculator"></i>Calculator</a></div>
					<div class="item"><a href="user-profile1.php" style="background-color: white;color:black; border:1px solid black;"><i class="fas fa-user"></i>Profile</a></div>
					<div class="item"><a href="reset-password1.php"><i class="fas fa-lock"></i>Change Password</a></div>
					<!-- <div class="item"><a href="logout.php"><i class="fas fa-power-off"></i>Logout</a></div> -->
					<div class="item">
						<a href="index.php" onclick="showLogoutConfirmation()">
							<i class="fas fa-power-off"></i>Logout
						</a>
					</div>

				</div>
			</div>
        </section>

        <!-- dashborad starting with piechart -->



        <div class="section">
            <?php
            $userid = $_SESSION['user'];
            $ret = mysqli_query($conn, "select * from users where ID='$userid'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {

            ?>
                <form role="form" method="post" action="user-profile1.php">
                    <!-- <div class="header">User-Profile</div> -->
                    <div class="sectionmenu">
                        <div class="imgcontainer">
                            <img src="user.png" alt="">
                        </div>
                        <div class="form-group">
                        
                            <input class="form-control" type="text" value="<?php echo $row['full_name']; ?>" name="fullname" required="true"><i class="fa fa-pen"></i>
                        
                        
                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required="true" readonly="true">
                        
                        
                            <input class="form-control" name="regdate" type="text" value="<?php echo $row['updated_time']; ?>" readonly="true">
                        </div>

                        <div class="form-group-button">
                            <button type="submit" class="btn" name="submit">UPDATE</button>
                        </div>
                    <?php } ?>
                    </div>
                </form>
        </div>
        <script>
			function showLogoutConfirmation() {

				Swal.fire({
					title: 'Logout',
					text: 'Are you sure you want to log out?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, log me out',
					cancelButtonText: 'Cancel',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
						// Redirect to the logout page here
						window.location.href = 'logout.php';
					}
				});
			}
		</script>



        <script type="text/javascript">
            $(document).ready(function() {
                $('.sub-btn').click(function() {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });

                $('.menu-btn').click(function() {
                    $('.side-bar').removeClass('active');
                    $('.menu-btn').css("visibility", "hidden");
                });

                $('.close-btn').click(function() {
                    $('.side-bar').addClass('active');
                    $('.menu-btn').css("visibility", "visible");
                });
            });
        </script>
    </body>

    </html>
<?php } ?>