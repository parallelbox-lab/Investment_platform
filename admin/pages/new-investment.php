<div class="">
    <div class="row">
       <?php $investmentlist = mysqli_query($conn,"SELECT * FROM investment_list ");
       while($ivst_list = mysqli_fetch_array($investmentlist)){ ?> 
        <div class="card col-md-3" style="margin:30px;background-color:blue;color:white;">
            <div class="card-body">
                <center>
                    <h5><?php echo $ivst_list['invst_name'] ?></h5>
                    <b>Amount:</b><?php echo $ivst_list['minimum'] ?><br>
                    <b>ROI:</b><?php echo $ivst_list['roi'] ?>%<br>
                  <a href="?pg=investment-now&invst_id=<?php echo encrypt($ivst_list['id'])  ?>" class="btn btn-primary">Proceed To Investment</a>
                </center>

            </div>
        </div>
       <?php } ?>

    </div>

</div>