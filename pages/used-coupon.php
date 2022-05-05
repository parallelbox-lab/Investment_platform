
    <div class="">
        <center><h4>Used Coupon</h4></center>
    <div class="row">
      <div class="card col-md-6" style="margin-top:20px;">
          <div class="card-body">
             <table class='table responsive'>
             <tr>
                <th>SN</th><th>Coupon</th><th>Worth</th>
             </tr>
             <?php $count = 1;
                $selectwithdraw = mysqli_query($conn,"SELECT * FROM coupon WHERE who_use = '$usr_id'  ") or die(mysqli_error($conn)); 
                while($swith = mysqli_fetch_array($selectwithdraw)){
                      ?>
                      <tr>
                      <td><?php echo $count; ?></td><td><?php echo $swith['code']; ?></td> <td><?php echo number_format($swith['val']); ?></td>      
                        </tr>
                      <?php  
                $count= $count+1;   
            }
             ?>
 
             
             </table>
          </div>
      </div>
      

    </div>

</div>
        <?php
    

?>