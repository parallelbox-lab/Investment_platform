<?php 
    date_default_timezone_set('Africa/Lagos');
    require_once('controller.php');

$usr_id = $_SESSION['id'];

$selectthisuser = mysqli_query($conn,"SELECT * FROM users WHERE id = '$usr_id'");
$su = mysqli_fetch_array($selectthisuser);

$slot = $su['slots'] - 1;

$selectsettings = mysqli_query($conn,"SELECT * FROM settings ");
$setting = mysqli_fetch_array($selectsettings);



$invst_id= decrypt($_REQUEST['invst_id']);
$type = $_REQUEST['type'];
$amount = decrypt($_REQUEST['am']);


$newwallets = $su['wallets'] + $amount;
///////////update my wallets
if(isset($_REQUEST['secs'])){
    $newwallets = $newwallets + $_REQUEST['secs'];
}

if($type=='1'){
    $updateusers = mysqli_query($conn,"UPDATE users SET wallets = '$newwallets' WHERE id = '$usr_id'");
}else if($type=='2'){
    $updateusers = mysqli_query($conn,"UPDATE users SET wallets = '$newwallets', slots ='$slot'  WHERE id = '$usr_id'");
}
// ///update my investment
$update_my = mysqli_query($conn,"UPDATE myinvestment  SET profitcount = '$type' WHERE id = '$invst_id'");



// ////create transaction
$times = time();
$status = "You withdraw ".$amount." to central wallet";
$insert = mysqli_query($conn,"INSERT INTO transaction (usr_id,date_created,date_modified,status,amount) VALUES ('$usr_id','$times','$times','$status','$amount')");
if($insert){
?>
 <?php
     header("location:dash");
 }else{
     ?>
     <?php
 }
?>





