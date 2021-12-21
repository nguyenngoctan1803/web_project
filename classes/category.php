<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php
	class category
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_category($catName)
		{
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			

			if(empty($catName)) 
			{
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}
			else
			{
				$query = "INSERT INTO tbl_category(cate_Name) VALUES('$catName') ";
				$result = $this->db->insert($query);

				if($result)
				{
					$alert = "<span class='success'>Insert Category Successfully</span>";
				}
				else
				{
					$alert = "<span class='error'>Insert Category Not Success</span>";
				}
				return $alert;
			}
		}

		public function show_category()
		{
			$query = "SELECT * FROM tbl_category order by cate_Id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_category_index()
		{
			$query = "SELECT * FROM tbl_category order by cate_Id asc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getcatebyId($id)
		{
			$query = "SELECT * FROM tbl_category where cate_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_prd_cate($id)
		{
			$query= "SELECT tbl_product.*, tbl_category.cate_Name
					FROM tbl_product 
					INNER JOIN tbl_category ON tbl_product.cate_Id = tbl_category.cate_Id					
					WHERE tbl_product.cate_Id = '$id' order by cate_Id desc LIMIT 8";			
			$result = $this->db->select($query);
			return $result;
		}

		public function get_prd_brand($id)
		{
			$query= "SELECT tbl_product.*, tbl_brand.brand_Name
					FROM tbl_product 
					INNER JOIN tbl_brand ON tbl_product.brand_Id = tbl_brand.brand_Id					
					WHERE tbl_product.brand_Id = '$id' order by brand_Id desc LIMIT 8";			
			$result = $this->db->select($query);
			return $result;
		}

		public function update_category($catName, $id)
		{
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)) 
			{
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}
			else
			{
				$query = "UPDATE tbl_category SET cate_Name = '$catName' WHERE cate_Id = '$id' ";
				$result = $this->db->update($query);

				if($result)
				{
					$alert = "<span class='success'>Update Category Successfully</span>";
				}
				else
				{
					$alert = "<span class='error'>Update Category Not Success</span>";
				}
				return $alert;
			}
		}

		public function delete_category($id)
		{
			$query = "DELETE FROM tbl_category where cate_Id = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'>Delete Category Successfully</span>";
			}
			else
			{
				$alert = "<span class='error'>Delete Category Not Success</span>";
			}
			return $alert;
		}
	}
?>