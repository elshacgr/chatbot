<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$output = shell_exec("python ./percobaan.py");
print_r($output);

?>