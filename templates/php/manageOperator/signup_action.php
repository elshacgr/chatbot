<?php
include("../../../../../users/setup/config.php");
include("../../../../../users/setup/firebaseRDB.php");

$first_name = null;
$last_name = null;
$email = null;
$password = null;

$first_name_error = null;
$last_name_error = null;
$email_error = null;
$password_error = null;
$email_already_used = null;


if(isset($_POST['signup'])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty(trim($first_name))) {
        $first_name_error = "Field first name is empty";
    } else {
        if(empty(trim($last_name))) {
            $last_name_error = "Field last name is empty";
        } else {
            if(empty(trim($email))) {
                $email_error = "Email is empty";
            } else {
                if(empty(trim($password))) {
                    $password_error = "Password is empty";
                } else {
                    $rdb = new firebaseRDB($databaseURL);
                    $retrieve = $rdb->retrieve("/operator", "email", "EQUAL", $email);
                    $data = json_decode($retrieve, 1);

                    if(count($data) > 0) {
                        $email_already_used = "Email already used";
                    } else {
                        $insert = $rdb->insert("/operator", [
                            "first-name" => $first_name,
                            "last-name" => $last_name,
                            "email" => $email,
                            "password" => $password
                        ]);

                        $result = json_decode($insert, 1);

                        echo $insert;

                        header("location: ./index.php");
                    }
                 }
            }
        }
    }
}

?>