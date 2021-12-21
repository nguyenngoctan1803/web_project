<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/cart.php');
?>

<?php 
	$cart = new cart();
	//update
	if(isset($_GET['sendid']))
    {
        $id = $_GET['sendid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $send = $cart->send_order($id,$time,$price);
    }
    //đã giao
    if(isset($_GET['receiveid']))
    {
        $id = $_GET['receiveid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $receive = $cart->receive_order($id,$time,$price);
    }
   	//xóa
   	if(isset($_GET['removeid']))
    {
        $id = $_GET['removeid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $remove = $cart->remove_order($id,$time,$price);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Tất Cả Đơn hàng</h2>
                <div class="block"> 
                <?php 
                	if(isset($send))
                	{
                		echo $send;
                	}
                ?>     
                <?php 
                	if(isset($receive))
                	{
                		echo $receive;
                	}
                ?>      
                <?php 
                	if(isset($remove))
                	{
                		echo $remove;
                	}
                ?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Số Thứ Tự</th>
							<th width="20%">Sản Phẩm</th>
							<th width="10%">Số Lượng</th>
							<th width="10%">Giá</th>
							<th width="15%">Thời Gian</th>
							<th width="10%">Thông Tin</th> 
							<th width="10%">Trạng Thái</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$ct = new cart();
							$get_order_admin = $ct->get_order_admin();
							if($get_order_admin)
							{
								$i = 0;
								while($result = $get_order_admin->fetch_assoc())
								{						
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['order_Name']?></td>
							<td><?php echo $result['order_Quantily']?></td>
							<td><?php echo $result['order_Price']?></td>
							<td><?php echo $result['order_Date']?></td>
							<td>
								<a href="customer.php?customerid=<?php echo $result['cus_Id'] ?>">Xem Đầy Đủ</a>
							</td>
							<td>
								<?php 
									if($result['order_Status']=='0')
									{
								?>
										<a href="?sendid=<?php echo $result['order_Id']?>&price=<?php echo $result['order_Price']?>&time=<?php echo $result['order_Date'] ?>">Xử Lí</a>
								<?php 
									}
									elseif($result['order_Status']=='1')
									{		
								?>							
										<a href="?receiveid=<?php echo $result['order_Id']?>&price=<?php echo $result['order_Price']?>&time=<?php echo $result['order_Date'] ?>">Đã Giao</a>
								<?php 
									}
									else
									{
								?>
										<a href="">Đã Xong</a>
								<?php
									}
								?>
								
							</td>
						</tr>
						<?php 
								}
							}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
