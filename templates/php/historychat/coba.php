<?php

include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$id = $_GET['id'];
$retrieve = $db->retrieve("chat/$id");
$data = json_decode($retrieve, 1);

?>
