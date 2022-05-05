<div class="">
    <center><h3>Get Coupon</h3></center>
    <div class="row">
       <?php 
       
       $investmentlist = mysqli_query($conn,"SELECT * FROM users WHERE role_id ='2' ");
       while($ivst_list = mysqli_fetch_array($investmentlist)){ 
           
           ?> 
        <div class="card col-md-3" style="margin:30px;background-color:blue;color:white;">
            <div class="card-body">
                <center>

                    <b>Name: </b><?php echo $ivst_list['surname']." ".$ivst_list['othernames'];?><br>
                    <b>EMail: </b><?php echo $ivst_list['email'];?><br>
                    <a href="tel:<?php echo $ivst_list['phoneno'] ?>" class="btn btn-primary"><i class="fa fa-phone"></i> Call Now </a>
                    <a href="https://wa.me/<?php echo $ivst_list['phoneno'] ?>" class="btn btn-primary" ><i class="fa fa-Whatsapp"></i> Message Now </a>
                    

                    
                
                </center>

            </div>
        </div>
       <?php } ?>

    </div>

</div>