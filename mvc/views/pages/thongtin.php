<?php 
	$manv = $_SESSION["username"];
	$sql = "SELECT * FROM nhanvien where CMND = '$manv'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
 ?>
 <div class="modal-body" >
    <form class="well form-horizontal" action="../api/update" method="POST" enctype="multipart/form-data">

    <label>HoTen</label>
    <input type="text" name="hoten" id="hoten" class="form-control" value="<?php echo $row["TENNV"] ?>">

    <label>SDT</label>
    <input type="text" name="sdt" id="sdt" class="form-control" value="<?php echo $row["SDT"] ?>">
<label>Password</label><br>
                    <input   name="password" id="password" class="form-control" value="<?php echo $row["MATKHAU"] ?>"><br>
    <br>
    <br>
    <input type="submit" name="set" value="UPDATE" class="btn btn-primary btn-lg btn-block">
    <input type="hidden" name="cmnd" value="<?php echo $row["CMND"] ?>">
    </form>
</div>
<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss ="modal"> Close</button>
</div>