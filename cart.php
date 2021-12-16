<?php
		include 'inc/header.php';
?>
<?php 
	if(isset($_GET['cartid']))
  	{
      $id = $_GET['cartid'];
      $delCart = $cart->delete_cart($id);
   }
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
   {
   	$cart_Id = $_POST['cart_Id'];
   	$quantily = $_POST['quantily'];
      $update_quantily = $cart->Update_Quantily($quantily, $cart_Id);
      if($quantily<=0)
      {
      	$delCart = $cart->delete_cart($cart_Id);
      }
   }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3>Giỏ hàng của bạn</h3> 
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
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Thành tiền</th>
								<th width="10%"><img src="images/waste_104px.png" alt="delete" /></th>
							</tr>
							<?php
								$get_prd_cart = $cart->get_prd_cart();
								if($get_prd_cart)
								{
									$subtotal = 0;
									while($result = $get_prd_cart->fetch_assoc())
									{

							?>
							<tr>
								<td><?php echo $result['cart_Name'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['cart_Image']?>" alt=""/></td>
								<td><?php echo $result['cart_Price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_Id" value="<?php echo $result['cart_Id'] ?>"/>
										<input type="number" name="quantily" min="0" value="<?php echo $result['cart_Quantily']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td>
									<?php 
										$total = $result['cart_Price'] * $result['cart_Quantily'];
										echo $total;
									?>								 	
								</td>
								<td><a href="?cartid=<?php echo $result['cart_Id'] ?>">Xóa</a></td>
							</tr>
							<?php 	
										$subtotal += $total;
									}
								}
							?>								
						</table>
							<?php 
								$check_cart = $cart->check_cart();
								if($check_cart)
								{

								
							?>
						<table style="float:right;text-align:left" width="30%">
							<tr>
								<th width="120px">Tạm tính :</th>
								<td>
									<?php  
										echo $subtotal;
									?>								
								</td>
							</tr>
							<tr>
								<th>Thuế (VAT) :</th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tổng tiền :</th>
								<td>
									<?php 
										$vat = $subtotal * 0.1;
										$sum = $vat + $subtotal;
										echo $sum;
									?>								
								</td>
							</tr>
					   </table>
					   	<?php 
					   		}
					   		else
					   		{
					   			echo '<span style = "color:green;font-size:20px;">Giỏ hàng của bạn trống!Go Shopping!</span>';
					   		}
					   	?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check_out.gif" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
		include 'inc/footer.php';
?>
