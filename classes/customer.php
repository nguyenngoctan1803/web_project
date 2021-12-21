<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php
	class customer 
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_customer($data)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($name=="" || $email=="" || $address=="" || $phone=="" || $password=="" ) 
			{
				$alert = "<span class='error'>Thông tin chưa đầy đủ</span>";
				return $alert;
			}
			else
			{
				$check_email = "SELECT * FROM tbl_customer WHERE cus_Email = '$email' LIMIT 1";
				$result_check_email = $this->db->select($check_email);
				if($result_check_email)
				{
					$alert = "<span class='error'>Email đã được sử dụng</span>";
					return $alert;
				}
				else
				{
					$query = "INSERT INTO tbl_customer(cus_Name,cus_Email,cus_Address,cus_Phone,cus_Pass) VALUES('$name','$email','$address','$phone','$password')";
					$result = $this->db->insert($query);

					if($result)
					{
						$alert = "<span class='success'>Đăng kí thành công</span>";
					}
					else
					{
						$alert = "<span class='error'>Đăng kí không thành công</span>";
					}

					return $alert;
				}
			}
		}
		public function login_customer($data)
		{
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));

			if($email=="" || $password=="") 
			{
				$alert = "<span class='error'>Thông tin chưa đầy đủ</span>";
				return $alert;
			}
			else
			{
				$check_login = "SELECT * FROM tbl_customer WHERE cus_Email = '$email' and cus_Pass='$password'";
				$result_check = $this->db->select($check_login);
				if($result_check)
				{
					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['cus_Id']);
					Session::set('customer_name',$value['cus_Name']);
					header('Location:index.php');
				}
				else
				{
					$alert = "<span class='error'>Email hoặc Password không hợp lệ</span>";
					return $alert;
				}
			}
		}

		public function show_info($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE cus_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_cus($data,$id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);			
			if($name=="" || $email=="" || $address=="" || $phone=="") 
			{
				$alert = "<span class='error'>Thông tin chưa đầy đủ</span>";
				return $alert;
			}
			else
			{			
				$query = "UPDATE tbl_customer SET cus_Name='$name',cus_Email='$email',cus_Phone='$phone',cus_Address='$address' 		WHERE cus_Id ='$id'";
				$result = $this->db->update($query);
				if($result)
				{
					$alert = "<span class='success'>Cập nhật thông thành công</span>";
				}
				else
				{
					$alert = "<span class='error'>Cập nhật thông tin không thành công</span>";
				}

				return $alert;
			}
		}
	}
?>