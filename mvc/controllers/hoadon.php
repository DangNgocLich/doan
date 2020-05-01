<?php 
/**
 * 
 */

class hoadon extends Controller
{

	function Show(){ ///check hoa don
		//models
		$hoadon = $this->model("hoadonbanModel");
		//views
		// $this->kiemtrahoadon();
		$this->view("nav", [
            "Page"=>"hoadon","hoadon"=>$hoadon->gethoadon()]);
	}

	function Detail($id){
		$this->view("nav",["Page"=>"detailhoadon","id"=>$id]);

	}
	function add(){
		$hoadon = $this->model("hoadonbanModel");
		if (isset($_POST["xoa"])) {
			$hoadon->Xoadonloi();
			header("refresh:0;url=../");
			exit();
		}
		$hoadon->addhoadon();
		$this->addhoadon();
	}
	public function addhoadon(){

		$hoadon = $this->model("hoadonbanModel");
		
		if (isset($_POST["addhoadon"])) {
				
				$masach = $_POST["masach"];
				$mahoadon = $_POST["mahoadon"];
				$dongia = $_POST["dongia"];
				$sl = $_POST["sl"];
				$thanhtien= $dongia*$sl;
				$dongia = $_POST["dongia"];
				$hoadon->addchitiethoadonban($mahoadon,$masach,$sl,$dongia,$thanhtien);
		}
		if (isset($_POST["set"])) {
			$masach = $_POST["masach"];
			$manhapkho = $_POST["manhapkho"];
			$sl=$_POST["sl"];

			$set = $_POST["set"];
			$dongia = $_POST["dongia"];
			$hoadon->modifyhoadon($masach,$manhapkho,$sl,$set,$dongia);
			
		}
		$this->view("nav", [
            "Page"=>"addhoadon","hoadon"=>$hoadon->Gethoadonmoinhat(),"sanpham"=>$hoadon->Getsanpham()]);
	}
	public function hoantathoadon()
	{
		$hoadon = $this->model("hoadonbanModel");
		if (isset($_POST["done"])) {
			$mahoadon = $_POST["mahoadon"];
			$tien = $_POST["tien"];
			echo $tien;
		}
		$hoadon->hoantathoadon($mahoadon,$tien);
		$this->view("nav",["Page"=>"hoantathoadon","hoadon"=>$hoadon->Gethoadonmoinhat()]);
		
	}
	public function hoadonnhap()
	{
		$hoadon = $this->model("hoadonbanModel");
		if (isset($_POST["done"])) {
			$mahoadon = $_POST["mahoadon"];
			$tien = $_POST["tien"];
		}
		$hoadon->hoantathoadon($mahoadon,$tien);
		$this->view("nav",["Page"=>"hoantathoadon","hoadon"=>$hoadon->Gethoadonmoinhat()]);
		
	}

}
 ?>
