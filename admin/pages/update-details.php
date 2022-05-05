<?php 
    if(isset($_REQUEST['bankname'])){
        $bankname = $_REQUEST['bankname'];
        $accountname = $_REQUEST['accountname'];
        $accountnumber = $_REQUEST['accountnumber'];

        mysqli_query($conn,"UPDATE users SET bankname ='$bankname', accountnumber = '$accountnumber', accountname = '$accountname' WHERE id = '$usr_id' ");
    }

?>

<div class="">
    <div class="row">
      <div class="card col-md-9" style="margin-top:20px;">
          <div class="card-body">
              <form method="post">
                  <div class="form-group">
                    <select  class="form-control" name="bankname">
                        <option>Select Bank</option>
                        <?php $allbanks = mysqli_query($conn,"SELECT * FROM banks order by bankname asc");
                            while($allb = mysqli_fetch_array($allbanks)){

                                echo '<option>'.$allb["bankname"].'</option>';
                        ?>

                            <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="accountname" placeholder="Account Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="accountnumber" placeholder="Account Number">
                  </div>
                  <button class="btn btn-primary" type="submit">Update Details</button>
              </form>
          </div>
      </div>

    </div>

</div>