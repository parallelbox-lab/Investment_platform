<?php

if(isset($_REQUEST['coupon'])){
    $amount = $_REQUEST['coupon'];
    $date = date("Y-m-d");
    if($amount>$su['referralwallet'] OR $su['upline']=='' OR $su['referralwallet'] <= '5000'){
        ?>
        <script>
            alert("You are not eligible to withdraw from this wallet, You may need at least one referral and a minimum of 5000 in your referral wallet");
        </script>
        <?php
    }else{
        $newwallet = $su['referralwallet'] - $amount;
        mysqli_query($conn,"UPDATE users SET referralwallet = '$newwallet' WHERE id = '$usr_id'");

        ?>
        <script>alert("Withdrawal to central wallet is successful")</script>
        <?php
        header("location:dash");

    }
}

    if($su['bankname']==''){
        header("location:?pg=update-details");
    }else{
        ?>
    <div class="">
    <div class="row">
      <div class="card col-md-6" style="margin-top:20px;">
          <div class="card-body">
              <form method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="coupon" placeholder="Amount To Withdraw">
                  </div>
                  <button class="btn btn-primary" type="submit">Withdraw</button>
              </form>
          </div>
      </div>
      <div class="card col-md-6" style="margin-top:20px;">
          <div class="card-body">
              <label>Your Referral Code</label>[<b> <?php echo $su['myrefid']; ?></b> ]<br>
              You have <?php echo $su['referralwallet'] ?>, you can only withdraw if you have at least one downline 
          </div>
      </div>

    </div>
    <div class="row">
      <div class="card col-md-6" style="margin-top:20px;">
          <div class="card-body">
             <table class='responsive'>
             <tr>
                <th>SN</th><th>Referral</th><th>Status</th>
             </tr>
             <?php $count = 1;
                $selectwithdraw = mysqli_query($conn,"SELECT * FROM clan_refer WHERE upline = '$usr_id' order by id desc ");
                while($swith = mysqli_fetch_array($selectwithdraw)){
                        $refuser = $swith['usr_id'];
                        $gets = mysqli_query($conn,"SELECT * FROM users WHERE id = '$refuser'");
                        $gt = mysqli_fetch_array($gets);

                    ?>
                <tr>
                    <td><?php echo $count;?> </td><td><?php echo $gt['email'];?></td><td><?php if($swith['status']=='0'){echo "Not Paid";}else{echo "Paid";};?> </td> 
                </tr>  
                    <?php
                    $count = $count + 1;
                }
             ?>
 
             
             </table>
          </div>
      </div>
      

    </div>

</div>
        <?php
    }

?>