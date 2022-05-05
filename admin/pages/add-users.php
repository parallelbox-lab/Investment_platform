<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
      <?php
                            if(isset($_REQUEST['surname'])){
        
        $surname = $_REQUEST['surname'];
        $othernames = $_REQUEST['othernames'];
        $email = $_REQUEST['email'];
        $phoneno = $_REQUEST['phoneno'];
        $refcode  = $_REQUEST['refcode'];
       
        $password = encrypt($_REQUEST['password']);

        ///////////////////////Check if registerred

        $check = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' or phoneno = '$phoneno' ") or die(mysqli_error($conn));
        $check_array = mysqli_fetch_array($check);
        if($check_array){
            $message = '<div class="alert alert-danger">User exist! Check details and try again</div>';
        }else{

            $insert = mysqli_query($conn,"INSERT INTO users (surname,othernames,email,password,phoneno,role_id) VALUES('$surname','$othernames','$email','$password','$phoneno','$refcode')") or die(mysqli_error($conn));
            if($insert){
                $message = '<div class="alert alert-success">Registration Successful! You can now proceed to Sign In</div>';
                


                //////////////////////EMail scripts here
            
            
            
            }else{
                $message = '<div class="alert alert-danger">Something Went Wrong (#Error002)</div>';
            }

        }
    }
    ?>
                                <form class="form-horizontal m-t-20" method="post">
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name ="surname" type="text" required=" " placeholder="Surname">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name ="othernames" type="text" required=" " placeholder="Othernames">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input  name = "email" class="form-control form-control-lg" type="text" required=" " placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input name ="phoneno" class="form-control form-control-lg" type="text" required=" " placeholder="Phone Number(Whatsapp)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <select name="refcode" class="form-control form-control-lg" type="text" required=" " placeholder="Refferer Code">
                                            <option>Select Type</option>
                                            <option value="2">Agent</option>
                                            <option value="1">Admin</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input name="password" class="form-control form-control-lg" type="password" required=" " placeholder="Password">
                                    </div>
                                </div>
                                
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " type="submit ">Create User</button>
                                    </div>
                                </div>
                              
                            </form>
                            </div>
                        </div>
                    </div>
                </div>