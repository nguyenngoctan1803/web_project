<?php
		include 'inc/header.php';
?>
<?php 
	if(!isset($_GET['prdid']) || $_GET['prdid']==NULL)
   {
      echo "<script>window.location = '404.php'</script>";
   }
   else
   {
      $id = $_GET['prdid'];
   }
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favorite']))
   {
   	$cus_id = Session::get('customer_id');
   	$prd_id = $_POST['prdid'];
      $insertFavorite = $prd->insert_favorite($prd_id,$cus_id);
   }
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
   {
   	$login_check = Session::get('customer_login');
		if($login_check)
		{
			$quantily = $_POST['quantily'];
      	$AddCart = $cart->add_cart($quantily, $id);
		}
		else
		{
			header('Location:login.php');
		}
   	
   }

?>

<style>
	.add-wis input.buysubmit {
		margin-top:17px;
		margin-left:10px;
		padding:11px 25px;
		font-size:18px;
    	border: 3px solid;
    	color: red;
    	background: #fff;
}	
	.price p span{
		font-size: 20px;
	}
	.price p {
		font-size: 18px;
	}
	.add-cart input.buysubmit {
		margin-top:16px;
		margin-left:1px;
		padding:13px 75px;
		font-size:18px;
		border: 2px solid;
}
	.add-cart:active{
		transform: scale(0.98);
	}
	.add-wis:active{
		transform: scale(0.98);
	}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    			$get_prd_detail = $prd->get_detail($id); 
    			if($get_prd_detail)
    			{
    				while($result_detail = $get_prd_detail->fetch_assoc())
    				{	   				
    			
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_detail['prd_Image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2 style="font-size:22px;font-weight:bold;color:#0f5debfa;font-family:Monda"><?php echo $result_detail['prd_Name'] ?></h2>				
					<div class="price">
						<p>Giá: <span><?php echo $fm->format_money($result_detail['prd_Price'])." VNĐ" ?></span></p>
						<p>Danh mục: <span><?php echo $result_detail['cate_Name'] ?></span></p>
						<p>Thể loại: <span><?php echo $result_detail['brand_Name'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">	
						<p style="padding:1.5% 1%;color:#666">Số lượng: <input style="width:50px" type="number" class="buyfield" name="quantily" value="1" min="1"/></p>
						<div style="float:right;width:45%">
						<input style=""type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
						</div>
					</form>						
				</div>
				<div class="add-wis">
					<form action=""  method="POST">
						<input type="hidden" name="prdid" value="<?php echo $result_detail['prd_Id'] ?>">
						<input style=""type="submit" class="buysubmit" name="favorite" value="Sản phẩm yêu thích"/>					
					</form>
				</div>
					<div class="clear"></div>
					<div style="margin-top:20px;margin-left:20px">
						<?php 
						if(isset($insertFavorite))
						{
							echo $insertFavorite;
						}
						?>
						
						<?php 
						if(isset($AddCart))
						{ 
							echo '<center><span style = "color:red;font-size:16px;">Sản phẩm đã được thêm vào giỏ hàng trước đó</span></center>';
						}
						?>		
					</div>
					
					<div class="clear"></div>
				</div>
		<div class="product-desc">
			<h2>Mô tả sản phẩm</h2>
			<p><?php echo $result_detail['prd_Des'] ?></p>
	        <p></p>
	   </div>
				
				</div>
			<?php 
					}
				}
			?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục sản phẩm</h2>
					<ul>
						<?php 
							$getall_cate = $cat->show_category_index();
							if($getall_cate)
							{
								while($resultall_cate = $getall_cate->fetch_assoc())
								{						
						?>
				      <li><a href="productbycat.php?catid=<?php echo $resultall_cate['cate_Id'] ?>"><?php echo $resultall_cate['cate_Name'] ?></a></li>	
				      <?php 
				      		}
				      	}
				      ?>			      
    				</ul>
    	
 				</div>	 
 		</div>
		 <!-- <div class="related_product">
    		<div class="heading">
    		<h3>Sản phẩm liên quan</h3>
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
				
			</div> -->
 	</div>
</div>
<?php
		include 'inc/footer.php';
?>

