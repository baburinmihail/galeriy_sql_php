<?php 

class DelitFile
{
	use Controller;

	public function index()
	{
        $id_file = $_GET['id'];

		echo $id_file;
        $LocalUser = DBUSER;
		$LocalPassword = DBPASS;
        $LocalName = DBNAME;
		$connect = new PDO("mysql:host=localhost;dbname=".$LocalName,$LocalUser,$LocalPassword);
	    if (!$connect){
		    die('Ошибка подключения к БД');
	    }

        $data =$connect->query("DELETE FROM photos WHERE `photos`.`id` = $id_file");
		$data =$connect->query("DELETE FROM `comment` WHERE `comment`.`id_img` = $id_file");
		
		$myHome=GLOBAL_NAME_SERVER;
        $stringHome='http://'.$myHome.'/public/Home';
        header('Location: '.$stringHome);
        
	}

}
