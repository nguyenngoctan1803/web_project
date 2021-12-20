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
   .chose_method {
    transition: auto;
    padding: 50px;
    text-align: center;
   }
   .chose_method a {
      margin: 20px;
      padding: 10px;
      background: black;
      color: #fff;
      border-radius: 5px;
   }
   .chose_method a:hover{
      color: green;
   }

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    			<h3>THANH TOÁN GIỎ HÀNG</h3>
    			</div>
    			<div class="clear"></div>        
    		</div>  	
         <div class="chose_method">
            <a href="offlinepay.php">Thanh toán khi nhận hàng</a>
            <a style="padding:10px 25px " href="onlinepay.php">Thanh toán trực tuyến</a>
            </div>	
 		</div>
	</div>

