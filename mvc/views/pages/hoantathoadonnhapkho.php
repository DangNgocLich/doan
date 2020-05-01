
 <?php 
	$result = $data["hoadon"];
	$row = $result->fetch_assoc();
	$manhapkho = $row["MAPHIEUNHAPKHO"];
  $TONGTIEN = $row["TONGTIEN"];
?>
<head>
  <link rel="stylesheet" href="styles.css">
  <script  src="thaotac.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<div id="bang">
	<div id="col"><label>Mã Nhập Kho : </label> <label> <?php echo " ".$row["MAPHIEUNHAPKHO"]; ?></label>	<label style="margin-left: 250px">Thời Gian : </label> <label> <?php echo " ".date("d/m/Y", strtotime($row["NGAYNHAP"])); ?></label></div>
	<div id="col"><label>Mã Nhân Viên : </label> <label> <?php echo " ".$row["MANV"]; ?></label>	</div>
	
	<table class="table table-dark" >

<div id="bang" style="margin-top: 10px; font-size: 150%;">
	<table class="table table-dark" >
  <thead>
    <tr>
    	<th>Mã Nhập Kho</th>
    	<th>Mã Sách </th>
    	<th>Số Lượng</th>
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
		<td>
					
		</td>
		
  	</tr>
  	<?php }} ?>
  </tbody>
   <tfoot>
   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align: right;">Tổng Giá : <?php echo number_format($TONGTIEN).' VND'; ?></td>
    <td></td>
  </tr>
 </tfoot>
</table>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
  window.print();
});
</script>