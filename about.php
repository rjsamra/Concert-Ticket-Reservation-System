<!--
@author: Vasilis Tsakiris
-->
<?php include('header.php');
	$qry2=mysqli_query($con,"select * from tbl_concert where concert_id='".$_GET['id']."'");
	$concert=mysqli_fetch_array($qry2);
	?>
	    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
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
									<a href="<?php echo $concert['video_url']; ?>" target="_blank" class="watch_but">Check</a>
								</div>
								<div class="clear"></div>
							</div>
							<?php $s=mysqli_query($con,"select DISTINCT stadium_id from tbl_shows where concert_id='".$concert['concert_id']."'");
							if(mysqli_num_rows($s))
							{?>
							<table class="table table-hover table-bordered text-center">
							<?php
								while($shw=mysqli_fetch_array($s))
								{
									$t=mysqli_query($con,"select * from tbl_stadium where id='".$shw['stadium_id']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<td>
											<?php echo $theatre['name'].", ".$theatre['place'];?>
										</td>
										<td>
											<?php $tr=mysqli_query($con,"select * from tbl_shows where concert_id='".$concert['concert_id']."' and stadium_id='".$shw['stadium_id']."'");
											while($shh=mysqli_fetch_array($tr))
											{
												$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shh['st_id']."'");
												$ttme=mysqli_fetch_array($ttm);
												
												?>
												<a href="check_login.php?show=<?php echo $shh['s_id'];?>&concert=<?php echo $shh['concert_id'];?>&stadium=<?php echo $shw['stadium_id'];?>"><button class="btn btn-default"><?php echo date('h:i A',strtotime($ttme['start_time']));?></button></a>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
							<?php
							}						
							else
							{
								?>
								<h3>No Show Available</h3>
								<?php
							}
							?>
			    </div>	
             <?php include('concert_sidebar.php');?>
		  </div>			
	    </div>		
             </div>
				<div class="clear"></div>		
			</div>
 </div>
</div>
<?php include('footer.php');?>