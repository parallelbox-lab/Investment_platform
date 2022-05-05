<?php 
    if(isset($_REQUEST['myid'])){
        $id = $_REQUEST['myid'];
        mysqli_query($conn,"UPDATE withdraw SET status = '1' WHERE id = '$id'");
    }

?>
<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Payment Request</h4>
                                    </div>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">Full Name</th>
                                               
                                                <th class="border-0">Amount</th>
                                               
                                                <th class="border-0">TRON(TRC20)</th>
w                                                <th class="border-0">Action/Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $selectalllist = mysqli_query($conn,"SELECT * FROM withdraw WHERE status = '0' LIMIT 25");
                                            while($sall = mysqli_fetch_array($selectalllist)){
                                                
                                         //theinvestment 
                                                $us = $sall['usr_id'];
                                                // $invst_id = $sall['invst_id'];


                                                $getme = mysqli_query($conn,"SELECT * FROM users WHERE id = '$us'");
                                                $gme = mysqli_fetch_array($getme);

                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        
                                                        <div class="">
                                                            <h5 class="m-b-0 font-16 font-medium"><?php echo $gme['surname']." ".$gme['othernames'] ?></h5><span><?php echo $gme['email'] ?> |<?php echo $gme['phoneno'] ?> </span></div>
                                                    </div>
                                                </td>
                                               
                                                <td><?php echo number_format($sall['amount']) ?> </td>
                                                <td ><?php echo $gme['TRON']; ?></td>

                                                <!-- <td ><input type="text" class="form-control" value="<?php echo $gme['TRON']; ?>"  id="myInput" readonly></td> -->
                                                <!-- <td><button onclick="myFunction()" class="btn btn-success mt-2">Copy Trx</button></td> -->
                                               
                                                <td ><a href="?pg=payment-request&myid=<?php echo $sall['id'] ?>">PAY</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <script>
      function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied " + copyText.value);
        }
      </script> -->