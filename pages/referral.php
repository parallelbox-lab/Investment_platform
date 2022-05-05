<?php

if(isset($_REQUEST['coupon'])){
    $amount = $_REQUEST['coupon'];
    $date = date("Y-m-d");
    if($amount>$su['referralwallet'] OR $su['upline']=='' OR $su['referralwallet'] <= '1000'){
        ?>
        <script>
            alert("You are not eligible to withdraw from this wallet, You may need at least one referral");
        </script>
        <?php
    }else{
        $newwallet = $su['referralwallet'] - $amount;
        $mywallet = $su['wallets'] + $amount;
        $eh =  mysqli_query($conn,"UPDATE users SET referralwallet = '$newwallet', wallets = '$mywallet' WHERE id = '$usr_id'") or die(mysqli_error($conn));
        
        ?>
        <script>alert("Withdrawal to central wallet is successful")</script>
        <?php
        //header("location:dash");

    }
}

    if($su['TRON']==''){
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
              <!-- The text field -->
<input type="text" class="form-control" value="<?php echo $su['myrefid']; ?>"  id="myInput" readonly>

<!-- The button used to copy the text -->
<button onclick="myFunction()" class="btn btn-primary">Copy Referral Code</button>
          </div>
      </div>
      <script>
      function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied " + copyText.value);
}
      </script>

    </div>
    <div class="row">
      <div class="card col-md-6" style="margin-top:20px;">
          <div class="card-body">
           
          </div>
      </div>
      

    </div>

</div>
        <?php
    }

?>