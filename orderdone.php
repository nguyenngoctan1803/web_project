<?php
		include 'inc/header.php';
?>
<?php 
	if(isset($_GET['orderid']))
  	{
      $id = $_GET['orderid'];
      $delOrder = $cart->delete_order($id);
      header('Location:orderdone.php');
   }
?>
<?php 
	$cusid = Session::get('customer_id');
	if(!$cusid)
	{
		header('Location:login.php');
	}
?>
<style>
	.box_prd {
    	width: 95%; 
    	padding: 20px;
    	float: left;
    	margin: 10px;
    	border: 2px solid #2c55a5;
	}
	.infoorder {
    	margin-top: 50px;
   	font-size: 30px;
    	font-weight: bold;
    	text-align: center;
	}
	center.submit_order {
    	margin: 50px;	
    	margin-top: 20px;
    	padding: 50px;    	
   }
   center.submit_order:active{
    	transform: scale(0.95);
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
    		<div class="infoorder">
    			<h3>THÔNG TIN ĐƠN HÀNG</h3>
    		</div>
    		<div class="clear"></div>  
    		<div class="box_prd">
    			<div class="cartpage">    					    	
						<table class="tblone">
							<tr>
								<th width="3%"></th>
								<th width="20%" style="font-size:15px">Tên sản phẩm</th>
								<th width="20%" style="font-size:15px">Hình ảnh</th>
								<th width="7%"style="font-size:15px">Số lượng</th>
								<th width="12%"style="font-size:15px">Giá</th>	
								<th width="15%"style="font-size:15px">Thành tiền</th>
								<th width="13%"style="font-size:15px">Ngày</th>			
								<th width="15%"style="font-size:15px">Trạng thái</th>		
								<th width="5%"style="font-size:15px">Hủy</th>															
							</tr>
							<?php 
								$cusid = Session::get('customer_id');
								$get_order = $cart->get_order($cusid);
								if($get_order)
								{
									$sumtotal = 0;
									$i = 0;
									while($result = $get_order->fetch_assoc())
									{		
										$i++;

							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['order_Name'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['order_Image'] ?>" alt="" width="100px"></td>
								<td><?php echo $result['order_Quantily'] ?></td>
								<td><?php echo $fm->format_money($result['order_Price'])." VNĐ" ?></td>	
								<td>
									<?php 
										$total = $result['order_Price']*$result['order_Quantily'];
										echo $fm->format_money($total)." VNĐ" 
									?>
								</td>	
								<td>
									<?php 
										$date = date_create($result['order_Date']);
										echo date_format($date,"d/m/Y");
									?>
								</td>	
								<td>
									<?php 
										if($result['order_Status']=='0')
										{
											echo "Đang xử lí";
										}
										elseif($result['order_Status']=='1')
										{
											echo "Đang giao...";
										}
										else
										{
											echo "Đã nhận";
										}
										
									?>
									
								</td>	
								<td>
									<?php 
										if($result['order_Status']=='0')
										{
											echo '<a href="orderdone.php?orderid='.$result['order_Id'].'" title="Hủy">X</a>';
										}									
										else
										{
											echo '';
										}
									?>
								</td>					
							</tr>
							<?php 
										$sumtotal += $total;
								
									}
								}
							?>						
						</table>
						<table style="float:right;text-align:left;margin:15px" width="37%">
							<tr>
								<td>
									Tổng: 
									<?php
										echo $fm->format_money($sumtotal)." VNĐ";
									?>
								</td>
							</tr>
							<!-- <tr>
								<th width="120px">Tạm tính :</th>
								<td>
									<?php  
										echo $fm->format_money($sumtotal)." VNĐ";
									?>						
								</td>
							</tr>
							<tr>
								<th>Thuế (VAT) :</th>
								<td>10% (<?php echo $fm->format_money($sumtotal * 0.1)?> VNĐ) </td>
							</tr>
							<tr>
								<th>Tổng tiền :</th>
								<td>
									<?php 
										$vat = $sumtotal * 0.1;
										$sum = $vat + $sumtotal;
										echo $fm->format_money($sum)." VNĐ";
									?>													
								</td>
							</tr> -->
					   </table>
					   	
					</div>
    			</div>
   
		</div>			
 	</div>
</div>
</form>

<?php
		include 'inc/footer.php';
?>

