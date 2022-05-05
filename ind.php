<?php
    require_once("controller.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assetss/images/favicon.png">
    <title>Xtreme admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="assetss/libs/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="assetss/libs/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assetss/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    window.$zopim || (function(d, s) {
        var z = $zopim = function(c) { z._.push(c) },
            $ = z.s =
            d.createElement(s),
            e = d.getElementsByTagName(s)[0];
        z.set = function(o) {
            z.set.
            _.push(o)
        };
        z._ = [];
        z.set._ = [];
        $.async = !0;
        $.setAttribute("charset", "utf-8");
        $.src = "https://v2.zopim.com/?4gucOY1MlvrcvUVJ9GClgI5JHhmy8CFq";
        z.t = +new Date;
        $.
        type = "text/javascript";
        e.parentNode.insertBefore($, e)
    })(document, "script");
    </script>
</head>

<body>
<!-- ============================================================== -->
<!-- Main wrapper -->
<!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Header part -->
        <!-- ============================================================== -->
        <header class="topbar">
            <div class="container">
                <!-- Start Header -->
                <div class="header p-t-20">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="#">
                            <img src="logo/capitalgein.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#demos">About CapitalGein</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#apps">How To Earn</a>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </nav>
                    <div class="row header-banner align-items-center">
                        <div class="col-lg-5">
                            <h1>Gain <span class="text-info"> 60% </span> of investment!</h1>
                            <p class="m-t-40"><span class="font-bold text-dark">in</span> 30 days <span class="font-bold text-dark"> when you invest</span>  with CapitalGein</p>
                            <a href="sign-up" class="btn btn-custom-md btn-info m-t-40 m-b-40 dm-btn">Sign Up</a>
                            <a href="sign-in" class="btn btn-custom-md btn-outline-info m-t-40 m-b-40 m-l-10">Sign In</a>
                        </div>
                        <div class="col-lg-6 offset-lg-1 text-right">
                            <img class="img-shadow img-fluid" src="logo/normal.png" alt="db">
                         
                        </div>
                    </div>
                </div>
                <!-- End Header -->
            </div>
        </header>
        <!-- ============================================================== -->
        <!-- Header part -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Page wrapper part -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Demos part -->
            <!-- ============================================================== -->
            <section id="demos" class="demos spacer">
                <div class="container">
                    <div class="row justify-content-center">
                        
                        <?php
                            $getinvestment = mysqli_query($conn,"SELECT * FROM investment_list");
                            while($gi = mysqli_fetch_array($getinvestment)){
                        ?>

                        <div class="col-md-4 ">
                            
                            <div class="">
                                <span class="font-12 font-bold text-uppercase"><?php echo $gi['invst_name'] ?></span>
                                <h3>Invest <?php echo $gi['minimum'] ?> and get <?php echo ($gi['minimum'] * 0.60) + $gi['minimum']  ?> </h3>
                                <a href="login" class="btn btn-primary">Start Now</a>
                            </div>
                        </div>
                            <?php } ?>
                        
                        
                             
                    </div>
                </div>
            </section>

            <section id="footer" class="footer">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <img class="img-shadow img-fluid" src="logo/capitalgein.png" alt="db">
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <h1 class="m-t-40">CapitalGein <span class="text-info"> is a simple and secure investment platform that enable you make 60% in</span> 30 days!</h1>
                            <p class="m-t-40"><span class="font-bold text-dark">CapitalGein is fully based on real estate, forex trading, agriculture and creatives</span> 1000+ Page Templates, Unlimited Color Schemes, <span class="font-bold text-dark">5+ Unique Demos,</span> 500+ UI Elements, 100+ Integrated Plugins & more...</p>
                            <a href="login" class="btn btn-custom btn-info btn-lg m-t-40">Start Now</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ============================================================== -->
        <!-- End page wrapperHeader part -->
        <!-- ============================================================== -->
    </div>
</body>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="assets/js/custom.js"></script>

</html>