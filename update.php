<!--
@author: Vasilis Tsakiris
-->
<?php
session_start();
include('config.php');
$newAmount=$_POST['newAmountCard'];
if(mysqli_query($con,"update tbl_registration set totalAmount=totalAmount+'$newAmount' where user_id='".$_SESSION['user']."'") &&
	mysqli_query($con,"update tbl_registration set lastUpdate=CURRENT_TIMESTAMP() where user_id='".$_SESSION['user']."'")){


$_SESSION['success']="Update Successfully";
}
else 
	    $_SESSION['error']="Update Failed";

header('location:profile.php');
?>