<?php
include("../../../../../users/setup/config.php");
include("../../../../../users/setup/firebaseRDB.php");


$rdb = new firebaseRDB($databaseURL);

$id = $_POST['id'];
$update = $rdb->update("operator",$id, [
    "first-name" => $_POST['first-name'],
    "last-name" =>$_POST['last-name'],
    "email" => $_POST['email'],
    "password" => $_POST['password']
]);

// $result = json_decode($insert, 1);

// echo $insert;

header("location: ./index.php");