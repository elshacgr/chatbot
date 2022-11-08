<?php
	include("../../../../../users/setup/config.php");
	include("../../../../../users/setup/firebaseRDB.php");

	if(!isset($_SESSION['admin'])) {
		header("location: ../../../../../users/admin/loginPage/login.php");
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Manage Account</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<!--History Chat User Page-->
					<li>
						<a href="../historychat/index.php">History</a>
					</li>

					<!--Training Page-->
					<li>
						<a href="../trainData/index.php">Training</a>
					</li>

					<!--Manage user Page-->
					<li class="active">
						<a href="./index.php">Manage</a>
					</li>

					<!--About Page-->
					<li>
						<a href="./about.php">About</a>
					</li>
				</ul>
			</div>

			<br> <br> <br> <br> <br> <br> <br> 

			<!-- Log Out -->
			<div class="text-center mt-5">
				<button type="button" value="LOGOUT" class="btn btn-light pl-5 pr-5" data-bs-toggle="modal" data-bs-target="#modal-contact-us">LOGOUT</button>
            </div>
		</nav>
        <!----------->


		<!--The Modal for Confirm "LOGOUT"-->
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
					<a href="../../../../../users/admin/logout/logout.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">LOGOUT</button></a>
				</div>
			</div>
		</div>
		</div>
        <!---------------------------------->


		<!--Page Content-->
		<div id="content" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
		<h2 class="mb-4">Manage Operator Account</h2>
        <img src="../img/logo2.svg" style="width:90px;height:90px; transform: translate(1200%, -100%);"></img>

        <div class="container" style="transform : translate(0%, -35%);" >
            <div class="row">
            <div class="col-md-20">
                <!--Search field-->
                <div class="d-flex mb-2 ms-auto">
                    <input type="text" id="searchhh" class="form-control" placeholder="Search by name..." style="background-color:#ece4f7;border-radius:30px; width:300px;box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);transform: translate(0%, 115%);">
                    <button type="button" id="searchh" class="btn" style="background-color:#866ec7; border-radius:30px; box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);transform: translate(-90%, 115%);">
                        <img style="height:20px;width:20px"src="../img/searchwhite.svg">
                    </button>
                </div>
                <!--Button Add User-->
                <a type="button" href="./signup.php" class="btn btn-primary float-end" style="border-color:#866ec7; background-color: #ece4f7; color:black; width=40px; margin-bottom:10px">
                    Add Account
                </a>
                <table class="table table-bordered" border="1" width="500" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
        <thead class="text-center" style="background-color: #866ec7; color:white">    
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th width= "15%">Action</th>
            </tr>
        </thead>
        <tbody id="table_booking">
            <?php
                $db = new firebaseRDB($databaseURL);

                $data = $db->retrieve("operator");
                $data = json_decode($data, 1);

                if(is_array($data)){
                    foreach($data as $id => $operator){
                        echo "<tr class='text-center'>
                        <td>{$operator['first-name']}</td>
                        <td>{$operator['last-name']}</td>
                        <td>{$operator['email']}</td>
                        <td>{$operator['password']}</td>
                        <td>
                        <a class='btn btn-primary' href='edit.php?id=$id' style='color:white'>EDIT</a>
                        <a class='btn btn-danger' href='delete.php?id=$id' style='color:white'>DELETE</a>
                        </td>
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

    <!--Modal for "Add User"-->
    <div class="modal fade" id="modal-add-operator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="saveuser">
            <div class="modal-body">
                <!--Input Name-->
                <div class="row">
                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="first-name">First name</label>
                        <input 
                            id="first-name"
                            type="text" 
                            name="first-name"
                            class="form-control-text" 
                            value="<?php echo $first_name; ?>"
                            required
                        />
                        <p class="error first-name-error">
                            <?php echo $first_name_error; ?>
                        </p>
                    </div>
                    </div>

                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="last-name">Last name</label>
                        <input 
                            id="last-name"
                            type="text" 
                            name="last-name" 
                            id="last-name" 
                            class="form-control-text" 
                            value="<?php echo $last_name; ?>"
                            required
                        />
                        <p class="error last-name-error">
                            <?php echo $last_name_error; ?>
                        </p>
                    </div>
                    </div>
                </div>

                <!--Input Email-->
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control-text"
                        value="<?php echo $email; ?>"
                        required
                    />
                    <p class="error email-error">
                        <?php echo $email_error; ?>
                    </p>
                </div>
                
                <!--Input Password-->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control-text" 
                        required minlength="8"
                        value="<?php echo $password; ?>"
                    />
                    <p class="error password-error">
                            <?php echo $password_error; ?>
                    </p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add_user" style="border-color:#866ec7; background-color:#866ec7; color:black;">Add</button>
            </div>
        </form>
    </div>
    </div>


    <script src="../../../../../users/admin/dashboard/js/popper.js"></script>
    <script src="../../../../../users/admin/dashboard/js/bootstrap.min.js"></script>
    <script src="../../../../../users/admin/dashboard/js/main.js"></script>

</body>
</html>