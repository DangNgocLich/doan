<?php 
/**
 * 
 */
class kho extends Controller
{
	function Show(){
	$kho = $this->model("khoModel");
	 $this->view("nav", [
            "Page"=>"kho","sanpham"=>$kho->Getsanpham()]);
	
	}
	function Detail($id){
		$this->view("nav",["Page"=>"detailhoadonnhapkho","id"=>$id]);

	}
	public function modifysanpham($id)
	{
		$kho = $this->model("khoModel");
		if (!isset($_POST["set"])) {
			$_POST["set"]="update";
		}
		if ($_POST["set"]== 'Delete') {
			$kho->deletesanpham($id);
		}
		else{
			$this->view("nav",["Page"=>"updatesanpham","id"=>$id, "sanpham"=>$kho->Getsanpham1($id)]);
		}
	}
	public function updatesanpham()
	{
		$kho = $this->model("khoModel");
		$masach = $_POST["masach"];
		$tensach = $_POST["tensach"];
		$tentg = $_POST["tentg"];
		$theloai= $_POST["theloai"];
		$gia= $_POST["gia"];
		$sl= $_POST["sl"];
		$kho->Updatesanpham($masach,$tensach,$tentg,$theloai,$gia,$sl);
		

	}
	public function modifytheloai($id)
	{
		$kho = $this->model("khoModel");
		if (!isset($_POST["set"])) {
			$_POST["set"]="update";
		}
		if ($_POST["set"]== 'Delete') {
			$kho->deletetheloai($id);
			
		}
		else{
			$this->view("nav",["Page"=>"updatetheloai","id"=>$id, "tentl"=>$kho->Gettentheloai($id)]);
		}
	}
	public function updatetheloai()
	{
		$kho = $this->model("khoModel");
		$tentl = $_POST["tentl"];
		$id = $_POST["id"];
		$kho->updatetheloai($id,$tentl);
	}
	function Addsach(){
		$kho = $this->model("khoModel");
		if (isset($_POST["add"])) {
				$masach = $_POST["masach"];
				$tensach = $_POST["tensach"];
				$tentg = $_POST["tentg"];
				$theloai= $_POST["theloai"];
				$gia= $_POST["gia"];
				$sl= $_POST["sl"];
				$kho->addsach($masach,$tensach,$tentg,$theloai,$gia,$sl);

		}
	}
	function Addtheloai(){
		$kho = $this->model("khoModel");
		if (isset($_POST["addtheloai"])) {
				$tentl = $_POST["tentl"];
				$kho->addtheloai($tentl);

		}
	}

	function theloai(){
	$kho = $this->model("khoModel");
	 $this->view("nav", [
            "Page"=>"theloai","theloai"=>$kho->Gettheloai()]);
	}
	function add(){
		$kho = $this->model("khoModel");
		if (isset($_POST["xoa"])) {
			$kho->Xoadonloi();
			if ($_SESSION["quyen"]==1) {
				header("refresh:0;url=../kho/hoadonnhap");
			}
			else{
				header("refresh:0;url=../");
			}
			
			exit();
		}
		$kho->addhoadonnhapkho();
		$this->addhoadonnhapkho();
	}
	public function hoantathoadonnhapkho()
	{
		$hoadon = $this->model("khoModel");
		if (isset($_POST["done"])) {
			$mahoadon = $_POST["manhapkho"];
		}
		$hoadon->hoantathoadon($mahoadon);
		$this->view("nav",["Page"=>"hoantathoadonnhapkho","hoadon"=>$hoadon->Gethoadonmoinhat()]);
		
	}

	public function addhoadonnhapkho(){

		$hoadon = $this->model("khoModel");
		if (isset($_POST["addhoadon"])) {
				$masach = $_POST["masach"];
				$manhapkho = $_POST["manhapkho"];
				$dongia = $_POST["dongia"];

				$sl = $_POST["sl"];
				$hoadon->addchitiethoadonnhap($manhapkho,$masach,$sl,$dongia);
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
            "Page"=>"addhoadonnhapkho","hoadon"=>$hoadon->Gethoadonmoinhat(),"sanpham"=>$hoadon->Getsanpham()]);
	}
	public function hoadonnhap()
	{
		$hoadon = $this->model("khoModel");
		$this->view("nav",["Page"=>"hoandonnhap","hoadon"=>$hoadon->Gethoadonmoinhat()]);
		
	}
	
}
 ?>
