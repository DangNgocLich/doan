<?php 
/**
 * 
 */
class nhanvienModel extends DB
{
	public function Getnhanvien(){
			///connect database
			$sql = "SELECT * FROM nhanvien";
			$result = $this->conn->query($sql);
			return $result;
	}
	public function Getnhanvien1($id){
			///connect database
			$sql = "SELECT * FROM nhanvien where CMND = '$id'";
			$result = $this->conn->query($sql);
			return $result;
	}
	public function delete($id)
	{
		$sql = "SELECT * FROM nhanvien where CMND = '$id'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row["CHUCVU"]==1) {
			die("Không Xóa Admin".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		}
		$sql = "DELETE FROM nhanvien WHERE  CMND = '$id'";
			$this->conn->query($sql);
			header("location:../");
	}
	public function add($hoten,$cmnd,$sdt,$password,$chucvu)
	{

		if ($cmnd == "" || (strlen($cmnd)!=9 &&  strlen($cmnd) != 12)) {
			die("CMND Không hợp lệ	".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		}
		$sql = "INSERT INTO nhanvien
			VALUES ('$cmnd','$hoten','$sdt','$chucvu','$password')";
		if ($this->conn->query($sql) === FALSE) {
			die("Thiếu Thông tin ");
		} else {
			header("Location: ../nhanvien");
		}
	}
	public function update($hoten,$cmnd,$sdt,$password,$chucvu)
	{
		$sql = "UPDATE nhanvien SET TENNV='$hoten' , SDT = '$sdt' , CHUCVU = '$chucvu' , MATKHAU = '$password' WHERE CMND = '$cmnd'";
			
			if ($this->conn->query($sql) === FALSE) {
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			else{
				
				header("Location: ../nhanvien");
				
			}
}
}
 ?>