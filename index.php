<?php
		include 'inc/header.php';
		include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3>Sản phẩm bán chạy nhất</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$getproduct_fea = $prd->getproduct_featured(); 
	      		if($getproduct_fea)
	      		{
	      			while($result = $getproduct_fea->fetch_assoc())
	      			{

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2><?php echo $result['prd_Name'] ?></h2>
					 <p><?php echo $fm->textShorten($result['prd_Des'], 20) ?></p>
					 <p><span class="price"><?php echo $result['prd_Price']."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>	
				<?php 
						}
					}	
				?>			
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản Phẩm Nổi Bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p> 
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>

				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				
			</div>

			<div class="content_last">
    		<div class="heading">
    		<h3>Sản phẩm mới <!-- <img src="images/NEW-GIF.gif" width="100px" > --> </h3> 
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p> 
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/sach1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>

				     <div class="button"><span><a href="details.php" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
			</div>
    </div>
 </div>

<?php
		include 'inc/footer.php';
?>
