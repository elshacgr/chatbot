
<?php
	include("../../../../../users/setup/config.php");
	include("../../../../../users/setup/firebaseRDB.php");
    include("config_his.php");

    $db = new firebaseRDB($databaseURL);
	if(!isset($_SESSION['admin'])) {
		header("location: ../../../../../users/admin/loginPage/login.php");
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Chat</title>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style_his.css">
    <link rel="stylesheet" href="../../../../../users/operator/css/style.css">
    <script src="./js/func_action.js"></script>
    <script src="./delete.php"></script>


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
					<li class="active">
						<a href="./index.php">History</a>
					</li>

					<!--Training Page-->
					<li>
						<a href="../trainData/index.php">Training</a>
					</li>
					<!--Manage user Page-->
					<li>
						<a href="../manageOperator/index.php">Manage</a>
					</li>

					<!--About Page-->
					<li>
						<a href="#">About</a>
					</li>
				</ul>

			</div>

			<br> <br> <br> <br> <br> <br> <br> 

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
					<a href="../../../../../users/admin/logout/logout.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">LOGOUT</button></a>
				</div>
			</div>
		</div>
		</div>

		<!-- Page Content  -->
    <div id="content" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto;">
    <h2>History Chat User</h2>
    <img src="../img/logo2.svg" style="width:90px;height:90px; transform: translate(1200%, -100%);"></img>

    <div class="container"  style="background:white;">
        <div class="row">
            <div class="col-md-20">
                <div class="card" style="height:700px; width:1200px;background:white; border:none; transform: translate(-5%, -15%);">
                <div class="table-responsive">
                    <div class="card-header" style="background:white;" >
                        <!-- header dari tables-->
                        <table class="table table-bordered" border="1" width="500">
                                <thead class="text-center" style="background-color: #866ec7; color:white">
                                    <tr>
                                        <th>Original Input</th>
                                        <th>Date/Time</th>
                                        <th>Predicted Intent</th>
                                        <th>Confidence</th>
                                        <th style="width: 5%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // tarik data dari firebase chats
                                        $data = $db->retrieve("chat");
                                
                                        $data = json_decode($data,-1);
                                    
                                        if(is_array($data)){
                                            $id_row = 0;
                                            foreach($data as $id => $chat) {
                                                $output_prob = round($chat['MaxPrediction']*100, 2);
                                                
                                                // coloring condition by threshold.
                                                $default_color = "table-light";
                                                if($output_prob < 50){
                                                    $default_color = "table-danger";
                                                }else if($output_prob < 65){
                                                    $default_color = "table-warning";
                                                }else if($output_prob < 80){
                                                    $default_color = "table-info";
                                                }

                                                echo "
                                                <tr class={$default_color}>
                                                <td class='text-left'>{$chat['OriginalChat']}</td>
                                                <td class='text-center'>{$chat['DateTime']}</td>
                                                <td class='text-center'>{$chat['PredictedIntent']}</td>
                                                <td class='text-center'>{$output_prob}%</td>
                                                <td>
                                                <a type='button' class='btn btn-transparent' style='color:black' href='delete.php?id=$id'><span class='bi bi-trash'></span></a></td>                                                </span></a>
                                                </td>    
                                                </tr>";
                                                $id_row++;
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

        
        <script src="../../../../../users/admin/dashboard/js/popper.js"></script>
        <script src="../../../../../users/admin/dashboard/js/bootstrap.min.js"></script>
        <script src="../../../../../users/admin/dashboard/js/main.js"></script>

</body>
</html>

 


