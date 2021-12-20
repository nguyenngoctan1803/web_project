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
	      		$product_fea = $prd->getproduct_featured(); 
	      		if($product_fea)
	      		{
	      			while($result_fea = $product_fea->fetch_assoc()) 
	      			{

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prdid=<?php echo $result_fea['prd_Id']?>"><img src="admin/uploads/<?php echo $result_fea['prd_Image']?>" alt=""/></a>
					 <h2><?php echo $fm->textShorten($result_fea['prd_Name'],30) ?></h2>
					 <p><span class="price"><?php echo $fm->format_money($result_fea['prd_Price'])." VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?prdid=<?php echo $result_fea['prd_Id'] ?>" class="details">Chi tiết sản phẩm</a></span></div>
				</div>	
				<?php 
						}
					}	
				?>			
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản Phẩm Mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
	      		$product_new = $prd->getproduct_new(); 
	      		if($product_new)
	      		{
	      			while($result_new = $product_new->fetch_assoc())
	      			{

	      	?> 
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prdid=<?php echo $result_new['prd_Id']?>"><img src="admin/uploads/<?php echo $result_new['prd_Image']?>" alt="" /></a> 
					 <h2><?php echo $result_new['prd_Name'] ?></h2>
					 <p><span class="price"><?php echo $fm->format_money($result_new['prd_Price'])." VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?prdid=<?php echo $result_new['prd_Id'] ?>" class="details">Chi tiết sản phẩm</a></span></div>
				</div>	
				<?php 
						}
					}	
				?>						
			</div>

    </div>
 </div>

<?php
		include 'inc/footer.php';
?>
