<?php 
	class apiModel extends DB
	{
		public function logout(){

			// remove all session variables
			session_unset();

			// destroy the session
			session_destroy(); 
			header("Location: ../index.php");

		}
		public function update($hoten,$cmnd,$sdt,$password)
		{
			$sql = "UPDATE nhanvien SET TENNV='$hoten' , SDT = '$sdt' , MATKHAU = '$password' WHERE CMND = '$cmnd'";
			
			if ($this->conn->query($sql) === FALSE) {
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			else{
				
				header("Location: ../");
				
			}
		}
	}
 ?>