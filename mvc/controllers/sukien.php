<?php 
/**
 * 
 */
class sukien extends Controller
{
	function Show(){
		$sukien = $this->model("sukienModel");
		// views
		
		$this->view("nav", [
            "Page"=>"sukien","sukien"=>$sukien->Getsukien()]);
	}
	public function add()
	{
		$sukien = $this->model("sukienModel");
			$ma = $_POST["ma"];
			$ten = $_POST["ten"];
			$discount = $_POST["discount"];
		$sukien->add($ma,$ten,$discount);
	}
	public function update($value='')
	{
			$sukien = $this->model("sukienModel");
			$ma = $_POST["ma"];
			$ten = $_POST["ten"];
			$discount = $_POST["discount"];
		
			$sukien->update($ma,$ten,$discount);
	}
	public function modifysukien($id)
	{

		$sukien = $this->model("sukienModel");
		if (!isset($_POST["set"])) {
			$_POST["set"]="update";
		}
		if ($_POST["set"]== 'Delete') {
			$sukien->delete($id);
		}
		else{
			$this->view("nav",["Page"=>"updatesukien","id"=>$id, "sukien"=>$sukien->Getsukien1($id)]);
		}
	}
}

 ?>
