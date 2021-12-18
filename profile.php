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
	// if(!isset($_GET['prdid']) || $_GET['prdid']==NULL)
 //   {
 //      echo "<script>window.location = '404.php'</script>";
 //   }
 //   else
 //   {
 //      $id = $_GET['prdid'];
 //   }
 //   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
 //   {
 //   	$quantily = $_POST['quantily'];
 //      $AddCart = $cart->add_cart($quantily, $id);
 //   }
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
    			<tr>
    				<td colspan="3"><a href="editprofile.php">Chỉnh sửa thông tin</a></td>
    			</tr>
    			<tr>  				
    				<td colspan="3"><a href="editprofile.php">Chỉnh sửa thông tin</a></td>
    			</tr>
    			<?php
    					} 
    				}
    			?>
    		</table>
 		</div>
	</div>
<?php
		include 'inc/footer.php';
?>

