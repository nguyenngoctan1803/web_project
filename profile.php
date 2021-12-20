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

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    			<h3>THÔNG TIN TÀI KHOẢN</h3>
    			</div>
    			<div class="clear"></div>
    		</div>
    		<table style="border:1px solid" class="tblone">
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
    			<tr></tr> 			
    			<?php
    					} 
    				}
    			?>
    		</table>
    		<tr>
    			<center style="margin:50px"><td colspan="3" style="color:#fff"><a href="editprofile.php" style="border-radius:5px;padding:10px;color:#fff;background:#000">Chỉnh sửa thông tin</a></td></center>
    		</tr>

 		</div>
	</div>
<?php
		include 'inc/footer.php';
?>

