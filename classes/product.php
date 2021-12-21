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

		public function search_product($keyword)
		{
			$keyword = $this->fm->validation($keyword);
			$query = "SELECT * FROM tbl_product WHERE prd_Name LIKE '%$keyword%'";
			$result = $this->db->select($query);
			return $result;
		}



		public function insert_slider($data, $files)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['slidername']);		
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

			if($name=="" || $type=="") 
			{
				$alert = "<span class='error'>Field must be not empty</span>";
				return $alert;
			}
			else
			{
				if(!empty($file_name))
				{
					if($file_size > 10000000)
					{
						$alert = "<span class='error'>Image size shoulbe not too large</span>";
						return $alert;					
					}
					elseif(in_array($file_ext, $permited) === false)
					{
						$alert = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						return $alert;						
					}
			
					move_uploaded_file($file_temp, $upload_image);
					$query = 
					"INSERT INTO tbl_slider(slide_Name,slide_Image,slide_Type) VALUES('$name','$unique_image','$type')";
					$result = $this->db->insert($query);

					if($result)
					{
						$alert = "<span class='success'>Insert Slider Successfully</span>";
					}
					else
					{
						$alert = "<span class='error'>Insert Slider Not Success</span>";
					}
					return $alert;
				}
			}
				
		}
		
		public function show_slider()
		{
			$query = "SELECT * FROM tbl_slider WHERE slide_Type='1' order by slide_Id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_slider($id,$type)
		{
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET slide_Type='$type' WHERE slide_Id = '$id'";
			$result = $this->db->update($query);
			return $result;
		}

		public function delete_slider($id)
		{
			$query = "DELETE FROM tbl_slider WHERE slide_Id = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'>Xóa slide thành công</span>";
				return $result;
			}
			else
			{
				$alert = "<span class='error'>Xóa slide không thành công</span>";
				return $result;
			}
		}

		public function show_slider_admin()
		{
			$query = "SELECT * FROM tbl_slider order by slide_Id desc";
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
					if($file_size > 10000000)
					{
						$alert = "<span class='error'>Image size shoulbe less than 2MB</span>";
						return $alert;					
					}
					elseif(in_array($file_ext, $permited) === false)
					{
						$alert = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						return $alert;						
					}

					move_uploaded_file($file_temp, $upload_image);
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
		public function get1()
		{
			$query = "SELECT * FROM tbl_product WHERE brand_Id='1' ORDER BY prd_Id desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get2()
		{
			$query = "SELECT * FROM tbl_product WHERE brand_Id='5' ORDER BY prd_Id desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get3()
		{
			$query = "SELECT * FROM tbl_product WHERE brand_Id='3' ORDER BY prd_Id desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get4()
		{
			$query = "SELECT * FROM tbl_product WHERE brand_Id='8' ORDER BY prd_Id desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function insert_favorite($prdid,$cusid)
		{
			$prdid = mysqli_real_escape_string($this->db->link, $prdid);
			$cusid = mysqli_real_escape_string($this->db->link, $cusid);

			$check_login = Session::get('customer_login');
			if(!$check_login)
			{
				header('Location:login.php');
			}
			else
			{
				$query_check = "SELECT * FROM tbl_wishlist WHERE prd_Id = '$prdid' AND cus_Id ='$cusid'";
				$result_check = $this->db->select($query_check);
				if($result_check)
				{
					$mes = '<center><span class="error">Bạn đã được thêm vào danh sách sản phẩm yêu thích trước đó</span></center>';
					return $mes;
				}
				else
				{
					$query_prd = "SELECT * FROM tbl_product WHERE prd_Id='$prdid'";
					$result_prd = $this->db->select($query_prd)->fetch_assoc();

					$name = $result_prd['prd_Name'];
					$price = $result_prd['prd_Price'];
					$image = $result_prd['prd_Image'];

					$query_insert = "INSERT INTO tbl_wishlist(cus_Id,prd_Id,wish_Name,wish_Price,wish_Image) VALUES('$cusid','$prdid','$name','$price','$image')";
					$result_insert = $this->db->insert($query_insert);

					if($result_insert)
					{
						$mes = '<center><span class="success">Đã thêm vào danh sách sản phẩm yêu thích</span></center>';
					}
					else
					{
						$mes = '<center><span class="error">Thêm vào danh sách sản phẩm yêu thích không thành công</span></center>';
					}
					return $mes;
				}
			}
		}

		public function get_favorite($id)
		{
			$query = "SELECT * FROM tbl_wishlist WHERE cus_Id = '$id' ORDER BY wish_Id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function remove_favorite($prdid, $cusid)
		{
			$query = "DELETE FROM tbl_wishlist WHERE prd_Id = '$prdid' AND cus_Id = '$cusid'";
			$result = $this->db->delete($query);
			return $result;
		}
	}
?>