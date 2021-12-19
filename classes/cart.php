<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php
	class cart
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function add_cart($quantily, $id)
		{
			$quantily = $this->fm->validation($quantily);
			$quantily = mysqli_real_escape_string($this->db->link, $quantily);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_product WHERE prd_Id = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$Name = $result['prd_Name'];
			$Price = $result['prd_Price'];
			$Image = $result['prd_Image'];

			$check_cart = "SELECT * FROM tbl_cart WHERE prd_Id = '$id' AND ss_Id = '$sId'";
			$checkcart = $this->db->select($check_cart);
			if($checkcart)
			{
				$mes = "Sản phẩm đã được thêm vào giỏ hàng trước đó";
				return $mes;
			}
			else
			{				
				$query_insert = "INSERT INTO tbl_cart(prd_Id, ss_Id, cart_Name, cart_Price, cart_Quantily, cart_Image) 					VALUES('$id','$sId','$Name','$Price','$quantily','$Image')";

				$insert_cart = $this->db->insert($query_insert); 

				if($insert_cart)
				{
					header('Location:cart.php');
				}
				else
				{
					header('Location:404.php');
				}
			}	
		}

		public function get_prd_cart()
		{
			// code...
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE ss_Id = '$sId'";
			$result = $this->db->select($query);

			return $result;
		}

		public function Update_Quantily($quantily, $id)
		{
			$quantily = mysqli_real_escape_string($this->db->link, $quantily);
			$cart_Id = mysqli_real_escape_string($this->db->link, $id);

			$query = 	"UPDATE tbl_cart 
						SET cart_Quantily = '$quantily'  						
						WHERE cart_Id = '$cart_Id'";
			$result = $this->db->update($query);
			if($result)
			{			
				$mes = "<span style ='color:green;font-size:20px;'>Cập nhật giỏ hàng thành công</span>";
				return $mes;
			}
			else
			{
				$mes = "<span style ='color:red;font-size:20px;'>Cập nhật giỏ hàng không thành công</span>";
				return $mes;
			}
		}
		public function delete_cart($id)
		{
			// code...
			$id = mysqli_real_escape_string($this->db->link, $id);
			$query = "DELETE FROM tbl_cart WHERE cart_Id = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				header('Location:cart.php');
			}
			else
			{
				$mes = "<span class='error'>Xóa sản phẩm không thành công</span>";
				return $mes;
			}
			
		}

		public function check_cart()
		{
			$sId = session_id();
			$query = "SELECT *FROM tbl_cart WHERE ss_Id = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function check_order($id)
		{
			$query = "SELECT *FROM tbl_order WHERE cus_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function destroy_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE ss_Id = '$sId'";
			$result = $this->db->delete($query);
			return $result;
		}

		public function insert_order($id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE ss_Id = '$sId'";
			$get_cart = $this->db->select($query);
			if($get_cart)
			{
				while($result = $get_cart->fetch_assoc())
				{
					$prdid = $result['prd_Id'];
					$cusid = $id;
					$name = $result['cart_Name'];
					$quantily = $result['cart_Quantily'];
					$price = $result['cart_Price'] * $quantily;
					$image = $result['cart_Image'];
			
					$query_insert = "INSERT INTO tbl_order(prd_Id,cus_Id,order_Name,order_Price,order_Image,order_Quantily) VALUES('$prdid','$cusid','$name','$price','$image','$quantily')";

					$insert_order = $this->db->insert($query_insert); 					
				}
			}
		}

		public function get_order($id)
		{
			$query = "SELECT * FROM tbl_order WHERE cus_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delete_order($id)
		{
			$query = "DELETE  FROM tbl_order WHERE order_Id = '$id'";
			$result = $this->db->delete($query);
			return $result;
		}


		public function get_order_admin()
		{
			$query = "SELECT * FROM tbl_order ORDER BY order_Date desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function send_order($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET order_Status = '1' WHERE order_Id = '$id' AND order_Date = '$time' AND order_Price = '$price'";
			$result = $this->db->update($query);
			if($result)
			{
				$mes = "<span class='success'>Xử lí đơn hàng thành công</span>";
				return $mes;
			}
			else
			{
				$mes = "<span class='error'>Xử lí đơn hàng không thành công</span>";
				return $mes;
			}	
			
		}

		public function receive_order($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET order_Status = '2' WHERE order_Id = '$id' AND order_Date = '$time' AND order_Price = '$price'";
			$result = $this->db->update($query);
			if($result)
			{
				$mes = "<span class='success'>Giao hàng thành công</span>";
				return $mes;
			}
			else
			{
				$mes = "<span class='error'>Giao hàng không thành công</span>";
				return $mes;
			}	
			
		}

		public function remove_order($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order WHERE order_Id = '$id' AND order_Date = '$time' AND order_Price = '$price'";
			$result = $this->db->delete($query);
			if($result)
			{
				$mes = "<span class='success'>Xóa đơn hàng thành công</span>";
				return $mes;
			}
			else
			{
				$mes = "<span class='error'>Xóa đơn hàng không thành công</span>";
				return $mes;
			}	
		}
	}
?>