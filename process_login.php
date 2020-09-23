<!--
@author: Vasilis Tsakiris
-->
<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$attempt=2;
$qry=mysqli_query($con,"select * from tbl_login where username='$email' and password='$pass' and user_type<3 ");
$qry2=mysqli_query($con,"select * from tbl_login where username='$email' and user_type < 3 ");

if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);

		$_SESSION['user']=$usr['user_id'];
		if(isset($_SESSION['show']))
		{
			header('location:booking.php');
		}
		else
		{
			header('location:index.php');
		}
	}

else if(mysqli_num_rows($qry2)){

   
        $qryupdt=mysqli_query($con,"update tbl_login set user_type=user_type + 1 where username='$email' ");
        $_SESSION['error']="Login Failed!";
             $attempt--;
		header("location:login.php");
        


}
else if(!mysqli_num_rows($qry2))
{

         $_SESSION['error']="Login Failed!Your account has been blocked.";
		header("location:login.php");

}


else
{

	$_SESSION['error']="Login Failed!";
	header("location:login.php");
}
?>