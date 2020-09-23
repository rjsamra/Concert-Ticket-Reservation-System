<!--
@author: Vasilis Tsakiris
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
include('config.php');
session_start();
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
include('config.php');
extract($_POST);
$useramount2=mysqli_query($con,"select  * from tbl_registration where user_id='".$_SESSION['user']."'");
$user2=mysqli_fetch_array($useramount2);
$bookingAmount =$_SESSION['amount'];
if($otp=="123456" && ($user2['totalAmount'] >= $_SESSION['amount'] ))
{
    $bookid="BKID".rand(1000000,9999999);
    $tickid="TICKID".rand(1000000,9999999);
    $query="insert into tbl_bookings values('$bookid','$tickid','".$_SESSION['stadium']."','".$_SESSION['user']."','".$_SESSION['show']."','".$_SESSION['screen']."','".$_SESSION['seats']."','".$_SESSION['amount']."','".$_SESSION['date']."',CURDATE(),'1')";
    mysqli_query($con,$query);
    $_SESSION['success']="Booking Successfully Completed";
}
else if (!($user2['totalAmount'] >= $_SESSION['amount']))
{
    $_SESSION['error']="Payment Failed.You don't have a lot of money.";
}
else 
  $_SESSION['error']="Payment Failed.";
?>
<body><table align='center'><tr><td><STRONG>Transaction is being processed,</STRONG></td></tr><tr><td><font color='blue'>Please wait <i class="fa fa-spinner fa-pulse fa-fw"></i>
<span class="sr-only"></font></td></tr><tr><td>(Please do not press 'Refresh' or 'Back' button )</td></tr></table><h2>
<script>
    setTimeout(function(){ window.location="profile.php"; }, 5000);
</script>