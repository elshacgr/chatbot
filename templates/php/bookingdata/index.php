<?php
include("../../../../../users/setup/config.php");
include("config.php");
include("firebaseRDB.php");

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
    <title>Data Booking</title>
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./script.js"></script>
    <link rel="stylesheet" href="./style.css">
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
					<li>
						<a href="../statistic/index.php">Statistic</a>
					</li>
					<!--Booking Page-->
					<li class="active">
						<a href="./index.php">Booking</a>
					</li>
				</ul>
			</div>
			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
			<!--Log Out-->
			<div class="text-center mt-5";>
				<button type="button" value="LOGOUT" class="btn btn-primary pl-5 pr-5" style="border-color:#866ec7; background-color: #ece4f7; color:black;" data-bs-toggle="modal" data-bs-target="#modal-contact-us">LOGOUT</button>
            </div>
		</nav>

		<!--The Modal for confirm "LOGOUT"-->
		<div class="modal" id="modal-contact-us">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!--Modal header-->
				<div class="modal-header">
					<h4 class="modal-title">Log Out</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<!--Modal body-->
				<div class="modal-body text-center">
					Are you sure you want to log out?
					</br>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<a href="../../../../../users/operator/logout/logout.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">LOGOUT</button></a>
				</div>
			</div>
		</div>
	    </div>

        <!--The Modal for "Add Data"-->
        <div class="modal fade" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Booking Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="action_add.php">
                    <div class="modal-body">
                        <!--Input Name-->
                        <div class="mb-3">
                            <label for="namae">Name</label>
                            <input 
                                type="text" 
                                name="Name" 
                                class="form-control-text"
                                required
                            />
                        </div>
                        <!--Input Email-->
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                name="Email" 
                                class="form-control-text"
                                required
                            />
                        </div>
                        <!--Input Phone Number-->
                        <div class="mb-3">
                            <label for="email">Phone Number</label>
                            <input 
                                type="text" 
                                name="PhoneNumber" 
                                class="form-control-text"
                                required
                            />
                        </div>
                        <!--Input Dorm Name-->
                        <div class="mb-3">
                            <label for="email">Dorm Name</label>
                            <input 
                                type="text" 
                                name="DormName" 
                                class="form-control-text"
                                required
                            />
                        </div>
                        <!--Input Room Number-->
                        <div class="mb-3">
                            <label for="email">Room Number</label>
                            <input 
                                type="text" 
                                name="RoomNumber" 
                                class="form-control-text"
                                required
                            />
                        </div>
                        <!--Input Bed Position-->
                        <div class="mb-3">
                            <label for="email">Bed Position</label>
                            <input 
                                type="text" 
                                name="BedPosition" 
                                class="form-control-text"
                                required
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="SAVE" name="add_data" style="background-color: #866ec7; color:white">Add</button>
                    </div>
                </form>
            </div>
        </div>
        </div>


        <!--Page Content-->
        <div id="content" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
        <h2 class="mb-1">Data Booking Asrama</h2>    
        <img src="../img/logo2.svg" style="width:90px;height:90px; transform: translate(1200%, -100%);"></img>

        <div class="container" >
            <div class="row" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:50%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
            <div class="col-md-20">

            <div class="card" style="height:650px; width:1200px;background:white; border:none; transform: translate(-5%, -18%);">

            <div class="table-responsive">
                <div class="card-header" style="background:white;" >
                <button type="button" class="btn float-end" style="border-color:#866ec7; background-color: #ece4f7; color:black; width=40px; margin-bottom:10px" data-bs-toggle="modal" data-bs-target="#modal-contact">
                    Add Data
                </button>
                <!--Button "Add data"-->
                <table class="table table-bordered" border="1" width="500" style="background:white"class="p-4 p-md-5 pt-5">
                    <thead class="text-center" style="background-color: #866ec7; color:white">    
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Dorm Name</th>
                            <th>Room Number</th>
                            <th>Bed Position</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = $db->retrieve("users");
                            $data = json_decode($data, 1);
                           
                            if(is_array($data)) {
                                foreach($data as $id => $users) {
                                    echo "<tr>
                                    <td>{$users['Name']}</td>
                                    <td>{$users['Email']}</td>
                                    <td>{$users['PhoneNumber']}</td>
                                    <td class='text-center'>{$users['DormName']}</td>
                                    <td class='text-center'>{$users['RoomNumber']}</td>
                                    <td class='text-center'>{$users['BedPosition']}</td>
                                    <td><a class='btn btn-primary' href='editt.php?id=$id' style='color:white'>EDIT</a></td>
                                    <td><a class='btn btn-danger' href='delete.php?id=$id' style='color:white'>DELETE</a></td>
                                    </tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                        </div>
                        </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <script src="../../../../../users/operator/dashboard/js/popper.js"></script>
    <script src="../../../../../users/operator/dashboard/js/bootstrap.min.js"></script>
    <script src="../../../../../users/operator/dashboard/js/main.js"></script>
</body>
</html>