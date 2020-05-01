<?php   
  $mahoadon = $data["id"];
  ?>


<div id="bang" style="margin-top: 10px; font-size: 150%;">
	<table class="table table-dark" >
  <thead>
    <tr>
    	<th>Mã Hóa Đơn</th>
    	<th>Mã Sách </th>
    	<th>Số Lượng</th>
    	<th>Đơn Giá</th>

    </tr>
  </thead>
  <tbody>
  	<tr class="item">
  		<?php 

  			$sql = "SELECT * FROM chitiethoadonkho where MAHOADON= $mahoadon";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
  		 ?>
  		<td><?php echo $row["MAHOADON"]; ?></td>
		<td><?php echo $row["MASP"]; ?></td>
		<td><?php echo number_format($row["SOLUONG"]);  ?></td>
		<td><?php echo number_format($row["DONGIA"])." VND";  ?></td>
	

  	</tr>
  	<?php }
  }else{
    echo "string";
  } ?>
  </tbody>
  <tfoot >
  	<tr>
  	<tr>
      <td></td>
      <td></td>
      <td style="text-align: right;"><b>Tổng Tiền:</b> </td>
      <!-- làm thêm hàm mã giảm giá -->

      <?php  
  
        $sql = "SELECT * FROM hoadonnhapkho where MAPHIEUNHAPKHO = '$mahoadon'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
      ?>
      <td>  <?php   echo number_format($row["TONGTIEN"])." VND";  ?></td>
      
    </tr>
  	</tr>
  </tfoot>
</table>
</div>
<div  style="text-align: right;" >
  <button onclick="goBack()">Go Back</button>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>

