<?php
session_start();
// error_reporting(0);
include('database.php');
if (strlen($_SESSION['user'] == 0)) {
	header('location:logout.php');
} else {

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Expense dashboard </title>
		<link rel="stylesheet" href="css/sidebar2style.css">
		<script src="sweetalert2@11.js"> </script>
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
					<div class="item"><a href="sidebar2.php" style="background-color: white;color:black; border:1px solid black;"><i class="fas fa-desktop"></i>Dashboard</a></div>
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
					<div class="item"><a href="user-profile1.php"><i class="fas fa-user"></i>Profile</a></div>
					<div class="item"><a href="reset-password1.php"><i class="fas fa-lock"></i>Change Password</a></div>
					<!-- <div class="item"><a href="logout.php"><i class="fas fa-power-off"></i>Logout</a></div> -->
					<div class="item">
						<a href="#" onclick="showLogoutConfirmation()">
							<i class="fas fa-power-off"></i>Logout
						</a>
					</div>

				</div>
			</div>
		</section>

		<!-- dashborad starting with piechart -->


		<div class="section">
			<div class="bar">
				<div class="bar1">

					<?php
					//Today Expense
					$userid = $_SESSION['user'];
					$tdate = date('Y-m-d');
					$query = mysqli_query($conn, "select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
					$result = mysqli_fetch_array($query);
					$sum_today_expense = $result['todaysexpense'];
					?>

					<h4 class="data">Today's Expense</h4>
					<div <?php echo $sum_today_expense; ?>>
						<h1 style="font-size: 70px;">₹</h1>
						<P class="data1"><?php if ($sum_today_expense == "") {
												echo "0";
											} else {
												echo $sum_today_expense;
											}

											?></P>
					</div>
				</div>




				<div class="bar2">
					<?php
					//Weekly Expense
					$userid = $_SESSION['user'];
					$pastdate =  date("Y-m-d", strtotime("-1 week"));
					$crrntdte = date("Y-m-d");
					$query2 = mysqli_query($conn, "select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
					$result2 = mysqli_fetch_array($query2);
					$sum_weekly_expense = $result2['weeklyexpense'];
					?>
					<!-- <div class="panel-body easypiechart-panel"> -->
					<h4 class="data">Last 7day's Expense</h4>
					<div <?php echo $sum_weekly_expense; ?>>
						<h1 style="font-size: 70px;">₹</h1>
						<P class="data1"><?php if ($sum_weekly_expense == "") {
												echo "0";
											} else {
												echo $sum_weekly_expense;
											}

											?></P>
					</div>
					<!-- </div> -->
				</div>
				<div class="bar3">


					<?php
					//Yearly Expense
					$userid = $_SESSION['user'];
					$cyear = date("Y");
					$query4 = mysqli_query($conn, "select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
					$result4 = mysqli_fetch_array($query4);
					$sum_yearly_expense = $result4['yearlyexpense'];
					?>
					<!-- <div class="panel-body easypiechart-panel"> -->
					<h4 class="data">Current Year Expenses</h4>
					<div <?php echo $sum_yearly_expense; ?>>
						<h1 style="font-size: 70px;">₹</h1>
						<P class="data1"><?php if ($sum_yearly_expense == "") {
												echo "0";
											} else {
												echo $sum_yearly_expense;
											}

											?></P>
					</div>


					<!-- </div> -->
				</div>

			</div>

			<div class="bars">
				<div class="bar4">

					<?php
					//Yestreday Expense
					$userid = $_SESSION['user'];
					$ydate = date('Y-m-d', strtotime("-1 days"));
					$query1 = mysqli_query($conn, "select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
					$result1 = mysqli_fetch_array($query1);
					$sum_yesterday_expense = $result1['yesterdayexpense'];
					?>
					<!-- <div class="panel-body easypiechart-panel"> -->

					<h4 class="data">Yesterday's Expense</h4>
					<div <?php echo $sum_yesterday_expense; ?>>
						<h1 style="font-size: 70px;">₹</h1>
						<P class="data1"><?php if ($sum_yesterday_expense == "") {
												echo "0";
											} else {
												echo $sum_yesterday_expense;
											}

											?></P>
					</div>
				</div>
				<div class="bar5">


					<?php
					//Monthly Expense
					$userid = $_SESSION['user'];
					$monthdate =  date("Y-m-d", strtotime("-1 month"));
					$crrntdte = date("Y-m-d");
					$query3 = mysqli_query($conn, "select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
					$result3 = mysqli_fetch_array($query3);
					$sum_monthly_expense = $result3['monthlyexpense'];
					?>
					<!-- <div class="panel-body easypiechart-panel"> -->
					<h4 class="data">Last 30day's Expenses</h4>
					<div <?php echo $sum_monthly_expense; ?>>
						<h1 style="font-size: 70px;">₹</h1>
						<P class="data1"><?php if ($sum_monthly_expense == "") {
												echo "0";
											} else {
												echo $sum_monthly_expense;
											}

											?></P>
					</div>
					<!-- </div> -->

				</div>



				<div class="bar6">
					<?php
					//Yearly Expense
					$userid = $_SESSION['user'];
					$query5 = mysqli_query($conn, "select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
					$result5 = mysqli_fetch_array($query5);
					$sum_total_expense = $result5['totalexpense'];
					?>
					<!-- <div class="panel-body easypiechart-panel"> -->
					<h4 class="data">Total Expenses</h4>
					<div <?php echo $sum_total_expense; ?>>
						<h1 style="font-size: 70px;">₹</h1>
						<P class="data1"><?php if ($sum_total_expense == "") {
												echo "0";
											} else {
												echo $sum_total_expense;
											}

											?></P>
					</div>


					<!-- </div> -->

				</div>








			</div>
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