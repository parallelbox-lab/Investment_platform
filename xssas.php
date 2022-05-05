<div class="">
    <div class="row">
       <?php $investmentlist = mysqli_query($conn,"SELECT * FROM myinvestment WHERE usr_id ='$usr_id' ");
       while($ivst_list = mysqli_fetch_array($investmentlist)){ ?> 
        
       <?php } ?>

    </div>

</div>