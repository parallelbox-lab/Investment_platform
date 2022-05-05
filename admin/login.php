<?php 
    require_once('controller.php');

    if(isset($_REQUEST['email'])){
        
        $email = $_REQUEST['email'];

        $password = encrypt($_REQUEST['password']);

        ///////////////////////Check if registerred

        $check = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' and password = '$password' ") or die(mysqli_error($conn));
        $check_array = mysqli_fetch_array($check);
        // code to check for admin id for authentication
        if($check_array){
            $message = '<div class="alert alert-danger">User exist! Check details and try again</div>';
            
            
            $_SESSION['id'] = $check_array['id'];
            $_SESSION['surname'] = $check_array['surname'];
            
            header("location:admin");

        }else{
            $message = '<div class="alert alert-danger">User does not exist or login detail is incorrect!</div>';
           

        }


       
 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    
</body>
</html>