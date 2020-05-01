
 <!DOCTYPE html>
<html>
<head>
    <title></title>
   
</head>
<body>

  
<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="4">
             <button type="button" name="addcasi" class="btn btn-warning" data-toggle="modal" data-target="#add_data_Modal2"> 
              Tạo Sự Kiện </button>
   <h3>Bảng Sự Kiện</h3>
        </td>

    </tr>
    
</table>

<table class="table table-dark">

  <thead>
    <tr>
     
        <th>Mã Sự Kiện</th>
        <th>Tên Sự Kiện</th>
        <th>Discount</th>
        
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php
          
          
          $result = $data["sukien"];
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
          
  ?>  
      <th scope="row"><?php echo $row["MASUKIEN"]; ?></th>
      <td><?php echo $row["TENSUKIEN"]; ?></td>
      <td><?php echo $row["DISCOUNT"]; ?>%</td>

      <td>
			<form action="../sukien/modifysukien/<?php echo $row["MASUKIEN"]; ?>" method="POST">
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
<div id="add_data_Modal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tạo Sự Kiện </h4>
                <br>
                <button type="button" class="close" data-dismiss="modal">&times;</button><br>
                
            </div>
            <div class="modal-body" >
                <form class="well form-horizontal" action="../sukien/add" method="POST" enctype="multipart/form-data">
                    
                    <label>Mã Sự Kiện</label>
                    <input type="text" name="ma" id="hoten" class="form-control">
                    <label>Tên Sự Kiên</label>
                    <input type="text" name="ten" id="cmnd" class="form-control">
                    <label>Discount</label>
                    <input type="text" name="discount" id="sdt" class="form-control">
                    
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss ="modal"> Close</button>
            </div>
        </div>
    </div>

</div>

</html>
