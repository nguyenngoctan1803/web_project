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
   $id = Session::get('customer_id');
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save']))
   {
      $updateCus = $cus->update_cus($_POST, $id);
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
         <form action="" method="POST">
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
               <td><input style="width:500px;height:25px;text-align:center" type="text" name="name"  value="<?php echo $result['cus_Name']?>"></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
               <td><input style="width:500px;height:25px;text-align:center" type="text" name="address"  value="<?php echo $result['cus_Address']?>"></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
               <td><input style="width:500px;height:25px;text-align:center" type="text" name="phone"  value="<?php echo $result['cus_Phone']?>"></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
               <td><input style="width:500px;height:25px;text-align:center" type="text" name="email"  value="<?php echo $result['cus_Email']?>"></td>
    			</tr>
    			<tr>
    				<td colspan="3"><input style="margin-left:206px" type="submit" name="save" value="Save" class="grey"></td>
    			</tr>
            <tr>
               <?php 
                  if(isset($updateCus))
                  {
                     echo '<td colspan="3">'.$updateCus.'</td>';
                  } 
                  else
                  {
                     echo '';
                  }
               ?>
            </tr>
    			<?php
    					} 
    				}
    			?>
    		</table>
      </form>  
 		</div>
	</div>
<?php
		include 'inc/footer.php';
?>

