
		<?php 
				// require_once './mvc/views/pages/nav.php';
				require_once "./mvc/core/DB.php";
				// require 'checkhoadon.php';
				// var_dump($conn); 
		?>

		 <!-- <?php if ($_SESSION["quyen"]==2) {
		 //	header('Location: kho.php');
		 } ?>
		 <?php 
		// 	
		  ?> -->
		 <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="control" style="text-align: left; font-weight: bold; font-size:25px">
        <td colspan="4">
        	<?php if ($_SESSION["quyen"]==1) {
        		echo '<form action="../kho/add" method="POST">';	
        	}
        	else{
        		echo '<form action="./kho/add" method="POST">';
        	} 
        	?>
			
			<button class="btn btn-warning">Tạo Hóa Đơn</button>
			<button class="btn btn-warning" name="xoa">Xóa Hóa Đơn Chưa Hoàn Tất</button>
				</form>
        </td>

    </tr>
</table>
<div style="margin-top: 20px; margin-left: 950px;">
	<form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control mr-sm-2" name="ma" type="search" placeholder="Search with code" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     <a href="./">Refresh</a>
    </form>
</div>
<table class="table table-dark" style="margin-top: 10px;">

  <thead>
    <tr>
		<th>Mã Hóa Đơn</th>
    	<th>Tổng Tiền </th>
    	<th>Mã Nhân Viên</th>
    	<th>Ngày Nhập</th>
    	<th>Chi Tiết</th>
    </tr>
  </thead>
  <tbody>
   <tr class="item">
   	<?php
   		if (isset($_POST["ma"])) {
   			$ma=$_POST["ma"];
   			$sql = "SELECT * FROM hoadonnhapkho WHERE MAHOADON='$ma'";
   			$result = $conn->query($sql);
   		}
   		else{
   			$result = $data["hoadon"];
   		}
		
		if ($result->num_rows > 0) {
			// output data of each hoadon
			while($hoadon = $result->fetch_assoc()) {
					
	?>	
		<td>
			<?php echo $hoadon["MAPHIEUNHAPKHO"]; ?>
				<?php if ($hoadon["TONGTIEN"]=="0") {
			echo "<td>Hóa Đơn Chưa Hoàn Tất Vui Lòng Xóa<td/><tr><tr/>";
			continue;
		} ?>
			</td>

		<td><?php echo number_format($hoadon["TONGTIEN"])." VND" ?></td>
		<td><?php echo $hoadon["MANV"]; ?></td>
		<td><?php echo $hoadon["NGAYNHAP"]; ?></td>
		<td><form action="../kho/detail/<?php echo $hoadon["MAPHIEUNHAPKHO"];?>" method="POST">
			<button>Detail</button>
			<!-- <input type="hidden" name="ma" value="<?php echo $hoadon["MAHOADON"] ?>"> -->
		</form></td>
		
		
			</tr>
			<?php }
		}

		?>
  </tbody>

</table>

 