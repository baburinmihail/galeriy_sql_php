<?php 

class DelitComent
{
	use Controller;

	public function index()
	{
        $id_file = $_GET['id'];
		$id_comment = $_GET['comment'];

		$LocalUser = DBUSER;
		$LocalPassword = DBPASS;
        $connect = new PDO("mysql:host=localhost;dbname=galeria",$LocalUser,$LocalPassword);
	    if (!$connect){
		    die('Ошибка подключения к БД');
	    }

		echo $id_file;
		echo $id_comment;

        $data = $connect->prepare("DELETE FROM `comment` WHERE `comment`.`id` = (?)");
		$data->execute([$id_file]);

		$myHome=GLOBAL_NAME_SERVER;
        $stringHome='http://'.$myHome.'/public/Home';
        header('Location: '.$stringHome);
        
	}

}
