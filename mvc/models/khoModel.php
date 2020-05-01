<?php 
	/**
	 * 
	 */
	class khoModel extends DB
	{
		public function Getsanpham(){
			///connect database
			$sql = "SELECT * FROM sanpham INNER JOIN theloai ON sanpham.MATL = theloai.MATL";
			$result = $this->conn->query($sql);
			return $result;
		}
		public function Getsanpham1($id){
			///connect database
			$sql = "SELECT * FROM sanpham INNER JOIN theloai ON sanpham.MATL = theloai.MATL where MASP= '$id'";
			$result = $this->conn->query($sql);
			return $result;
		}
		public function deletetheloai($id)
		{
			
			$sql = "DELETE FROM theloai WHERE  MATL = '$id'";
			$this->conn->query($sql);
			header("location:../theloai");
		}
		public function deletesanpham($id)
		{
			$sql = "DELETE FROM sanpham WHERE  MASP = '$id'";
			$this->conn->query($sql);
			header("location:../");
		}
		public function Gettentheloai($id)
		{

			$sql = "SELECT * FROM theloai where MATL = '$id'";
			$result= $this->conn->query($sql);
			$row = $result->fetch_assoc();
			return $row["TENTL"];
		}
		public function Updatesanpham($masach,$tensach,$tentg,$theloai,$gia,$sl)
		{
			
			$target_dir1 = "./public/img/";
			$file_name1 = basename($_FILES["fileUpload"]["name"]);
			$target_file_anh = $target_dir1 . $file_name1;
			if($gia<1000){
				 die("Giá Sai".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		    
			}
			if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file_anh)) {
		        die("Thiếu File Ảnh".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		    }
		    
			$sql = "UPDATE sanpham SET TENSP='$tensach' , TACGIA = '$tentg' , MATL = '$theloai' , DONGIA = '$gia' , SOLUONG = '$sl' , anh = '$file_name1' WHERE MASP = '$masach'";
			
			if ($this->conn->query($sql) === FALSE) {
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			else{
				if ($_SESSION["quyen"]==1) {
				header("Location: ../kho");
				}
				else{
				header("Location: ../");
			}
			}
		}
		public function Updatetheloai($id,$tentl)
		{
			$sql = "SELECT * FROM theloai where TENTL = '$tentl'";
			$result= $this->conn->query($sql);
			if($result->num_rows>0){
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			$sql = "UPDATE theloai SET TENTL='$tentl' WHERE MATL = '$id'";
			if ($this->conn->query($sql) === FALSE) {
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			if ($_SESSION["quyen"]==1) {
				header("Location: ../kho/theloai");
			}
			else{
				header("Location: ../theloai");
			}
		}
		 public function Xoadonloi()
		{
		   	$sql = "SELECT * FROM hoadonnhapkho";
		   	$result = $this->conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
					
						if ($row["TONGTIEN"]=="0") {
							$sql = "DELETE FROM hoadonnhapkho WHERE MAPHIEUNHAPKHO='".$row["MAPHIEUNHAPKHO"]."'";
							mysqli_query($this->conn, $sql);
						}
					}
				}

		}
		public function addtheloai($tentl)
		{
			$sql = "SELECT * FROM theloai where TENTL = '$tentl'";
			$result= $this->conn->query($sql);
			if($result->num_rows>0){
				die("Thong Tin Loi".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			$sql = "INSERT INTO theloai (TENTL) VALUES ('$tentl')";		
			if ($this->conn->query($sql) === FALSE) {
				echo "Thong Tin Loi";
				echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>';
			}
			header("Location: ../kho/theloai");
		}
		public function Gettheloai(){
			///connect database
			$sql = "SELECT * FROM theloai";
			$result = $this->conn->query($sql);
			return $result;
		}
			public function addhoadonnhapkho(){
			$manv=$_SESSION["manv"];
			$sql1 = "INSERT INTO hoadonnhapkho (MANV) VALUES ('$manv')";
			$this->conn->query($sql1);
			
		}
		public function addchitiethoadonnhap($mahoadon,$masach,$sl,$dongia){

			$sql = "INSERT INTO chitiethoadonkho VALUES ('$mahoadon','$masach','$sl','$dongia')";
			$this->conn->query($sql);
			// echo $masach;
		}
		public function addchitiethoadonban($mahoadon,$masach,$sl,$dongia,$thanhtien){

			$sql = "INSERT INTO chitiethoadonban VALUES ('$mahoadon','$masach','$sl','$dongia','$thanhtien')";
			$this->conn->query($sql);
		}
		public function Gethoadonmoinhat(){
			///connect database
			$sql = "SELECT *
						FROM hoadonnhapkho
						ORDER BY MAPHIEUNHAPKHO DESC";
			$result = $this->conn->query($sql);
			return $result;
		}
		public function modifyhoadon($masach,$manhapkho,$sl,$set,$dongia)
		{
			if($set=='Delete'){
				$sql = "DELETE FROM chitiethoadonkho WHERE MAHOADON = '$manhapkho' and MASP = $masach";
			}

			else{
				$sql = "UPDATE chitiethoadonkho SET SOLUONG='$sl' WHERE MAHOADON = '$manhapkho' and MASP = '$masach' ";
			}
			if ($this->conn->query($sql) === FALSE) {
				echo "Thong Tin Loi";
				echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>';
			}
		}
		public function hoantathoadon($mahoadon)
		{
			
			$sql = "SELECT *,SUM(DONGIA) as tien , SUM(SOLUONG) as sl FROM chitiethoadonkho where MAHOADON =$mahoadon";
			
				if ($this->conn->query($sql)) {
						$result = $this->conn->query($sql);
				}
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$data=$row['MASP'];
						$tien = $row["tien"];
						$sl=$row["SOLUONG"];
						$tien= ($sl*$tien);
						$sql = "UPDATE sanpham SET SOLUONG= SOLUONG+'$sl' WHERE MASP = '$data'";
						if($this->conn->query($sql) === FALSE) {
							die("Error: " . $sql . $conn->error);
						}

						$sql = "UPDATE hoadonnhapkho SET TONGTIEN= $tien WHERE MAPHIEUNHAPKHO =$mahoadon";
						if($this->conn->query($sql) === FALSE) {
							die("Error: " . $sql . $this->conn->error);
						}
					}
				}
		}
		public function addsach($masach,$tensach,$tentg,$theloai,$gia,$sl)
		{
			if($gia<1000){
				 die("Giá Sai".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		    
			}
			if ($masach=="") {
				die("Vui Long Dien Ma Sach".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
			}
			$target_dir1 = "./public/img/";
			$file_name1 = basename($_FILES["fileUpload"]["name"]);
			$target_file_anh = $target_dir1 . $file_name1;
			if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file_anh)) {
		        die("Thiếu File Ảnh".'<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>');
		    }
			$sql = "INSERT INTO sanpham 
					VALUES ('$masach','$file_name1','$tensach','$tentg','$theloai','$sl','$gia','0')";
			if ($this->conn->query($sql) === FALSE) {
				echo "Thong Tin Loi";
						echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Vui Long Quay lai</a></p>';
			}
			else{
					if ($_SESSION["quyen"]==1) {
						header("location: ../kho");
					}
					else {
							header("location: ../");
					}
			}
		}
	}
 ?>
 	