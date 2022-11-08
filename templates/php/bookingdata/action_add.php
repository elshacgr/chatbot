<?php
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);


$insert = $db->insert("users", [
    "Name" => $_POST['Name'],
    "Email" => $_POST['Email'],
    "PhoneNumber" => $_POST['PhoneNumber'],
    "DormName" => $_POST['DormName'],
    "RoomNumber" => $_POST['RoomNumber'],
    "BedPosition" => $_POST['BedPosition']
]);

header("location: ./index.php");