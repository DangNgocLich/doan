<?php 
/**
 * 
 */
class sukienModel extends DB
{
	public function Getsukien(){
			///connect database
			$sql = "SELECT * FROM sukien";
			$result = $this->conn->query($sql);
			return $result;
	}
	public function Getsukien1($id){
			///connect database
			$sql = "SELECT * FROM sukien where MASUKIEN = '$id'";
			$result = $this->conn->query($sql);
			return $result;
	}
	public function delete($id)
	{
		$sql = "DELETE FROM sukien WHERE  MASUKIEN = '$id'";
			$this->conn->query($sql);
			header("location:../");
	}
	public function add($ma,$ten,$discount)
	{
		if ($ma == "") {
			die("Không có Ma Su Kien".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		}
		$sql = "INSERT INTO sukien
			VALUES ('$ma','$ten','$discount')";
		if ($this->conn->query($sql) === FALSE) {
			die("Thiếu Thông tin ");
		} else {
			header("Location: ../sukien");
		}
	}
	public function update($ma,$ten,$discount)
	{
		$sql = "UPDATE sukien SET TENSUKIEN='$ten' , DISCOUNT = '$discount' WHERE MASUKIEN = '$ma'";
			
			if ($this->conn->query($sql) === FALSE) {
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			else{
				
				header("Location: ../sukien");
				
			}
}
}
 ?>