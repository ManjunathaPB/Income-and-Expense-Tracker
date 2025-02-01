<?php
session_start();
error_reporting(0);
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
        <link rel="stylesheet" href="css/manage-expensestyleall.css">
        <script src="js/pdf.js"></script>
        <script src="sweetalert2@11.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
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
							<div class="sub-items"><a href="addexpense1.php">Add Expenses</a></div>
							<div class="sub-items"> <a href="manage-expense1.php">View expenses</a></div>
						</div>
					</div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Income report<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<a href="income-date-report.php" class="sub-items">Daywise Income</a>
							<a href="income-month-report.php" class="sub-items">Monthwise Income</a>
							<a href="income-year-report.php" style="background-color: white;color:black; border:1px solid black;" class="sub-items">Yearwise Income</a>
						</div>
					</div>
					<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Expense report<i class="fas fa-angle-right dropdown"></i></a>
						<div class="sub-menu">
							<a href="expense-datewise-reports1.php" class="sub-items">Daywise Expenses</a>
							<a href="expense-monthwise-reports1.php" class="sub-items">Monthwise Expenses</a>
							<a href="expense-yearwise-reports1.php"  class="sub-items">Yearwise Expenses</a>
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

        <!-- dashborad starting with piechart -->


        <div class="section1">
            <h1 class="header">Yearwise Income Report<button class="Btn" id="download"> download report</button></h1>
            <div class="main1">
                <div class="main">
                    <?php
                    $fdate = $_POST['fromdate'];
                    $tdate = $_POST['todate'];
                    ?>
                    <div class="tab" id="invoice">

                        <h5 class="headline1">Yearwise Income Report from <?php echo $fdate ?> to <?php echo $tdate ?></h5>
                        <table class="table-1">
                            <thead>
                                <tr>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Year</th>
                                    <th>Income Amount</th>
                                </tr>
                                </tr>
                            </thead>
                            <?php
                            $userid = $_SESSION['user'];
                            $ret = mysqli_query($conn, "SELECT year(IncomeDate) as rptyear,IncomeName,SUM(IncomeAmt) as totalyear FROM tblincome  where (IncomeDate BETWEEN '$fdate' and '$tdate') && (UserId='$userid') group by year(IncomeDate)");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>

                                <tr>
                                    <td><?php echo $cnt; ?>.</td>
                                    <td><?php echo $row['rptyear']; ?></td>
                                    <td><?php echo $row['IncomeName']; ?></td>
                                    <td><?php echo $ttlsl = $row['totalyear']; ?></td>


                                </tr>
                            <?php
                                $totalsexp += $ttlsl;
                                $cnt = $cnt + 1;
                            } ?>

                            <tr>
                                <th colspan="3" style="text-decoration: none;">Grand Total =</th>
                                <td>
                                    <p style="font-size: 25px;color:red">₹ <?php if ($totalsexp == "") {
                                                                                echo "0";
                                                                            } else {
                                                                                echo $totalsexp;
                                                                            } ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
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