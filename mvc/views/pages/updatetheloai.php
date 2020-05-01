
<div >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"> Update Thể Loại</h4>
				<br>
				<button type="button" class="close" data-dismiss="modal" onclick="goBack()">Go Back</button><br>
				
			</div>
			<div class="modal-body" >
				<form class="well form-horizontal" action="../updatetheloai" method="POST" enctype="multipart/form-data">
					
					<label>Tên Thể Loại</label>
					<input type="hidden" name="id" value="<?php echo $data["id"] ?>">
					<input type="text" name="tentl" id="tentl" class="form-control" value="<?php echo $data['tentl']; ?>">
					<button class="btn btn-primary btn-lg btn-block" name="update" type="submit">Update</button>
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