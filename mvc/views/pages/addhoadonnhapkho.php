<?php 
	$result = $data["hoadon"];
	$row = $result->fetch_assoc();
	$manhapkho = $row["MAPHIEUNHAPKHO"];
?>
<head>

</head>
<div id="bang">
	<div id="col"><label>Mã Nhập Kho : </label> <label> <?php echo " ".$row["MAPHIEUNHAPKHO"]; ?></label>	</div>
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
  		 ?>
  		 <th scope="row"><img style="height: 100px; width: 100px;" src="../public/img/<?php echo $row["anh"]; ?>"></th>
		<td><?php echo $row["TENSP"]; ?></td>
		<td><?php echo $row["MASP"]; ?></td>
		<td><?php echo $row["TENTL"]; ?></td>
		<td><?php echo $row["TACGIA"]; ?></td>
		<td><?php echo number_format($row["SOLUONG"]);  ?></td>
		<td><?php echo number_format($row["DONGIA"]);  ?></td>
		<td><?php echo number_format($row["LUOTMUA"]);  ?></td>

		<td><button class="collapsible">Nhập</button>
			<div class="content">
				<form action="./addhoadonnhapkho" method="POST">
					 <input type="text" name="sl" size="1">
					 <button type="submit" name="addhoadon"> Nhập</button>
					 
					 <input  type="hidden" name="masach" id="masach" value="<?php echo $row["MASP"]; ?>">
					  <input  type="hidden" name="dongia" id="masach" value="<?php echo $row["DONGIA"]; ?>">
					 <input type="hidden" name="manhapkho" id="manhapkho" value="<?php echo $manhapkho ?>">
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
    	<th>Mã Nhập Kho</th>
    	<th>Mã Sách </th>
    	<th>Số Lượng</th>
    	<th>Giá</th>
    	<th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<tr class="item">
  		<?php 
  			$sql = "SELECT * FROM chitiethoadonkho where MAHOADON= $manhapkho";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
  		 ?>
  		<td><?php echo $row["MAHOADON"]; ?></td>
		<td><?php echo $row["MASP"]; ?></td>
		<td><?php echo number_format($row["SOLUONG"]);  ?></td>
		<td><?php echo number_format($row["DONGIA"]);  ?></td>
		<td>
			<button class="collapsible">Action</button>
			<div class="content">
				<form action="./addhoadonnhapkho" method="POST">
					 <input type="text" name="sl" size="1">
					 <input type="submit" name="set" value="Update">|<input type="submit" name="set" value="Delete">

					 <input  type="hidden" name="masach" id="masach" value="<?php echo $row["MASP"]; ?>">
					 <input type="hidden" name="manhapkho" id="manhapkho" value="<?php echo $manhapkho ?>">
					 <input type="hidden" name="dongia" id="dongia" value="<?php echo$row["DONGIA"]; ?>">
				</form>
				</form>		
		</td>
		
  	</tr>
  	<?php }} ?>
  </tbody>
</table>
</div>
<div id="footer"><form action="./hoantathoadonnhapkho" method="POST"><button name="done">Done</button> <input type="hidden" name="manhapkho" id="manhapkho" value="<?php echo $manhapkho ?>"> </form></div>




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
</script>