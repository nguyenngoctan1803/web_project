<?php
		include 'inc/header.php';
?>
<?php 
	if(!isset($_GET['catid']) || $_GET['catid']==NULL)
   {
      echo "<script>window.location = '404.php'</script>";
   }
   else
   {
      $id = $_GET['catid'];
   }

   // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
   // {
   //    $updateProduct = $pd->update_product($_POST, $_FILES, $id);
   // }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php 
    			$get_cate_name = $cat->get_prd_cate($id);
	      	if($get_cate_name)
	      	{
	      		$cateName = $get_cate_name->fetch_assoc();
    		?>
    		<h3 style="color:red">Danh mục: <?php echo $cateName['cate_Name'] ?></h3>
    		</div>
    		<?php 
    			}
    		?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php 
	      	$get_prd_cate = $cat->get_prd_cate($id);
	      	if($get_prd_cate)
	      	{
	      		while($result = $get_prd_cate->fetch_assoc())
	      		{      			
	      					
	      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prdid=<?php echo $result['prd_Id']?>"><img src="admin/uploads/<?php echo $result['prd_Image']?>" alt="" /></a>
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