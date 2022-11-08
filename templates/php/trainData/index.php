<?php
	include("../../../../../users/setup/config.php");
	include("../../../../../users/setup/firebaseRDB.php");
    include("config.php");
    $db = new firebaseRDB($databaseURL);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train</title>
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <link rel="stylesheet" href="c:/xampp/htdocs/elsven/users/admin/css/style.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../../../../users/operator/css/style.css">
    <script src="./js/train.js"></script>

</head>

<body style="overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: hidden; ">
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
                            <a href="../historychat/index.php">History</a>
                        </li>

                        <!--Training Page-->
                        <li>
                            <a href="index.php">Training</a>
                        </li>

                        <!--Manage user Page-->
                        <li>
                            <a href="../manageOperator/index.php">Manage</a>
                        </li>

                        <!--About Page-->
                        <li>
                            <a href="./about.php">About</a>
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

    <!--Tabel Content-->

    <div id="content" style="background:white"class="p-4 p-md-5 pt-5" style="max-width:100%; position:fix; overflow: -moz-scrollbars-horizontal; overflow-y: hidden; overflow-x: auto; " >
    <h2 class="mb-4">Training Model</h2>
    <img src="../img/logo2.svg" style="width:90px;height:90px; transform: translate(1200%, -100%);"></img>
    <div class="container"   style="transform: translate(0%, -10%);">
        <div class="row">
            <div class="col-md-20">
                <div class="card" style="height:600px; width:700px;background:white;border:0;transform: translate(-7%, 0%);" >
                    <!-- search field-->
                    <div class="d-flex mb-2 ms-auto">
			            <input type="text" id="txt-input-search" class="form-control" style="background-color:#ece4f7;border-radius:30px; width:300px;box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);transform: translate(-111%, 10%);" placeholder="Search...">
			            <button type="submit" id="btn-search-table" class="btn" style="background-color:#866ec7; border-radius:30px; box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);transform: translate(-827%, 10%);"><img style="height:20px;width:20px"src="../img/searchwhite.svg"></button>
		            </div>
                <div class="table-responsive">
                    <div class="card-header" style="background:white" >
                        <!-- header dari tables-->
                        <table class="table table-bordered"  border="1" width="500">
                                <thead class="text-center" style="background-color: #866ec7; color:white">
                                    <tr>
                                        <th>Tag</th>
                                        <th>Pattern</th>
                                    </tr>
                                </thead>
                                <tbody id="table-intent">
                                    <?php
                                        // tarik data dari firebase chats
                                        $data = $db->retrieve("intents");

                                        $data = json_decode($data,1);
                                        if(is_array($data)){
                                            $i=0;
                                            $new_var=0;
                                            foreach($data as $id => $chat){
                                                $x=0;
                                               
                                                $array_sum = count($chat['patterns']);
                                                $pattern= array_values($chat['patterns']);
                                                                                    
                                                // collect all the array sum in a new
                                                $new_var = $new_var+$array_sum;
                                                // print_r(($new_var));
                                                while ($i < $new_var){
                                                    // print_r($pattern);
                                                    $pattern= array_values($chat['patterns'])[$x];

                                                    echo "
                                                    <tr >
                                                        <td  class='text-left'>{$chat['tag']}</td>
                                                    
                                                        <td class='text-left'>{$pattern}</td>
                                                    
                                                    </tr> ";
                                                    $i = $i+1;
                                                    $x=$x+1;
                                                    
                                                }
                                            }                                                                
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <form class="text-center" style="background-color:#E6E6FA;width:445px;height:200px; border-radius:15px; transform: translate(160%, -276%);box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
                    <h5 style="color:black;transform: translate(-2%, 35%); ">Let's input new words to EVAs Bot</h5>
                    <hr height="120" width="100%" color="white">  
                    <p style="font-size:15px;color:black;transform: translate(-17%, 0%); ">Text</p>
                    <p style="font-size:15px;color:black;transform: translate(31%, -160%); ">Intent</p>

                    <!-- Text input new pattern for intent-->
                    <input class="inputan" type="text" id="input_pattern" required 
                            style="display: block;
                                width: 60%;
                                height: 20%;
                                padding: 0.375rem 0.75rem;
                                font-size: 1rem;
                                font-weight: 400;
                                border-color: gray;
                                border-radius: 0.25rem;
                                transform:translate(6%, -130%);"/>

                    <!-- Select tag-->
                    <select class="dropdown" type="text" name="intent" id="dropdown-data" required
                            style="width: 30%;
                                    height: 20%;
                                    padding: 0.375rem 0.75rem;
                                    font-size: 1rem;
                                    font-weight: 400;
                                    line-height: 5;
                                    border-color: #000;
                                    border-radius: 0.25rem;
                                    transform:translate(103%, -230%);" >
                        <option value="None"></option>
                        <option value="ability">ability</option>
                        <option value="activity">activity</option>
                        <option value="age">age</option>
                        <option value="alive">alive</option>
                        <option value="asrama">asrama</option>
                        <option value="booking">booking</option>
                        <option value="cancel">cancel</option>
                        <option value="cara_pesan">cara_pesan</option>
                        <option value="chatbot">chatbot</option>
                        <option value="creator">creator</option>
                        <option value="date">date</option>
                        <option value="dining">cancel</option>
                        <option value="facility">facility</option>
                        <option value="facility_jasmine">facility_jasmine</option>
                        <option value="facility_jasmine_room">facility_jasmine_room</option>
                        <option value="facility_room">facility_room</option>
                        <option value="floor">floor</option>
                        <option value="gender">gender</option>
                        <option value="goodbye">goodbye</option>
                        <option value="greeting">greeting</option>
                        <option value="happy">happy</option>
                        <option value="help">help</option>
                        <option value="identity">identity</option>
                        <option value="jokes">jokes</option>
                        <option value="kapasitas">kapasitas</option>
                        <option value="kepas_name">kepas_name</option>
                        <option value="language">language</option>
                        <option value="laugh">laugh</option>
                        <option value="laundry">laundry</option>
                        <option value="location">location</option>
                        <option value="love">love</option>
                        <option value="negative">negative</option>
                        <option value="no">no</option>
                        <option value="payments">payments</option>
                        <option value="price">price</option>
                        <option value="programming">programming</option>
                        <option value="robot">robot</option>
                        <option value="room_model">room_model</option>
                        <option value="rules">greeting</option>
                        <option value="rules_bath">rules_bath</option>
                        <option value="rules_sleep">rules_sleep</option>
                        <option value="sad">sad</option>
                        <option value="see_order">see_order</option>
                        <option value="sorry">thanks</option>
                        <option value="thanks">thanks</option>
                        <option value="time">time</option>
                        <option value="whatsup">whatsup</option>
                        <option value="year">year</option>
                        <option value="yes">yes</option>

                    </select>
                    <br>

                     <!-- Button add intent-->
                    <button type="button" id="save_add" class="btn_save_train" 
                            style="background-color: #866ec7;
                                    border: none;
                                    color: white;
                                    padding: 5px 25px;
                                    text-align: center;
                                    border-radius: 20px;
                                    text-decoration: none;
                                    display: inline-block;
                                    font-size: 16px;
                                    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);

                                    transform:translate(185%, -200%);">
                            Add
                    </button>
                </form>
    <!-- Button train -->
    <button id="train_btn" class="btn btn-default" href='./index.php' style="width:200px; height:190px; transform:translate(198%, -150%);border-radius:15px;background-color:#866ec7;box-shadow: 0 4px 10px rgb(0 0 0 / 0.2);" data-bs-toggle='modal' data-bs-target='#modal-train'><p style="color:white; transform:translate(0%, 500%); weight:200"><b> Start Train </b></p>
        <img src="train.png" style="height:100px;width:100px;transform:translate(-3%, -30%);" ></img>
    </button>
                <div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal for Training process-->
		<div class="modal" id="modal-train">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header" style="height:300px;">
					<!-- <h4 class="modal-title">Training</h4> -->
                    <div class="circle" style=" position: absolute; 
                            top:50%; 
                            left:50%; 
                            transform: translate(-50%, -50%); 
                            width:100px;
                            height: 100px;
                            border-radius: 50%;
                            border: 10px solid rgba(255, 255, 255, .1);
                            border-top: 10px solid #c8b4e1;
                            animation: animate 1.5s infinite linear;
                        }"></div>
                    <p class="process">Training in process</p>
                    <p class="wait">Please Wait</p>
					<button  class="btn-close" data-bs-dismiss="modal"></button>
				</div>
			</div>
		</div>
		</div>

        <!-- <script src="../../../../admin copy/temp-dashboard/js/jquery.min.js"></script> -->
        <script src="../../../../../users/admin/dashboard/js/popper.js"></script>
        <script src="../../../../../users/admin/dashboard/js/bootstrap.min.js"></script>
        <script src="../../../../../users/admin/dashboard/js/main.js"></script>

</body>
</html>
