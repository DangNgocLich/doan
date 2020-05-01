<?php 

class App{
	protected $controller="hoadon";
	protected $action="Show";
	protected $params=[];

	function __construct(){
// check isset ne id chua truyen vao thi hien thong bao va back quay tro lai
		//check login 
		//xu ly url	
		///Home/SayHi/1/2/3
		$arr = $this->xulyurl();
	
		if ($arr==NULL) {
			$arr= ["hoadon","Show",""];
		}
		
		///xu ly login
		if (isset($_SESSION["username"])) {
			if ($_SESSION["quyen"]=="2") {
				if ($arr[0]!="api") {
					$arr[0]="kho";	
				}
			}
			if ($_SESSION["quyen"]=="3") {
				if ($arr[0]!="api") {
					$arr[0]="hoadon";	
				}
			}
			
			
		}
		//xuly Controller
		
		if (file_exists("./mvc/controllers/".$arr[0].".php")) {
			$this->controller = $arr[0];
			unset($arr[0]);
		}
		
		
			
		require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;


		//xu ly action

		if (isset($arr[1])) {
			if (method_exists($this->controller, $arr[1])) {
				$this->action=$arr[1];
			}
			unset($arr[1]);

		}
		//xu ly params

		$this->params = $arr?array_values($arr):[];
		//xu ly goi function trong controller
		if (!isset($_SESSION["username"])) {
			require_once './mvc/controllers/api.php';
			$arr1=[];
			call_user_func_array([new api,"login"],$arr1);
		}else{
			// echo $this->action;
			call_user_func_array([$this->controller, $this->action], $this->params );
		}
		

	}
	function xulyurl(){
		///Homee/Show/1/2/3/
		// echo $_GET["url"];
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
	}

	
}
 ?>
