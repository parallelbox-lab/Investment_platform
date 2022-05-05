<?php 
$invst_id= decrypt($_REQUEST['invst_id']);
$type = $_REQUEST['type'];
$amount = decrypt($_REQUEST['am']);

/////////////////////////////////g CHECK IF I HAVE DOWNLINE BEFORE WITHDRAWING
$checkdownline = mysqli_query($conn,"SELECT * FROM users WHERE upline = '$myrefcode'");
$chkd = mysqli_fetch_array($checkdownline);
if($chkd){




$newwallets = $su['wallets'] + $amount;
///////////update my wallets

$updateusers = mysqli_query($conn,"UPDATE users SET wallets = '$newwallets' WHERE id = '$usr_id'");

///update my investment
$update_my = mysqli_query($conn,"UPDATE myinvestment  SET profitcount = '$type' WHERE id = '$invst_id'");



////create transaction
$times = time();
$status = "You withdraw ".$amount." to central wallet";
$insert = mysqli_query($conn,"INSERT INTO transaction (usr_id,date_created,date_modified,status,amount) VALUES ('$usr_id','$times','$times','$status','$amount')");
if($insert){
?>
<script>
alert("Withdrawal to central wallet is successful");
</script>
<?php
    header("location:dash");
}

}else{
    echo "<div class='alert alert-danger'>You need at least one downline to withdraw!</div>"
}
?>





