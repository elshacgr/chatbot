<?php
include("config.php");
include("firebaseRDB.php");


$db = new firebaseRDB($databaseURL);

$id = $_POST['id'];
$update = $db->update("users", $id, [
    "Name" => $_POST['Name'],
    "Email" => $_POST['Email'],
    "PhoneNumber" => $_POST['PhoneNumber'],
    "DormName" => $_POST['DormName'],
    "RoomNumber" => $_POST['RoomNumber'],
    "BedPosition" => $_POST['BedPosition']
]);

header("location: ./index.php");