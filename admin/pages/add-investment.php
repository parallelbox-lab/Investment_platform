<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <?php if(isset($_REQUEST['roi'])){
                                $invst_name = $_REQUEST['name'];
                                $roi = $_REQUEST['roi'];
                                $amount = $_REQUEST['amount'];

                                $insert = mysqli_query($conn,"INSERT INTO investment_list (invst_name,roi,minimum) VALUES('$invst_name','$roi','$amount') ");
                                if($insert){
                                    echo "Investment Created Successfully";
                                }else{
                                    echo "Something went wrong!";
                                }
                            } ?>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Investment Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="roi" placeholder="ROI">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="amount" placeholder="Investment Name">
                                    </div>
                                    <button class="btn btn-primary">Create Investment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>