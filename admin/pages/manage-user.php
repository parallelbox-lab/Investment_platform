<?php 
    if(isset($_REQUEST['myid'])){
        $id = $_REQUEST['myid'];

        $delete = mysqli_query($conn,"DELETE FROM users WHERE id = '$id'");
    }

?>
<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Users</h4>
                                    </div>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-o">SN</th>
                                                <th class="border-0">Full Name</th>
                                               

                                                <th class="border-0">Wallet </th>
                                                <th class="border-0">Account Type</th>
                                                <th class="border-0">Password</th>

                                                <th class="border-0">Action/Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $count = 1;
                                            $selectalllist = mysqli_query($conn,"SELECT * FROM users ");
                                            while($sall = mysqli_fetch_array($selectalllist)){
                                                
                                                //theinvestment 

                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $count; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        
                                                        <div class="">
                                                            <h5 class="m-b-0 font-16 font-medium"><?php echo $sall['surname']." ".$sall['othernames'] ?></h5><span><?php echo $sall['email'] ?> |<?php echo $sall['phoneno'] ?> </span></div>
                                                    </div>
                                                </td>
                                               
                                                <td><?php echo number_format($sall['wallets']) ?> </td>
                                                
                                                <td><?php  if($sall['role_id']=='0'){echo "User";}else if($sall['role_id']='1'){echo "Admin";}else{echo "Agent" ;} ?></td>
                                                <td><?php echo decrypt($sall['password']) ?> </td>
                                                <td ><a href="?pg=manage-user&myid=<?php echo $sall['id'] ?>">Delete</a></td>
                                            </tr>
                                            <?php $count = $count + 1;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>