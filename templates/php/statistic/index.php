<?php
	include("../../../../../users/setup/config.php");
	include("../../../../../users/setup/firebaseRDB.php");
  
	if(!isset($_SESSION['operator'])) {
		header("location: ../../../../../users/operator/loginPage/login.php");
	} 

	$db = new firebaseRDB($databaseURL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
  	<script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
	<link rel="stylesheet" href="../../../../../users/operator/css/style.css">

</head>

<body style="overflow-y:hidden; overflow-x:hidden">	
	<div class="wrapper d-flex align-items-stretch">
		<!--Sidebar-->
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4 pt-5 mb-5">
				<h1><a href="index.html" class="logo">EVAs Bot</a></h1>
				<ul class="list-unstyled components mb-5">
					<!--Statistic Page-->
					<li class="active">
						<a href="./index.php">Statistic</a>
					</li>
					<!--Data Booking Page-->
					<li>
						<a href="../bookingdata/index.php">Booking</a>
					</li>
				</ul>
			</div>
			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
			<!--LOGOUT-->
			<div class="text-center mt-5";>
				<button type="button" value="LOGOUT" class="btn btn-light pl-5 pr-5" style="border-color:#866ec7; background-color: #ece4f7; color:black;" data-bs-toggle="modal" data-bs-target="#modal-logout">LOGOUT</button>
            </div>
		</nav>

		<!--The Modal for confirm "LOGOUT"-->
		<div class="modal" id="modal-logout">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Log Out</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<!-- Modal body -->
				<div class="modal-body text-center">
					Are you sure you want to log out?
					</br>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<a href="../../../../../users/operator/logout/logout.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">LOGOUT</button></a>
				</div>
			</div>
		</div>
		</div>

		<!-- Page Content  -->
		<div id="content" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
		<h2 class="mb-4">Statistic</h2>
			<div class="container" >
				<!--Button refresh-->
				<div class="d-flex mb-2 ms-auto">
					<button type="button" id="refresh_btn" class="btn" style="background-color:#866ec7; border-radius:30px; box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);transform: translate(1100%, 1200%);">
						<img style="height:30px;width:20px"src="../img/img_refresh.svg">
					</button>
				</div>
				<h5 style="transform: translate(17%, 50%);">Wordcloud<h5>
				<form class="text-center" style="background-color:#FFFF;width:550px; height:375px; border-radius:15px; transform: translate(-5%, 3%); box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
					<div id="wordcloudChart"  style="background-color:#FFFF;width:535px; height:365px; transform: translate(1%, 1%);"></div>
					<script src="./wordcloud.js"></script>
				</form>
				<h5 style="transform: translate(71%, -1350%);">Piechart<h5>
				<form class="text-center" style="background-color:#FFFF; width:550px; height:375px; border-radius:15px; transform: translate(100%, -109%); box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
					<canvas id="myChart" width="1000px"style="max-width:600px; transform:translate(0%, 10%);"></canvas>
				</form>
				<form class="text-center" style="background-color:#FFFF;width:550px; height:375px; border-radius:15px; transform: translate(-5%, 3%); box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
        </form>
			</div>
		</div>
	</div>

	<script src="./piechart.js"></script>
    <script src="../../../../../users/operator/dashboard/js/popper.js"></script>
    <script src="../../../../../users/operator/dashboard/js/bootstrap.min.js"></script>
    <script src="../../../../../users/operator/dashboard/js/main.js"></script>
</body>
</html>