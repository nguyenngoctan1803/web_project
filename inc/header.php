<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	include 'lib/database.php';
	include 'helper/format.php';

	spl_autoload_register(function($className)
	{
		include_once "classes/".$className.".php";
	});
	
	$db = new Database();
	$fm = new Format();
	$user = new user();
	$cart = new cart();
	$cat = new category();	
	$prd = new product();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
<<<<<<< HEAD
				<a href="index.php"><img src="images/logoTYM.png" alt="" /></a>
=======
				<a href="index.php"><img src="images/tym.png" alt="" /></a>
>>>>>>> 78d26b77a432192c0fb9fce63d5113726b1e7f7b
			</div>
			<div class="header_top_right">
			   <div class="search_box">	
				    <form>
				    	<input type="text" value="Tìm kiếm sản phẩm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm sản phẩm';}"/> <input type="image" src="images/searchh.png" width="30"/>		   			
				    </form>
			   </div>
		   		<div class="account">
		   			<div>
		   				<input type="image" name="login" value="cart" src="images/cart.png" width="35">
		   				<input type="image" name="login" value="heart" src="images/heart.png" width="35">
		   				<input type="image" name="login" value="cart" src="images/admin.png" width="35">
		   			</div>
		   				
		   
		   				
		   		</div>
		 		<div class="clear"></div>
	 		</div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>