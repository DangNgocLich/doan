<?php  
$result = $data["sukien"];
$row = $result->fetch_assoc();

 ?>
<div >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tạo Sự Kiện </h4>
                <br>
             <button type="button" class="close" data-dismiss="modal" onclick="goBack()">Go Back</button><br>
                
            </div>
            <div class="modal-body" >
                <form class="well form-horizontal" action="../update" method="POST" enctype="multipart/form-data">
                    
                    <label>Mã Sự Kiện</label>
                    <label class="form-control"><?php echo $row["MASUKIEN"]; ?></label>
                    <input type="hidden" name="ma" id="hoten" class="form-control" value="<?php echo $row["MASUKIEN"]; ?>">
                    <label>Tên Sự Kiên</label>
                    <input type="text" name="ten" id="cmnd" class="form-control" value="<?php echo $row["TENSUKIEN"]; ?>">
                    <label>Discount</label>
                    <input type="text" name="discount" id="sdt" class="form-control" value="<?php echo $row["DISCOUNT"]; ?>">
                    
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                </form>
            </div>

        </div>
    </div>

</div>
<script>
function goBack() {
  window.history.back();
}
</script>