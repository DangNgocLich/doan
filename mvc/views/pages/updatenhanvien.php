<?php 
$result = $data["nhanvien"];
$row = $result->fetch_assoc();

 ?>
<div >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Update Nhân Viên </h4>
                <br>
                <button type="button" class="close" data-dismiss="modal" onclick="goBack()">Go Back</button><br>
                
            </div>
            <div class="modal-body" >
                <form class="well form-horizontal" action="../update" method="POST" enctype="multipart/form-data">
                    
                    <label>HoTen</label>
                    <input type="text" name="hoten" id="hoten" class="form-control" value="<?php echo $row["TENNV"] ?>">
                    <label>CMND</label>
                    <label class="form-control">  <?php echo $row["CMND"] ?></label>
                    <input type="hidden" name="cmnd" id="cmnd" class="form-control" value="<?php echo $row["CMND"] ?>">
                    <label>SDT</label>
                    <input type="text" name="sdt" id="sdt" class="form-control" value="<?php echo $row["SDT"] ?>">
                    <label>Password</label><br>
                    <input   name="password" id="password" class="form-control" value="<?php echo $row["MATKHAU"] ?>"><br>
                    <select id="chucvu" name="chucvu">
                      <option value="3" <?php if ($row["CHUCVU"]==1) {
                          echo("selected");
                      } ?>>Thu Ngân</option>
                      <option  value="2" <?php if ($row["CHUCVU"]==2    ) {
                          echo("selected");
                      } ?>>Kho</option>
                    </select>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss ="modal"> Close</button>
            </div>
        </div>
    </div>

</div>
<script>
function goBack() {
  window.history.back();
}
</script>