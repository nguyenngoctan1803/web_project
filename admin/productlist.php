<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>
<?php include_once '../helper/format.php'?>
<?php 
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productid']))
   	{
       	$id = $_GET['productid'];
        $delProduct = $pd->delete_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block"> 
        	<?php 
        		if(isset($delProduct)) 
        		{
        			echo $delProduct;
        		}
        	?>
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên Sản Phẩm</th>
					<th>Thương Hiệu</th>
					<th>Danh Mục</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Mô Tả</th>
					<th>Loại</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					$pdlist = $pd->show_product();
					if($pdlist)
					{
						$i = 0;
						while($result = $pdlist->fetch_assoc())
						{
							$i++;					
					 
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['prd_Name'] ?></td>
					<td><?php echo $result['brand_Name'] ?></td>
					<td><?php echo $result['cate_Name'] ?></td>
					<td><?php echo $result['prd_Price'] ?></td>
					<td><img src="uploads/<?php echo $result['prd_Image'] ?>" width="50" ></td>
					<td><?php echo $fm->textShorten($result['prd_Des'], 80) ?></td>
					<td><?php 
							if($result['prd_Type'] == 1)
							{
								echo 'Featured';
							}
							else
							{
								echo 'Non_Featured';
							}
						?>							
					</td>
					<td><a href="productedit.php?productid=<?php echo $result['prd_Id'] ?>">Edit</a> || <a href="?productid=<?php echo $result['prd_Id'] ?>">Delete</a></td>
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
