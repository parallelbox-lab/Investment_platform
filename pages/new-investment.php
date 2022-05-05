<div class="">
    <div class="card col-12 bg-dark text-center text-white" id="demoBody" style="display:none">
        YOU HAVE A CURRENT INVESTMENT RUNNING: <span id="demo" ></span>
    </div>
<?php
if(isset($_SESSION['uuusss'])){
?>
<div class="alert alert-danger">Your investment has expired.</div>
<?php
unset($_SESSION['uuusss']);
}
?>



    <div class="row">
       <?php $investmentlist = mysqli_query($conn,"SELECT * FROM investment ");
       $get_day_count = mysqli_query($conn,"SELECT * FROM day_counter WHERE user_id = '$usr_id'");
       $new_val = mysqli_fetch_array($get_day_count);
       while($ivst_list = mysqli_fetch_array($investmentlist)){ ?> 

       
       
        <div class="card col-md-3" style="margin:30px;background-color:blue;color:white;">
            <div class="card-body text-center">
              
                    <h5><?php echo $ivst_list['investment_name'] ?></h5>
                    <b>Amount:</b> <?php echo number_format($ivst_list['amount']) ?><br>
                    <b>ROI:</b> <?php echo $ivst_list['roi'] ?>%<br>
                    <?php if(isset($new_val['day_status']) != "1"){?>
                      <a href="?pg=investment-cal&invst_id=<?php echo encrypt($ivst_list['id'])  ?>" class="btn btn-primary">Proceed To Investment</a>
                   <?php
                 } 
                 ?>
                   
            

            </div>
        </div>
       <?php } ?>

    </div>

</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $new_val['expdt'] ?>").getTime();
var displayMessage = document.getElementById("demoBody");
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  displayMessage.style.display="block";
  document.getElementById("demo").innerHTML = days + " Day(s) " + hours + " Hour(s) "
  + minutes + " Minutes " + seconds + " Seconds ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "";
    displayMessage.style.display="none";
  }
}, 1000);
</script>
