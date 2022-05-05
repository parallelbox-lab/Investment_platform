<?php
    if(isset($_REQUEST['coupon'])){
        $coupon = strtoupper($_REQUEST['coupon']);

        $checkifvalid = mysqli_query($conn,"SELECT * FROM coupon WHERE code = '$coupon' and role_id='1' ");
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
                mysqli_query($conn,"UPDATE users SET wallets = '$newwallet' WHERE id = '$usr_id'");
                mysqli_query($conn,"INSERT INTO  transaction ( usr_id,date_created,status,amount) VALUES('$usr_id','$times','You funded your wallet','$va') ");
                mysqli_query($conn,"UPDATE coupon SET who_use = '$usr_id', status='1' WHERE id = '$co_id'");
                
                
                //credit refereal

                




                header("location:./");
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
                    <input type="text" class="form-control" name="coupon" placeholder="Coupon Code">
                  </div>
                  <button class="btn btn-primary" type="submit">Fund Wallet</button>
              </form>
          </div>
      </div>

    </div>

</div>