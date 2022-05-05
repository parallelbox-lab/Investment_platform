<?php 
//check if proper parameters are passed
if(!isset($_GET['invst_id'])) {

  header("location: ./new-investment");

} else {

$invst_id = decrypt($_REQUEST['invst_id']);

//get the type and details of investment selected
$select_investment = mysqli_query($conn,"SELECT * FROM investment WHERE id ='$invst_id'");
$seinvst = mysqli_fetch_array($select_investment);

//get current user session id
$usr_id = $_SESSION['id'];

//check if user has enough fund in wallet
if($su['wallets'] < $seinvst['amount']){
?>
<div class="alert alert-danger">Sorry, you dont have sufficient fund, Recharge</div>
<?php

} else {

//get current status of user investment
$stat = mysqli_query($conn,"SELECT * FROM day_counter WHERE `user_id` = '$usr_id'");
$res  = mysqli_fetch_array($stat);


//if details are not found
if(mysqli_num_rows($stat) == null) {  

  $currentdate = date("Y-m-d h:i:sa");
 //insert new details into status table
  $insert =  mysqli_query($conn,"INSERT INTO day_counter (`day_status`,`user_id`,`date`) values ('0','$usr_id','$currentdate')");

  
      //activate investment plan
      $capital = $seinvst['amount'];
      $invst_id = $seinvst['id'];
      $expected = (($seinvst['roi']/100/30) * $seinvst['amount']);
      $new_value  = ($expected + $su['wallets']);
      mysqli_query($conn, "UPDATE users SET wallets = '$new_value' WHERE id = '$usr_id'");
      
      
      //get current date
      $dater  = date("Y-m-d h:i:sa");
      $exptdt = date("Y-m-d h:i:sa", strtotime($dater. ' + 1 day'));

      //update the date in database and the status in database
      $updtsts = mysqli_query($conn, "UPDATE day_counter SET day_status = '1', `date` = '$dater', `expdt` = '$exptdt' WHERE `user_id` = '$usr_id'");

      
      //redirect back to investment page with a success notification
      $_SESSION['sucessfulvest'] = "Investment activated successfully";
      header("location: ./dash?pg=new-investment");   

} else {

  
  $currentdate = date("Y-m-d h:i:sa");
 //insert new details into status table
 $eh =  mysqli_query($conn,"UPDATE day_counter SET `day_status` = '1', `date` = '$dater', `expdt` = '$exptdt' WHERE id = '$usr_id'") or die(mysqli_error($conn)); 
      //activate investment plan
      $capital = $seinvst['amount'];
      $invst_id = $seinvst['id'];
      $expected = (($seinvst['roi']/100/30) * $seinvst['amount']);
      $new_value  = ($expected + $su['wallets']);
      mysqli_query($conn, "UPDATE users SET wallets = '$new_value' WHERE id = '$usr_id'");
      
      
      //get current date
      $dater  = date("Y-m-d h:i:sa");
      $exptdt = date("Y-m-d h:i:sa", strtotime($dater. ' + 1 day'));

      //update the date in database and the status in database
      $updtsts = mysqli_query($conn, "UPDATE day_counter SET day_status = '1', `date` = '$dater', `expdt` = '$exptdt' WHERE `user_id` = '$usr_id'");

      
      //redirect back to investment page with a success notification
      $_SESSION['sucessfulvest'] = "Investment activated successfully";
      header("location: ./dash?pg=new-investment");   
    }
  }
} 
?>