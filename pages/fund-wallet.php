<?php
    if(isset($_REQUEST['coupon'])){
        $coupon = strtoupper($_REQUEST['coupon']);
       
        $checkifvalid = mysqli_query($conn,"SELECT * FROM coupon WHERE code = '$coupon' ");
        $ch= mysqli_fetch_array($checkifvalid);

        if($ch){
            if($ch['status']==1){
                ?>
                <script>
                    alert("This Coupon has been useds");
                </script>
<?php
            }else{
                $co_id = $ch['id'];
                $va = $ch['val'];
                $newwallet = $su['wallets'] + $ch['val'];
                $times = time();

                mysqli_query($conn,"UPDATE users SET wallets = '$newwallet', wallet_fund_status = 1 WHERE id = '$usr_id'");
                mysqli_query($conn,"INSERT INTO  transaction ( usr_id,date_created,status,amount) VALUES('$usr_id','$times','You funded your wallet','$va') ");
                mysqli_query($conn,"UPDATE coupon SET who_use = '$usr_id', status='1' WHERE id = '$co_id'");
              
            $my_upline = $su['upline'];
               $query =  mysqli_query($conn, "SELECT * FROM users WHERE myrefid='$my_upline' "); 
               $res = mysqli_fetch_array($query);
              $ref_amount = $ch['val'] * 0.1;
              $id = $res['id'];
              $new_amount = $res['referralwallet'] + $ref_amount;

            if($su['wallet_fund_status'] == '1'){

            }else{
                if(mysqli_num_rows($query) > 0){
                    mysqli_query($conn,"UPDATE users SET referralwallet = '$new_amount' WHERE id = '$id'");
                   }
            }

            header("location:dash");                                        
            }

            
        }else{
            ?>
                <script>
                    alert("The Coupon Code does not exist");
                </script>
            <?php
        }
    }
?>

<div class="">
    <div class="row">
      <div class="card col-md-9" style="margin-top:20px;">
          <div class="card-body">
              <form method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="coupon" required placeholder="Coupon Code">
                  </div>
                  <button class="btn btn-primary" type="submit">Fund Wallet</button>
              </form>
          </div>
      </div>

    </div>

</div>