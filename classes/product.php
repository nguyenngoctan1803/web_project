<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php
	class product
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_product($data, $files)
		{			
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$productDes = mysqli_real_escape_string($this->db->link, $data['productDes']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//kiểm tra hình ảnh và lấy hình ảnh cho 
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image = "uploads/".$unique_image;

			if($productName=="" || $brand=="" || $category=="" || $productDes=="" || $price=="" || $type=="" || $file_name=="" ) 
			{
				$alert = "<span class='error'>Field must be not empty</span>";
				return $alert;
			}
			else
			{
				move_uploaded_file($file_temp, $upload_image);
				$query = "INSERT INTO tbl_product(prd_Name,prd_Price, prd_Image,cate_Id, brand_Id, prd_Des, prd_Type) VALUES('$productName','$price','$unique_image','$category','$brand','$productDes','$type') ";
				$result = $this->db->insert($query);

				if($result)
				{
					$alert = "<span class='success'>Insert Product Successfully</span>";
				}
				else
				{
					$alert = "<span class='error'>Insert Product Not Success</span>";
				}
				return $alert;
			}
		}

		public function show_product()
		{
			$query= "SELECT tbl_product.*, tbl_brand.brand_Name, tbl_category.cate_Name
					FROM tbl_product 
					INNER JOIN tbl_category ON tbl_product.cate_Id = tbl_category.cate_Id
					INNER JOIN tbl_brand ON tbl_product.brand_Id = tbl_brand.brand_Id
					order by tbl_product.prd_Id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getproductbyId($id)
		{
			$query = "SELECT * FROM tbl_product where prd_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_product($data, $files, $id)
		{
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$productDes = mysqli_real_escape_string($this->db->link, $data['productDes']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//kiểm tra hình ảnh và lấy hình ảnh cho 
			$permited = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image = "uploads/".$unique_image;
			if($productName=="" || $brand=="" || $category=="" || $productDes=="" || $price=="" || $type=="" ) 
			{
				$alert = "<span class='error'>Field must be not empty</span>";
				return $alert;
			}
			else
			{
				if(!empty($file_name))
				{
					if($file_size > 2048)
					{
						$alert = "<span class='error'>Image size shoulbe less than 2MB</span>";
						return $alert;					
					}
					elseif(in_array($file_ext, $permited) === false)
					{
						$alert = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						return $alert;						
					}
					$query = "UPDATE tbl_product 
					SET prd_Name = '$productName', 
						brand_Id = '$brand', 
						cate_Id = '$category', 
						prd_Price = '$price', 
						prd_Image = '$unique_image', 
						prd_Des = '$productDes', 
						prd_Type = '$type' 
					WHERE prd_Id = '$id' ";
					
				}
				else
				{
					$query = "UPDATE tbl_product 
					SET prd_Name = '$productName', 
						brand_Id = '$brand', 
						cate_Id = '$category', 
						prd_Price = '$price' , 
						prd_Des = '$productDes' ,
						prd_Type = '$type' 
					WHERE prd_Id = '$id' ";
					
				}

				$result = $this->db->update($query);
				if($result)
				{
					$alert = "<span class='success'>Update Product Successfully</span>";
				}
				else
				{
					$alert = "<span class='error'>Update Product Not Success</span>";
				}
				return $alert;

			}

				
			
		}

		public function delete_product($id)
		{
			$query = "DELETE FROM tbl_product where prd_Id = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'>Delete Product Successfully</span>";
			}
			else
			{
				$alert = "<span class='error'>Delete Product Not Success</span>";
			}
			return $alert;
		}

		//END BACK-END

		public function getproduct_featured()
		{
			$query = "SELECT * FROM tbl_product where prd_Type = '1'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproduct_new()
		{
			$query = "SELECT * FROM tbl_product ORDER BY prd_Id desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_detail($id)
		{
			$query= "SELECT tbl_product.*, tbl_brand.brand_Name, tbl_category.cate_Name
					FROM tbl_product 
					INNER JOIN tbl_category ON tbl_product.cate_Id = tbl_category.cate_Id
					INNER JOIN tbl_brand ON tbl_product.brand_Id = tbl_brand.brand_Id
					WHERE tbl_product.prd_Id = '$id'";			
			$result = $this->db->select($query);
			return $result;
		}
	}
?>