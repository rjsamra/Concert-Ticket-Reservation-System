<!--
@author: Vasilis Tsakiris
-->
<?php
include('header.php');
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h3>Upcoming Concerts</h3>
					<?php 
					$qry3=mysqli_query($con,"select * from tbl_news");				
					while($n=mysqli_fetch_array($qry3))
					{
					?>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="<?php echo $n['attachment'];?>">
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
						  	<span style="text-color:#000" class="data"><strong><?php echo $n['name'];?></strong><br>
						  	<span style="text-color:#000" class="data"><strong>Band : <?php echo $n['cast'];?></strong><br>
						  	<span style="text-color:#000" class="data"><strong>Date : <?php echo $n['news_date'];?></strong><br>
							<span class="text-top"><?php echo $n['description'];?></span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				}
				?>
		</div>				
		<div class="listview_1_of_3 images_1_of_3">
					<h3>Hits</h3>
						<div class="middle-list">
					<?php 
					$qry4=mysqli_query($con,"select * from tbl_concert order by rand()");
					while($nm=mysqli_fetch_array($qry4))
					{
					?>
						<div class="listimg1">
							 <a target="_blank" href="<?php echo $nm['video_url'];?>"><img src="<?php echo $nm['image'];?>" alt=""/></a>
							 <a target="_blank" href="<?php echo $nm['video_url'];?>" class="link"><?php echo $nm['concert_name'];?></a>
						</div>
						<?php
					}
					?>
					</div>		
		</div>			
		<?php include('concert_sidebar.php');?>
	</div>
</div>
<?php include('footer.php');?>
</div>
