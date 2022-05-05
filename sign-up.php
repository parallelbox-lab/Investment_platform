<?php 
    require_once('controller.php');
  
    if(isset($_REQUEST['surname'])){
        
        $surname = $_REQUEST['surname'];
        $othernames = $_REQUEST['othernames'];
        $email = $_REQUEST['email'];
        $phoneno = $_REQUEST['phoneno'];
        $refcode  = $_REQUEST['refcode'];
        $mycode = generatecode();
        $password = encrypt($_REQUEST['password']);

        ///////////////////////Check if registerred

        $check = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' or phoneno = '$phoneno' ") or die(mysqli_error($conn));
        $check_array = mysqli_fetch_array($check);
        if($check_array){
            $message = '<div class="alert alert-danger">User exist! Check details and try again</div>';
        }else{

            $insert = mysqli_query($conn,"INSERT INTO users (surname,othernames,email,password,phoneno,myrefid,upline) VALUES('$surname','$othernames','$email','$password','$phoneno','$mycode','$refcode')") or die(mysqli_error($conn));
            // $res = mysqli_fetch_assoc($insert);
            // $id = $res['id'];
            // mysqli_query($conn,"INSERT INTO day_counter(day_status,user_id,date)VALUES(0,$id,0)");
          
            if($insert){
                $put = mysqli_query($conn,"INSERT INTO clan_refer (myrefid,upline) VALUES ('$refcode','$mycode') ");
                $message = '<div class="alert alert-success">Registration Successful! You can now proceed to Sign In</div>';

            }else{
                $message = '<div class="alert alert-danger">Something Went Wrong (#Error002)</div>';
            }

        }
    }

?>


<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="logo/newlogo.png">
    <title>Capital Gein</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <span class="db"><img src="logo/newlogo.png" alt="logo" class="img-fluid" style="width:90px" /></span>
                        <h5 class="font-medium m-b-20">Sign Up </h5>
                        <?php if(isset($message)){
                            echo $message;
                        } ?>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
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
                                        <input name ="phoneno" class="form-control form-control-lg" type="text" required=" " placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input name="refcode" class="form-control form-control-lg" type="text" required=" " placeholder="Refferer Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input name="password" class="form-control form-control-lg" type="password" required=" " placeholder="Password">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="sign-in" class="text-info m-l-5 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>