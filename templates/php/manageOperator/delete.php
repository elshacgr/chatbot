<?php
	include("../../../../../users/setup/config.php");
	include("../../../../../users/setup/firebaseRDB.php");

$db = new firebaseRDB($databaseURL);

$id = $_GET['id'];
if($id !=""){
    $delete = $db->delete("operator", $id);
    header("location: ./index.php");
}

