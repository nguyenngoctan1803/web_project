<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>

<?php 
	$prd = new product();
	if(isset($_GET['slideid']) && isset($_GET['type']))
	{
		$slideid = $_GET['slideid'];
		$type = $_GET['type'];
		$updateSlider = $prd->update_slider($slideid,$type);
	}

	if(isset($_GET['delslideid']))
	{
		$slideid = $_GET['delslideid'];
		$delSlider = $prd->delete_slider($slideid);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Slider</h2>
        <div class="block">  
        	<?php 
        		if(isset($delSlider))
        		{
        			echo $delSlider;
        		}
        	?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Image</th>
					<th>Type</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$prd = new product();
					$showSlider = $prd->show_slider_admin();
					if($showSlider)
					{
						$i = 0;
						while($result = $showSlider->fetch_assoc())
						{
							$i++;			
							
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['slide_Name'] ?></td>
					<td><img src="uploads/<?php echo $result['slide_Image'] ?>" height="100px" width="200px"/></td>	
					<td>
						<?php 
							if($result['slide_Type'] == 1)
							{
						?>		
								<a href="?slideid=<?php echo $result['slide_Id']?>&type=0">ON</a>
						<?php 
							}
							else
							{
						?>
								<a href="?slideid=<?php echo $result['slide_Id']?>&type=1">OFF</a>  
						<?php							
							}
						?>
						
						
					</td>			
					<td>
						<a href="?delslideid=<?php echo $result['slide_Id'] ?>">Xóa</a> 
					</td>
				</tr>
				<?php 
						}
					}
				?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
