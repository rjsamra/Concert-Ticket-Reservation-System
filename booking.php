<!--
@author: Vasilis Tsakiris
-->
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from tbl_concert where concert_id='".$_SESSION['concert']."'");
	$concert=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3><?php echo $concert['concert_name']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $concert['image']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px">Members : <?php echo $concert['cast']; ?></p>
									<p class="p-link" style="font-size:15px">Latest CD : <?php echo date('d-M-Y',strtotime($concert['release_date'])); ?></p>
									<p style="font-size:15px"><?php echo $concert['desc']; ?></p>
								</div>
								<div class="clear"></div>
							</div>
							<table class="table table-hover table-bordered text-center">
							<?php
								$s=mysqli_query($con,"select * from tbl_shows where s_id='".$_SESSION['show']."'");
								$shw=mysqli_fetch_array($s);
								
									$t=mysqli_query($con,"select * from tbl_stadium where id='".$shw['stadium_id']."'");
									$stadium=mysqli_fetch_array($t);
									?>
									<tr>
										<td class="col-md-6">
											Stadium
										</td>
										<td>
											<?php echo $stadium['name'].", ".$stadium['place'];?>
										</td>
										</tr>
										<tr>
											<td>
												Tier
											</td>
										<td>
											<?php 
												$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shw['st_id']."'");
												$ttme=mysqli_fetch_array($ttm);
												$sn=mysqli_query($con,"select  * from tbl_screens where screen_id='".$ttme['screen_id']."'");
												$screen=mysqli_fetch_array($sn);
												echo $screen['screen_name'];
												?>
										</td>
									</tr>
									<tr>
										<td>
											Date
										</td>
										<td>				
							<div class="col-md-12 text-center" style="padding-bottom:20px">
							<?php 
									$date=$ttme['date_show'];
                              $_SESSION['dd']=$date;
							echo date('Y-m-d',strtotime($ttme['date_show']));
								$av=mysqli_query($con,"select sum(no_seats) from tbl_bookings where show_id='".$_SESSION['show']."' and ticket_date='$date'");
								$avl=mysqli_fetch_array($av);
								?>
							</div>
										</td>
									</tr>
									<tr>
										<td>
											Show Time
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ttme['start_time']));?> 
										</td>
									</tr>
									<tr>
										<td>
											Number of Seats
										</td>
										<td>
											<form  action="process_booking.php" method="post">
											<input type="hidden" name="screen" value="<?php echo $screen['screen_id'];?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $screen['seats']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge'];?>"/>
											<input type="hidden" name="date" value="<?php echo $date;?>"/>
										</td>
									</tr>
									<tr>
										<td>
											Amount
										</td>
										<td id="amount" style="font-weight:bold;font-size:18px">
											€ <?php echo $screen['charge'];?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl[0]==$screen['seats']){?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
										<button class="btn btn-info" style="width:100%">Book Now</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>		
				<?php include('concert_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("€ "+amount);
		$('#hm').val(amount);
	});
</script>