<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Active Investment</h4>
                                    </div>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="bprder-o">SN</th>
                                                <th class="border-0">Full Name</th>
                                               
                                                <th class="border-0">Investment</th>
                                                <th class="border-0">Capital</th>
                                                <th class="border-0">No Of Days </th>
                                                <th class="border-0">Profit</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $selectalllist = mysqli_query($conn,"SELECT * FROM myinvestment WHERE profitcount != '2'");
                                            while($sall = mysqli_fetch_array($selectalllist)){
                                                
                                                //theinvestment 
                                                $us = $sall['usr_id'];
                                                $invst_id = $sall['invst_id'];

                                                $getinvst = mysqli_query($conn,"SELECT * FROM  investment_list WHERE id='$invst_id' ");
                                                $gist = mysqli_fetch_array($getinvst);

                                                $getme = mysqli_query($conn,"SELECT * FROm users WHERE id = '$us'");
                                                $gme = mysqli_fetch_array($getme);

                                        ?>
                                            <tr>
                                                <td><?php echo $count; ?> </td>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        
                                                        <div class="">
                                                            <h5 class="m-b-0 font-16 font-medium"><?php echo $gme['surname']." ".$gme['othernames'] ?></h5><span><?php echo $gme['email'] ?> |<?php echo $gme['phoneno'] ?> </span></div>
                                                    </div>
                                                </td>
                                               
                                                <td><?php echo $gist['invst_name'] ?> </td>
                                                
                                                <td><?php echo number_format($sall['capital']) ?></td>
                                                <td><?php echo number_format($sall['dayCount']) ?></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><?php echo number_format($sall['roiExpect']) ?></td>
                                            </tr>
                                            <?php $count = $count + 1; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>