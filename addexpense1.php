<?php
session_start();
// error_reporting(0);
include('database.php');
if (strlen($_SESSION['user'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$userid = $_SESSION['user'];
		$dateexpense = $_POST['dateexpense'];
		$item = $_POST['item'];
		$costitem = $_POST['costitem'];
		$query = mysqli_query($conn, "insert into tblexpense(UserId,ExpenseDate,ExpenseItem,ExpenseCost) value('$userid','$dateexpense','$item','$costitem')");
		if ($query) {
			// echo "<script>alert('Expense has been added');</script>";
			// echo "<script>window.location.href='manage-expense.php'</script>";
			echo "<script>
			document.addEventListener('DOMContentLoaded', function() {
				Swal.fire({
					title: 'Success!',
					text: 'expense has been added.',
					icon: 'success'
				 })
				//  .then((result) => {
				// 	if (result.isConfirmed) {
				// 		window.location.href = 'manage-expense1.php';
				// 	}
				// });
			});
		 </script>";
		} else {
			// echo "<script>alert('Something went wrong. Please try again');</script>";
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
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Expense dashboard </title>
		<script src="sweetalert2@11.js"> </script>
		<link rel="stylesheet" href="css/sidebarstyleall.css">
		<!-- <link rel="stylesheet" href="css/addexpensestyle.css">  -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" charset="utf-8"></script>
	</head>

	<body>
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
					<div class="item"><a href="sidebar2.php" ><i class="fas fa-desktop"></i>Dashboard</a></div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Income<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<div class="sub-items"><a href="addincome1.php">Add Income</a></div>
							<div class="sub-items"> <a href="manage-income1.php">View Income</a></div>
						</div>
					</div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Expenses<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<div class="sub-items"><a href="addexpense1.php" style="background-color: white;color:black; border:1px solid black;">Add Expenses</a></div>
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
					<div class="item"><a href="user-profile1.php"><i class="fas fa-user"></i>Profile</a></div>
					<div class="item"><a href="reset-password1.php"><i class="fas fa-lock"></i>Change Password</a></div>
					<!-- <div class="item"><a href="logout.php"><i class="fas fa-power-off"></i>Logout</a></div> -->
					<div class="item">
						<a href="login.php" onclick="showLogoutConfirmation()">
							<i class="fas fa-power-off"></i>Logout
						</a>
					</div>

				</div>
			</div>
		</section>


		<!-- <div class="section1"> -->
		<!-- <span> -->
		<div class="section">
			<form role="form" method="post" action="">

				<div class="header">Add Expense</div>
				<div class="sectionmenu">
					<div class="form-group">
						<label>Date of Expense</label>
						<input class="form-control" type="date" value="" name="dateexpense" required="true">
					</div>
					<div class="form-group">
						<label>Item</label>
						<input type="text" class="form-control" name="item" value="" required="true">
					</div>
					<div class="form-group">
						<label>Cost of Item</label>
						<input class="form-control" type="text" value="" required="true" name="costitem">
					</div>

					<div class="form-group-button">
						<button type="submit" class="btn" name="submit">ADD</button>
					</div>
				</div>
			</form>

		</div>
		<!-- </span> -->
		<!-- </div> -->
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