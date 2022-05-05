<?php 
    if(isset($_REQUEST['refearn'])){

        $ref_earn = $_REQUEST['refearn'];
        // $slot = $_REQUEST['slots'];

        mysqli_query($conn,"UPDATE settings SET ref_earn ='$ref_earn' ");
        header("location:index?pg=setting");
    }

?>

<div class="">
    <div class="row">
      <div class="card col-md-9" style="margin-top:20px;">
          <div class="card-body">
              <form method="post">
                 
                  <div class="form-group">
                    <label for="">Referrall Earning</label>
                    <input type="text" class="form-control" name="refearn" value="" placeholder="Account Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="slots" value=""  placeholder="Account Number">
                  </div>
                  <button class="btn btn-primary" type="submit">Update Details</button>
              </form>
          </div>
      </div>

    </div>

</div>