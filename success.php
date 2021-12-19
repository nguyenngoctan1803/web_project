<?php
		include 'inc/header.php';
?>
<!-- <?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order')
   {
      $cus_id = Session::get('customer_id');
      $insertOrder = $cart->insert_order($cus_id);
      $deytroyCart = $cart->destroy_cart();
      header('Location:success.php');
   }
   else
   { 
      echo "<script>window.location = '404.php'</script>";
   }
 
?> -->
<style>
	center.submit_order {
    	margin: 50px;	
    	margin-top: 20px;
    	padding: 50px;    	
   }

	h2.submit_order { 	
    	font-size: 25px;
    	font-weight: bold;
    	color: green;  	
    	margin-bottom: 20px;
	}

</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">	
    		<center class="submit_order">
 				<h2 class="submit_order">Đặt hàng thành công</h2>
 				<p>TYM Bookstore cảm ơn bạn đã mua hàng tại website của chúng tôi</p>
 				<p>Nhân viên sẽ liên hệ với bạn sớm nhất có thể, vui lòng kiểm tra đơn hàng <a href="orderdone.php" style="text-decoration:underline;font-size:17px">Tại đây</a></p>
 			</center>
		</div>			
 	</div>
 		
</div>
</form>
<?php
		include 'inc/footer.php';
?>

