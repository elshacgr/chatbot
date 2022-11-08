<?php
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$id = $_GET['id'];
$retrieve = $db->retrieve("users/$id");
$data = json_decode($retrieve, 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Data</title>
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
    <link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="../../../../../users/operator/css/style.css">
</head>

<body>	
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
					<!--History Chat User Page-->
					<li class="active">
						<a href="../../../../../users/operator/dashboard/home.php">Statistic</a>
					</li>

					<!--Training Page-->
					<li>
						<a href="./index.php">Booking</a>
					</li>

				</ul>

			</div>

			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

			<!-- Log Out -->
			<div class="text-center mt-5";>
				<button type="button" value="LOGOUT" class="btn btn-light pl-5 pr-5" data-bs-toggle="modal" data-bs-target="#modal-contact-us">LOGOUT</button>
            </div>
		</nav>

		<!-- The Modal for Confirm Lo Oout-->
		<div class="modal" id="modal-contact-us">
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
    <div class="container" >	
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Booking Data</h5>
            </div>
            <form method="post" action="action_edit.php">
                <div class="modal-body">
                    <!--Input Name-->
                    <div class="mb-3">
                        <label for="namae">Name</label>
                        <input 
                            type="text" 
                            name="Name" 
                            class="form-control-text"
                            required
                            value="<?php echo $data['Name']?>"
                        />
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <!--Input Email-->
                        <div class="form-outline">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                name="Email" 
                                class="form-control-text"
                                required
                                value="<?php echo $data['Email']?>"
                            />
                        </div>
                        </div>

                        <div class="col-md-6 mb-4">
                        <!--Input Phone Number-->
                        <div class="form-outline">
                            <label for="email">Phone Number</label>
                            <input 
                                type="text" 
                                name="PhoneNumber" 
                                class="form-control-text"
                                required
                                value="<?php echo $data['PhoneNumber']?>"
                            />
                        </div>
                        </div>
                    </div>

                    <!--Input Dorm Name-->
                    <div class="mb-3">
                        <label for="email">Dorm Name</label>
                        <input 
                            type="text" 
                            name="DormName" 
                            class="form-control-text"
                            required
                            value="<?php echo $data['DormName']?>"
                        />
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <!--Input Room Number-->
                        <div class="form-outline">
                            <label class="form-label" for="first-name">Room Number</label>
                            <input 
                                type="text" 
                                name="RoomNumber"
                                class="form-control-text" 
                                required
                                value="<?php echo $data['RoomNumber']?>"
                            />
                        </div>
                        </div>

                        <div class="col-md-6 mb-4">
                        <!--Input Bed Position-->
                        <div class="form-outline">
                            <label class="form-label" for="last-name">Bed Position</label>
                            <input 
                                type="text" 
                                name="BedPosition" 
                                class="form-control-text" 
                                required
                                value="<?php echo $data['BedPosition']?>"
                            />
                        </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="./index.php">Cancel</a>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <button type="submit" class="btn btn-primary"  style="background-color: #866ec7;" value="SAVE" name="add_data">Save</button>
                </div>
            </form>
       
    </div>
    </div>


    <script src="../../../../../users/operator/dashboard/js/popper.js"></script>
    <script src="../../../../../users/operator/dashboard/js/bootstrap.min.js"></script>
    <script src="../../../../../users/operator/dashboard/js/main.js"></script>

</body>
</html>