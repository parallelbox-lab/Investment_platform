<?php
//get current user session id
$usr_id = $_SESSION['id'];


//get current status of user investment
$stat = mysqli_query($conn,"SELECT * FROM day_counter WHERE `user_id` = '$usr_id'");
$res  = mysqli_fetch_array($stat);

$currentdate = date("Y-m-d h:i:sa");
$expttdater = $res['expdt'];

if($currentdate >= $expttdater) {

//delete current ivestment for a new investment
$del = mysqli_query($conn, "DELETE * FROM `day_counter` WHERE `user_id` = '$usr_id'");

$_SESSION['uuusss'] = "Your investment has expired.";

header("location: ./dash?pg=new-investment");   

}

?>