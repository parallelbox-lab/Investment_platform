<?php
$server_db = "localhost";
$username_db = "root";
$password_db = "";
$database_db = "newakin";

/*$server_db = "localhost";
$username_db = "steadyfl_users";
$password_db = "Akin@1999";
$database_db = "steadyfl_steadyplan1";
*/
$conn = mysqli_connect($server_db,$username_db,$password_db,$database_db);

$selectsettings = mysqli_query($conn,"SELECT * FROM settings ");
$setting = mysqli_fetch_array($selectsettings);




?>