<?php 
	/**
	 * 
	 */
	class hoadonbanModel extends DB
	{
		public function Gethoadon(){
			///connect database
			$sql = "SELECT * FROM hoadon";
			$result = $this->conn->query($sql);
			return $result;
		}
		 public function Xoadonloi()
		{
		   	$sql = "SELECT * FROM hoadon";
		   	$result = $this->conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
					
						if ($row["TONGIA"]=="0") {
							$sql = "DELETE FROM hoadon WHERE MAHOADON='".$row["MAHOADON"]."'";
							mysqli_query($this->conn, $sql);
						}
					}
				}

		}
		public function Gethoadonmoinhat(){
			///connect database
			$sql = "SELECT *FROM hoadon
					INNER JOIN sukien where hoadon.MASUKIEN = sukien.MASUKIEN
					ORDER BY MAHOADON DESC";
			$result = $this->conn->query($sql);
			return $result;
		}
		public function addhoadon(){
			$manv=$_SESSION["manv"];
			$sql1 = "INSERT INTO hoadon (MANV,MASUKIEN) VALUES ('$manv','0')";
			$this->conn->query($sql1);
			
		}
		public function Getsanpham(){
			///connect database
			$sql = "SELECT * FROM sanpham INNER JOIN theloai ON sanpham.MATL = theloai.MATL";
			$result = $this->conn->query($sql);
			return $result;
		}
		public function addchitiethoadonban($mahoadon,$masach,$sl,$dongia,$thanhtien){

			$sql = "INSERT INTO chitiethoadonban VALUES ('$mahoadon','$masach','$sl','$dongia','$thanhtien')";
			$this->conn->query($sql);
		}
		public function hoantathoadon($mahoadon,$tien)
		{
			
			$sql = "SELECT *, SUM(DONGIA) as tien, SUM(SOLUONG) as sl FROM chitiethoadonban where MAHOADON =$mahoadon";

				
				if ($this->conn->query($sql)) {
						$result = $this->conn->query($sql);
						
				}
				

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$data=$row['MASP'];
						$sl=$row["SOLUONG"];
						
						
						$sql = "UPDATE sanpham SET SOLUONG= SOLUONG-'$sl', LUOTMUA= LUOTMUA+'$sl' WHERE MASP = '$data'";
						if($this->conn->query($sql) === FALSE) {
							die("Error: " . $sql . $conn->error);
						}
						
						$sql = "UPDATE hoadon SET TONGIA= $tien WHERE MAHOADON =$mahoadon";
						if($this->conn->query($sql) === FALSE) {
							die("Error: " . $sql . $conn->error);
						}
					}
				}
		}


		public function modifyhoadon($masach,$manhapkho,$sl,$set,$dongia)
		{
			
			


			if($set=='Delete'){
				$sql = "DELETE FROM chitiethoadonban WHERE MAHOADON = '$manhapkho' and MASP = $masach";
			}

			else{
				$tien = $sl*$dongia;
				echo $tien;
				$sql = "UPDATE chitiethoadonban SET SOLUONG='$sl',THANHTIEN ='$tien'  WHERE MAHOADON = '$manhapkho' and MASP = '$masach'  ";
			}
			
			if ($this->conn->query($sql) === FALSE) {
				echo "Thong Tin Loi";
				echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>';
			}
		}

	}
 ?>
 	