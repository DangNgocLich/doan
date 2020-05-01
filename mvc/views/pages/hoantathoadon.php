
 <?php 
	
			$result = $data["hoadon"];
			$row = $result->fetch_assoc();
			$mahoadon = $row["MAHOADON"];
      $giamgia =$row["DISCOUNT"];

?>
<head>
 <head><style type="text/css">
  #bang {
  border: solid 1px;
}
#col{
  font-size: 150%;
  margin: 10px
}
.collapsible {
   background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}
.collapsible:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}
.active, .collapsible:hover {
  background-color: #555;
}
.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
#footer{
  text-align: right;
  margin:10px;
  font-size: 150%;
}
#content a:link:after, #content a:visited:after {    
  content: " ("attr(href) ") ";    
  font-size: 90%;   
}
</style></head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<div id="bang">
	<div id="col"><label>Mã Hóa Đơn : </label> <label> <?php echo " ".$row["MAHOADON"]; ?></label>	<label style="margin-left: 250px">Ngày  : </label> <label> <?php echo " ".date("d/m/Y", strtotime($row["NGAYBAN"])); ?></label></div>
	<div id="col"><label>Mã Nhân Viên : </label> <label> <?php echo " ".$row["MANV"]; ?></label>	</div>
	
  
<table class="table" style=" border-left: solid 1px;">
  <thead>
    <tr>
      <th>Mã Hóa Đơn</th>
      <th>Mã Sách </th>
      <th>Số Lượng</th>
      <th>Đơn Giá</th>
    </tr>
  </thead>
  <tbody style="border-top: solid 3px; ">

    <tr>
        <?php 
        $sql = "SELECT * FROM chitiethoadonban where MAHOADON= $mahoadon";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
       ?>
      <td><?php echo $row["MAHOADON"]; ?></td>
    <td><?php echo $row["MASP"]; ?></td>
    <td><?php echo number_format($row["SOLUONG"]) ; ?></td>
    <td><?php echo number_format($row["DONGIA"]) ." VND";  ?></td>  
    </tr>
        <?php }
  } ?>
  </tbody>
  <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td style="text-align: right;">Giảm Giá:</td>
          <td><?php echo $giamgia."%" ?></td>
      </tr>
        <tr>
        <?php  
        $sql = "SELECT * FROM hoadon where MAHOADON=$mahoadon";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $tien = $row["TONGIA"];
      ?>
      <td></td>
      <td></td>
      <td style="text-align: right;">Tổng Tiền:</td>
      <td>
        <?php  echo number_format($tien)."VND";  ?>
      </td>   
    </tr>
  </tfoot>
</table>
</div>


<script type="text/javascript">
  $( document ).ready(function() {
  window.print();
});
</script>