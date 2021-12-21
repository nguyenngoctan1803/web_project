<style>
.flex-viewport{

}
</style>
 	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$get1 = $prd->get1();
					if($get1)
					{
						while($result1 = $get1->fetch_assoc())
						{					
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?prdid=<?php echo $result1['prd_Id']?>"> <img src="admin/uploads/<?php echo $result1['prd_Image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h4 style="color:red">TIỂU THUYẾT</h4>
						<p><?php echo $result1['prd_Name']?></p>
						<div class="button"><span><a href="details.php?prdid=<?php echo $result1['prd_Id']?>">chi tiết</a></span></div>		
				   </div>
			   </div>
			   <?php 
						}
					}
				?>
				<?php 
					$get2 = $prd->get2();
					if($get2)
					{
						while($result2 = $get2->fetch_assoc())
						{	
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?prdid=<?php echo $result2['prd_Id']?>"><img src="admin/uploads/<?php echo $result2['prd_Image']?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h4 style="color:red">LIGHT NOVEL</h4>
						  <p><?php echo $result2['prd_Name']?><br><br></p>
						  <div class="button"><span><a href="details.php?prdid=<?php echo $result2['prd_Id']?>">chi tiết</a></span></div>
					</div>
				</div>
				<?php 
						}
					}
				?>
			</div>
			<div class="section_group">
				<?php 
					$get3 = $prd->get3();
					if($get3)
					{
						while($result3 = $get3->fetch_assoc())
						{	
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?prdid=<?php echo $result3['prd_Id']?>"> <img src="admin/uploads/<?php echo $result3['prd_Image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h4 style="color:red">SÁCH THAM KHẢO</h4>
						<p><?php echo $result3['prd_Name']?></p>
						<div class="button"><span><a href="details.php?prdid=<?php echo $result3['prd_Id']?>">chi tiết</a></span></div>
				   </div>
			   </div>
			   	<?php 
						}
					}
				?>		
				<?php 
					$get4 = $prd->get4();
					if($get4)
					{
						while($result4 = $get4->fetch_assoc())
						{	
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?prdid=<?php echo $result4['prd_Id']?>"><img src="admin/uploads/<?php echo $result4['prd_Image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h4 style="color:red">SÁCH GIÁO KHOA</h4>
						  <p><?php echo $result4['prd_Name']?><br><br><br></p>
						  <div class="button"><span><a href="details.php?prdid=<?php echo $result4['prd_Id']?>">chi tiết</a></span></div>
					</div>
				</div>
				<?php 
						}
					}
				?>	
			</div>
		  <div class="clear"></div>
		</div>
		<div class="header_bottom_right_images">          
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 
							$showSlider = $prd->show_slider();
							if($showSlider)
							{
								while($result = $showSlider->fetch_assoc())
								{
											
							
						?>
							<li><img height="327px" src="admin/uploads/<?php echo $result['slide_Image'] ?>" alt=""/></li>			
						<?php 
								}
							}
						?>
						
				    </ul>
				  </div>
	      </section>

	    </div>
	  <div class="clear"></div>
  </div>