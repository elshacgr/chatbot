<?php require("signup_action.php");

if(!isset($_SESSION['admin'])) {
  header("location: ../../../../../users/admin/loginPage/login.php");
} 
$rdb = new firebaseRDB($databaseURL);
$id = $_GET['id'];
$retrieve = $rdb->retrieve("operator/$id");
$data = json_decode($retrieve, 1);

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
    <style>
      .error{
        color: #af4242;
        background-color: #fde8ec;
        padding: 10px;
        display: none;
        transform: translateY(-20px);
        margin-bottom: 20px;
        font-size: 16px;
      }
    </style>
    <?php
      if($first_name_error != null) {
        ?> <style>.first-name-error{display:block}</style> <?php
      }
      if($last_name_error != null) {
        ?> <style>.last-name-error{display:block}</style> <?php
      }
      if($email_error != null) {
        ?> <style>.email-error{display:block}</style> <?php
      }
      if($email_already_used != null) {
        ?> <style>.email-already-used{display:block}</style> <?php
      }
      if($password_error != null) {
        ?> <style>.password-error{display:block}</style> <?php
      }
    ?>

    <title>Admin Signup</title>
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



  <!-- Jumbotron -->
  <div id="content" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
    <div class="container" >	
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
            </div>
            <form method="post" action="./edit_action.php" autocomplete="off">

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                    <div class="form-outline col-md-6 mb-4">
                        <label class="form-label" for="form3Example1">First name</label>
                        <input 
                                type="text" 
                                name="first-name"
                                id="form3Example1" 
                                class="form-control-text" 
                                value="<?php echo $data['first-name']; ?>"
                        />
                        <p class="error first-name-error">
                          <?php echo $first_name_error; ?>
                        </p> <!--first name error message-->
                    </div>
                    

                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example2">Last name</label>
                        <input 
                                type="text" 
                                name="last-name" 
                                id="last-name" 
                                class="form-control-text" 
                                value="<?php echo $data['last-name']; ?>"
                        />
                        <p class="error last-name-error">
                          <?php echo $last_name_error; ?>
                        </p> <!--last name error message-->
                    </div>
                    </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input 
                            type="email" 
                            name="email" 
                            id="form3Example3" 
                            class="form-control-text" 
                            value="<?php echo $data['email'];?>" disabled
                    />
                    <p class="error email-error">
                      <?php echo $email_error; ?>
                    </p> <!--email error message-->
                    <p class="error email-already-used">
                      <?php echo $email_already_used; ?>
                    </p> <!--email error message-->
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input 
                            type="password" 
                            name="password" 
                            id="form3Example4" 
                            class="form-control-text" 
                            value="<?php echo $data['password']; ?>"
                    />
                    <p class="error password-error">
                      <?php echo $password_error; ?>
                    </p> <!--password error message-->
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="./index.php">Cancel</a>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <button type="submit" class="btn btn-primary"  style="background-color: #866ec7;" value="SAVE" name="add_data">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="../../../../../users/admin/dashboard/js/popper.js"></script>
    <script src="../../../../../users/admin/dashboard/js/bootstrap.min.js"></script>
    <script src="../../../../../users/admin/dashboard/js/main.js"></script>

</body>
</html>