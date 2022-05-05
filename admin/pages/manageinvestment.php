<div class="">
    <div class="row">
       <?php 
       
       $investmentlist = mysqli_query($conn,"SELECT * FROM myinvestment WHERE usr_id ='$usr_id' and profitcount !='2' ");
       while($ivst_list = mysqli_fetch_array($investmentlist)){ 
           

        $invstid = $ivst_list['invst_id'];
        $thisinvestment = mysqli_query($conn,"SELECT * FROM investment_list WHERE id ='$invstid' ");
        $thisinvest = mysqli_fetch_array($thisinvestment);
           

        $now = strtotime(date("Y-m-d"));
    $second = strtotime($ivst_list['date']);

    $datediff=  $now - $second;
    
    $days = round($datediff/(60 * 60 * 24))
           
           ?> 
        <div class="card col-md-3" style="margin:30px;background-color:blue;color:white;">
            <div class="card-body">
                <center>
                    <h5><?php echo $thisinvest['invst_name'] ?></h5>
                    <b>Capital:</b><?php echo $ivst_list['capital'] ?><br>
                    <b>Present Profit:</b><?php echo $ivst_list['presentAmount'] ?><br>
                    <b>Expected Profit:</b><?php echo $ivst_list['expectedTotal'] ?><br>
                    <b>Number Of Days:</b><?php echo $days;  ?>days<br>
                    
                 
                    <?php if($days>=15 and $ivst_list['profitcount']=='0'){
                        $amounted = $ivst_list['presentAmount']/;
                        ?>
                         <a href="?pg=withdraw&invst_id=<?php echo encrypt($ivst_list['id'])  ?>&type=1&am=<?php echo encrypt($ivst_list['roiExpect'] / 2) ?>" class="btn btn-primary">Withdraw 1st Installment</a>       
                        <br><br>
                        <?php
                    }
                    if($days>=30 and ($ivst_list['profitcount']=='1' OR $ivst_list['profitcount']=='0' )){ ?>               
                    <a href="?pg=withdraw&invst_id=<?php echo encrypt($ivst_list['id'])  ?>&type=2&am=<?php echo encrypt(($ivst_list['roiExpect'] / 2) + $ivst_list['capital'] ) ?>  " class="btn btn-primary">Withdraw 2nd Installment</a>

                    <?php } ?>
                
                
                </center>

            </div>
        </div>
       <?php } ?>

    </div>

</div>