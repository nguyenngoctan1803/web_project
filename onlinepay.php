<?php
		include 'inc/header.php';
?>
<?php 
	$login_check = Session::get('customer_login');
	if(!$login_check)
	{
	  	header('Location:login.php');
	}
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
			    	<h3 style="color:red">Thanh toán</h3> 
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
						<table style="border:1px solid" class="tblone">
							<tr>
								<th width="25%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="20%">Số lượng</th>
								<th width="20%">Thành tiền</th>
								<th width="10%"></th>
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
								<td><?php echo $fm->format_money($result['cart_Price'])." VNĐ" ?></td>
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
										echo $fm->format_money($total)." VNĐ";
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
										echo $fm->format_money($subtotal)." VNĐ";
									?>								
								</td>
							</tr>
							<tr>
								<th>Thuế (VAT) :</th>
								<td>10% (<?php echo $fm->format_money($subtotal*0.1)." VNĐ" ?>)</td>
							</tr>
							<tr>
								<th>Tổng tiền :</th>
								<td>
									<?php 
										$vat = $subtotal * 0.1;
										$sum = $vat + $subtotal;
										echo $fm->format_money($sum)." VNĐ";
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
					<style type="text/css">
						a.btn-thanhtoan{
							margin: 6px auto;
						}
						.btn-success{
							//display: block;
							cursor: pointer;
							background: green;
							color: #FFF;
							font-size: 18px;
							margin: 30px;
							padding: 10px;
							width:  250px;
							text-align: center;
							border-radius: 3px;
							border: 0px;
						}

					</style>
					<?php
						$check_cart =  $cart->check_cart();
						if(Session::get('customer_id')==true && $check_cart)
						{

					?>	
					<div style="height: 200px; margin-top: 30px">
						<div style="float: left;width: 33%; text-align: right">			
						<form action="vnpay.php" method="POST">
							<input type="hidden" name="total" value="<?php echo $sum ?>">
                  		<button class="btn btn-success" name="redirect" id="redirect">Thanh toán VNPAY</button>
               	</form>
     					</div>
     					<div style="float: left;width: 33%;text-align: center">
               	<form action="momo.php" method="POST">
							<input type="hidden" name="total" value="<?php echo $sum ?>">
                  		<button style="background: red" class="btn btn-success" name="captureWallet">Thanh toán QR MOMO</button>
               	</form>
               	</div>
               	<div style="float: right;width: 34% ;text-align: left">
               	<form action="momo.php" method="POST">
							<input type="hidden" name="total" value="<?php echo $sum ?>">
                  		<button style="background: red" class="btn btn-success" name="payWithATM">Thanh toán ATM MOMO</button>   
               	</form>
               	</div>
               </div>
					</div>
					<?php 
						}
						else
						{

					?>
						<a href="cart.php" class="btn btn-success btn-thanhtoan">Quay về giỏ hàng</a>
					<?php 
						}
					?>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
		include 'inc/footer.php';
?>
