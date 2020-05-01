<?php 
/**
 * 
 */

class api extends Controller
{
	function Show(){ ///check hoa don
		// //models
		//views
		 echo "NOT THING HERE";
	}
	function login(){ ///check hoa don
		// //models
		//views
		 $this->view("login");
	}
	function thongtin(){ ///check hoa don
		// //models
		//views
		$nhanvien = $this->model("nhanvienModel");
			$this->view("nav",["Page"=>"thongtin"]);

	}
	function logout(){
		$this->model("apiModel")->logout();
	}
	function update(){
			$hoten = $_POST["hoten"];
			$cmnd = $_SESSION["manv"];
			$sdt = $_POST["sdt"];
			$password= $_POST["password"];
			$api = $this->model("apiModel");
			$api->update($hoten,$cmnd,$sdt,$password);
	}
}
 ?>
