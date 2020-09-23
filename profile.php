<!--
@author: Vasilis Tsakiris
-->
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}

	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
											<?php include('msgbox.php');?>

					<div class="about span_1_of_2">	
						<h3>Bookings</h3>
						<?php include('msgbox.php');?>
						<?php
				$bk=mysqli_query($con,"select * from tbl_bookings where user_id='".$_SESSION['user']."'");
				if(mysqli_num_rows($bk))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Ticket ID</th>
						<th>Band</th>
						<th>Stadium</th>
						<th>tier</th>
						<th>Show</th>
						<th>Seats</th>
						<th>Amount</th>
						<th></th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
							$m=mysqli_query($con,"select * from tbl_concert where concert_id=(select concert_id from tbl_shows where s_id='".$bkg['show_id']."')");
							$mov=mysqli_fetch_array($m);
							$s=mysqli_query($con,"select * from tbl_screens where screen_id='".$bkg['screen_id']."'");
							$srn=mysqli_fetch_array($s);
							$tt=mysqli_query($con,"select * from tbl_stadium where id='".$bkg['t_id']."'");
							$thr=mysqli_fetch_array($tt);
							$st=mysqli_query($con,"select * from tbl_show_time where st_id=(select st_id from tbl_shows where s_id='".$bkg['show_id']."')");
							$stm=mysqli_fetch_array($st);
							?>
							<tr>
								<td>
									<?php echo $bkg['ticket_id'];?>
								</td>
								<td>
									<?php echo $mov['concert_name'];?>
								</td>
								<td>
									<?php echo $thr['name'];?>
								</td>
								<td>
									<?php echo $srn['screen_name'];?>
								</td>
								<td>
									<?php echo $stm['name'];?>
								</td>
								<td>
									<?php echo $bkg['no_seats'];?>
								</td>
								<td>
									€ <?php echo $bkg['amount'];?>
								</td>
								<td>
									<?php  if($bkg['ticket_date']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{?>
									<button data-toggle="modal"  data-target="#cancel" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash"></i> <a style="color:white;     text-decoration: none;
" href="cancel.php?id=<?php echo $bkg['book_id'];?>">Cancel</a></i></button>
									<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3>No Previous Bookings</h3>
					<?php
				}
				?>
					</div>		
		         <?php include('concert_sidebar.php');?>
			</div>
			<div class="about span_1_of_2">	
						<h3>Prepaid Details</h3>
						<?php
				$pr=mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
				if(mysqli_num_rows($pr))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Total Amount</th>
						<th>Last Update</th>


						</thead>
						<tbody>
						<?php
						while($prepaid=mysqli_fetch_array($pr))
						{
						
							?>
							<tr>
								<td>
								€	<?php echo $prepaid['totalAmount'];?>
								</td>
								<td>
									<?php echo $prepaid['lastUpdate'];?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3>No Account Details</h3>
					<?php
				}
				?>		</div><div class="about span_1_of_2">	
						<h3>Update your prepaid</h3>
												<div>
            <label for="display-name"> Give the amount:
            	 <span class="warning">*(Allows only digits.)</span>
            </label>
            <form method="post" action="update.php">
            <input type="number" id="update" name="newAmountCard"
                   pattern="^(0|(([1-9]{1}|[1-9]{1}[0-9]{1}|[1-9]{1}[0-9]{2}){1}(\ [0-9]{3}){0,})),(([0-9]{2})|\-\-)([\ ]{1})$"
                   maxlength="250" minlength="1"  required /><button  class="btn btn-success btn-sm" ><a style="color:white;text-decoration: none;
" href="update.php?id=<?php echo $prepaid['prepaid_id'];?>">Update your card</a></button>
            <span></span>
              </form>
        </div>
					</div>	
		
				<div class="clear"></div>

						
		</div>
	</div>
				
<?php include('footer.php');?>
<style>
@font-face {
    font-family: 'Fira Sans';
    src: local('FiraSans-Regular'),
    url('/media/fonts/FiraSans-Regular.woff2') format('woff2');
}

legend {
    background-color: #000;
    color: #fff;
    padding: 3px 6px;
}

#update,
label {
    width: 43%;
}

#update {
    margin: .5rem 0;
    padding: .5rem;
    border-radius: 4px;
    border: 1px solid #ddd;
}

label {
    display: inline-block;
}

#update:invalid + span:after {
    content: '✖';
    color: red;
    padding-left: 5px;
}

#update:valid + span:after {
    content: '✓';
    color: green;
    padding-left: 5px;
}

.warning {
    font-size: .65rem;
    color: #e67d09;
}


</style>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("€ "+amount);
		$('#hm').val(amount);
	});
</script>


