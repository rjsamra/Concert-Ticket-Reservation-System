<!--
@author: Vasilis Tsakiris
-->
<?php
session_start();
$_SESSION['show']=$_GET['show'];
$_SESSION['concert']=$_GET['concert'];
$_SESSION['stadium']=$_GET['stadium'];
if(isset($_SESSION['user']))
{
    header('location:booking.php');
}
else
{
    header('location:login.php');
}
?>