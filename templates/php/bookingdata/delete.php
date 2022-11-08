<?php
include("../../../../../users/setup/config.php");
include("../../../../../users/setup/firebaseRDB.php");

include("config.php");

$db = new firebaseRDB($databaseURL);

$id = $_GET['id'];
if($id !=""){
    $delete = $db->delete("users", $id);
    header("location: ./index.php");
}

