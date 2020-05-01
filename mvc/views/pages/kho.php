<!DOCTYPE html>
<html>
<head>

</head>
<body>


			
<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="control" style="text-align: left; font-weight: bold; font-size:25px">
        <td colspan="8">
			<button type="button" name="addsach" class="btn btn-warning" data-toggle="modal" data-target="#add_data_Modal">
			 Tạo Sách</button>
			 
			 <h3>Bảng Sản Phẩm</h3>
        </td>

    </tr>
</table>

<div style="margin-top: 20px; margin-left: 950px;">
	<form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control mr-sm-2" name="ma" type="search" placeholder="Search with code" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     <a href="./kho">Refresh</a>
    </form>
</div>

<table class="table table-dark">

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

		if (isset($_POST["ma"])) {
   			$ma=$_POST["ma"];
   			$sql = "SELECT * FROM sanpham INNER JOIN theloai ON sanpham.MATL = theloai.MATL WHERE MASP='$ma'";
   			$result = $conn->query($sql);
   		}
   		else{
   			$result = $data["sanpham"];
   		}
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
					
	?>	
		<th scope="row"><img style="height: 100px; width: 100px;" src="./public/img/<?php echo $row["anh"]; ?>"></th>
		<td><?php echo $row["TENSP"]; ?></td>
		<td><?php echo $row["MASP"]; ?></td>
		<td><?php echo $row["TENTL"]; ?></td>
		<td><?php echo $row["TACGIA"]; ?></td>
		<td><?php echo number_format($row["SOLUONG"]);  ?></td>
		<td><?php echo number_format($row["DONGIA"]) ." VND";  ?></td>
		<td><?php echo number_format($row["LUOTMUA"]);  ?></td>
	<td>
			<form action="./kho/modifysanpham/<?php echo $row["MASP"]; ?>" method="POST">
					<input type="submit" name="set" value="Update">
					<input  type="hidden" name="masach" id="masach" value="<?php echo $row["MASP"]; ?>">
					<input type="submit" name="set" value="Delete">
			</form>
		</td>
		
			</tr>
			<?php }} ?>
  </tbody>
</table>




	
</body>

<div id="add_data_Modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"> Nhập Sản Phẩm</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button><br>
			</div>
			<div class="modal-body" >
				<form class="well form-horizontal" action="./kho/Addsach" method="POST" enctype="multipart/form-data">
					<label>Mã Sách</label>
					<input type="text" name="masach" id="masach" class="form-control"><br>
					<label>Tên Sách</label>
					<input type="text" name="tensach" id="tensach" class="form-control"><br>
					<label>Tên Tác Giả</label>
					<input type="text" name="tentg" id="tentg" class="form-control">
					<label>Giá</label>
					<input type="text"name="gia" id="gia"	class="form-control"></textarea>
					<label>Số Lượng</label>
					<input type="text" name="sl" id="sl" class="form-control">
					<label>Thể Loại</label><br>
					<select name="theloai" id="theloai">
						<?php 
							$sql = "SELECT * FROM theloai ";
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()){
								   	echo '<option value="'.$row["MATL"].'">'.$row["TENTL"].'</option>';
								    }
							?>
					</select><br><br>
					<label>Ảnh sách </label>
					<input type="file" name="fileUpload" id="fileUpload" class="form-control"><br>
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="add">Add</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss ="modal"> Close</button>
			</div>
		</div>
	</div>

</div>
 



</html>