<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="control" style="text-align: left; font-weight: bold; font-size:25px">
        <td colspan="4">
			<button type="button" name="addcasi" class="btn btn-warning" data-toggle="modal" data-target="#add_data_Modal1">
			 Tạo Thể Loại</button>
        </td>

    </tr>
</table>

			

			 <div style="text-align: center;"><h3>Bảng Thể Loại</h3></div>


<div style="margin-top: 20px; margin-left: 950px;">
	<form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control mr-sm-2" name="ma" type="search" placeholder="Search with code" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     <a href="./theloai">Refresh</a>
    </form>
</div>

<table class="table table-dark">

  <thead>
    <tr>
    	

    	<th>Tên Thể Loại </th>

    	<th>Action</th>
    </tr>
  </thead>
  <tbody>
   <tr class="item">
   	<?php

		if (isset($_POST["ma"])) {
   			$ma=$_POST["ma"];
   			$sql = "SELECT * FROM theloai WHERE TENTL='$ma'";
   			$result = $conn->query($sql);
   		}
   		else{
   			$result = $data["theloai"];
   		}
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
					
	?>	
	
		<td><?php echo $row["TENTL"]; ?></td>

		<td>
			<form action="./modifytheloai/<?php echo $row["MATL"] ?>" method="POST">
					<input type="submit" name="set" value="Update">
					<input  type="hidden" name="masach" id="masach" value="<?php echo $row["MASP"]; ?>">
					<input type="submit" name="set" value="Delete">
			</form>
		</td>
		
			</tr>
			<?php }} ?>
  </tbody>
</table>


<div id="add_data_Modal1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"> Tạo Thể Loại</h4>
				<br>
				<button type="button" class="close" data-dismiss="modal">&times;</button><br>
				
			</div>
			<div class="modal-body" >
				<form class="well form-horizontal" action="../kho/Addtheloai" method="POST" enctype="multipart/form-data">
					
					<label>Tên Thể Loại</label>
					<input type="text" name="tentl" id="tentl" class="form-control" ></textarea>
					<button class="btn btn-primary btn-lg btn-block" name="addtheloai" type="submit">Add</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss ="modal"> Close</button>
			</div>
		</div>
	</div>

</div>

</html>