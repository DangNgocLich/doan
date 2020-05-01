<?php
	require_once 'DB.php'; 
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script  src="../public/js/thaotac.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     <a href="../index.php"> <label class="navbar-brand">BookShop</label></a>
			    </div>
			    <ul class="nav navbar-nav">
			      
			      <?php if ($_SESSION["quyen"]==3) {
			      	# code...
			       ?>
			      <li ><a href="hoadon">HoaDon</a></li>
			  <?php } ?>
			  <?php if ($_SESSION["quyen"]==2) {
			      	
			       ?>
			      <li class="dropdown-submenu">
				<a class="test" tabindex="-1" href="#">Kho <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a tabindex="-1" href="../kho"> Sản Phẩm + Chức Năng Chính</a></li>
				  <li><a tabindex="-1" href="../kho/theloai">Thể loại</a></li>
				  <li><a tabindex="-1" href="../kho/hoadonnhap"> Hóa Đơn Nhập</a></li>
</ul>
			  <?php  } ?>
			  <?php if ($_SESSION["quyen"]==1) {
			      	# code...
			       ?>
			      
			     <li ><a href="hoadon">HoaDon</a></li>
			     <li class="dropdown-submenu">
				<a class="test" tabindex="-1" href="#">Kho <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a tabindex="-1" href="../kho"> Sản Phẩm + Chức Năng Chính</a></li>
				  <li><a tabindex="-1" href="../kho/theloai">Thể loại</a></li>
				  <li><a tabindex="-1" href="../kho/hoadonnhap"> Hóa Đơn Nhập</a></li>

				</ul>
				</li>
			      <li><a href="nhanvien">NhânViên</a></li>
			      <li><a href="sukien">Sự Kiện</a></li>
			      
			  <?php } ?>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="../api/thongtin"><span class="glyphicon glyphicon-user"></span> Thông Tin</a></li>
			      <li><a href="../api/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			    </ul>
			  </div>
			</nav>
<div id="content">
	<?php 
		require_once "./mvc/views/pages/".$data["Page"].".php";
	 ?>
</div>
</body>
</html>
<?php 
	
	
?>
<script>




$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
