<?php 
/**
 * 
 */
class nhanvien extends Controller
{
	function Show(){
		$nhanvien = $this->model("nhanvienModel");
		// views
		
		$this->view("nav", [
            "Page"=>"nhanvien","nhanvien"=>$nhanvien->Getnhanvien()]);
	}
	public function add()
	{
			$nhanvien = $this->model("nhanvienModel");
			$hoten = $_POST["hoten"];
			$cmnd = $_POST["cmnd"];
			$sdt = $_POST["sdt"];
			$password= $_POST["password"];
			$chucvu= $_POST["chucvu"];
		$nhanvien->add($hoten,$cmnd,$sdt,$password,$chucvu);
	}
	public function update($value='')
	{
			$nhanvien = $this->model("nhanvienModel");
			$hoten = $_POST["hoten"];
			$cmnd = $_POST["cmnd"];
			$sdt = $_POST["sdt"];
			$password= $_POST["password"];
			$chucvu= $_POST["chucvu"];
			$nhanvien->update($hoten,$cmnd,$sdt,$password,$chucvu);
	}
	public function modifynhanvien($id)
	{

		$nhanvien = $this->model("nhanvienModel");
		if (!isset($_POST["set"])) {
			$_POST["set"]="update";
		}
		if ($_POST["set"]== 'Delete') {
			$nhanvien->delete($id);
			
		}
		else{
			$this->view("nav",["Page"=>"updatenhanvien","id"=>$id, "nhanvien"=>$nhanvien->Getnhanvien1($id)]);
		}
	}
}

 ?>
