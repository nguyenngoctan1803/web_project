<?php
		include 'inc/header.php';
?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order')
   {
      $cus_id = Session::get('customer_id');
      $insertOrder = $cart->insert_order($cus_id);
      $deytroyCart = $cart->destroy_cart();
      header('Location:success.php');
   }
?>
<style>
	.box_prd {
    	width: 45%;
    	padding: 20px;
    	float: left;
    	border: 2px solid #2c55a5;
	}
	.box_account {
    	width: 45%;
    	padding: 20px;
    	float: right;
    	border: 2px solid #2c55a5;
	}
	center.submit_order {
    	margin: 50px;	
    	margin-top: 20px;
    	padding: 50px;    	
   }
   center.submit_order:active{
    	transform: scale(0.95);
	}
	center.submit_order:hover{
    	transform: scale(1.1);
	}
	a.submit_order {
    	border: none;
    	border-radius:8px;
    	background: red;
    	font-size: 25px;
    	font-weight: bold;
    	color: white;
    	padding: 10px 70px;
	}

</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">	
    		<div class="heading">
    			<h3>THANH TOÁN KHI NHẬN HÀNG</h3>
    		</div>
    		<div class="clear"></div>  
    		<div class="box_prd">
    			<div class="cartpage">
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
								<th width="5%"></th>
								<th width="30%" style="font-size:15px">Tên sản phẩm</th>
								<th width="25%"style="font-size:15px">Giá</th>
								<th width="15%"style="font-size:15px">Số lượng</th>
								<th width="25%"style="font-size:15px">Thành tiền</th>
							</tr>
							<?php
								$get_prd_cart = $cart->get_prd_cart();
								if($get_prd_cart)
								{
									$subtotal = 0;
									$i=0;
									while($result = $get_prd_cart->fetch_assoc())
									{
										$i++;

							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['cart_Name'] ?></td>
								<td><?php echo $fm->format_money($result['cart_Price'])." VNĐ" ?></td>
								<td><?php echo $result['cart_Quantily'] ?></td>
								<td>
									<?php 
										$total = $result['cart_Price'] * $result['cart_Quantily'];
										echo $fm->format_money($total)." VNĐ";
									?>	
								</td>
							</tr>							 									
							<?php 	
										$subtotal += $total;
									}
								}
							?>	
								
							</tr>						
						</table>
							<?php 
								$check_cart = $cart->check_cart();
								if($check_cart)
								{

								
							?>
						<table style="float:right;text-align:left;margin:15px" width="50%">
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
								<td>10% (<?php echo $fm->format_money($subtotal * 0.1)." VNĐ"?>)</td>
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
    			</div>
    		<div class="box_account">
    			<div class="cartpage">
    				<table class="tblone">
    			<?php 
    			$id = Session::get('customer_id');
    				$get_info_cus = $cus->show_info($id); 
    				if($get_info_cus)
    				{
    					while($result = $get_info_cus->fetch_assoc())
    					{
    				 
    			?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td><?php echo $result['cus_Name']?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $result['cus_Address']?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $result['cus_Phone']?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['cus_Email']?></td>
    			</tr>
    			<?php
    					} 
    				}
    			?>
    		</table>
    		</div>
    			<tr>
    				<center><td colspan="3" style="color:#fff"><a href="editprofile.php" style="margin-top:10px;border-radius:5px;padding:10px;color:#fff;background:#000">Chỉnh sửa thông tin</a></td></center>
    			</tr>
    		</div>
		</div>			
 	</div>
 		<center class="submit_order">
 			<a href="?orderid=order" class="submit_order" title="Đặt hàng" type="submit" name="order">Đặt hàng</a>
 		</center>
</div>
</form>
<?php
		include 'inc/footer.php';
?>

