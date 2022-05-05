<?php
ob_start();
session_start();
$a=explode("/",$_SERVER['PHP_SELF']); $site="https://waste";
require_once 'my-functions.php';
include("xtras/Conreg.php");
include("xtras/ipspool.php"); 
include "xtras/encryptdem.php";	
include "xtras/time.php";
include("xtras/passwordgenerator.php");



//////ACADEMIC SETTINGS////
$sc=mysqli_query($conn,"select * from settings") or die(mysqli_error($conn)); $rc=mysqli_fetch_assoc($sc);
$sfone=explode(",", $rc['supportphone']);


?>