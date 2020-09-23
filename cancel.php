<!--
@author: Vasilis Tsakiris
-->
<?php
session_start();
include('config.php');
$s=mysqli_query($con,"select * from tbl_shows where s_id='".$_SESSION['show']."'");
$shw=mysqli_fetch_array($s);
$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shw['st_id']."'");
$ttme=mysqli_fetch_array($ttm);
$sn=mysqli_query($con,"select  * from tbl_screens where screen_id='".$ttme['screen_id']."'");
$screen=mysqli_fetch_array($sn);
$charge=$_SESSION['amount'];
mysqli_query($con,"delete from tbl_bookings where book_id='".$_GET['id']."'");
mysqli_query($con,"update tbl_registration set totalAmount=totalAmount +'$charge' where user_id='".$_SESSION['user']."'");
mysqli_query($con,"update tbl_registration set lastUpdate=CURRENT_TIMESTAMP() where user_id='".$_SESSION['user']."'");
$_SESSION['success']="Booking Cancelled Successfully";
header('location:profile.php');
?>