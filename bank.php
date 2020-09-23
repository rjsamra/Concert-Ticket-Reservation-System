<!--
@author: Vasilis Tsakiris
-->
<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
$host = "127.0.0.1";
    $user = "root";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "db_concerts";                                  //Your database name you want to connect to
    $port = 3306;
     $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
extract($_POST);
$queryAmount=mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
$amount=mysqli_fetch_array($queryAmount);
$amountAfter=$amount['totalAmount']-$_SESSION['amount'];
if(mysqli_num_rows($queryAmount))
{
  if($_SESSION['amount'] <= $amount['totalAmount']){
mysqli_query($con,"update tbl_registration set totalAmount='$amountAfter' where user_id='".$_SESSION['user']."' ");
mysqli_query($con,"update tbl_registration set lastUpdate=CURRENT_TIMESTAMP() where user_id='".$_SESSION['user']."' ");


}

}
?><!doctype html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- =============================================== -->
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- =============================================== -->
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<!-- =============================================== -->
<title>BillDesk - All Your Payments. Single Location</title>
<link href="css/bank.css" rel="stylesheet" type="text/css"/>
</head>
<!-- =============================================== -->
<body>
<div id="mainContainer" class="row large-centered">
  <div class="text-center"><h2>BANK</h2></div>
  <hr class="divider">
  <dl class="mercDetails">
  	<dt>Merchant</dt> 				<dd>Web Tickets Shop</dd>
    <dt>Transaction Amount</dt> 	<dd>€ <?php echo  $_SESSION['amount'];?></dd>
    <dt>Prepaid Card</dt> 		<dd><?php echo  $number;?> </%></dd>
  </dl>
  <hr class="divider">
<form name="form1" id="form1" method="post" action="complete_payment.php">
<fieldset class="page2">
<div class="page-heading">
<h6 class="form-heading">Authenticate Payment</h6>
<p class="form-subheading">OTP sent to your mobile number ending
 <?php
  $host = "127.0.0.1";
    $user = "root";                     //Your  username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "db_concerts";                                  //Your database name you want to connect to
    $port = 3306;
    $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error()); 
  $qry2=mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
  $phone=mysqli_fetch_array($qry2);
?><strong><?php echo '*******'.substr($phone['phone'], 7); ?></strong></p>
</div>
<div class="row formInputSection">
<div class="large-7 columns">
<label>
  Enter One Time Password (OTP)
  <input type="tel" name="otp"  class="form-control optPass" value="" maxlength="6" autocomplete="off"/>
</label>
</div>
<div class="large-5 columns">
<label>&nbsp;</label><button class="expanded button next" onClick="ValidateForm()">Make Payment</button>
</div>
</div>
<div class="text-right resendBtn requestOTP"><a class="request-link" href="javascript:void(0)">Resend OTP</a></div>
</fieldset>
</form>
</div>
<!-- =============================================== -->
<script src="bank/script/jquery-1.9.1.js"></script>
<script>
document.onmousedown = rightclickD; function rightclickD(e) { e = e||event; if (e.button == 2) { alert('Function Disabled...'); return false; } }
function ValidateForm() { 
	var regPin = RegExp("^[0-9]{4,6}$");
	if( document.form1.customerpin.value == "" || !document.form1.customerpin.value.match(regPin) ) {	 
		alert("Please enter a valid 6 digit One Time Password (OTP) receive on your registered Mobile Number."); document.form1.customerpin.focus(); return false;  
	}
    else
        {
            document.form1.submit();
        }
}
</script>
<!-- =============================================== -->
</body>
</html>