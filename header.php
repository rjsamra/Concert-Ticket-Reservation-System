<!--
@author: Vasilis Tsakiris
-->
<?php
include('config.php');
session_start();
date_default_timezone_set('Europe/Athens');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Free Concert Website </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
    <div class="header-top">
        <div class="wrap">
              <div  class="nav-wrap">
                    <ul  class="group" id="example-one">
                       <li ><a href="index.php">Home</a></li>
                       <li ><a href="concert_events.php">Concerts</a></li>
                        <li ><?php if(isset($_SESSION['user'])){
                       $us=mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
        $user=mysqli_fetch_array($us);?><a href="profile.php"><?php echo $user['name'];?></a><a href="logout.php">Logout</a><?php }else{?><a href="login.php">Login</a><?php }?></li>
                    </ul>	  
			  </div>
 			<div class="clear"></div>
   		</div>
    </div>
<div class="block">
	<div class="wrap">	
        <form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
		       <fieldset>
		       	<div class="field" >
                                <input type="text"  placeholder="Search Concepts Here..." style="height:27px;width:500px"   id="search111" name="searching"> 
                                <input type="submit"   value="Search" style="height:28px;padding-top:4px" id="button111">
    </div>       	
		       </fieldset>
            </form>
            <div class="clear"></div>
   </div>
</div>
<script>
function myFunction() {
     if($('#search111').val()=="")
        {
            alert("Please enter a concert name...");//empty searchBar field 
        }
  }
    </script>
  }
