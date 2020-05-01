
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
              Tạo Nhân Viên </button>
   <h3>Bảng Nhân Viên</h3>
        </td>

    </tr>
    
</table>

<table class="table table-dark">

  <thead>
    <tr>
     <th>Tên Nhân Viên</th>
        <th>SDT</th>
        <th>CMND</th>
        <th>Chức vụ</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php
          
          
          $result = $data["nhanvien"];
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
          
  ?>  
      <th scope="row"><?php echo $row["TENNV"]; ?></th>
      <td><?php echo $row["SDT"]; ?></td>
      <td><?php echo $row["CMND"]; ?></td>
      <td>
        <?php 
        
        switch ($row["CHUCVU"]) {

          case '3':
            echo "Thu Ngân";
            break;
            case '2':
             echo "Kho";
            break;
          default:
             echo "admin";
            break;
        }
         ?>
      </td>
      <td>
      <form action="../nhanvien/modifynhanvien/<?php echo $row["CMND"]; ?>" method="POST">
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
                <h4 class="modal-title"> Tạo Nhân Viên </h4>
                <br>
                <button type="button" class="close" data-dismiss="modal">&times;</button><br>
                
            </div>
            <div class="modal-body" >
                <form class="well form-horizontal" action="./nhanvien/add" method="POST" enctype="multipart/form-data">
                    
                    <label>HoTen</label>
                    <input type="text" name="hoten" id="hoten" class="form-control">
                    <label>CMND</label>
                    <input type="text" name="cmnd" id="cmnd" class="form-control">
                    <label>SDT</label>
                    <input type="text" name="sdt" id="sdt" class="form-control">
                    <label>Password</label><br>
                    <input type="password" name="password" id="password" class="form-control"><br>
                    <select id="chucvu" name="chucvu">
                      <option value="3">Thu Ngân</option>
                      <option  value="2">Kho</option>
                    </select>
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
    