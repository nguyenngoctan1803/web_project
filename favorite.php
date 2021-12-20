<?php
		include 'inc/header.php';
?>

<?php 
	if(isset($_GET['prdid']))
   {
   	$cus_id = Session::get('customer_id');
   	$prd_id = $_GET['prdid'];
      $removeFavorite = $prd->remove_favorite($prd_id,$cus_id);
   }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3 style="color:red">Sản phẩm yêu thích</h3> 
			    	<?php 
			    		if(isset($update_quantily))
			    		{
			    			echo $update_quantily;
			    		}
			    	?>
			    	<?php 
			    		if(isset($delCart))
			    		{
			    			echo $delCart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">Số lượng</th>
								<th width="25%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th> 
								<th width="10%"></th>
							</tr>
							<?php
								$customerid = Session::get('customer_id');
								$getFavorite = $prd->get_favorite($customerid); 
								if($getFavorite)
								{
									$i = 0;
									while($result = $getFavorite->fetch_assoc())
									{
										$i++;

							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['wish_Name'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['wish_Image']?>" alt=""width="100px"/></td>
								<td><?php echo $fm->format_money($result['wish_Price'])." VNĐ" ?></td>
								<td>
									<a href="?prdid=<?php echo $result['prd_Id'] ?>">Xóa</a> || 
									<a href="details.php?prdid=<?php echo $result['prd_Id'] ?>">Mua ngay</a>
								</td>														
							</tr>
							<?php 	
										
									}
								}
							?>								
						</table>						
					</div>
					<div style="margin:100px">
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
		include 'inc/footer.php';
?>
