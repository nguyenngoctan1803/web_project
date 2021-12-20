<?php
		include 'inc/header.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php 
   			if($_SERVER['REQUEST_METHOD'] == 'POST')
   			{
      			$keyword = $_POST['keyword'];
      			if($keyword == '')
      			{
      				header('Location:index.php');
      			}
      			else
      			{
      				$searchPrd = $prd->search_product($keyword);
      			}
   			}
			 ?>
    		<h3 style="color:green">Sản phẩm cho: <?php echo $keyword ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php 
	      	if($searchPrd)
	      	{
	      		while($result = $searchPrd->fetch_assoc())
	      		{      			
	      					
	      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prdid=<?php echo $result['prd_Id']?>"><img src="images/sach1.jpg" alt="" /></a>
					 <h2><?php echo $fm->textShorten($result['prd_Name'],30)?></h2> 
					 <p><?php echo $fm->textShorten($result['prd_Des'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->format_money($result['prd_Price'])." VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?prdid=<?php echo $result['prd_Id']?>" class="details">Chi tiết</a></span></div>
				</div>	
			<?php 
					}
				}
				else
				{
						echo '<span style = "color:red;font-size:20px;">Danh mục này không tồn tại</span>';
				}
			?>			
			</div>

	
	
    </div>
 </div>
 
<?php
		include 'inc/footer.php';
?>