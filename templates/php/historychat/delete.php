<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
include("config_his.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);

$id = $_GET['id'];
if($id !=""){
    $delete = $db->delete("chat", $id);
    echo '
    <script>
        document.location.href="./index.php"
    </script>';
}
?>
