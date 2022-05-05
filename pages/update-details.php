<?php 
    if(isset($_REQUEST['TRON(TRC20)'])){
        $trxaddress = $_REQUEST['TRON(TRC20)'];
        mysqli_query($conn,"UPDATE users SET TRON = '$trxaddress' WHERE id = '$usr_id' ");
    }

?>

<div class="">
    <div class="row">
      <div class="card col-md-9" style="margin-top:20px;">
          <div class="card-body">
              <form method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="TRON(TRC20)" required value="<?php echo $su['TRON'] ?>"  placeholder="Enter TRON(TRC20) Address">
                  </div>
                  <button class="btn btn-primary" type="submit">Update Details</button>
              </form>
          </div>
      </div>

    </div>

</div>