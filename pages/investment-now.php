<?php 
$invst_id = decrypt($_REQUEST['invst_id']);

$select_investment = mysqli_query($conn,"SELECT * FROM investment_list WHERE id ='$invst_id'");
$seinvst = mysqli_fetch_array($select_investment);

///check if i have fund
if($su['wallets']<$seinvst['minimum']){
    ?>
    <div class="alert alert-danger">Sorry, you dont have sufficient fund, Recharge</div>
    <?php
}else{
    //insert into 
    
    
        $sls = $setting['slots'];
    //check if slots is less than setting slot
     if($su['slots']>=$sls){
        ?>
        <script>alert("You do not have enough slots")</script>
        <?php
     }else{
    
    // $nwslot = $su['slots'] + 1;
    $capital = $seinvst['minimum'];
    $invst_id = $seinvst['id'];
    $usr_id = $usr_id;
    $date = date("Y-m-d");
    $expected = (($seinvst['roi']/100) * $seinvst['minimum']) + $seinvst['minimum'];
    $roiexpected = (($seinvst['roi']/100) * $seinvst['minimum']);
    $insert = mysqli_query($conn,"INSERT INTO myinvestment (capital,presentAmount,invst_id,usr_id,daycount,expectedTotal,roiExpect,date)VALUES('$capital','0','$invst_id','$usr_id','0','$expected','$roiexpected','$date')");
    if($insert){
        mysqli_query($conn,"UPDATE users SET slots = '$nwslot' WHERE id = '$usr_id' ");          
        $getrefs = mysqli_query($conn,"SELECT * FROM clan_refer WHERE upline = '$myrefcodes'");
        $gfs = mysqli_fetch_array($getrefs);
        $hisrefcode  = $gfs['myrefid'];
        $gid = $gfs['id'];
       if($gfs['status']==1){ 

       }else{
        $gethim = mysqli_query($conn,"SELECT * FROM users WHERE myrefid = '$hisrefcode'");
        $ghm = mysqli_fetch_array($gethim);

        $refid = $ghm['id'];

        $amountoadd = ($setting['ref_earn']/100)*$capital;

        $ghm_wallet = $ghm['referralwallet'] + $amountoadd;

        $updateuser = mysqli_query($conn,"UPDATE users SET referralwallet = '$ghm_wallet' WHERE id = '$refid'  ");

        mysqli_query($conn,"UPDATE clan_refer SET status = '1' WHERE id = '$gid' ");    
       }

        ?>
         <div class="alert alert-success">Your Investment has being added! Ensure you login daily to accumulate your profits</div>

       <?php
       $newwallets = $su['wallets'] - $seinvst['minimum'];
       mysqli_query($conn,"UPDATE users set wallets = '$newwallets' WHERE id = '$usr_id'");
       header("location:dash");
    } 
    
}


}


?>




