<?php 

Class controller
{

	public function view($path,$data = [])
	{

		if(is_array($data)){
 			extract($data);
		}

		if(file_exists("../app/view/"  . $path . ".php"))
		{
			include "../app/view/"  . $path . ".php";
		}else{
			include "../app/view/" . "/404.php";
		}
	}

	public function load_model($model)
	{

		if(file_exists("../app/model/" . strtolower($model) . ".class.php"))
		{
			include_once "../app/model/" . strtolower($model) . ".class.php";
			return $a = new $model();
		}

		return false;
	}


}