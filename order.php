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
<style>
	.order_page{
		font-size: 30px; 
		font-weight: bold;
		color: red;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<div class="order_page">Order Page</div>
    		</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
		include 'inc/footer.php';
?>
