<?php 
    date_default_timezone_set('Africa/Lagos');
    require_once('controller.php');

$usr_id = $_SESSION['id'];

$selectthisuser = mysqli_query($conn,"SELECT * FROM users WHERE id = '$usr_id' and role_id ='0'");
$su = mysqli_fetch_array($selectthisuser);
if($su['role_id'] !='0'){
    header("location:sign-in");
}

$selectsettings = mysqli_query($conn,"SELECT * FROM settings ");
$setting = mysqli_fetch_array($selectsettings);

$myrefcodes = $su['myrefid'];
$date = date("Y-m-d");
//check if i have checked in today
    $checktoday = mysqli_query($conn,"SELECT * FROM daycheck WHERE usr_id = '$usr_id' and date ='$date'");
    $chtoday = mysqli_fetch_array($checktoday);

    if($chtoday){

    }else{
        $getallmy = mysqli_query($conn,"SELECT * FROM myinvestment WHERE usr_id = '$usr_id'");
        while($gmys = mysqli_fetch_array($getallmy)){
           // update my
           $idofi = $gmys['id'];
           
           $daycount = $gmys['dayCount'] + 1;
           $unit = $gmys['roiExpect']/30;

           $presentAmount = $gmys['presentAmount'] + $unit;
           if($daycount<=15){
            mysqli_query($conn,"UPDATE myinvestment SET presentAmount = '$presentAmount', dayCount = '$daycount', firstinstall = '$presentAmount' WHERE id = '$idofi'");
           } else{
            mysqli_query($conn,"UPDATE myinvestment SET presentAmount = '$presentAmount', dayCount = '$daycount' WHERE id = '$idofi'");
           }  
        }
            $date = date("Y-m-d");
        mysqli_query($conn,"INSERT INTO  daycheck (date,usr_id,status) VALUES ('$date','$usr_id','on')");


    }



/////increase profitcount of my investment


///////////////

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

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
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .button {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
    </style>    
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="logo/whited.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="logo/whited.png" alt="homepage" class="light-logo" style="height:50px;" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-3">
                                <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu ml-2">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium"><?php echo $su['surname']." ".$su['othernames'] ?><i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo $su['email'] ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
 
                        <li class="sidebar-item"><a href="dash" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard </span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Investment </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="?pg=new-investment" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> New </span></a></li>
                                <!-- <li class="sidebar-item"><a href="?pg=manageinvestment" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Manage </span></a></li> -->
                                
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-tune-vertical"></i><span class="hide-menu">My Profile </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="sidebar-type-minisidebar.html" class="sidebar-link"><i class="mdi mdi-view-quilt"></i><span class="hide-menu"> My Profile </span></a></li>

                                <li class="sidebar-item"><a href="?pg=referral" class="sidebar-link"><i class="mdi mdi-view-day"></i><span class="hide-menu"> My Refferal </span></a></li>
                                
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-content-copy"></i><span class="hide-menu">Wallet </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="?pg=fund-wallet" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Fund Wallet </span></a></li>
                                <li class="sidebar-item"><a href="?pg=get-coupon" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Get Coupon </span></a></li>
                                <li class="sidebar-item"><a href="?pg=used-coupon" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Used Coupon </span></a></li>
                                <li class="sidebar-item"><a href="?pg=withdraw-earned" class="sidebar-link"><i class="mdi mdi-format-float-left"></i><span class="hide-menu"> Withdraw Earning </span></a></li>
                                <li class="sidebar-item"><a href="?pg=update-details" class="sidebar-link"><i class="mdi mdi-format-float-right"></i><span class="hide-menu"> Update Tron(Trc20) Address </span></a></li>
                                
                            </ul>
                        </li>
                        
                        
                        
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="docs/documentation.html" aria-expanded="false"><i class="mdi mdi-content-paste"></i><span class="hide-menu">Documentation</span></a></li> -->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <?php if(isset($_REQUEST['pg'])){
                $pg = "pages/".$_REQUEST['pg'].".php";
                require_once($pg);
                
                ?>

                <?php
            }else{ ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <!-- ============================================================== -->
                            <!-- Info Box -->
                            <!-- ============================================================== -->
                            <div class="card-body border-top">
                                <div class="row m-b-0">
                                    <!-- col -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
                                            <div><span>Wallet Balance</span>
                                                <h3 class="font-medium m-b-0">TRX<?php echo number_format($su['wallets']) ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-cyan display-5"><i class="mdi mdi-star-circle"></i></span></div>
                                            <div><span>Referral Earnings</span>
                                                <h3 class="font-medium m-b-0">TRX<?php echo number_format($su['referralwallet']) ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <?php $countinvestment = mysqli_query($conn,"SELECT count(id) as countinvest, sum(roiExpect) as earnings FROM myinvestment WHERE usr_id = '$usr_id' and profitcount != '2' ");
                                        $ci = mysqli_fetch_array($countinvestment);
                                    ?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-info display-5"><i class="mdi mdi-shopping"></i></span></div>
                                            <div><span>Total Active Investment</span>
                                                <h3 class="font-medium m-b-0"><?php echo number_format($ci['countinvest'])?></h3></div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-currency-usd"></i></span></div>
                                            <div><span>Earnings (Investment Worth)</span>
                                                <h3 class="font-medium m-b-0">TRX<?php echo number_format($ci['earnings'])?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <center> <h4>Active Investment</h4></center>
       <?php 
       
       $investmentlist = mysqli_query($conn,"SELECT * FROM myinvestment WHERE usr_id ='$usr_id' and profitcount !='2' ");
       while($ivst_list = mysqli_fetch_array($investmentlist)){ 
           

        $invstid = $ivst_list['invst_id'];
        $thisinvestment = mysqli_query($conn,"SELECT * FROM investment_list WHERE id ='$invstid' ");
        $thisinvest = mysqli_fetch_array($thisinvestment);
           

        $now = strtotime(date("Y-m-d"));
    $second = strtotime($ivst_list['date']);

    $datediff=  $now - $second;
    
    $days = round($datediff/(60 * 60 * 24))
           
           ?> 
        <div class="card col-md-3" style="margin:30px;background-color:blue;color:white;">
            <div class="card-body">
                <center>
                    <h5><?php echo $thisinvest['invst_name'] ?></h5>
                    <b>Capital:</b><?php echo $ivst_list['capital'] ?><br>
                    <b>Present Profit:</b><?php echo $ivst_list['presentAmount'] ?><br>
                    <b>Expected Profit:</b><?php echo $ivst_list['expectedTotal'] ?><br>
                    <b>Number Of Days:</b><?php echo $days;  ?>days<br>
                    
                 
                    <?php if($days>=15 and $ivst_list['profitcount']=='0'){
                        ?>
                         <a href="?pg=withdraw&invst_id=<?php echo encrypt($ivst_list['id'])  ?>&type=1&am=<?php echo encrypt($ivst_list['firstinstall']) ?>" class="btn btn-primary">Withdraw 1st Installment</a>       
                        <br><br>
                        <?php
                    }
                    if($days>=30 and ($ivst_list['profitcount']=='1' OR $ivst_list['profitcount']=='0' )){ ?>               
                    <a href="?pg=withdraw&invst_id=<?php echo encrypt($ivst_list['id'])  ?>&type=2&am=<?php echo encrypt( $ivst_list['firstinstall']) ?>&secs=<?php echo $ivst_list['capital'] ?>" class="btn btn-primary">Withdraw 2nd Installment</a>

                    <?php } ?>
                
                
                </center>

            </div>
        </div>
       <?php } ?>

    </div>
               
            </div>
            <?php } ?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
       All Rights Reserved . Designed and Developed by <a href=""></a>.
</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle" style="margin-right:100px;"><i class="fa fa-arrow-right"></i> <br> Claim <Br> Daily <br> Earning</a>
        <div class="customizer-body">
           <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<h3>Complete The Sharing Task To Claim Your Daily Earning On Investment. </h3>

<div class="fb-share-button" 
data-href="https://www.capitalgein.com" 
data-layout="button"> 
           
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
     
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.light-sidebar.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>