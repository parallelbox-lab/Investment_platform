<?php 
    // if(isset($_REQUEST['myid'])){
    //     $id = $_REQUEST['myid'];
    //     mysqli_query($conn,"UPDATE withdraw SET status = '1' WHERE id = '$id'");
    // }

?>
<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Coupon Codes</h4>
                                    </div>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">Coupon Code</th>
                                                <th class="border-0">Created By</th>
                                               
                                                <th class="border-0">Used By</th>
                                                <th class="border-0">Worth</th>
                                                <th class="border-0">Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $user_id = $_SESSION['coupen_agent_id'];
                                        $selectalllist = mysqli_query($conn,"SELECT * FROM coupon WHERE who_created = '$user_id' ORDER BY id desc ");
                                            while($sall = mysqli_fetch_array($selectalllist)){
                                                
                                                //theinvestment 
                                                $us = $sall['who_created'];
                                                // $invst_id = $sall['invst_id'];

                                                $use = $sall['who_use'];    
                                                $getme = mysqli_query($conn,"SELECT * FROm users WHERE id = '$us'");
                                                $gme = mysqli_fetch_array($getme);

                                                $getu = mysqli_query($conn,"SELECT * FROm users WHERE id = '$use'");
                                                $gmus = mysqli_fetch_array($getu);

                                        ?>
                                            <tr>
                                                <td><?php echo $sall['code'] ?>
                                                
                                                </td>

                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        
                                                        <div class="">
                                                            <h5 class="m-b-0 font-16 font-medium"><?php echo $gme['surname']." ".$gme['othernames'] ?></h5><span><?php echo $gme['email'] ?> |<?php echo $gme['phoneno'] ?> </span></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        
                                                        <div class="">
                                                            <?php if(isset($gmus)){ ?>
                                                            <h5 class="m-b-0 font-16 font-medium"><?php echo $gmus['surname']." ".$gmus['othernames'] ?></h5><span><?php echo $gmus['email'] ?> |<?php echo $gmus['phoneno'] ?> </span></div>
                                                           <?php  } else{ ?>
                                                           <p>Coupon not Used by Any user</p>
                                                        <?php }

                                                           ?>
                                                    </div>
                                                </td>
                                               
                                                <td><?php echo number_format($sall['val']) ?> </td>
                                                <td><?php  if($sall['status']=='0'){echo 'Not Used';}else{echo "Used";} ?> </td>
                                                
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               