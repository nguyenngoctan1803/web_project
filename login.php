<?php
		include 'inc/header.php';
?>
<?php 
	$login_check = Session::get('customer_login');
	if($login_check)
	{
		header('Location:index.php');
	}		   				
?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
	{
		$insertCus = $cus->insert_customer($_POST);
	}
?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']))
	{
		$loginCus = $cus->login_customer($_POST);
	}
?>



 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Nhập Email và mật khẩu:</p>
        	<form action="" method="POST">
                <input name="email" type="text" class="field" placeholder="Enter your Email...">
                <input name="password" type="password" class="field" placeholder="Enter your Password...">           
                <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập">      
                								<?php 
    													if(isset($loginCus))
    														{
    															echo $loginCus;
    														}
    												?>
    											</div>
    			</div>
            </form>
          </div>
    	<div class="register_account">
    		<h3>Đăng ký tài khoản</h3>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name..." >
							</div>
													
							<div>
								<input type="text" name="email" placeholder="Enter your Email...">
							</div>
		    			
						<div>
							<input type="text" name="address" placeholder="Enter your Address...">
						</div>        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter your phone...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter your password...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Đăng ký"> 
		   		<?php 
    				if(isset($insertCus))
    				{
    					echo $insertCus;
    				}
    			?></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
<?php
		include 'inc/footer.php';
?>
