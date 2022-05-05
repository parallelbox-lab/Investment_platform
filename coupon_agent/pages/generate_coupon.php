<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                                      
                        <?php
                        
                                if(isset($_REQUEST['number_of'])){
                                   
                                $no = $_REQUEST['number_of'];
                                $val = $_REQUEST['worth'];
                                $fval = $no * $val;
                                $role_id = $su['role_id'];
                                if($su['wallets'] < $fval){
                                 echo'<div class="alert alert-danger">Sorry, you dont have sufficient fund, Recharge</div>';
                                }else{
                                
                                while($no>0){
                                    $code = generatecode();
                                    $insert = mysqli_query($conn,"INSERT INTO coupon (code,val,who_created,role_id) VALUES('$code','$val','$usr_id','$role_id') ");                               
                                    $no = $no -1;
                                    $newwallets = $su['wallets'] - $fval;
                                    mysqli_query($conn,"UPDATE users set wallets = '$newwallets' WHERE id = '$usr_id'");
                                }
                                
                            } 
                        }
                              
                            
                            //echo $usr_id;
                            ?>
                            
                                <form method="post">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="number_of" placeholder="Number Of">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="worth" placeholder="The Worth">
                                    </div>

                                    
                                    <button class="btn btn-primary">Generate Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>