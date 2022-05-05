<?php
if(isset($_REQUEST['coupon'])){
    echo $amount = $_REQUEST['coupon'];
    $date = date("Y-m-d");
    // if($amount>$su['wallets'] OR $su['upline']==''){
    //     ?>
    //     <script>
    //         alert("You are not eligible to withdraw, You may need at least one referral or check your central wallet");
    //     </script>
    //     <?php
    // }else{
    //     if($amount < 5000){
    //         echo "no";
    //     }else{
    //     $newwallet = $su['wallets'] - $amount;
    //     mysqli_query($conn,"UPDATE users SET wallets = '$newwallet' WHERE id = '$usr_id'");

    //     mysqli_query($conn,"INSERT INTO withdraw (amount,usr_id,dateadded)VALUES('$amount','$usr_id','$date')");
    //     //header("location:dash");
    //     }  
    // }
}

    if($su['bankname']==''){
        header("location:?pg=update-details");
    }else{
        ?>
    <div class="">
    <div class="row">
      <div class="card col-md-9" style="margin-top:20px;">
          <div class="card-body">
              <form method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="coupon" placeholder="Amount To Withdraw">
                  </div>
                  <button class="btn btn-primary" type="submit">Withdraw</button>
              </form>
          </div>
      </div>

    </div>
    <div class="row">
      <div class="card col-md-9" style="margin-top:20px;">
          <div class="card-body">
             <table class='table-responsive'>
             <tr>
                <th>SN</th><th>Amount</th><th>Status</th>
             </tr>
             <?php $count = 1;
                $selectwithdraw = mysqli_query($conn,"SELECT * FROM withdraw WHERE usr_id = '$usr_id' order by id desc ");
                while($swith = mysqli_fetch_array($selectwithdraw)){
                    ?>
                <tr>
                    <td><?php echo $count;?> </td><td><?php echo $swith['amount'];?></td><td><?php if($swith['status']=='0'){echo "Not Paid";}else{echo "Paid";};?> </td> 
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