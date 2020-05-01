<?php  
$result = $data["sanpham"];
$row = $result->fetch_assoc();

 ?>
<div >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"> Update Sản Phẩm</h4>
				<button type="button" class="close" data-dismiss="modal" onclick="goBack()">Go Back</button><br>
			</div>
			<div class="modal-body" >
				<form class="well form-horizontal" action="../updatesanpham" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="masach" name="masach" value="<?php echo $row["MASP"] ?>">
					<label>Mã Sách</label>
					<label class="form-control"><?php echo $row["MASP"] ?></label><br>
					<label>Tên Sách</label>
					<input type="text" name="tensach" id="tensach" class="form-control" value="<?php echo $row["TENSP"] ?>"><br>
					<label>Tên Tác Giả</label>
					<input type="text" name="tentg" id="tentg" class="form-control" value="<?php echo $row["TACGIA"] ?>">
					<label>Giá</label>
					<input type="text"name="gia" id="gia"	class="form-control" value="<?php echo $row["DONGIA"] ?>"></textarea>
					<label>Số Lượng</label>
					<input type="text" name="sl" id="sl" class="form-control" value="<?php echo $row["SOLUONG"] ?>">
					<label>Thể Loại</label><br>
					<select name="theloai" id="theloai">
						<?php 
						   echo '<option value="'.$row["MATL"].'">'.$row["TENTL"].'</option>';
						   $matl = $row["MATL"];
						   $sql = "SELECT * FROM theloai  Where MATL !='$matl' ";
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()){
								   	echo '<option value="'.$row["MATL"].'">'.$row["TENTL"].'</option>';
								    }
							?>
							?>
					</select><br><br>
					<label>Ảnh sách </label>
					<input type="file" name="fileUpload" id="fileUpload" class="form-control"><br>

					<button class="btn btn-primary btn-lg btn-block" type="submit" name="add">UPDATE</button>
				</form>
			</div>
			
		</div>
	</div>

</div>
<div  style="text-align: right;" >
  <button ></button>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>