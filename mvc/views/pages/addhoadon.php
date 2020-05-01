<?php 

			$result = $data["hoadon"];
			$row = $result->fetch_assoc();
			$mahoadon = $row["MAHOADON"];
?>
<head>
  
</head>
<div id="bang">
	<div id="col"><label>Mã Hóa Đơn : </label> <label> <?php echo " ".$row["MAHOADON"]; ?></label>	</div>
	<div id="col"><label>Mã Nhân Viên : </label> <label> <?php echo " ".$row["MANV"]; ?></label>	</div>
	<div id="col">
	<table class="table table-dark" >
  <thead>
    <tr>
    	<th>Image</th>
    	<th>Tên Sách </th>
    	<th>Mã Sách</th>
    	<th>Thể loại</th>
    	<th>Tác Giả</th>
    	<th>Số Lượng</th>
    	<th>Giá</th>
    	<th>Lượt Mua</th>
    	<th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<tr class="item">
  		<?php 
  		
			$result = $data["sanpham"];
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
          if($row["SOLUONG"]<=0){
            continue ;
          }
  		 ?>
  		 <th scope="row"><img style="height: 100px; width: 100px;" src="../public/img/<?php echo $row["anh"]; ?>"></th>
		<td><?php echo $row["TENSP"]; ?></td>
		<td><?php echo $row["MASP"]; ?></td>
		<td><?php echo $row["TENTL"]; ?></td>
		<td><?php echo $row["TACGIA"]; ?></td>
		<td><?php echo number_format($row["SOLUONG"]);  ?></td>
		<td><?php echo number_format($row["DONGIA"]);  ?></td>
		<td><?php echo number_format($row["LUOTMUA"]);  ?></td>

		<td><button class="collapsible">Chọn</button>
			<div class="content">
				<form action="./addhoadon" method="POST">
					 <input type="text" name="sl" size="2">
					 <button type="submit" name="addhoadon">Thêm</button>
					 <input  type="hidden" name="masach" id="masach" value="<?php echo $row["MASP"]; ?>">
					 <input type="hidden" name="mahoadon" id="mahoadon" value="<?php echo $mahoadon ?>">
					 <input type="hidden" name="dongia" id="dongia" value="<?php echo $row["DONGIA"]; ?>">
				</form>
			
			</div></td>
		
  	</tr>
  	<?php }} ?>
  </tbody>
</table></div>

</div>



<div id="bang" style="margin-top: 10px; font-size: 150%;">
	<table class="table table-dark" >
  <thead>
    <tr>
    	<th>Mã Hóa Đơn</th>
    	<th>Mã Sách </th>
    	<th>Số Lượng</th>
    	<th>Đơn Giá</th>
    	<th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<tr class="item">
  		<?php 

  			$sql = "SELECT * FROM chitiethoadonban where MAHOADON= $mahoadon";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
  		 ?>
  		<td><?php echo $row["MAHOADON"]; ?></td>
		<td><?php echo $row["MASP"]; ?></td>
		<td><?php echo number_format($row["SOLUONG"]); ?></td>
		<td><?php echo number_format($row["DONGIA"]);  ?></td>
		<td>
			<button class="collapsible">Action</button>
			<div class="content">
				<form action="./addhoadon" method="POST">
          <input type="hidden" name="dongia" value="<?php echo $row["DONGIA"]; ?>">
					 <input type="text" name="sl" size="1">
					 <input type="submit" name="set" value="Update">|<input type="submit" name="set" value="Delete">
					 <input  type="hidden" name="masach" id="masach" value="<?php echo $row["MASP"]; ?>">
					 <input type="hidden" name="manhapkho" id="manhapkho" value="<?php echo $mahoadon ?>">
				</form>
	
		</td>

  	</tr>
  	<?php }} ?>
  </tbody>
  <tfoot >
  	<tr>
  		<td></td>
  		<td></td>
  		<td></td>
  		<td></td>
  		<td >
  			<button class="collapsible">Discount</button>
			<div class="content">
				<form action="" method="POST">
					 <input type="text" name="ma" size="1">
					 <input type="hidden" name="manhapkho" id="manhapkho" value="<?php echo $mahoadon ?>">
					 <button>Nhập</button>
					 <?php 

					 	if(isset($_POST["ma"])){
					 		$ma = $_POST["ma"];
					 		$sql = "SELECT * FROM sukien where MASUKIEN= $ma";
					 		$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$sql = "UPDATE hoadon set MASUKIEN= $ma where MAHOADON=$mahoadon ";
								$conn->query($sql);
							}

					 	}
					  ?>
				</form>
  		</td>
  	</tr>
  	<tr>
  		<td></td>
  		<td></td>
  		<td></td>
  		<td>
  			Tổng Tiền:
  		</td>
  		<?php  
  			$sql = "SELECT *, SUM(THANHTIEN) as tien FROM chitiethoadonban where MAHOADON=$mahoadon";
  			$result = $conn->query($sql);
  			$row = $result->fetch_assoc();
  			$tien = $row["tien"];

  			$sql = "SELECT * FROM hoadon INNER JOIN sukien ON hoadon.MASUKIEN = sukien.MASUKIEN where MAHOADON=$mahoadon";
  			$result = $conn->query($sql);
  			$row = $result->fetch_assoc();
  			
  			if ($row["MASUKIEN"]!="0") {
  				$tiengiamgia=$tien*$row["DISCOUNT"]/100;
  				$tien=$tien-$tiengiamgia;
  			}
  		?>
  		<td><?php   echo number_format($tien)." VND"; ?></td>
  		
  	</tr>
  </tfoot>
</table>
</div>
<div id="footer"><form action="./hoantathoadon" method="POST"><button name="done">Done</button> <input type="hidden" name="mahoadon" id="mahoadon" value="<?php echo $mahoadon ?>"> <input type="hidden" name="tien" value="<?php echo $tien; ?>"> </form></div>

<div  style="text-align: right;" >
  <button onclick="goBack()">Go Back</button>
</div>



<script type="text/javascript">
	var coll = document.getElementsByClassName("collapsible");
	var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
function goBack() {
  window.history.back();
}

</script>